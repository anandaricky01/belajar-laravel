{{-- untuk menggunakan layout, kita harus extends terlebih dahulu --}}
@extends('layouts/main')

@section('container')
    {{-- section ini adalah sebuah template yang merujuk pada template 
        folder layouts/main 
    --}}
    <article>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="mb-3">{{ $post->judul }}</h2>
                    <p>By : <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> {{ $post->created_at->diffForHumans() }}</p>
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mb-4" alt="{{ $post->category->name }}">
                    {!! $post->body !!}
                    {{-- 
                        tag di atas akan menghilangkan efek HTMLSpecialChars
                        dan dapat mengeksekusi tag HTML.

                        namun, gunakan secara hati - hati supaya tidak terjasi XSS
                        (cross site script)
                    --}}
                    <a href="/posts">
                        <button class="btn btn-primary mt-3">Back to Post</button>
                    </a>
                    <div class="mb-5"></div>
                </div>
            </div>
        </div>

        
    </article>
    
    
@endsection

{{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente veniam non quisquam dolore tenetur. Incidunt tempore atque neque deleniti perspiciatis ipsam minus distinctio, aliquid omnis eligendi voluptate at quis, unde iure pariatur ratione dolorem harum nisi facere architecto fuga aliquam quia possimus dolore.</p><p>magni iste debitis est quae obcaecati, voluptatibus sapiente minima incidunt, quos repellat aut natus molestias culpa hic eos consequuntur tenetur quidem nostrum odio pariatur deserunt accusantium cumque! Iste, maxime ex minus dignissimos obcaecati non, nihil quis repudiandae, dolorum dicta impedit facere. Optio maiores eligendi porro cumque eos laborum illo excepturi illum. Delectus magnam magni, eligendi, nemo voluptatem in aliquid unde atque id vel assumenda soluta quia cum. Veritatis dignissimos eum magnam iusto, voluptatem in quidem aliquam?</p> --}}