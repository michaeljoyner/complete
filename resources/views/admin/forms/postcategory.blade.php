{!! Form::model($model, ['url' => $formAction, 'class' => '']) !!}
<div class="input-field col s12">
    {!! Form::text('name', null, ['class' => '']) !!}
    <label for="name">Category Name</label>
</div>
<div class="input-field col s12">
    {!! Form::textarea('description', null, ['class' => 'materialize-textarea']) !!}
    <label for="description">Description</label>
</div>
<button class="btn waves-effect waves-light" type="submit">
    {{ $buttonText }}
</button>
{!! Form::close() !!}