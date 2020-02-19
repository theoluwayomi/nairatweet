@extends('layouts.app')

@section('title', 'Admin | Withdrawals')
@section('content')
<section id="content">
	<div class="container">
		<div class="row" >
			<div class="col-md-6 main-bx">
				<div class="boxs text-center">
					<p><strong>{{ $today }}</strong></p>
					<p><i class="fa fa-tag"></i> Pending Withdrawal(s) Today</p>
				</div>
			</div>

			<div class="col-md-6 main-bx">
				<div class="boxs text-center">
					<p><strong>{{ $count }}</strong></p>
					<p><i class="fa fa-tag"></i> Pending Withdrawal(s) in Total</p>
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
					<h4 class="text-center text-primary">Withdrawal List</h4>
					<table class="table ">
						<thead>
							<tr>
								<th scope="row">Username</th>
								<th scope="row">Bank Name</th>
								<th scope="row">Account Name</th>
								<th scope="row">Account Number</th>
								<th scope="row">Balance</th>
								<th scope="row">Amount</th>
								<th scope="row">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse($withdrawals as $withdrawal)
							<tr>
								<td class="text-capitalize">{{ $withdrawal->user->user_name }}</td>
								<td>{{ $withdrawal->user->wallet->bank_name }}</td>
								<td>{{ $withdrawal->user->wallet->account_name }}</td>
								<td>{{ $withdrawal->user->wallet->account_number }}</td>
								<td>&#8358;{{ presentPrice($withdrawal->user->wallet->balance) }}</td>
								<td>&#8358;{{ presentPrice($withdrawal->amount) }}</td>
								<td>
									<form action="{{ route('withdrawals') }}" method="post">
									@csrf
									<input type="hidden" name="id" value="{{ $withdrawal->id }}">
									<button type="submit" name="action" value="settle" class="btn btn-theme">Settle</button>
									<button type="submit" name="action" value="delete" class="btn btn-danger">Delete</button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="5" class="text-center">No Pending Withdrawals!</td>
							</tr>
							@endforelse
						</tbody>
					</table>
					{{ $withdrawals->links() }}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection