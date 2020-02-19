@extends('layouts.app')

@section('title', 'Edit Nairatwt Account')
@section('content')
<section id="content" class="callaction">
	<div class="container">
		<div class="row">
			@include('partials.messages')
			<div class="col-sm-offset-2 col-sm-8">
				<form action="{{ route('user.update') }}" method="post">
					@method('patch')
					@csrf
					<h4>Personal Information</h4>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" id="user_name" class="form-control input-md" value="{{ $user->user_name }}" placeholder="User Name" disabled>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" id="gender" class="form-control input-md" value="Gender: {{ $user->gender }}" placeholder="Gender: Unidentified!" disabled>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="first_name" id="first_name" class="form-control input-md" value="{{ $user->first_name }}" placeholder="First Name" tabindex="1">
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="last_name" id="last_name" class="form-control input-md" value="{{ $user->last_name }}" placeholder="Last Name" tabindex="2">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="form-group">
								<input type="text" name="twitter_handle" id="twitter_handle" class="form-control input-md" value="{{ $user->twitter_handle }}" placeholder="Twitter Handle" tabindex="3">
							</div>
						</div>

						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-md" value="{{ $user->email }}" placeholder="Email" tabindex="4">
							</div>
						</div>

						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="form-group">
								<input type="text" name="mobile_number" id="mobile_number" class="form-control input-md" value="{{ $user->mobile_number }}" placeholder="Mobile Number" tabindex="5">
							</div>
						</div>
					</div>

					<h4>Banking Details</h4>
					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-7">
							<div class="form-group">
								<input type="text" name="account_name" id="account_name" class="form-control input-md" value="{{ $user->wallet->account_name }}" placeholder="Account Name" tabindex="6">
							</div>
						</div>

						<div class="col-xs-12 col-sm-5 col-md-5">
							<div class="form-group">
								<select name="bank_name" id="bank_name" class="form-control input-md" tabindex="7">
									@foreach(getBanks() as $bank)
									<option value="{{ $bank->bank_name }}" {{ $bank->bank_name === $user->wallet->bank_name ? 'selected=true' : '' }}>{{ $bank->bank_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<input type="text" name="account_number" id="account_number" class="form-control input-md" value="{{ $user->wallet->account_number }}" placeholder="Account Number" tabindex="8">
					</div>
					
					<h4>Security Details</h4>
					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-7">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-md" placeholder="Current Password" tabindex="9">
							</div>
						</div>

						<div class="col-xs-12 col-sm-5 col-md-5">
							<div class="form-group">
								<input type="password" name="new_pass" id="new_pass" class="form-control input-md" placeholder="New Password" tabindex="10">
							</div>
						</div>
					</div>

					<div class="form-group">
						<input type="password" name="new_pass_confirmation" id="new_pass_confirmation" class="form-control input-md" placeholder="Confirm Password" tabindex="11">
					</div>

					<button type="submit" class="btn btn-theme">Save Changes</button>
				</form>	
			</div>
		</div>
	</div>
</section>
@endsection