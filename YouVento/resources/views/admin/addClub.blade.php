@extends('layout.admin')

@section('content')
@if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif


  <div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Ajouter un nouveau club</h2>
                <p class="mt-1 text-sm text-gray-600">Créez un nouveau club en remplissant les informations ci-dessous.</p>
            </div>

            <form action="{{ route('club.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                <!-- Protection CSRF -->
                @csrf

                <!-- Nom du club -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom du club</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
                </div>

                <!-- Catégorie -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <select name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <option value="">Sélectionner une catégorie</option>
                        <option value="1">Technologie</option>
                        <option value="2">Design</option>
                        <option value="3">Robotique</option>
                        <option value="4">Arts</option>
                        <option value="5">Sports</option>
                    </select>
                </div>

                <!-- Logo du club -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Logo du club</label>
                    <div class="mt-1 flex items-center">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="logo" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Télécharger un fichier</span>
                                    <input id="logo" name="logo" type="file" class="sr-only" >
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG jusqu'à 2MB</p>
                        </div>
                    </div>
                </div>


                

                <!-- Boutons -->
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Créer le club
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script pour la prévisualisation du logo -->
    <script>
        document.getElementById('logo').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Vous pouvez ajouter ici le code pour afficher la prévisualisation du logo
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
@stop