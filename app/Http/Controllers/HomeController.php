<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Team;
use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $abouts = About::all();
        $teams = Team::all();
        $menus = Menu::all();
        $recipes = Menu::where('category', 'recipe')->get();
        $specials = Menu::where('category', 'special')->get();
        return view('welcome', ['abouts' => $abouts, 'teams' => $teams, 'menus' => $menus, 'recipes' => $recipes, 'special' => $specials]);
    }

    
}
