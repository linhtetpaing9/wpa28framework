@extends('layouts.dashboard')




@section('title')

<h3 class="text-primary">Course</h3>

@endsection



@section('content')

<div class="col-12">
	
	<div class="card">
		<div class="card-body"> 
			<div class="form-group">
				<a href="{{route('course.create')}}" class="btn btn-success">Add</a>
			</div>
			@foreach($courses as $course)

			<div class="card">
				<div class="card-header" style="text-align: center">
					Course: {{$course->name}}
					<a href="#" class="btn btn-primary" style="float: right">Edit</a>
					<a href="#" class="btn btn-danger" style="float: right">Delete</a>
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<p>{{$course->slug}}</p>
						<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				</div>
			</div>
			@endforeach

			

		</div>
	</div>
</div>
@endsection

