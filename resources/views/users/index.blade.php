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
    <h1>Users</h1>
    <p>{{ $page->introducgtory_text }}</p>
    <span class="pull-right"><a href="users/create">Add new user</a></span><br>
    <table id="data-table" class="col-md-9">
      <thead>
        <tr>
          <th width="40%">Name</th>
          <th width="40%">Email</th>
          <th width="20%">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users AS $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td class="pull-right">
            <a href="/users/{{ $user->id }}/edit" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
            <a href="/users/{{ $user->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove-circle"></span></a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <hr>
  </div>
@endsection

@section('footer')
  @parent
@endsection
