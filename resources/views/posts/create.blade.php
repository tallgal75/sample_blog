
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
    <h1>Create a post</h1>
    <form action="/posts/store" method="post" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="pContent">Category</label>
        <select name="category">
          @foreach ($categories AS $category)
            <option value="{{ $category->category_id}}">{{ $category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="input-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <span class="input-group-addon">Title</span>&nbsp;
        <input id="pTitle" type="text" class="form-control" name="title" placeholder="Title">
        <br>
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    	</div>
      <br>
    	<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    		<label for="pContent">Content</label> <br>
    		<textarea id="pContent" name="content" class="form-control"></textarea>
        <br>
        @if ($errors->has('content'))
            <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
    	</div>
    	<button type="submit" class="btn btn-primary">Create</button>
      <a href="/posts" class="btn btn-success">Back</a>
    </form>
  </div>
@endsection

@section('footer')
  @parent
@endsection
