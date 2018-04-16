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
    <h1>Simple Ticketing</h1>
    <p>
      <a href="/tickets/start" class="btn btn-success">Start</a>
      <a href="/tickets/stop" class="btn btn-success">Stop</a>
      <a href="/tickets/clear" class="btn btn-success" >Delete All Tickets</a>
    </p><br><br>
    <div id="ticketCount"></div><br><br>
    <table id="data-table" class="col-md-9">
      <thead>
        <tr>
          <th width="80%">Ticket Id</th>
          <th width="20%">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tickets AS $ticket)
        <tr>
          <td>>{{ $tickets->ticket_reference }}</a></td>
          <td class="pull-right">
            <a href="/tickets/{{ $ticket->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove-circle"></span></a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <br>
  </div>
  <script>
  setInterval(function(){

    },5000);  // run every 5 seconds
  </script>
@endsection
