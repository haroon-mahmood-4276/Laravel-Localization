<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class TestTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function testtranslationStore($request, $id)
    {
        // dd($request);
        try {
            foreach ($request->input('data') as $key => $value) {
                $data = [
                    'name' => $value['name'],
                    'description' => $value['description'],
                    'test_id' => $id,
                    'locale' => $key,
                ];
                $this->insert($data);
            }
        } catch (Exception $ex) {
            dd($ex);
        }
        return true;
    }

    public function testtranslationUpdate($request, $id)
    {
        try {
            foreach ($request->input('data') as $key => $value) {
                $data = [
                    'name' => $value['name'],
                    'description' => $value['description'],
                ];
                $this->where('test_id', $id)->where('locale', $key)->update($data);
            }
        } catch (Exception $ex) {
            dd($ex);
        }
        return true;
    }
}
