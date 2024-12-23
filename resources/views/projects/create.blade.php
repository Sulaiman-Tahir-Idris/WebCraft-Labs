@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create a New Project</h2>
        
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Project Title</label>
                <input type="text" name="title" id="title" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" 
                    placeholder="Enter project title" required>
            </div>
            
            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" 
                    placeholder="Enter project description" required></textarea>
            </div>
            
            <!-- Project Report -->
            <div class="mb-4">
                <label for="report" class="block text-sm font-medium text-gray-700">Upload Project Report (PDF)</label>
                <input type="file" name="report" id="report" 
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border file:border-gray-300 file:text-sm file:font-semibold file:bg-gray-50 file:text-indigo-700 hover:file:bg-gray-100"
                    accept="application/pdf">
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <input type="file" name="image" id="image" 
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border file:border-gray-300 file:text-sm file:font-semibold file:bg-gray-50 file:text-indigo-700 hover:file:bg-gray-100"
                    accept="image/*">
            </div>
            
            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" 
                    class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm">
                    Create Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
