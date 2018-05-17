@extends('layouts.dashboard')


@section('title')

<h3 class="text-primary">Role Create Form</h3>

@endsection



@section('content')
<div class="col-12">
	<div class="card">
		<div class="card-body"> 
			<div class="col-lg-10 mx-auto">

				<form action="{{route('role.store')}}" method="POST" class="form-horizontal form-bordered">
					{{csrf_field()}}
					<div class="form-body">
						<div class="form-group row">
							<label class="control-label text-right">Name</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="name">
							</div>
						</div>

						<div class="form-group row">
							
							<div class="col-md-4">
								<input type="checkbox" name="show" value='true'>Show

					
							</div>
							<div class="col-md-4">
								<input type="checkbox" name="update" value='true'>Update
							</div>
							<div class="col-md-4">
								<input type="checkbox" name="delete" value='true'>Delete
							</div>

						</div>

						
						
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="offset-sm-3 col-md-9">
										<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
										<button type="button" class="btn btn-inverse">Cancel</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>

			</div>

		</div>
	</div>
</div>

@endsection