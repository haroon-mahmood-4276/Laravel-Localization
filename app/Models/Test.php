<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    public function testStore($request)
    {
        try {

            if ($request->file('image')) {
                $this->image = filter_strip_tags($request->image->hashName());
                $request->image->move(public_path('files/images'), $request->image->hashName());
            }

            $this->save();

            (new TestTranslation())->testtranslationStore($request, $this->id);
        } catch (Exception $ex) {
            dd($ex);
        }
        return true;
    }

    public function testUpdate($request, $id)
    {
        try {
            $data = [];

            if ($request->file('image')) {

                $prevPath = public_path('files/images/' . $this->where('id', $id)->first()->image);
                if (!is_null($prevPath) && File::exists($prevPath)) {
                    File::delete($prevPath);
                }

                $data['image'] = filter_strip_tags($request->image->hashName());
                $request->image->move(public_path('files/images'), $request->image->hashName());
            }
            $this->where('id', $id)->update($data);


            (new TestTranslation())->testtranslationUpdate($request, $id);
        } catch (Exception $ex) {
            dd($ex);
        }
        return true;
    }
}
