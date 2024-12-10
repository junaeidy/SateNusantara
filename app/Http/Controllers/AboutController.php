<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('about-us');
    }

    public function view()
    {
        return view('admin.About.index');
    }

    public function create()
    {
        return view('items.create');
    }
}
