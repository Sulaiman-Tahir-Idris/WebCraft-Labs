<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Show a single project
    public function show($id)
    {
        // Find the project by its ID or fail
        $project = Project::findOrFail($id);

        // Return the view with the project data
        return view('projects.show', compact('project'));
    }

    // Store a new project
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'report' => 'nullable|mimes:pdf|max:10240', // Validate PDF file
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        // Handle PDF upload
        $reportPath = null;
        if ($request->hasFile('report')) {
            $reportPath = $request->file('report')->store('reports', 'public');
        }

        // Create a new project
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'report' => $reportPath,
            'slug' => Str::slug($request->title, '-'),
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    // Show the create project form
    public function create()
    {
        return view('projects.create');
    }

    // Display a list of all projects
    public function index()
    {
        $projects = Project::all(); // Retrieve all projects

        return view('projects.index', compact('projects'));
    }

    // Delete a project
    public function destroy($id)
    {
        $project = Project::findOrFail($id); // Find the project by its ID

        // Optionally, delete associated files (image and report) if they exist
        if ($project->image && \Storage::exists('public/' . $project->image)) {
            \Storage::delete('public/' . $project->image);
        }

        if ($project->report && \Storage::exists('public/' . $project->report)) {
            \Storage::delete('public/' . $project->report);
        }

        $project->delete(); // Delete the project from the database

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
