@extends('layouts.main')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold text-gray-800">{{ $project->title }}</h1>
    <p class="text-gray-600 mt-2">{{ $project->description }}</p>

    @if($project->image)
        <div class="mt-4">
            <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="rounded-lg max-w-full h-auto">
        </div>
    @endif

    @if($project->report)
        <div class="mt-4">
            <a href="{{ asset('storage/' . $project->report) }}" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all">
                Download Report
            </a>
        </div>
    @endif
    <br>
    <a href="{{ route('projects.index') }}" class="text-blue-500 mt-4 block">Back to Projects</a>
</div>
@endsection
