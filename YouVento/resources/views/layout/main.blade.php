<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','main')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col">

<!-- Header -->
<header class="bg-white shadow-md">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <img class="h-8 w-auto" src="/images/logo.png" alt="YouCode">
                    </a>
                </div>

                <!-- Navigation desktop -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Accueil
                    </a>
                    <a href="/clubs" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Clubs
                    </a>
                    <a href="/events" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Événements
                    </a>
                </div>
            </div>

            <!-- Menu droit -->
            <div class="flex items-center">
                <a href="/login" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Connexion</a>
                <a href="/register" class="ml-4 bg-indigo-600 text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Inscription</a>
            </div>

            <!-- Bouton menu mobile -->
            <div class="flex items-center sm:hidden">
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" onclick="toggleMobileMenu()">
                    <span class="sr-only">Ouvrir le menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu mobile -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="/" class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Accueil
                </a>
                <a href="/clubs" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Clubs
                </a>
                <a href="/events" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Événements
                </a>
            </div>
        </div>
    </nav>
</header>

<main>
    @yield('content')
</main>    


<!-- Footer -->
<footer class="bg-white shadow-md mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Colonne 1 - À propos -->
            <div class="space-y-4">
                <img class="h-8" src="/images/logo.png" alt="YouCode">
                <p class="text-gray-600">
                    Rejoignez la communauté YouCode et participez à des événements passionnants.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0 0 23 3z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Colonne 2 - Navigation -->
            <div>
                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Navigation</h3>
                <div class="mt-4 space-y-4">
                    <a href="/" class="block text-gray-500 hover:text-gray-900">Accueil</a>
                    <a href="/clubs" class="block text-gray-500 hover:text-gray-900">Clubs</a>
                    <a href="/events" class="block text-gray-500 hover:text-gray-900">Événements</a>
                    <a href="/contact" class="block text-gray-500 hover:text-gray-900">Contact</a>
                </div>
            </div>

            <!-- Colonne 3 - Clubs -->
            <div>
                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Clubs</h3>
                <div class="mt-4 space-y-4">
                    <a href="#" class="block text-gray-500 hover:text-gray-900">Tech Club</a>
                    <a href="#" class="block text-gray-500 hover:text-gray-900">Design Lab</a>
                    <a href="#" class="block text-gray-500 hover:text-gray-900">Robotique</a>
                    <a href="#" class="block text-gray-500 hover:text-gray-900">Voir tous</a>
                </div>
            </div>

            <!-- Colonne 4 - Contact -->
            <div>
                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Contact</h3>
                <div class="mt-4 space-y-4">
                    <p class="text-gray-500">Email: contact@youcode.ma</p>
                    <p class="text-gray-500">Tél: +212 5XX XX XX XX</p>
                    <p class="text-gray-500">Adresse: YouCode, Safi, Maroc</p>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-center text-gray-400">
                &copy; 2024 YouCode. Tous droits réservés.
            </p>
        </div>
    </div>
</footer>

<!-- Script pour le menu mobile -->
<script>
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.classList.toggle('hidden');
}
</script>

</body>
</html>