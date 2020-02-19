@extends('layouts.app')

@section('title', 'Admin | Post Tweet')
@section('content')
<section id="content">
	<div class="container">
		<div class="row" >
			<h2 class="text-center text-primary">Post Tweets</h2>
			<div class="col-lg-12">
				@include('partials.messages')
				@if(is_null($tweets))
				<div class="alert alert-danger">
					<p><strong>You have not posted the tweets for today!</strong></p>
				</div>
				@endif
				<form action="{{ route('tweet') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Tweet #1:</label>
							<textarea name="tweet_1" id="tweet_1" cols="30" rows="5" class="form-control input-md">{{  is_null($tweets) ? '' : $tweets->tweet_1 }}</textarea>
						</div>

						<div class="col-md-4 form-group">
							<label>Tweet #2:</label>
							<textarea name="tweet_2" id="tweet_2" cols="30" rows="5" class="form-control input-md">{{  is_null($tweets) ? '' : $tweets->tweet_2 }}</textarea>
						</div>

						<div class="col-md-4 form-group">
							<label>Tweet #3:</label>
							<textarea name="tweet_3" id="tweet_3" cols="30" rows="5" class="form-control input-md">{{  is_null($tweets) ? '' : $tweets->tweet_3 }}</textarea>
						</div>
					</div>

					<button type="submit" class="btn btn-theme btn-block">Post Tweets Now</button>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection