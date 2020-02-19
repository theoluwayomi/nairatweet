@extends('layouts.app')

@section('title', 'Nairatwt Home')
@section('content')
<section id="featured" class="bg">
	<!-- start slider -->
	<div class="container">
		<div class="row" style="margin-bottom: 0px;">
			<div class="col-lg-12">
				<!-- Slider -->
				<div id="main-slider" class="main-slider flexslider">
					<ul class="slides">
						<li>
							<img src="img/slides/flexslider/1.jpg" alt="" />
							
						</li>
						<li>
							<img src="img/slides/flexslider/2.jpg" alt="" />
							
						</li>
						<li>
							<img src="img/slides/flexslider/3.jpg" alt="" />
							
						</li>
					</ul>
				</div>
				<!-- end slider -->
			</div>
		</div>
	</div>
</section>

<section class="callaction" style="padding-top: 0px;">
	<div class="container">
		
		<div class="row">
			<div class="col-lg-6">
				<div class="cta-text">
					<h2>Nairatweet <span>Summary</span></h2>
					<p> Nairatwt enable users to get paid by tweeting 3 advert posts daily on their twitter page. Help brands and businesses reach their awareness goal by posting 3 times on your twitter page daily. You get paid up to N9,000 daily by tweeting 3 advert post in a day. you can withdraw your earnings every Monday of the week into the bank account you registered with.</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="cta-text">
					<h2>Tweet a <span class="highlight">sponsored</span> advert and get paid</h2>
					<p>A lot of businesses ranging from brands to startups contact us everyday to help them promote their business using nairatwt because of the ease and effectiveness. This enable us to share the profits with our users weekly. All they have to do is post 3 sponsored tweets daily.</p>
					<br>
					<h4><span>Requirements</span></h4>
					<ol>
						<li>Of course you need an active twitter account.</li>
						<li>You must have a minimum of 500 followers.</li>
						<li>You must have an active bank account (For withdrawals)</li>
					</ol>
				</div>
			</div>
			<br>
			<div class="col-lg-12">
				<div class="">
                    <h4>Do I have to refer someone before I get paid?</h4>
                    <p>NO, we do not have any referral program nor are we planning to introduce anything like that. You can introduce nairatwt as a source of income to your family and friends but we do not pay commission on that, we only pay you for tweeting.</p>
                </div>

                <div class="">
                    <h4>How long does withdrawal take after making a withdrawal request?</h4>
                    <p>Withdrawals are processed within minutes but the maximum time frame is within 24hours.</p>
                </div>

                <div class="">
                    <h4>I just subscribe what next?</h4>
                    <p>After subscribing, just login and click on your dashboard, you will see the 3 daily available sponsored tweets, copy and tweet it on your twitter page, after tweeting, copy each link of each of the 3 links and paste it on your dashboard and click on SUBMIT LINK. That is all!! You are done for the day. You will be credited with your revenue share before the end of the day.</p>
                </div>

                <div class="">
                    <h4>What if I do not tweet sponsored tweets in a day?</h4>
                    <p>It is very simple, You will not get paid for that day. Please note that you will only get paid when you tweet. If you do not tweet, we will not get paid and you also will not get paid.</p>
                </div>

                <div class="">
                    <h4>Why am I allowed to tweet only 3 times in a day?</h4>
                    <p>We do not encourage spamming at all, so all users are only allowed to tweet 3 sponsored tweets in a day.</p>
                </div>

                <div class="">
                    <h4>Do I have to submit my three tweet links daily?</h4>
                    <p>It is absolutely necessary to submit your three tweet links daily, because that is the only way we can confirm that you have completed your task and process your revenue share(payment).</p>
				</div>
				<div class="container text-center">
					<h4 class="text-uppercase">TOP CURRENT & PAST ADVERT PARTNERS.</h4>
					<br>
					<div class="row">
						<div class="col-xs-6 col-md-2 col-md-offset-1 aligncenter client">
							<img alt="logo" src="img/clients/jumia.svg" class="img-responsive" />
			 			</div>

						<div class="col-xs-6 col-md-2 aligncenter client">
							<img alt="logo" src="img/clients/bet9ja.png" class="img-responsive" />
						</div>

						<div class="col-xs-6 col-md-2 aligncenter client">
							<img alt="logo" src="img/clients/konga.png" class="img-responsive" />
						</div>

						<div class="col-xs-6 col-md-2 aligncenter client">
							<img alt="logo" src="img/clients/betway.png" class="img-responsive" />
						</div>
						
						<div class="col-xs-6 col-md-2 aligncenter client">
							<img alt="logo" src="img/clients/1xbet.svg" class="img-responsive" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="content">
	<div class="container">
		<div class="row text-center">
			<h2 class="text-primary text-center">Below is our flexible pricing</h2>
			<p>To get gain access to our service, you must subscribe to a plan, each plan has a duration of 30 days and it is renewable at the end of the 30 days. Any plan you choose will determine your daily share of revenue.</p>
			@foreach($plans as $plan)	
			<div class="col-lg-4">
				<div class="pricing-box-alt">
					<div class="pricing-heading">
						<h3>{!! $plan->name !!}</h3>
					</div>
					<div class="pricing-terms">
						<h6><strong>Fee: </strong>@if(!freePlan($plan))&#8358;@endif{{ presentPrice($plan->amount) }}</h6>
					</div>
					<div class="pricing-content">
						<ul>
							<li><i class="icon-ok"></i><strong>Revenue Share:</strong> &#8358;{{ presentPrice($plan->returns) }} Daily</li>
							<li><i class="icon-ok"></i> {{ $plan->cycle }} Days</li>
							<li><i class="icon-ok"></i> Monday Withdrawals</li>
						</ul>
					</div>
					<div class="pricing-action">
						<a href="{{ route('subscribe') }}" class="btn btn-medium btn-theme"><i class="icon-bolt"></i> Subscribe Now</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

@endsection