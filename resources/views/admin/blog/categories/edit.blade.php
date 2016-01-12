@extends('admin.base')

@section('content')
    <div class="cl-page-header">
        <div class="container">
            <h2 class="page-title">Edit this Category</h2>
        </div>
        <hr>
    </div>
    <div class="container">
        @include('admin.forms.postcategory', [
            'model' => $category,
            'formAction' => '/admin/blog/categories/'.$category->id,
            'buttonText' => 'Save Changes'
        ])
    </div>
@endsection