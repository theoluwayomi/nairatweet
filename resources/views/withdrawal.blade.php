@extends('layouts.app')

@section('title', 'Nairatwt Withdrawal Page')
@section('content')
<section id="content">
	<div class="container">
		@include('partials.messages')
		<div class="row">
			<div class="col-sm-7">
				<h3>Withdraw Funds</h3>
				<hr>
				@if(canWithdraw())
				<div class="alert alert-success">
					<p>Withdrawal is open now!</p>
				</div>
				@else
				<div class="alert alert-danger">
					<p>Withdrawal is closed. You can only make withdrawals on Monday!</p>
				</div>
				@endif
				<ul class="cat">
					<li><i class="fa fa-angle-right"></i>Please note that you can only withdraw on Mondays.</li>
					<li><i class="fa fa-angle-right"></i>Withdrawals are processed within few hours but note that it will never exceed 24hours.</li>
					<li><i class="fa fa-angle-right"></i>Your payment will be processed into the bank account you registered with.</li>
					<li><i class="fa fa-angle-right"></i>You can cross-check your bank details at the “edit account” section.</li>
					<li><i class="fa fa-angle-right"></i>Input the amount you want to withdraw below and click on the withdraw button.</li>
				</ul>

				<form action="{{ route('withdraw.save') }}" method="post">
					@csrf
					<div class="form-group">
						<label>Withdrawal Amount (&#8358;)</label>
						<input type="text" name="amount" id="amount" class="form-control input-md" placeholder=":1000" tabindex="1" required>
					</div>
					
					<div class="jumbotron minimal-text">
						<p> Account Holder : <strong>{{ $user->first_name." ".$user->last_name }}</strong></p>
						<p> Mobile Number : <strong>{{ $user->mobile_number }}</strong></p>
						<p> Email : <strong>{{ $user->email }}</strong></p>
					</div>

					<div class="form-group">
						<label>Bank Account Number</label>
						<input type="text" id="amount" class="form-control input-md"  tabindex="1" value="{{ $wallet->account_number }}" disabled="">
					</div>

					<div class="form-group">
						<label>Bank</label>
						<input type="text" id="amount" class="form-control input-md" value="{{ $wallet->bank_name }}" tabindex="1" disabled="">
					</div>

					<button type="submit" class="btn btn-theme" {{ canWithdraw() ? '' : 'disabled' }}>Make Withdrawal</button>
					<br><br>
				</form>
			</div>

			<div class="col-sm-5 callaction">
				<section class="callaction">
					<div>
						<div class="row">
							<div class="col-lg-12">
								<h3>Withdrawal History</h3>
								<div class="table-responsive">
									<table class="table table-responsive">
										<thead class="thead-dark">
											<tr>
												<th scope="col">#</th>
												<th scope="col">Date</th>
												<th scope="col">Amount</th>
												<th scope="col">Status</th>
											</tr>
										</thead>
										<tbody>
											@php
											$i = 1;
											@endphp
											@forelse($withdrawals as $withdrawal)
											<tr>
												<td scope="row">{{ $i++ }}</td>
												<td>{{ presentDate($withdrawal->created_at) }}</td>
												<td>&#8358;{{ presentPrice($withdrawal->amount) }}</td>
												<td> <span class="text-capitalize">{{ $withdrawal->status }}</span></td>
											</tr>
											@empty
											<tr>
												<td scope="row" colspan="4" class="text-center"><strong>No Withdrawals yet!</strong></td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</div>
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
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
@endsection
		