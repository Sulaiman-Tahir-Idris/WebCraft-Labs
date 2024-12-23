<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Portfolio') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css') <!-- Assuming you're using Vite for Tailwind CSS -->
</head>

<body class="bg-gray-100 font-sans antialiased">

    <!-- Navigation Bar -->
    <nav class="bg-blue-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('portfolio') }}" class="font-bold text-xl hover:text-gray-200 transition-all">WebCraft Labs</a>
            <ul class="flex space-x-6 text-lg">
                <li><a href="{{ route('portfolio') }}" class="hover:text-gray-200 transition-all">Home</a></li>
                <li><a href="{{ route('projects.index') }}" class="hover:text-gray-200 transition-all">Projects</a></li>
                <li><a href="{{ route('papers.index') }}" class="hover:text-gray-200 transition-all">Papers</a></li>
                <li><a href="{{ route('profile.edit') }}" class="hover:text-gray-200 transition-all">Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 px-4 py-2 rounded-lg text-white hover:bg-red-700 transition-all">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        @yield('content') <!-- This is where the specific page content will go -->
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white p-4 mt-12">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} WebCraft Labs. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
