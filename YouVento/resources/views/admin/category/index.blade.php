@extends('layout.admin')



@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">📋 Liste des Categories</h2>

    <a href="{{ route('category.create') }}" 
        class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-md 
               hover:bg-blue-700 transition duration-300 ease-in-out">
        ➕ Ajouter un categorie
    </a>

    @if(session('success'))
        <div class="mt-4 p-3 text-green-800 bg-green-200 border-l-4 border-green-600 rounded-md">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto mt-6">
        <table class="min-w-full border border-gray-300 rounded-md overflow-hidden shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold border-b">Nom</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold border-b">Action</th>
                   
                    
                </tr>
            </thead>
            <tbody>
                @foreach($categorys as $category)
                    <tr class="hover:bg-gray-50 transition duration-200">
             
                        <td class="px-6 py-4 border-b">{{ $category->title}}</td>
                        <td class="px-6 py-4 border-b flex space-x-3">

                        <a href="{{ route('category.edit', $category->id) }}" 
                                class="px-3 py-1 bg-yellow-500 text-white text-sm font-semibold rounded-md 
                                       hover:bg-yellow-600 transition duration-300">
                                ✏️ Modifier
                            </a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" 
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce category ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="px-3 py-1 bg-red-600 text-white text-sm font-semibold rounded-md 
                                           hover:bg-red-700 transition duration-300">
                                    🗑️ Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
