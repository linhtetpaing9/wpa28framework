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
			<div class="form-group">
				<a href="{{route('user.create')}}" class="btn btn-success">Add</a>
			</div>
			<table class="table table-bordered" id="users-table">
				<thead >
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


@section('script')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script>
	$(function() {
		$('#users-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('user.data') !!}',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'show', name: 'show' },
			{ data: 'email', name: 'email' },
			{ data: 'slug', name: 'slug' },
			{ data: 'is_admin', name: 'is_admin' },
			{ data: 'edit', name: 'edit' },
			{ data: 'delete', name: 'delete'}
			
			]
		});
	});
</script>
@endsection