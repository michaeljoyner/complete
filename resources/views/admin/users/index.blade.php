@extends('admin.base')

@section('content')
    <div class="cl-page-header">
        <div class="container">
            <h2 class="page-title"><i class="material-icons">group</i> Users</h2>
            <a class="cl-page-action cl-primary-action btn-floating btn-large waves-effect modal-trigger waves-light" href="#registermodal">
                <i class="material-icons">add</i>
            </a>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="row">
            @foreach($users as $user)
                <div class="col s12 m6">
                    <div class="card blue lighten-1">
                        <div class="card-content white-text">
                            <span class="card-title">{{ $user->name }}</span>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="card-action">
                            <a href="/admin/users/{{ $user->id }}/edit">Edit</a>
                            <a class="delete-modal-trigger"
                               data-item-name="{{ $user->name }}"
                               data-delete-url="/admin/users/{{ $user->id }}"
                               href="#delete-modal">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <!-- Modal Structure -->
    <div id="registermodal" class="modal">
        <div class="modal-content">
            <h4>Register a new User</h4>
            {!! Form::open(['url' => '/admin/users']) !!}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="name" value="{{ old('name') }}">
                    <label for="name">Name</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email" value="{{ old('email') }}">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="password">
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="password_confirmation">
                    <label for="password_confirmation">Confirm Password</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit">
                Register User
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