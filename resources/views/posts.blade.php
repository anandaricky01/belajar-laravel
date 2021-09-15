@extends('layouts/main')

@section('container')


    <div class="container">
        <h1 class="mb-4 mt-3 text-center">{{ $title }}</h1>
    </div>

    <div class="container mb-2">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/posts">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    {{-- method default nya get --}}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." aria-label="Recipient's username" aria-describedby="button-addon2" name="search" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($posts->count() > 0) 
        <div class="container">
            <div class="card mb-3 shadow p-3 mb-5 bg-body rounded">
                <a href="/posts/{{ $posts[0]->slug }}">
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                </a>
                <div class="card-body">
                    <h3 class="card-title">{{ $posts[0]->judul }}</h3>
                    <p>
                        <small class="text-muted">
                            By : <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                    <a class="btn btn-primary" href="/posts/{{ $posts[0]->slug }}">read more</a>
                </div>
            </div>
        </div>
    

    <div class="container mt-3">
        <div class="row">
            {{-- artikel --}}
            @foreach ($posts->skip(1) as $post) 
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute bg-dark px-3 py-2 text-white"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                        <a href="/posts/{{ $post->slug }}">
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        </a>
                        <div class="card-body">
                        <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->judul }}</a></h5>
                        <p>By : <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                        <p>
                            <small class="text-muted">
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p>{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else
        <h1 class="text-center fs-4 display1 mt-5">No post</h1>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection