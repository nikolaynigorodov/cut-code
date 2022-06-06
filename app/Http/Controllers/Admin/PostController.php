<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "DESC")->paginate(10);

        return view('admin.posts.index', [
            "posts" => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        Post::create($request->validated());

        return redirect(route('admin.posts.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.create', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostFormRequest  $request
     */
    private function createAndUpdate(PostFormRequest $request)
    {
        $data = $request->validated();

        if($request->has('thumbnail')) {
            $thumbnail = str_replace("public/posts", "", $request->file('thumbnail')->store('public/posts'));
            $data['thumbnail'] = $thumbnail;
        }

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect(route('admin.posts.index'));
    }
}
