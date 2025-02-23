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
                <h2 class="text-2xl font-bold text-gray-900">creè categorie</h2>
            </div>

            <form action="{{ route('category.store')}}" method="POST" class="space-y-6">
                <!-- Protection CSRF -->
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">titre</label>
                    <input type="text" name="title" id="name" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" >
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Créer le categorie
                    </button>
                </div>
            </form>
        </div>
    </div>

   
@stop