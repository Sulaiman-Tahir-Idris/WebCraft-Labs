@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Projects</h1>

            @auth
                <!-- Show this button only for logged-in users -->
                <a href="{{ route('projects.create') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    + Create Project
                </a>
            @endauth
        </div>

        @if($projects->isEmpty())
            <p>No projects found. Start by adding one!</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($projects as $project)
                    <div class="bg-white shadow rounded-lg p-4">
                        <h2 class="text-lg font-bold">{{ $project->title }}</h2>
                        <p class="text-gray-700">{{ Str::limit($project->description, 100) }}</p>

                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="mt-2 w-full h-40 object-cover rounded">
                        @endif

                        <div class="flex justify-between items-center mt-4">
                            <!-- View Project Button -->
                            <a href="{{ route('projects.show', $project->id) }}" 
                               class="text-gray-500 hover:text-blue-500" 
                               title="View Project">
                                <i class="fas fa-eye text-lg"></i>
                            </a>

                            @auth
                                <div class="flex items-center space-x-4">
                                    <!-- Download Button -->
                                    @if($project->report)
                                        <a href="{{ asset('storage/' . $project->report) }}" 
                                           class="text-gray-500 hover:text-blue-500" 
                                           title="Download Report" 
                                           target="_blank">
                                            <i class="fas fa-download text-lg"></i>
                                        </a>
                                    @endif

                                    <!-- Delete Button -->
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this project?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-500 hover:text-red-500" title="Delete Project">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
