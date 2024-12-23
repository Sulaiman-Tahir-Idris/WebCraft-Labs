<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.main')

@section('content')
    <h1 class="text-2xl font-bold">Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="name" class="block">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Profile</button>
    </form>
@endsection
