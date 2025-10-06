<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        return view('Lab.index');
    }

    public function about()
    {
        return view('Lab.about');
    }

    public function status()
    {
        return view('Lab.status');
    }
}
