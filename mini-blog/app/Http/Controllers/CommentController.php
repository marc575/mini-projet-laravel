<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Enregistre un nouveau commentaire
     */
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'content' => 'required|min:3|max:1000',
        ]);

        $article->comments()->create([
            'content' => $validated['content'],
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Commentaire ajouté!');
    }

    /**
     * Supprime un commentaire
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        
        $comment->delete();
        return back()->with('success', 'Commentaire supprimé!');
    }
}