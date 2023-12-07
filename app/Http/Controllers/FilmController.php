<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
   


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Film::all();
        return view('index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required',
                'usia' => 'required',
                'rating' => 'required',
                'rilis' => 'required',
                'region' => 'required',
            ]
        );
        $data = $request->all();
        Film::create($data);
        return redirect()->route('film.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($film)
    {
        $data = Film::where('id',$film)->first();
        return view('show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($film)
    {
        $data = Film::where('id',$film)->first();
        return view('edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $film)
    {
        $request->validate(
            [
                'judul' => 'required',
                'usia' => 'required',
                'rating' => 'required',
                'rilis' => 'required',
                'region' => 'required',
            ]
        );
        $data = $request->all();
        $updata = Film::where('id',$film)->first();
        $updata->update($data);
        return redirect()->route('film.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($film)
    {
        Film::find($film)->delete();
        return redirect()->back();
    }

    /**
     * Restore the specified resource from storage.
     */
    public function showDeletes()
    {
        $data = Film::onlyTrashed()->get();
        return view('deletes')->with('data',$data);
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($film)
    {
        Film::withTrashed()->where('id',$film)->restore();
        return redirect()->back();
    }

    /**
     * Force Delete the specified resource from storage.
     */
    public function forceDelete($film)
    {
        Film::withTrashed()->where('id',$film)->forceDelete();
        return redirect()->back(); 
    }


}
