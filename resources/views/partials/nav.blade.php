<!-- start header -->
<header>
    <div class="top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="topleft-info">
						<li><i class="fa fa-phone text-primary"></i> Call <a href="tel:+2348169593325">08169593325</a> for more enquiry</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.jpg') }}" alt="" width="199" height="52" /></a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="{{ route('faq') }}">Frequently Asked Questions</a></li>
                    @guest
                    @else
                    <li><a href="{{ route('home') }}">Dashboard</a></li>                    
                    <li><a href="{{ route('withdraw.show') }}">Withdraw</a></li>
                    <li><a href="{{ route('upgrade') }}">Upgrade</a></li>
                    @endguest
                    @guest
                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                    <li><a style="background-color: #032c28; color: white;">&#8358; {{ presentPrice(auth()->user()->wallet->balance) }}</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">{{ Auth::user()->user_name }}  <i class="fa fa-user"></i> <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.edit') }}">Edit Account</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @if(auth()->user()->hasRole())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Admin <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            @if(auth()->user()->is('confirmer'))
                            <li><a href="{{ route('confirm') }}">Confirm Tweets</a></li>
                            @endif
                            @if(auth()->user()->is('compiler'))
                            <li><a href="{{ route('withdrawals') }}">Withdrawals</a></li>
                            @endif
                            @if(auth()->user()->is('activator'))
                            <li><a href="{{ route('activate') }}">Activate users</a></li>
                            <li><a href="{{ route('admin.upgrade') }}">Upgrade users</a></li>
                            @endif
                            @if(auth()->user()->is('admin'))
                            <li><a href="{{ route('tweet') }}">Post Tweets</a></li>
                            <li><a href="{{ route('transfer') }}">Transfer</a></li>
                            <li><a href="{{ route('role') }}">Edit Roles/Toggle Withdrawal</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
