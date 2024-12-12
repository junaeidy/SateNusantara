<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $abouts = About::all();
        return view('about-us', ['abouts' => $abouts]);
    }

    public function view()
    {
        $abouts = About::all();
        return view('admin.About.index', ['abouts' => $abouts]);
    }

    public function create()
    {
        return view('admin.About.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string|max:10000',
        'image_path' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000'
    ]);
    // Menyimpan file gambar ke storage
    $imagePath = $request->file('image_path')->store('images/about');

    // // Membuat data baru dan menyimpan ke database
    $about = new About();
    $about->title = $request->title;
    $about->content = $request->content;
    $about->image_path = $imagePath; // Menyimpan path gambar
    $about->save();

    return redirect()->route('admin.about')->with('success', 'Data and image uploaded successfully');
}
}
