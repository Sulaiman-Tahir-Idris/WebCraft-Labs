@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Publish a Paper</h2>
        
        <form action="{{ route('papers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" 
                    placeholder="Enter paper title" required>
            </div>
            
            <!-- Abstract -->
            <div class="mb-4">
                <label for="abstract" class="block text-sm font-medium text-gray-700">Abstract</label>
                <textarea name="abstract" id="abstract" rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" 
                    placeholder="Enter paper abstract" required></textarea>
            </div>
            
            <!-- PDF Upload -->
            <div class="mb-4">
                <label for="pdf" class="block text-sm font-medium text-gray-700">Upload PDF</label>
                <input type="file" name="pdf" id="pdf" 
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border file:border-gray-300 file:text-sm file:font-semibold file:bg-gray-50 file:text-indigo-700 hover:file:bg-gray-100"
                    accept=".pdf" required>
            </div>
            
            <!-- Author -->
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                <input type="text" name="author" id="author" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" 
                    placeholder="Enter author name" required>
            </div>
            
            <!-- Publish Button -->
            <div class="text-right">
                <button type="submit" 
                    class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm">
                    Publish Paper
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
