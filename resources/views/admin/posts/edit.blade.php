@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@endsection

@section('content')
    <div class="cl-page-header">
        <div class="container">
            <h2 class="page-title white-text">Edit Post</h2>
            <hr>
        </div>
    </div>
    <div class="container post-form-container">
        {!! Form::model($post, ['url' => '/admin/posts/'.$post->id, 'class' => 'cl-form posts-form', 'id' => 'blog-editor-form']) !!}
        <div class="row">
            <div class="input-field col s12">
                {!! Form::text('title', null, ['class' => 'post-text-input title-input']) !!}
            </div>
            <div class="input-field col s12">
                {!! Form::textarea('description', null, ['class' => 'materialize-textarea post-textarea-input description-input']) !!}
                <label for="description">Description</label>
            </div>
        </div>
        <div id="tag-app">
            <tag-manager postid="{{ $post->id }}"></tag-manager>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {!! Form::textarea('body', null, ['class' => 'materialize-textarea post-textarea-input body-input', 'id' => 'post-body']) !!}
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" id="blog-editor-form-submit">
            Save Changes
        </button>
        {!! Form::close() !!}
    </div>
    <div class="hidden-image-upload">
        <input type="file" id="post-file-input">
    </div>
    <template id="tag-manager-template">
        <div class="tag-manager-box">
            <h5>Tags:</h5>
            <ul class="tag-list">
                <li v-for="tag in tags">
                    <span class="post-tag">@{{ tag }}</span>
                    <i class="material-icons" v-on:click="removeTag(tag)">close</i>
                </li>
            </ul>
            <input type="text"
                   placeholder="Type a tag and press enter"
                   v-model="new_tag"
                   v-on:keypress.enter="addTag">
        </div>
    </template>
@endsection

@section('bodyscripts')
    <script src="{{ asset('build/js/tinymce/tinymce.min.js') }}"></script>
    @include('admin.partials.tinymce.blogpost')
    <script>
        Vue.component('tag-manager', {

            props: ['postid'],

            template: '#tag-manager-template',

            data: function() {
                return {
                    tags: [],
                    new_tag: ''
                }
            },

            ready: function() {
                this.fetchTags();
            },

            methods: {
                fetchTags: function() {
                    this.$http.get('/admin/api/posts/' + this.postid + '/tags', function(res) {
                        this.$set('tags', res.tags);
                    });
                },

                addTag: function(ev) {
                    ev.preventDefault();
                    this.tags.push(this.new_tag);
                    this.new_tag = '';
                    this.syncTags();
                },

                syncTags: function() {
                    this.$http.post('/admin/api/posts/' + this.postid + '/tags', {tags: this.tags}, function(res) {
                        this.$set('tags', res.tags);
                    });
                },

                removeTag: function(tag) {
                    this.tags.$remove(tag);
                    this.syncTags();
                }
            }
        });
        new Vue({
            el: '#tag-app'
        });
    </script>
@endsection