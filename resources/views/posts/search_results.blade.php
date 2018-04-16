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
    <h1>Search Results</h1>
    <p>Your search for {{ $searchText }} returned the following results...</p>
    <hr>
    <h1>Latest Posts</h1>
    @foreach ($search_results AS $post)
      <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a> ({{ $post->name}})</h3>
      <?php
      if(str_word_count($post->content) > 250) {
        $part_content = substr($post->content,250).'...';
      }
      else {
        $part_content = $post->content;
      }

      echo '<p>'.$part_content.'</p>';
      ?>
      <br />
    @endforeach
  </div>
@endsection

@section('footer')
  @parent
@endsection
