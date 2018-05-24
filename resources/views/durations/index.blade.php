@extends('layouts.dashboard')




@section('title')

<h3 class="text-primary">duration</h3>

@endsection



@section('content')

<div class="col-12">
	
	<div class="card">
		<div class="card-body"> 
			<div class="form-group">
				<a href="{{route('duration.create')}}" class="btn btn-success">Add</a>
			</div>
			@foreach($durations as $duration)

			<div class="card">
				<div class="card-header" style="text-align: center">
					Duration: {{$duration->name}}
					<a href="#" class="btn btn-primary" style="float: right">Edit</a>
					<a href="#" class="btn btn-danger" style="float: right">Delete</a>
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<p>Starting Date: {{$duration->starting_date}}</p>
						<p>End Date: {{$duration->end_date}}</p>
						<p>Starting Time: {{$duration->starting_time}}</p>
						<p>End Time: {{$duration->end_time}}</p>
						<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				</div>
			</div>
			@endforeach

			

		</div>
	</div>
</div>
@endsection

