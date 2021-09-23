@extends('dashboard/layouts/main')

@section('container')
<article>

    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->judul }}</h2>
                <a href="/dashboard/posts">
                    <button class="btn btn-primary my-3">
                        <span data-feather="arrow-left"></span> Back to Post
                    </button>
                </a>
                <a href="">
                    <button class="btn btn-warning my-3">
                        <span data-feather="edit"></span> Edit
                    </button>
                </a>
                <a href="">
                    <button class="btn btn-danger my-3">
                        <span data-feather="trash-2"></span> Delete
                    </button>
                </a>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mb-4" alt="{{ $post->category->name }}">
                {!! $post->body !!}
                {{-- 
                    tag di atas akan menghilangkan efek HTMLSpecialChars
                    dan dapat mengeksekusi tag HTML.

                    namun, gunakan secara hati - hati supaya tidak terjasi XSS
                    (cross site script)
                --}}
                
            </div>
        </div>
    </div>

    
</article>
@endsection