@extends('layouts.app')

@section('title', 'Admin | Roles')
@section('content')
<section id="content">
	<div class="container">
		<div class="row" >
			<h2 class="text-center text-primary">Administrate Roles</h2>
			<div class="col-lg-10 col-lg-offset-1">
				@include('partials.messages')
				<form action="{{ route('role') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6 form-group">
							<label>Username:</label>
							<input type="text" name="user_name" id="user_name" class="form-control input-md" placeholder="Username" />
						</div>
						<div class="col-md-3 form-group">
							<label>Select Role:</label>
							<select name="role_id" id="role_id" class="form-control input-md">
								@foreach($roles as $role)
								<option value="{{ $role->id }}">{{ $role->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-3 form-group">
							<button type="submit" name="action" value="add" class="btn btn-theme btn-block">Add Role</button>
							<button type="submit" name="action" value="remove" class="btn btn-danger btn-block">Remove Role</button>
						</div>
					</div>

					
				</form>
				<hr>
				<form action="{{ route('toggle') }}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-4 col-md-offset-2 form-group">
							<label>Withdrawal : </label>
							<span class="button-checkbox">
                                <button type="button" class="btn" data-color="info" tabindex="7" disabled>{{ canWithdraw() ? 'On' : 'Off'}}</button>
                                <input type="checkbox"  class="hidden" {{ canWithdraw() ? 'checked' : '' }} disabled>
                            </span>
						</div>
						<div class="col-md-4 form-group">
							<button type="submit" class="btn btn-{{ canWithdraw() ? 'danger' : 'success'}} btn-block">Toggle Withdrawal {{ canWithdraw() ? 'Off' : 'On'}}</button>
						</div>
					</div>
				</form>
				<hr>
				<div class="table-responsive">
					<h4 class="text-center text-primary">Roles and Users</h4>
					<table class="table table-bordered">
						<tbody>
							@foreach($roles as $role)
							<tr>
								<th class="text-capitalize">{{ $role->name }}</th>
								<td>
									@foreach($role->users as $user)
									{{ $user->user_name }} |
									@endforeach
								</td>
							</tr>	
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection