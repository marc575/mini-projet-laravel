<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Affiche la liste des articles
     */
    public function index()
    {
        $articles = Article::with(['user', 'comments'])
                    ->latest()
                    ->paginate(10);
        
        return view('articles.index', compact('articles'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Enregistre un nouvel article
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article = auth()->user()->articles()->create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content']
        ]);

        return redirect()->route('articles.show', $article)
                         ->with('success', 'Article créé avec succès!');
    }

    /**
     * Affiche un article spécifique
     */
    public function show(Article $article)
    {
        $article->load(['comments.user', 'user']);
        return view('articles.show', compact('article'));
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    /**
     * Met à jour l'article
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content']
        ]);

        return redirect()->route('articles.show', $article)
                         ->with('success', 'Article mis à jour!');
    }

    /**
     * Supprime l'article
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        
        $article->delete();
        return redirect()->route('articles.index')
                         ->with('success', 'Article supprimé!');
    }
}