@extends('layouts.app')

@section('title', 'Créer un article')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Nouvel Article</h1>
        
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 mb-2">Titre</label>
                <input type="text" name="title" id="title" 
                       class="w-full px-3 py-2 border rounded"
                       required maxlength="255">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="content" class="block text-gray-700 mb-2">Contenu</label>
                <textarea name="content" id="content" rows="6"
                          class="w-full px-3 py-2 border rounded"
                          required></textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Publier
            </button>
        </form>
    </div>
@endsection