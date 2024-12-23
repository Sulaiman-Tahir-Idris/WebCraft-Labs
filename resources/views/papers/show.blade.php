@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $paper->title }}</h1>
        <p class="text-gray-600 mb-2">Author: {{ $paper->author }}</p>
        <p class="text-gray-800 mb-4">{{ $paper->abstract }}</p>

        <a href="{{ asset('storage/' . $paper->content) }}" 
           class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition-all"
           target="_blank">
           Download PDF
        </a>
    </div>
@endsection
