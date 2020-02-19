@extends('layouts.app')

@section('title', 'Nairatwt Dashboard')
@section('content')
<section id="content">
	<div class="container">
	
	@include('partials.messages')
		<div class="row" >
			<div class="col-md-3 main-bx">
				<div class="boxs"@if($left <= 5) style="background-color: #d50909;"@endif>
					<p><i class="fa fa-tag"></i> <strong>Current Plan</strong></p>
					<p>{!! $plan->name !!} ({{ $left }} day(s) left)</p>
				</div>
			</div>

			<div class="col-md-3 main-bx">
				<div class="boxs">
					<p><i class="fa fa-money"></i> <strong>Daily Revenue</strong></p>
					<p>&#8358;{{ presentPrice($plan->returns) }}</p>
				</div>
			</div>

			<div class="col-md-3 main-bx">
				<div class="boxs">
					<p><strong>Today's Action</strong></p>
					<p class="text-capitalize">{{ $posted ? 'Completed' : 'Still Open' }} @if($posted)| Revenue {{ $post->status }}@endif</p>
				</div>
			</div>

			<div class="col-md-3 main-bx">
				<div class="boxs">
					<p><strong>Yesterday</strong></p>
					<p class="text-capitalize">{{ $posted_prev ? 'Completed' : 'Missed' }} @if($posted_prev)| Revenue {{ $prev_post->status }}@endif</p>
				</div>
			</div>
		</div>	
		<div class="row" style="margin-bottom: 0px;">
			<div class="col-lg-12">
				<div class="alert alert-info">
					<p><span class="text-capitalize text-bold">{{ auth()->user()->user_name }}</span>! Welcome to your personalised Dashboard! </p>
				</div>
				@if(is_null($tweets))
				<div class="alert alert-danger">
					<p>The tweet for today is currently not available!</p>
				</div>
				@endif
				<div class="row">
					<div class="col-12 col-sm-4">
						<p><strong>Tweet #1</strong></p>
						<div class="jumbotron tweet">
							<p style="line-height: 1.2em; font-size: 1.2em;">{{  is_null($tweets) ? 'Not Available yet!' : $tweets->tweet_1 }}</p>
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<p><strong>Tweet #2</strong></p>
						<div class="jumbotron tweet">
							<p style="line-height: 1.2em; font-size: 1.2em;">{{  is_null($tweets) ? 'Not Available yet!' : $tweets->tweet_2 }}</p>
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<p><strong>Tweet #3</strong></p>
						<div class="jumbotron tweet">
							<p style="line-height: 1.2em; font-size: 1.2em;">{{  is_null($tweets) ? 'Not Available yet!' : $tweets->tweet_3 }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form action="{{ route('tweet.save') }}" method="POST">
					@csrf
					<div class="form-group">
						<label>Tweet Link #1</label>
						<input type="text" name="link_1" id="link_1" class="form-control input-md" placeholder="Link to tweet 1" {{ $posted || is_null($tweets)  ? 'disabled' : '' }}>
					</div>
					<div class="form-group">
						<label>Tweet Link #2</label>
						<input type="text" name="link_2" id="link_2" class="form-control input-md" placeholder="Link to tweet 2" {{ $posted || is_null($tweets)  ? 'disabled' : '' }}>
					</div>
					<div class="form-group">
						<label>Tweet Link #3</label>
						<input type="text" name="link_3" id="link_3" class="form-control input-md" placeholder="Link to tweet 3" {{ $posted || is_null($tweets)  ? 'disabled' : '' }}>
					</div>

					<button type="submit" class="btn btn-theme" {{ $posted || is_null($tweets) ? 'disabled' : '' }}>Submit Links for confirmation</button>
				</form>
			</div>

			<!-- divider -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="solidline">
						</div>
					</div>
				</div>
			</div>
			<!-- end divider -->

			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="jumbotron">
							<p class="text-danger">Please note that confirmation takes few hours, after confirmation, your nairatwt account will be credited with your revenue share immediately. Please note that posting incorrect or invalid links may lead to account suspension.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection