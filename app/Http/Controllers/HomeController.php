<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects  = Project::ordered()->get();
        $featured  = Project::featured()->ordered()->get();
        $skills    = Skill::ordered()->get()->groupBy('category');
        $categories = $projects->pluck('category')->unique()->sort()->values();

        return view('portfolio.home', compact('projects', 'featured', 'skills', 'categories'));
    }
}
