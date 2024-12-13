<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index(){
        $abouts = About::all();
        $recipes = Menu::where('category', 'recipe')->get();
        $special = Menu::where('category', 'special')->limit(2)->get();
        return view('about-us', ['abouts' => $abouts, 'recipes' => $recipes, 'special' => $special]);
    }

    public function view()
    {
        $abouts = About::all();
        return view('admin.About.index', ['abouts' => $abouts]);
    }

    public function create()
    {
        return view('admin.about.create');
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

    return redirect()->route('admin.about')->with('success', 'Data dan gambar berhasil diupload');
}

public function edit($id)
{
    $about = About::findOrFail($id);
    return view('admin.About.edit', ['about' => $about]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string|max:10000',
        'image_path' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000'
    ]);

    $about = About::findOrFail($id);

    // Update data
    $about->title = $request->title;
    $about->content = $request->content;

    // Handle image update
    if ($request->hasFile('image_path')) {
        // Delete old image
        if ($about->image_path && Storage::exists('images/about' . $about->image_path)) {
            Storage::delete('public/' . $about->image_path);
        }

        // Store new image
        $path = $request->file('image_path')->store('images/about');
        $about->image_path = $path;
    }

    $about->save();

    return redirect()->route('admin.about')->with('success', 'Halaman tentang kami berhasil diperbarui!');
}

    public function destroy($id)
    {
        $about = About::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($about->image_path && Storage::exists('public/' . $about->image)) {
            Storage::delete('public/' . $about->image_path);
        }

        // Hapus data dari database
        $about->delete();

        return redirect()->route('admin.about')->with('success', 'Data berhasil dihapus!');
    }
}
