@extends('layouts.dashboard')

@section('css')

<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">

@endsection


@section('title')

<h3 class="text-primary">Role</h3>

@endsection



@section('content')

<div class="col-12">
	
	<div class="card">
		<div class="card-body"> 
			<div class="form-group">
				<a href="{{route('role.create')}}" class="btn btn-success">Add</a>
			</div>
			@can('show-task', $role)
			<table class="table table-bordered" id="roles-table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Slug</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
			</table>  
			@endcan
		</div>
	</div>
</div>
@endsection


@section('script')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script>
	$(function() {
		$('#roles-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('role.data') !!}',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'slug', name: 'slug' },
			{ data: 'edit', name: 'edit' },
			{ data: 'delete', name: 'delete'}
			
			]
		});
	});
</script>
@endsection