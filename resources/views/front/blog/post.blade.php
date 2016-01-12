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
                <i class="fa fa-facebook"></i>
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-twitter"></i>
            </div>
        </footer>
    </article>
    @include('front.partials.footer')
@endsection