@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Papers</h1>

            @auth
                <a href="{{ route('papers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                    + Publish Paper
                </a>
            @endauth
        </div>

        @if($papers->isEmpty())
            <p>No papers found. Start by publishing one!</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($papers as $paper)
                    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $paper->title }}</h3>
                        <p class="text-gray-600 mb-2">Author: {{ $paper->author }}</p>
                        <p class="text-gray-600 mb-4">{{ $paper->abstract }}</p>

                        <div class="flex items-center space-x-4">
                            <!-- View Button -->
                            <a href="{{ route('papers.show', $paper->id) }}" 
                               class="text-gray-500 hover:text-indigo-500" 
                               title="View Paper">
                                <i class="fas fa-eye text-lg"></i>
                            </a>

                            <!-- Download Button -->
                            <a href="{{ asset('storage/' . $paper->content) }}" 
                               class="text-gray-500 hover:text-blue-500" 
                               title="Download PDF" 
                               target="_blank">
                                <i class="fas fa-download text-lg"></i>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('papers.destroy', $paper->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-500 hover:text-red-500" title="Delete Paper">
                                    <i class="fas fa-trash text-lg"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
