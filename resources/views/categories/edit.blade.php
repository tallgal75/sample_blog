@extends('layouts.main')

@section('title')
   @parent
@endsection

@section('header')
    @parent
@endsection

@section('sidebar')
  @parent
@endsection

@section('content')
  <div class="col-md-12">
    <h1>Edit a category</h1>
    <form action="/categories/{{ $categories->id }}" method="post" class="form-horizontal">
      <input type="hidden" name="_METHOD" value="PUT">
      {{ csrf_field() }}
      <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <span class="input-group-addon">Category</span>
        <input type="text" class="form-control" name="category" value="{{ $categories->name }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    	</div>
      <br>
    	<button type="submit" class="btn btn-primary">Edit</button>
      <a href="/categories" class="btn btn-success">Back</a>
    </form>

    <script src="/js/summernote.js"></script>
     <!-- REQUIRED SCRIPT FOR TEXT EDITOR -->
    <script>
        $(document).ready(function () {
            $('#pContent').summernote({
                height: 250,// set height for editor
            });
        });
    </script>
  </div>
@endsection

@section('footer')
  @parent
@endsection
