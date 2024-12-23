@extends('layouts.main')

@section('title', 'Welcome, ' . $user->name)

@section('content')
    <div class="container mx-auto p-4">
        <!-- Projects Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Highlighted Projects</h2>
            @if($projects->isEmpty())
                <p>No projects found. Start by adding one!</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($projects as $project)
                        <div class="bg-white shadow rounded-lg p-4">
                            <h3 class="text-lg font-bold text-gray-800">{{ $project->title }}</h3>
                            <p class="text-gray-700 mb-2">{{ Str::limit($project->description, 100) }}</p>
                            
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" 
                                     alt="Project Image" 
                                     class="w-full h-40 object-cover rounded mb-4">
                            @endif

                            <a href="{{ route('projects.show', $project->id) }}" 
                               class="text-blue-500 hover:underline">View Details</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Papers Section -->
        <div>
            <h2 class="text-2xl font-bold mb-4">Highlighted Papers</h2>
            @if($papers->isEmpty())
                <p>No papers found. Start by publishing one!</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($papers as $paper)
                        <div class="bg-white shadow rounded-lg p-4">
                            <h3 class="text-lg font-bold text-gray-800">{{ $paper->title }}</h3>
                            <p class="text-gray-700 mb-2">Author: {{ $paper->author }}</p>
                            <p class="text-gray-700">{{ Str::limit($paper->abstract, 100) }}</p>

                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('papers.show', $paper->id) }}" 
                                   class="text-blue-500 hover:underline">View Details</a>
                                <a href="{{ asset('storage/' . $paper->content) }}" 
                                   target="_blank" 
                                   class="text-gray-500 hover:text-blue-500" 
                                   title="Download Paper">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
