<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $posts = Post::query()
            ->orderBy("created_at", "DESC")->limit(3)->get();

        return view('welcome', [
            "posts" => $posts,
        ]);
    }
}
