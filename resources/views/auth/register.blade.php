@extends('layouts.app')

@section('title', 'Nairatwt Signup Page')
@section('content')
<section id="content">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form role="form" class="{{ route('register') }}" method="post">
					@csrf
					<h2>Sign Up</h2>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="first_name" id="first_name" class="form-control input-lg @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="First Name" tabindex="1">
								@error('first_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="last_name" id="last_name" class="form-control input-lg @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Last Name" tabindex="2">
								@error('last_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="form-group">
						<input type="text" name="user_name" id="user_name" class="form-control input-lg @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" placeholder="User Name" tabindex="3">
						@error('user_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-8">
							<div class="form-group">
								<input type="text" name="twitter_handle" id="twitter_handle" class="form-control input-lg @error('twititer_handle') is-invalid @enderror" value="{{ old('twitter_handle') }}" placeholder="Twitter Handle" tabindex="4">
								@error('twitter_handle')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="form-group">
								<select class="form-control input-lg @error('gender') is-invalid @enderror" name="gender" id="gender" tabindex="5">
									<option>-- Gender --</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								@error('gender')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email Address" tabindex="6">
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="mobile_number" id="mobile_number" class="form-control input-lg @error('mobile_number') is-invalid @enderror" value="{{ old('mobile_number') }}" placeholder="Mobile Number" tabindex="7">
								@error('mobile_number')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>

					<hr>

					<div class="col-12">
						<h4>Bank Details</h4>
					</div>
					<div class="form-group">
						<input type="text" name="account_name" id="account_name" class="form-control input-lg @error('account_name') is-invalid @enderror" value="{{ old('account_name') }}" placeholder="Account Name" tabindex="8">
						@error('account_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="account_number" id="account_number" class="form-control input-lg @error('account_number') is-invalid @enderror" placeholder="Account Number"  tabindex="9">
								@error('account_number')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<select name="bank_name" id="bank_name" class="form-control input-lg @error('bank_name') is-invalid @enderror" value="{{ old('bank_name') }}" placeholder="Bank Name" tabindex="10">
									<option value="">-- Select Bank --</option>
									@foreach(getBanks() as $bank)
									<option value="{{ $bank->bank_name }}">{{ $bank->bank_name }}</option>
									@endforeach
								</select>
								@error('bank_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg @error('password') is-invalid @enderror" placeholder="Password" tabindex="11">
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" tabindex="12">
								@error('password_confirmation')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-3 col-md-3">
							<span class="button-checkbox">
								<button type="button" class="btn" data-color="info" tabindex="13">I Agree</button>
								<input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="13">
							</span>
						</div>
						<div class="col-xs-8 col-sm-9 col-md-9">
							By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="{{ route('terms') }}" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
						</div>
					</div>

					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-theme btn-block btn-lg" tabindex="14"></div>
						<div class="col-xs-12 col-md-6">Already have an account? <a href="{{ route('login') }}">Sign In</a></div>
					</div>
				</form>
			</div>
		</div>
		
	</div>
</section>
@endsection
