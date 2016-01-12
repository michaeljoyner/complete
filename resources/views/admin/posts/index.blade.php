@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="cl-page-header">
        <div class="container">
            <h2 class="page-title white-text">{{ $category->name }}</h2>
            <a class="cl-page-action cl-primary-action btn-floating btn-large waves-effect modal-trigger waves-light"
               href="#create-post-modal">
                <i class="material-icons">add</i>
            </a>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="card blog-posts-index">
            @foreach($posts as $post)
                <div class="blog-post row">
                    <div class="blog-post-info col m8">
                        <h3 class="post-title">{{ $post->title }}</h3>
                        <hr>
                        <p>{{ $post->description }}</p>
                    </div>
                    <div class="blog-post-actions col m4">
                        <div class="post-date">
                            <i class="material-icons">event</i>
                            <span>
                                @if($post->published)
                                    {{ $post->published_at->toFormattedDateString() }}
                                @else
                                    {{ $post->updated_at->toFormattedDateString() }}
                                @endif
                            </span>
                        </div>
                        <post-publish-toggle pubstatus="{{ $post->published }}"
                                             postid="{{ $post->id }}"
                        ></post-publish-toggle>
                        <div class="post-actions">
                            <a href="/admin/posts/{{ $post->id }}/edit">
                                <i class="material-icons blue-text small">mode_edit</i>
                            </a>
                            <a class="delete-modal-trigger"
                               href="#delete-modal"
                               data-delete-url="/admin/posts/{{ $post->id }}"
                               data-item-name="{{ $post->title }}"
                            ><i class="material-icons red-text small">delete</i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            @if($posts->count() < 1)
                <h4 class="grey-text darken-1">You have no posts yet. Maybe it's time to get started.</h4>
            @endif
        </div>
        <div class="blog-index-pager">
            {!! $posts->render() !!}
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="create-post-modal" class="modal">
        <div class="modal-content">
            <h4>Create a new post in {{ $category->name }}</h4>
            {!! Form::open(['url' => '/admin/users/'.Auth::user()->id.'/blog/categories/'.$category->id.'/posts']) !!}
            <div class="row">
                <p><strong>Note:</strong>The title may be edited later, however the text you enter now will always be
                    used in the url for the article and cannot be changed. The only way to correct it if you do
                    something utterly stupid is to delete the entire article.</p>
                <div class="input-field col s12">
                    <input type="text" name="title" value="{{ old('title') }}">
                    <label for="title">Title</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit">
                Create Post
            </button>
            {{--<button class="btn grey waves-effect waves-light closes-modal">--}}
            {{--Cancel--}}
            {{--</button>--}}
            {!! Form::close() !!}
        </div>
    </div>
    <div id="delete-modal" class="modal">
        <div class="modal-content">
            <h4>Delete item?</h4>
            <p>Are you sure you want to delete <span id="delete-item-name">this item</span>? It may not be reversible.</p>
        </div>
        <div class="modal-footer">
            <form id="delete-form" action="" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn waves-effect waves-light red" type="submit">
                    Delete
                </button>
            </form>
        </div>
    </div>
    <template id="post-publish-toggle-template">
        <div class="switch published-switch">
            <label>
                Draft
                <input type="checkbox" v-model="status" v-on:change="postPublishedStatus">
                <span class="lever"></span>
                Published
            </label>
        </div>
    </template>
@endsection

@section('bodyscripts')
    <script>
        $(document).ready(function () {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();

            $('.delete-modal-trigger').on('click', function() {
                document.querySelector('#delete-form').setAttribute('action', this.getAttribute('data-delete-url'));
                document.querySelector('#delete-item-name').textContent = this.getAttribute('data-item-name');

                $('#delete-modal').openModal();
            });
        });
    </script>
    <script>
        Vue.component('post-publish-toggle', {

            props: ['pubstatus', 'postid'],

            template: '#post-publish-toggle-template',

            data: function() {
                return {
                    status: false,
                }
            },

            ready: function() {
                this.status = !!(this.pubstatus == 1);
            },

            methods: {
                postPublishedStatus: function() {
                    this.$http.post('/admin/posts/' + this.postid + '/publish', {publish: this.status}, function(res) {
                        this.$set('status', res.published);
                        console.log(res);
                    });
                }
            }
        });
        new Vue({
           el: 'body'
        });
    </script>
@endsection