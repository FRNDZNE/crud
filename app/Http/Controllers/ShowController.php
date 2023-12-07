<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class ShowController extends Controller
{
    public function index()
    {
        $data = Film::all();
        return view('frontpage',compact('data'));
    }
}
