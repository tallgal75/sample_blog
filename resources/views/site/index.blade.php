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
    <h1>Edit Introductory Text</h1>
    <p>This is a mini CMS for he application.</p>
    <hr>
    @foreach ($pages AS $page)
      <form action="/site/{{ $page->id}}/edit" method="post" class="form-horizontal">
        {{ csrf_field() }}

      	<div class="form-group{{ $errors->has('introductory_text') ? ' has-error' : '' }}">
      		<label for="pContent">{{ $page->name }}</label> <br>
      		<textarea name="introductory_text" class="form-control myTextArea">{{ $page->introductory_text }}</textarea>
          <br>
          @if ($errors->has('introductory_text'))
              <span class="help-block">
                  <strong>{{ $errors->first('introductory_text') }}</strong>
              </span>
          @endif
      	</div>
      	<button type="submit" class="btn btn-primary">Update</button>
      </form>

    @endforeach
  </div>
@endsection

@section('footer')
  @parent
@endsection
