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
    <h1>Categories</h1>
  <p>{{ $page->introductory_text }}</p>
    <span class="pull-right"><a href="categories/create">Add new category</a></span><br>
    <table id="data-table" class="col-md-9">
      <thead>
        <tr>
          <th width="80%">Name</th>
          <th width="20%">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories AS $cat)
        <tr>
          <td>{{ $cat->name }}</td>
          <td class="pull-right">
            <a href="/categories/{{ $cat->id }}/edit" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
            <a href="/categories/{{ $cat->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove-circle"></span></a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('footer')
  @parent
@endsection
