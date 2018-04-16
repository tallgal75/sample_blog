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
    <h1>Posts</h1>
    <p>{{ $page->introductory_text }}</p>
    <span class="pull-right"><a href="posts/create">Add new post</a></span><br>
    <!--- Depending on $success -->
    <!--
      <div class="alert alert-success">
        <strong>Success!</strong>
      </div>

      <div class="alert alert-warning">
        <strong>Warning!</strong> Error with creating or updating post.
      </div>
    -->
    <table id="data-table" class="col-md-9">
      <thead>
        <tr>
          <th width="40%">Title</th>
          <th width="40%">Category</th>
          <th width="20%">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts AS $post)
        <tr>
          <td><a href="posts/{{$post->id}}">{{ $post->title }}</a></td>
          <td>{{ $post->name }}</td>
          <td class="pull-right">
            <a href="/posts/{{ $post->id }}/edit" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
            <a href="/posts/{{ $post->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove-circle"></span></a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <br>
  </div>
@endsection

@section('footer')
  @parent
@endsection
