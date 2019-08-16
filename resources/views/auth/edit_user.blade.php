@extends('layouts.main')

	@section('title','Edit Profile')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" action="/user/{{ $user->id }}" method="post">
				<div class="card">
				  <div class="card-header">
					   Edit Profile
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Name</div>
				  			    </div>
					  			<input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Email</div>
				  			    </div>
					  			<input type="text" name="email" class="form-control" value="{{ $user->email }}">
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">New Password</div>
				  			    </div>
					  			<input type="password" name="new_password" class="form-control">
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Confirm New Password</div>
				  			    </div>
					  			<input type="password" name="confirm_new_password" class="form-control">
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Old Password</div>
				  			    </div>
					  			<input type="password" name="old_password" class="form-control">
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Created On</div>
				  			    </div>
					  			<input type="date" name="created_at" class="form-control form-control-sm" id="created_at" value="{{ $user->putdate() }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Updated On</div>
				  			    </div>
					  			<input type="date" name="updated_at" class="form-control form-control-sm date"  readonly>
					  			<input type="hidden" name="_method" value="PUT">
					  			@csrf
				  			</div>
				  		</div>
				  	</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-back"></i> Back</button>
				    <button class="btn btn-success" type="submit"><i class="fa fa-arrow-up"></i> Update</button>
				    <button class="btn btn-warning" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>
		today_form_date()
		$('#form').submit(function(e){
			e.preventDefault()
			axios.post("/user/{{ $user->id }}", $(this).serialize())
			.then(d => {
				$('#msg').html(d.data);
			})
			.catch((err) => console.log(err) );
		})
	</script>
	@endsection

