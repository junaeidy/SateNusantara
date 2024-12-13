<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::all();
        return view('team', ['teams' => $teams]);
    }

    public function view()
    {
        $teams = Team::all();
        return view('admin.Team.index', ['teams' => $teams]);
    }

    public function create()
    {
        return view('admin.Team.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required',
            'image_path' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        // Menyimpan file gambar ke storage
        $imagePath = $request->file('image_path')->store('images/team');
    
        // // Membuat data baru dan menyimpan ke database
        $team = new Team();
        $team->name = $request->name;
        $team->position = $request->position;
        $team->image_path = $imagePath; // Menyimpan path gambar
        $team->save();
    
        return redirect()->route('admin.team')->with('success', 'Data dan gambar berhasil diupload');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.Team.edit', ['team' => $team]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'image_path' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000'
    ]);

    $team = Team::findOrFail($id);

    // Update data
    $team->name = $request->name;
    $team->position = $request->position;

    // Handle image update
    if ($request->hasFile('image_path')) {
        // Delete old image
        if ($team->image_path && Storage::exists('images/team' . $team->image_path)) {
            Storage::delete('public/' . $team->image_path);
        }

        // Store new image
        $path = $request->file('image_path')->store('images/team');
        $team->image_path = $path;
    }

    $team->save();

    return redirect()->route('admin.team')->with('success', 'Data berhasil diperbarui!');
}

public function destroy($id)
{
    $team = Team::findOrFail($id);

    // Hapus gambar dari penyimpanan
    if ($team->image_path && Storage::exists('public/' . $team->image)) {
        Storage::delete('public/' . $team->image_path);
    }

    // Hapus data dari database
    $team->delete();

    return redirect()->route('admin.team')->with('success', 'Data berhasil dihapus!');
}
}
