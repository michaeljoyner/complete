@extends('admin.base')

@section('content')
    <div class="row">
    {!! Form::open(['url' => '/admin/login', 'class' => 'col m4 offset-m4']) !!}
        <h1>Login</h1>
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="email" value="{{ old('name') }}">
                <label for="name">Email</label>
            </div>
            <div class="input-field col s12">
                <input type="password" name="password">
                <label for="email">Password</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit">
                Login
            </button>
        </div>
    {!! Form::close() !!}
    </div>
@endsection