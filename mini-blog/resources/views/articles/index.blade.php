@extends('layouts.app')

@section('title', 'Liste des articles')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Nos Articles</h1>
        <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Nouvel Article
        </a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($articles as $article)
            <article class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">
                        <a href="{{ route('articles.show', $article) }}" class="hover:text-blue-500">
                            {{ $article->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($article->content, 100) }}</p>
                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span>Par {{ $article->user->name }}</span>
                        <span>{{ $article->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </article>
        @empty
            <p class="text-gray-500">Aucun article disponible.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $articles->links() }}
    </div>
@endsection