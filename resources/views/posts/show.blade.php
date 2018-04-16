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
    <h1>{{$post->title}}</h1>
    <h3>{{ $post->category->name }}</h3>
    <div class="row">
    	<div class="col-md-6 pull-left">
    		{{$post->content}}
    	</div>
    	<div class="col-md-6">
    		<ul class="dropdown-menu">
    			<li><a href="/categories">Categories</a></li>
    			<li><a href="/posts/edit/{{$post->id}}">Edit Post</a></li>
    			<li><a href="/posts/delete/{{$post->id}}">Delete Post</a></li>
    		</ul>
    		<div class="row">
          <h3>Related Posts</h2>
    			<div class="col-md-12">
    				<ul class="list-group">
              @foreach ($related_posts AS $rpost)
    					<a href="/posts/{{ $rpost->id }}" style="cursor: pointer;" class="list-group-item">
    					   {{ $rpost->title }}
    					</a>
            @endforeach
    				</ul>
    			</div>
    		</div>
    	</div>
    </div>
    <br />
    <p class="pull-right"><a href="/posts" class="btn btn-success">Back to Posts</a></p>
  </div>
@endsection

@section('footer')
  @parent
@endsection
