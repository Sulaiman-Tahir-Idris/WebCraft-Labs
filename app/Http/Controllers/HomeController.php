<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home()
    {
        $projects = Project::latest()->take(6)->get();
        $papers = Paper::latest()->take(6)->get();

        return view('home', compact('projects', 'papers'));
    }
    
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Get the user's projects and papers
        $projects = $user->projects;
        $papers = $user->papers;

        return view('home', compact('user', 'projects', 'papers'));
    }
}
