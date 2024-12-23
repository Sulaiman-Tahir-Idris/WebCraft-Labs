<x-layout>
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <p class="mt-4">Welcome! Manage your projects and papers here.</p>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Projects -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Projects</h2>
            <p class="mt-2">Add or manage your projects.</p>
            <a href="{{ route('projects.create') }}" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Add Project</a>
        </div>

        <!-- Papers -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Papers</h2>
            <p class="mt-2">Add or manage your papers.</p>
            <a href="{{ route('papers.create') }}" class="mt-4 bg-green-600 text-white px-4 py-2 rounded">Add Paper</a>
        </div>
    </div>
</x-layout>
