@extends('layout.app')

@section('title', 'Статьи')

@section('content')
    @include('partials.header')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($posts as $post)
            @include("posts.partials.item", ["post" => $post])
        @endforeach

        <div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0 mt-3">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
