<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
        ]);

        $blog->comments()->save($comment);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
    }
}
