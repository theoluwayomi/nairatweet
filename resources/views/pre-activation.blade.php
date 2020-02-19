@extends('layouts.app')

@section('title', 'Nairatwt Pre-activation Page')
@section('content')

<section id="content">
	<div class="container">
		<div class="row">
			@include('partials.messages')
			<div class="col-lg-12">
				<div class="text-md-center">
					<h2 class="text-primary">Subscribe to a plan now (Renewable after 30 days)</h2>
					<p>To gain access to our service, you must subscribe to a plan, each plan has a duration of 30 days and it is renewable at the end of the 30 days. Any plan you choose will determine your daily share of revenue.</p>
				</div>
			</div>
		</div>
	</div>

	<!-- divider -->
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th></th>
								<th>Fee</th>
								<th>Revenue Share</th>
								<th>Duration</th>
							</tr>
						</thead>
						<tbody>
						@foreach($plans as $plan)
							<tr>
								<th>{!! $plan->name !!}</th>
								<td>@if(!freePlan($plan))&#8358;@endif{{ presentPrice($plan->amount) }}</td>
								<td>&#8358;{{ presentPrice($plan->returns) }} Daily</td>
								<td>{{ $plan->cycle }} Days</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				@if(freeTrial())
				<div class="text-center">
					<p class="lead">To activate free trial, click on the button below now!</p>
					<form action="{{ route('activate_free_plan') }}" method="post">
						@csrf
						<button type="submit" class="btn btn-theme">Activate Free Trial Now!</button>
					</form>
				</div>
				@endif
			</div>
		</div>
	</div>
</section>

<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p>To subscribe to any of the above subscription plan please follow the below instructions carefully.</p>
				<ul>
					<li>Call or Send a WhatsApp message to any of these below agents.</li>
					<li>State that you want to buy a subscription plan, then go ahead to state the plan you want.</li>
					<li>You will be directed on how to pay for your subscription.</li>
					<li>After payment your account will be subscription will be activated within minutes.</li>
				</ul>

				<div class="container">
					<div class="row jumbotron">
						<h3>Call or send a WhatsApp message to any of these below agents.</h3>
						<ul>
							<li>Contact Mr James on 09064532114 <a href="#">Contact on WhatsApp</a></li>
							<li>Contact Mr Emmanuel on 07065432211 <a href="#">Contact on WhatsApp</a></li>
							<li>Contact Mrs Kemi on 08059876653 <a href="#">Contact on WhatsApp</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection