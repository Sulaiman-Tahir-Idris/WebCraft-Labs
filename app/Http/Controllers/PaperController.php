<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    // Show the form for creating a new paper
    public function create()
    {
        return view('papers.create');
    }

    // Store a new paper in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'abstract' => 'required|string',
            'author' => 'required|string|max:255',
            'pdf' => 'required|mimes:pdf|max:2048', // Ensure it's a PDF and max size 2MB
        ]);
    
        // Handle file upload
        $pdfPath = $request->file('pdf')->store('papers', 'public'); // Store in 'storage/app/public/papers'
    
        // Create the paper record
        Paper::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'author' => $request->author,
            'content' => $pdfPath, // Save file path as content
        ]);
    
        return redirect()->route('papers.index')->with('success', 'Paper published successfully!');
    }

    // List all papers
    public function index()
    {
        $papers = Paper::all();
        return view('papers.index', compact('papers'));
    }

    // Show a single paper
    public function show($id)
    {
        $paper = Paper::findOrFail($id);

        // Return the paper details view
        return view('papers.show', compact('paper'));
    }

    // Delete a paper
    public function destroy($id)
    {
        $paper = Paper::findOrFail($id);

        // Optional: Ensure only authorized users can delete
        // If user ownership is required, uncomment the lines below:
        // if (auth()->id() !== $paper->user_id) {
        //     abort(403, 'Unauthorized action.');
        // }

        // Delete the PDF file from storage
        if ($paper->content && \Storage::exists('public/' . $paper->content)) {
            \Storage::delete('public/' . $paper->content);
        }

        // Delete the paper record
        $paper->delete();

        return redirect()->route('papers.index')->with('success', 'Paper deleted successfully.');
    }
}
