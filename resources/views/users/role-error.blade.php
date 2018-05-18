@extends('layouts.dashboard')

@section('css')

<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">

@endsection


@section('title')

<h3 class="text-primary">User</h3>

@endsection



@section('content')

<div class="col-12">
	
	<div class="card">
		<div class="card-body"> 
			
			<h2>Your User's Role is Missing and You have to Update Role for your Users</h2>
			<a href="{{route("user.edit", $user->slug)}}" class="btn btn-primary">Edit</a>
		</div>
	</div>
</div>
@endsection


