@extends('front.base')

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => '/images/assets/fbimage.png',
        'ogTitle' => 'CompleteLiving - '.$category->name,
        'ogDescription' => 'Read articles, recipes and more on the subject of diet and health'
    ])
    <meta name="description" content="Read articles, recipes and more on the subject of diet and health">
@endsection

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
                        @if($filter->posts->count() > 0)
                        <a href="/blog/{{ $filter->slug }}" class="small-btn">{{ ucfirst($filter->name) }}</a>
                        @endif
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