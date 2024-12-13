<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $recipes = Menu::where('category', 'recipe')->get();
        $special = Menu::where('category', 'special')->get();
        $regular = Menu::where('category', 'regular')->get();
        return view('menu', ['menus' => $menus, 'recipes' => $recipes, 'special' => $special, 'regular' => $regular]);
    }

    public function view(){
        $menus = Menu::all();
        return view('admin.Menu.index', ['menus' => $menus]);
    }

    public function create(){
        return view('admin.Menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
            'image_path' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        $imagePath = $request->file('image_path')->store('images/menu');

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->category = $request->category;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->image_path = $imagePath;
        $menu->save();

        return redirect()->route('admin.menu')->with('success', 'Data berhasil diupload');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.Menu.edit', ['menu' => $menu]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
    
        $menu = Menu::findOrFail($id);
    
        // Update data
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->category = $request->category;
        $menu->description = $request->description;
    
        // Handle image update
        if ($request->hasFile('image_path')) {
            // Delete old image
            if ($menu->image_path && Storage::exists('images/menu' . $menu->image_path)) {
                Storage::delete('public/' . $menu->image_path);
            }
    
            // Store new image
            $path = $request->file('image_path')->store('images/menu');
            $menu->image_path = $path;
        }
    
        $menu->save();
    
        return redirect()->route('admin.menu')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('admin.menu')->with('success', 'Menu berhasil dihapus');
       
    if ($team->image_path && Storage::exists('public/' . $team->image)) {
        Storage::delete('public/' . $team->image_path);
    }
    $team->delete();

    return redirect()->route('admin.team')->with('success', 'Data berhasil dihapus!');
    }
}
