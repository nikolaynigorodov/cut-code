<?php

namespace App\Http\Controllers;

use App\Events\CommentCreate;
use App\Http\Requests\CommentForm;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment($id, CommentForm $request)
    {
        $post = Post::findOrFail($id);
        $comment = $post->comments()->create($request->validated());

        event(new CommentCreate($comment));

        return redirect(route("posts.show", $id));
    }
}
