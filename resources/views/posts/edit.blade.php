
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
    <h1>Edit a post</h1>
    <form action="/posts/{{ $post->id }}/update" class="form-horizontal" method="post">
      <input type="hidden" name="_METHOD" value="PUT">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="pCat">Category</label><br>
        <select name="category" id="pCat">
          @foreach ($categories AS $category)
            @if ($category->category_id == $post->category_id)
              <option value="{{ $category->category_id}}" selected>{{ $category->name}}</option>
            @else
              <option value="{{ $category->category_id}}">{{ $category->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      <label for="pTitle">Title</label><br>
        <input id="pTitle" type="text" class="form-control" name="title" value="{{ $post->title }}">
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
    		<textarea id="pContent" name="content" class="form-control">{{ $post->content }}</textarea>
        <br>
        @if ($errors->has('content'))
            <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
    	</div>
    	<button type="submit" class="btn btn-primary">Edit</button>
      <a href="/posts" class="btn btn-success">Back</a>
    </form>
  </div>
@endsection
