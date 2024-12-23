<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portfolio Site' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-dark text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('portfolio') }}" class="text-xl font-bold">Portfolio</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('projects.index') }}" class="hover:text-gray-300">Projects</a></li>
                <li><a href="{{ route('papers.index') }}" class="hover:text-gray-300">Papers</a></li>
                <li><a href="{{ route('profile.edit') }}" class="hover:text-gray-300">Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-gray-300">Logout</button>
                    </form>
                </li>
            </ul>
            <span>Welcome, {{ Auth::user()->name }}</span>
        </div>
    </nav>
    
    <main class="container mx-auto p-4">
        {{ $slot }}
    </main>
</body>
</html>
