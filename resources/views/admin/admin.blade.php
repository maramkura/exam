@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="panel panel-default">
	  <div class="panel-heading"><h2>Welcome to Admin Dashboard</h2></div>
	  <ul class="list-group">
	    <li class="list-group-item"><a href="{{ route('categories.index')}}">Manage Categories</a></li>
	    <li class="list-group-item"><a href="{{ route('adverts.index')}}">Manage Advertisments</a></li>
	  </ul>
	</div>
</div>

@endsection
