<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's portfolio page with their projects and papers.
     */
    public function index()
    {
        $user = Auth::user();

        // Fetch the user's projects and papers (ensure relationships exist in the User model)
        $projects = $user->projects; 
        $papers = $user->papers;

        return view('portfolio', compact('user', 'projects', 'papers'));
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        // Update the user's information
        $user = Auth::user();
        // $user->update($request->only('name', 'email'));

        // Redirect back to the portfolio page with a success message
        return redirect()->route('portfolio')->with('success', 'Profile updated successfully!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        // Validate the password for account deletion
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Log out the user and delete their account
        Auth::logout();
        $user->delete();

        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('success', 'Your account has been deleted successfully.');
    }
}
