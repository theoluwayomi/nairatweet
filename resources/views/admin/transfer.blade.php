@extends('layouts.app')

@section('title', 'Admin | Transfer Users')
@section('content')
<section id="content">
	<div class="container">
		<div class="row" >
			<h2 class="text-center text-primary">Transfer</h2>
			<div class="col-lg-10 col-lg-offset-1">
				@include('partials.messages')
				<form action="{{ route('transfer') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6 form-group">
							<label>Username:</label>
							<input type="text" name="user_name" id="user_name" class="form-control input-md" placeholder="Username" />
						</div>
						<div class="col-md-6 form-group">
						<label>Amount:</label>
							<input type="text" name="amount" id="amount" class="form-control input-md" placeholder=":1000" />
						</div>
					</div>

					<button type="submit" class="btn btn-theme btn-block">Transfer Now</button>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection