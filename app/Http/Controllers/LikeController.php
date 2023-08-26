<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Like;

class LikeController extends Controller
{
    public function toggle(Blog $blog)
    {
        $user = auth()->user();

        if ($user->likes()->where('blog_id', $blog->id)->exists()) 
        {
            $user->likes()->where('blog_id', $blog->id)->delete();
            return redirect()->back()->with('success', 'Vous n\'aimez plus ce post.');
        } 
        else 
        {
            $like = new Like(['user_id' => $user->id]);
            $blog->likes()->save($like);
            return redirect()->back()->with('success', 'Vous aimez ce post.');
        }
    }
}
