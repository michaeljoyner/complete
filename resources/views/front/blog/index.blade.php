@extends('front.base')

@section('content')
    @include('front.partials.secondarynav')
    <section class="page-content">
        <header>
            <h1 class="title index-title">@if($category->name !== "All Posts") {{ ucfirst($category->name) }} @else My Blog @endif</h1>
            <div class="metadata for-index">
                <p class="author">Showing {{ $category->name }}</p>
                <div class="filter-options">
                    Filter posts:
                    <span>
                    @foreach($filters as $filter)
                    <a href="/blog/{{ $filter->slug }}" class="small-btn">{{ ucfirst($filter->name) }}</a>
                    @endforeach
                    @if($category->name !== "All Posts")
                        <a href="/blog" class="small-btn">All</a>
                    @endif
                    </span>
                </div>
                <div class="published">

                </div>
            </div>
            <hr>
        </header>
        <section class="article-listing">
            @foreach($posts as $post)
                <article>
                    <header>
                        <span class="post-date">{{ $post->published_at->toFormattedDateString() }}</span>
                        <a href="/blog/posts/{{ $post->slug }}"><h2 class="title">{{ $post->title }}</h2></a>
                    </header>
                    <p class="post-description">{{ $post->description }}</p>
                </article>
            @endforeach
        </section>
        <div class="pagination">
            {!! $posts->render() !!}
        </div>
    </section>
    @include('front.partials.footer')
@endsection