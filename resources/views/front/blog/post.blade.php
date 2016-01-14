@extends('front.base')

@section('content')
    @include('front.partials.secondarynav')
    <article class="page-content">
        <header class="post-header">
            <h1 class="title">{{ $post->title }}</h1>
            <div class="metadata">
                <p class="author">{{ $post->author->name }}</p>
                <div class="published">
                    <i class="material-icons">event</i>
                    <span>{{ $post->published_at->toFormattedDateString() }}</span>
                </div>
            </div>
            <hr class="divider">
        </header>
        <section class="post-body">
            {!! $post->body !!}
        </section>
        <footer>
            <div class="sharing">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" class="share-icon-link">
                    <img src="{{ asset('images/assets/fb.png') }}" alt="share to facebook">
                </a>
                <a href="https://twitter.com/home?status={{ urlencode($post->title . ' ' . Request::url()) }}" class="share-icon-link">
                    <img src="{{ asset('images/assets/twitter.png') }}" alt="share to twitter">
                </a>
                <a href="mailto:?&subject=Read&body={{ Request::url() }}" class="share-icon-link">
                    <img src="{{ asset('images/assets/email.png') }}" alt="share with email">
                </a>
            </div>
        </footer>
    </article>
    @include('front.partials.footer')
@endsection