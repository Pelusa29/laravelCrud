
@extends('layout')

@section('contenido')
    <section class="posts container">
        @foreach ($posts as $post)
        <article class="post">
            @if($post->photos->count() === 1)
                <figure><img src="{{ $post->photos->first()->url }}" alt="" class="img-responsive"></figure>
            @endif
            <div class="content-post">
                <header class="container-flex space-between">
                    <div class="date">
                        <span class="c-gray-1">{{ $post->published_at->format('M d') }}</span>
                    </div>
                    <div class="post-category">
                        <span class="category text-capitalize">{{ $post->category->name}}</span>
                    </div>
                </header>
                <h1>{{ $post->title }}</h1>
                <div class="divider"></div>
                <p>{{ $post->execerpt }}</p>
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <a href="blog/{{ $post->id}}" class="text-uppercase c-green">Más..</a>
                    </div>
                    <div class="tags container-flex">
                        @foreach ($post->tags as $tag)
                        <span class="tag c-gray-1 text-capitalize">#{{$tag->name}}</span>
                        @endforeach
                    </div>
                </footer>
            </div>
        </article>
        @endforeach
    </section>

    <div class="pagination">
        <ul class="list-unstyled container-flex space-center">
            <li><a href="#" class="pagination-active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
    </div>
@stop
