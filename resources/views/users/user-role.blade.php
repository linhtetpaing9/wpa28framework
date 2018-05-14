@extends('layouts.dashboard')



@section('title')

<h3 class="text-primary">Users' Role</h3>

@endsection



@section('content')

<div class="col-12">
	
	<div class="card">
		<div class="card-body"> 
			<div class="form-group">
				<a href="{{route('user.create')}}" class="btn btn-success">Add</a>
			</div>
			<table class="table table-bordered" id="users-table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Slug</th>
						<th>IS_ADMIN</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
			</table>  
		</div>
	</div>
</div>
@endsection

