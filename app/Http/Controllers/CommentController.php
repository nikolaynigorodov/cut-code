<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment($id, CommentForm $request)
    {
        $post = Post::findOrFail($id);
        $post->comments()->create($request->validated());

        return redirect(route("posts.show", $id));
    }
}
