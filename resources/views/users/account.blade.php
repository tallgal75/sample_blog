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
    @If ($user->id == $loggedin_user)
      <h1>My Account</h1>
    @else
      <h1>User Account</h1>
    @endif
  <form class="form-horizontal" method="POST" action="/users{{ $user->id }}/update">
      {{ csrf_field() }}

      <div class="form-group">
          <label for="name" class="col-md-4 control-label">Name</label>

          <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

          </div>
      </div>

      <div class="form-group">
          <label for="email" class="col-md-4 control-label">E-Mail Address</label>

          <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>


          </div>
      </div>

      <div class="form-group">
          <label for="password" class="col-md-4 control-label">Password</label>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" required>

          </div>
      </div>

      <div class="form-group">
          <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

          <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>
      </div>

      <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
              @If ($user->id == $loggedin_user)
              <button type="submit" class="btn btn-primary">
                  Update
              </button>
              @endif
              <a href="/users" class="btn btn-success">Back</a>
          </div>
      </div>
  </form>
</div>
@endsection
