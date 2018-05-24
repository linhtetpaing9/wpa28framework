@extends('layouts.dashboard')

@section('css')

<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">

@endsection


@section('title')

<h3 class="text-primary">Students</h3>

@endsection



@section('content')

<div class="col-12">
	
	<div class="card">
		<div class="card-body"> 
			<div class="form-group">
				<a href="{{route('student.create')}}" class="btn btn-success">Add</a>
			</div>

			<table class="table table-bordered" id="students-table">
				<thead>
					<tr>
						<th>Student_Code</th>
						<th>Name</th>
						<th>Recommendation Letter</th>
			
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
		$('#students-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('student.data') !!}',
			columns: [

			{ data: 'student_code', name: 'student_code' },
			{ data: 'show', name: 'show' },
			{ data: 'recom_letter', name: 'recom_letter' },
			{ data: 'edit', name: 'edit' },
			{ data: 'delete', name: 'delete'}
			
			]
		});
	});
</script>
@endsection