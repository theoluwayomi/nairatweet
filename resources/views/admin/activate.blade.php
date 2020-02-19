@extends('layouts.app')

@section('title', 'Admin | Activate Users')
@section('content')
<section id="content">
	<div class="container">
		<div class="row" >
			<h2 class="text-center text-primary">Activate Users</h2>
			<div class="col-lg-10 col-lg-offset-1">
				@include('partials.messages')
				<form action="{{ route('activate') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6 form-group">
							<label>Username:</label>
							<input type="text" name="user_name" id="user_name" class="form-control input-md" placeholder="Username" required/>
						</div>
						<div class="col-md-6 form-group">
							<label>Select Plan:</label>
							<select name="plan_id" id="plan_id" class="form-control input-md">
								@foreach($plans as $plan)
								<option value="{{ $plan->id }}">{!! $plan->name !!}</option>
								@endforeach
							</select>
						</div>
					</div>

					<button type="submit" class="btn btn-theme btn-block">Activate Plan</button>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection