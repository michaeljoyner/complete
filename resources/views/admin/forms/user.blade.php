{!! Form::model($model, ['url' => $formAction, 'class' => '']) !!}
<div class="input-field col s12">
    {!! Form::text('name', null, ['id' => 'name', 'class' => 'validate', 'required']) !!}
    <label for="name">Name</label>
</div>
<div class="input-field col s12">
    {!! Form::email('email', null, ['id' => 'email', 'class' => 'validate', 'required']) !!}
    <label for="email">Email</label>
</div>
<button class="btn waves-effect waves-light" type="submit">
    {{ $buttonText }}
</button>
{!! Form::close() !!}