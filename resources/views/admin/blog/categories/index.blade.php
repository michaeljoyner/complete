@extends('admin.base')

@section('content')
    <div class="cl-page-header yellow">
        <div class="container">
            <h2 class="page-title">Blog Categories</h2>
            <a class=" cl-page-action btn-floating btn-large waves-effect modal-trigger waves-light blue" href="#category-modal">
                <i class="material-icons">add</i>
            </a>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col s12 m6">
                    <div class="card pink lighten-1">
                        <div class="card-content white-text">
                            <span class="card-title">{{ $category->name }}</span>
                            <p>{{ $category->description }}</p>
                        </div>
                        <div class="card-action">
                            <a href="/admin/blog/categories/{{ $category->id }}/edit">Edit</a>
                            <a class="delete-modal-trigger"
                               data-item-name="{{ $category->name }}"
                               data-delete-url="/admin/blog/categories/{{ $category->id }}"
                               href="#delete-modal">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <!-- Modal Structure -->
    <div id="category-modal" class="modal">
        <div class="modal-content">
            <h4>Create a new Category</h4>
            {!! Form::open(['url' => '/admin/blog/categories']) !!}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="name" value="{{ old('name') }}">
                    <label for="name">Name</label>
                </div>
                <div class="input-field col s12">
                    <textarea name="description" class="materialize-textarea">{{ old('description') }}</textarea>
                    <label for="email">Description</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit">
                Create Category
            </button>
            {{--<button class="btn grey waves-effect waves-light closes-modal">--}}
            {{--Cancel--}}
            {{--</button>--}}
            {!! Form::close() !!}
        </div>
    </div>
    {{--Delete Modal--}}
            <!-- Modal Structure -->
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
@endsection

@section('bodyscripts')
    <script>
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();

            $('.delete-modal-trigger').on('click', function(ev) {
                ev.preventDefault();
                document.querySelector('#delete-form').setAttribute('action', ev.target.getAttribute('data-delete-url'));
                document.querySelector('#delete-item-name').textContent = ev.target.getAttribute('data-item-name');

                $('#delete-modal').openModal();
            });
        });
    </script>
@endsection