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
        {!! Form::model($post, ['url' => '/admin/posts/'.$post->id, 'class' => 'cl-form posts-form']) !!}
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
        <button class="btn waves-effect waves-light" type="submit">
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
    <script>
        tinymce.init({
            selector: '#post-body',
            plugins: ['link', 'image', 'paste', 'fullscreen'],
            menubar: false,
            toolbar: 'undo redo | styleselect | bold italic | bullist numlist | link mybutton | fullscreen',
            paste_data_images: true,
//            images_upload_url: '/api/posts/images',
            height: 700,
            body_class: 'article-body-content',
            content_css: '/css/editor.css',
            setup : function(ed) {
                // Add a custom button
                ed.addButton('mybutton', {
                    text : '',
                    icon: true,
                    image : '/editor/insert_photo_black.png',
                    onclick : function() {
                        // Add you own code to execute something on click
                        document.querySelector('#post-file-input').click();
                    }
                });
            },
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '/admin/api/blog/images');
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                formData.append('_token', document.getElementById('x-token').getAttribute('content'));


                xhr.send(formData);
            }
//        });
        });
    </script>
    <script>
        var uploadHandler = {
            elems: {
                file: document.querySelector('#post-file-input')
            },

            init: function() {
                uploadHandler.elems.file.addEventListener('change', uploadHandler.processFile, false);
            },

            processFile: function(ev) {
                console.log(ev);
                var fileReader = new FileReader();
                fileReader.onload = function(ev) {
                    tinymce.activeEditor.insertContent("<img src="+ ev.target.result +">");
                }
                fileReader.readAsDataURL(ev.target.files[0]);
//                this.uploadFile(file);
            }
        }
        uploadHandler.init();
    </script>
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