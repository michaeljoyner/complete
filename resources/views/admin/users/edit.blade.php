@extends('admin.base')

@section('content')
    <div class="cl-page-header teal lighten-2">
        <div class="container">
            <h2 class="page-title white-text">Edit User</h2>
            <hr>
        </div>
    </div>
    <div class="container">
        @include('admin.forms.user', [
            'model' => $user,
            'formAction' => '/admin/users/'.$user->id,
            'buttonText' => 'Save Changes'
        ])
    </div>
@endsection