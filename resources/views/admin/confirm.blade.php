@extends('layouts.app')

@section('title', 'Admin | Confirm Tweets')
@section('content')
<section id="content">
	<div class="container">
		<div class="row" >
			<div class="col-md-6 main-bx">
				<div class="boxs text-center">
					<p><strong>{{ $today }}</strong></p>
					<p><i class="fa fa-tag"></i> Pending Link(s) Today</p>
				</div>
			</div>

			<div class="col-md-6 main-bx">
				<div class="boxs text-center">
					<p><strong>{{ $count }}</strong></p>
					<p><i class="fa fa-tag"></i> Pending Link(s) in Total</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				@include('partials.messages')
				
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="row">Username</th>
								<th scope="row">Twitter handle</th>
								<th scope="row">Links</th>
								<th scope="row">Subscription Plan</th>
								<th scope="row">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse($posts as $post)
							<tr>
								<td class="text-capitalize">{{ $post->user->user_name }}</td>
								<td>{{ $post->user->twitter_handle }}</td>
								<td>
									@foreach(getLinks($post->links) as $link)
										<p class=""><a href="{{ $link }}" target="_blank">{{ $link }}</a></p>
									@endforeach
								</td>
								<td>{!! $post->plan->name !!}</td>
								<td>
									<form action="{{ route('confirm') }}" method="post">
									@method('patch')
									@csrf
									<input type="hidden" name="id" value="{{ $post->id }}">
									<button type="submit" name="action" value="confirm" class="btn btn-theme">Confirm</button>
									<button type="submit" name="action" value="decline" class="btn btn-danger">Decline</button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="5" class="text-center">No Pending Tweet Confirmation!</td>
							</tr>
							@endforelse
						</tbody>
					</table>
					{{ $posts->links() }}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection