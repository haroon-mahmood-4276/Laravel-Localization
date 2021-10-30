<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!request()->ajax()) {
            $tests = Test::join('test_translations', 'test_translations.test_id', '=', 'tests.id')
                ->select('tests.id', 'test_translations.name', 'test_translations.description', 'test_translations.locale', 'tests.image')
                ->where('test_translations.locale', app()->currentLocale())
                ->paginate(10);
            return view('app.tests.index', ['tests' => $tests]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!request()->ajax()) {
            return view('app.tests.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input();
        if (!request()->ajax()) {
            $request->validate([
                'data.name.*' => 'required|string',
                'data.description.*' => 'string|between:0,10000',
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);

            if ((new Test())->testStore($request)) {
                return redirect()->route('tests.index')->withSuccess('Data Saved.');
            }
            return redirect()->route('tests.index')->withError('Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!request()->ajax()) {
            $test = Test::join('test_translations', 'test_translations.test_id', '=', 'tests.id')
                ->select('tests.id', 'test_translations.name', 'test_translations.description', 'test_translations.locale', 'tests.image')
                ->where('tests.id', $id)
                ->orderBy('locale')
                ->get();
            return view('app.tests.edit', ['test' => $test]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!request()->ajax()) {
            $request->validate([
                'data.name.*' => 'required|string',
                'data.description.*' => 'string|between:0,10000',
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);

            if ((new Test())->testUpdate($request, $id)) {
                return redirect()->route('tests.index')->withSuccess('Data Saved.');
            }
            return redirect()->route('tests.index')->withError('Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!request()->ajax()) {
            if (Test::find(filter_strip_tags($id))->delete()) {
                return redirect()->route('tests.index')->withSuccess('Data Deleted.');
            }
            return redirect()->route('tests.index')->withError('Something went wrong.');
        }
    }
}
