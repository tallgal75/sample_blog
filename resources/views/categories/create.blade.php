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
    <h1>Create new category</h1>
    <form action="/categories/save" method="post">
      {{ csrf_field() }}
      <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <span class="input-group-addon">Category</span>
        <input type="text" class="form-control" name="category" required>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    	</div>
      <br>
    	<button type="submit" class="btn btn-primary">Create</button>
      <a href="/categories" class="btn btn-success">Back</a>
    </form>
  </div>
@endsection

@section('footer')
  @parent
@endsection
