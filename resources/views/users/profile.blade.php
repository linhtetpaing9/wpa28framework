@extends('layouts.dashboard')

@section('title')
<h3>User Profile</h3>
@endsection


@section('content')
<div class="col-12">
	<div class="card">
		<div class="card-body"> 
			<div class="card-two">
				<header>
					<div class="avatar">
						<img src="{{$user->profile_image}}" alt="{{$user->name}}" />
					</div>
				</header>

				<h3>{{$user->name}}</h3>
				@foreach($roles as $role)
				<h3>{{$role->name}}</h3>
				@endforeach
				@foreach($roles_status as $role_status)
				<h3>The User {{$role_status}}</h3>
				@endforeach
			</div>
		</div>
	</div>
</div>


	@endsection