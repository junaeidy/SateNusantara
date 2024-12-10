<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index(){
        return view('about-us');
    }

    public function view()
    {
        $abouts = About::all();
        return view('admin.About.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        About::create([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Item created successfully.');
    }

    public function edit(About $about)
    {
        return view('items.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($about->image);

            // Store new image
            $imagePath = $request->file('image')->store('images', 'public');
            $about->image = $imagePath;
        }

        $about->name = $request->name;
        $about->save();

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(About $item)
    {
        Storage::disk('public')->delete($item->image);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
