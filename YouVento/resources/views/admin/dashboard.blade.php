@extends('layout.admin')

@section('content')



        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">Tableau de bord</h1>
            <div class="flex items-center space-x-4">
                <a href="{{ route('club.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Ajouter un club
                </a>
                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Nouvel évènement
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm mb-2">Total Clubs</h3>
                <p class="text-3xl font-bold">24</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm mb-2">Évènements actifs</h3>
                <p class="text-3xl font-bold">12</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm mb-2">Utilisateurs</h3>
                <p class="text-3xl font-bold">156</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm mb-2">En attente</h3>
                <p class="text-3xl font-bold">5</p>
            </div>
        </div>

        <!-- Tables -->
        <div class="grid grid-cols-2 gap-6">
            <!-- Recent Clubs -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-semibold">Clubs récents</h2>
                </div>
                <div class="p-4">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-500">
                                <th class="pb-4">Nom</th>
                                <th class="pb-4">Membres</th>
                                <th class="pb-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2">Club Tech</td>
                                <td>24</td>
                                <td><span class="px-2 py-1 bg-green-100 text-green-800 rounded">Actif</span></td>
                            </tr>
                            <tr>
                                <td class="py-2">Design Lab</td>
                                <td>18</td>
                                <td><span class="px-2 py-1 bg-green-100 text-green-800 rounded">Actif</span></td>
                            </tr>
                            <tr>
                                <td class="py-2">Robotique</td>
                                <td>15</td>
                                <td><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded">En attente</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Events -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-semibold">Évènements récents</h2>
                </div>
                <div class="p-4">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-500">
                                <th class="pb-4">Nom</th>
                                <th class="pb-4">Date</th>
                                <th class="pb-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2">Hackathon IA</td>
                                <td>25 Fév 2024</td>
                                <td><span class="px-2 py-1 bg-blue-100 text-blue-800 rounded">À venir</span></td>
                            </tr>
                            <tr>
                                <td class="py-2">Workshop Design</td>
                                <td>28 Fév 2024</td>
                                <td><span class="px-2 py-1 bg-blue-100 text-blue-800 rounded">À venir</span></td>
                            </tr>
                            <tr>
                                <td class="py-2">Tech Talk</td>
                                <td>1 Mar 2024</td>
                                <td><span class="px-2 py-1 bg-gray-100 text-gray-800 rounded">Terminé</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@stop