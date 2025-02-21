<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <aside class="fixed h-full w-64 bg-gray-800">
        <div class="p-4">
            <h2 class="text-white text-2xl font-bold mb-6">Admin Panel</h2>
            
            <nav class="space-y-2">
                <a href="#" class="block px-4 py-2 rounded-lg bg-gray-900 text-white">
                    Dashboard
                </a>
                <a href="{{ route('club.index')}}" class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-900 hover:text-white">
                    Clubs
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-900 hover:text-white">
                    Évènements
                </a>
                <a href="{{route('category.index')}}" class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-900 hover:text-white">
                    categories
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg text-gray-400 hover:bg-gray-900 hover:text-white">
                    Paramètres
                </a>
            </nav>
        </div>
    </aside>
    <main class="ml-64 p-8">
        @yield('content')
    </main>
</body>
</html>