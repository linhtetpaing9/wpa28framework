@extends('layouts.dashboard')


@section('css')

<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/select2-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/pretty-checkbox.min.css')}}">

@endsection

@section('title')

<h3 class="text-primary">User Create Form</h3>

@endsection



@section('content')
<div class="col-12">
	<div class="card">
		<div class="card-body"> 
			<div class="col-lg-10 mx-auto">

				<form action="{{route('user.store')}}" method="POST" class="form-horizontal form-bordered">
					{{csrf_field()}}
					<div class="form-body">
						<div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
							<div class="col-md-3">
								<label class="control-label text-right">Name</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

								@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>

						

						<div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
							<div class="col-md-3">
								<label class="control-label text-right">Email</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="email" value="{{ old('email') }}" required>

								@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>





						

						<div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
							<div class="col-md-3">
								<label class="control-label text-right">Password</label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" name="password" required>

								@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>


						<div class="form-group row">
							<div class="col-md-3">
								<label class="control-label text-right">Confirm Password</label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-3">
								<i class="fas fa-user-secret" style="font-size: 2.5em"></i>
							</div>
							<div class="col-md-3">
								<div class="pretty p-default" style="margin-top: 14px">
									<input type="checkbox" name="is_admin" value='true'/>
									<div class="state p-primary">
										<label>SuperAdmin</label>
									</div>
								</div>
								
							</div>
							
						</div>


						<div class="form-group row">
							<div class="col-md-3">
								<label class="control-label text-right">Role</label>
							</div>
							
							<div class="col-md-6" style="padding-top: 10px">
								<select class="form-control myclass" name="role_id" single="single" >
									@foreach($role as $key=>$value)
									<option value="{{ $key }}">{{ $value }}</option>
									@endforeach
								</select>
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

@section('script')

<script src="{{asset('js/select2.min.js')}}"></script>
<script>
	$("document").ready(function(){
		$(".myclass").select2();
	});
</script>

@endsection