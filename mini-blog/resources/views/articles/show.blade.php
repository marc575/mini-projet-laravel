@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <article class="max-w-4xl mx-auto bg-white p-6 rounded shadow mb-8">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
        
        <div class="flex justify-between items-center text-sm text-gray-500 mb-6">
            <span>Publié par {{ $article->user->name }}</span>
            <span>{{ $article->created_at->format('d/m/Y H:i') }}</span>
        </div>
        
        <div class="prose max-w-none mb-8">
            {!! nl2br(e($article->content)) !!}
        </div>
        
        @can('update', $article)
            <div class="flex space-x-2">
                <a href="{{ route('articles.edit', $article) }}" 
                   class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                    Modifier
                </a>
                <form action="{{ route('articles.destroy', $article) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-500 text-white px-3 py-1 rounded text-sm"
                            onclick="return confirm('Supprimer cet article ?')">
                        Supprimer
                    </button>
                </form>
            </div>
        @endcan
    </article>

    <section class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Commentaires ({{ $article->comments->count() }})</h2>
        
        @auth
            <form action="{{ route('comments.store', $article) }}" method="POST" class="mb-6">
                @csrf
                <textarea name="content" rows="3" 
                          class="w-full px-3 py-2 border rounded mb-2"
                          placeholder="Votre commentaire..." required></textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Poster
                </button>
            </form>
        @else
            <p class="text-gray-500 mb-6">
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Connectez-vous</a> pour commenter.
            </p>
        @endauth
        
        <div class="space-y-4">
            @forelse($article->comments as $comment)
                <div class="border-l-4 border-blue-500 pl-4 py-2">
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-semibold">{{ $comment->user->name }}</span>
                        <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-700">{{ $comment->content }}</p>
                    
                    @can('delete', $comment)
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-500 text-sm hover:underline"
                                    onclick="return confirm('Supprimer ce commentaire ?')">
                                Supprimer
                            </button>
                        </form>
                    @endcan
                </div>
            @empty
                <p class="text-gray-500">Aucun commentaire pour l'instant.</p>
            @endforelse
        </div>
    </section>
@endsection