		<header>
			<div class="topHeader">
				<div class="container">
					<div class="clearfix">   
				@php     
			   $settings= _arefy(App\Models\generalSettings::where('status','!=','trashed')->first()); @endphp

					<ul class="htop-wrap float-left">
						<li class="mobile-hide"><a href="tel:{{$settings['phone']}}"><i class="fa fa-phone"></i>{{$settings['phone']}}</a></li>
							<li ><a href="tel:+91-{{$settings['phone2']}}"><i class="fa fa-mobile"></i>{{$settings['phone2']}}</a></li>
							<li class="mobile-hide"><a href="mailto:admin@enntechnologies.in"><i class="fa fa-envelope"></i>{{$settings['email']}}</a></li>
						</ul>
						<ul class="rightHeader">
							<!-- <li><a href="#login-modal" data-toggle="modal">Login</a></li>
							<li><a href="#register-modal" data-toggle="modal">Register</a></li> -->
							<!-- <li class="new-offered-blink">-->
								<!-- <div class="float-right apply-now"> -->
									<!-- <a href="#modal-apply-form" data-toggle="modal" class="apply-now quadrat">Apply Now</a> -->
								<!-- </div> -->
							<!--</li>-->
							<li class="rightListli boxli"><a href="{{url('ask-a-demo')}}"><i class="fa fa-caret-square-o-up" style="padding-right:5px;"></i>Ask a Demo</a></li>
							<li class="rightListli boxli1"><a href="tel:7060471862"><img src="{{url('images/phone.gif')}}" style="padding-right:5px;height: 20px;"></i>Get a Call Back</a></li>
							<li class="mobileBlock">
								<a href="javascript:void(0);" class="search-mobile-input search">
									<i class="fa fa-search searchIcon"></i>
									<i class="fa fa-times cross-icon"></i>
								</a>
							</li>
						</ul>
						<form method="GET" action="{{url('search')}}"> 
							<div class="search-mobile-toggle forMobile">
								<input type="text" name="search" placeholder="Search Courses...">
								<button type="submit" class="btn-secarch"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<nav class="jsnn-nav" role="navigation">
				<div class="top-menu">
					
					<div class="container">					
						<div class="row">
							<div class="col-md-4 col-sm-3 col-xs-4">
								<div id="jsnn-logo"><a href="{{url('/')}}"><img src="{{url('images/logo/logo.png')}}"></a></div>
								<div class="new-offered-blink1">
				   					<div class="quadrat_s"><a href="{{url('courseOffered')}}">
				   						Summer Training / Internship
				   						<div class="new_round">
				   							<img src="{{asset('images/new_red.gif')}}" alt="new">
				   						</div>
				   					</a></div>
				   				</div>
							</div>
							<div class="col-md-8 col-sm-9 col-xs-8 text-right menu-1">
								<ul class="menuListing">
									<li class=""><a href="{{url('/')}}">Home</a></li>
									<li class="has-dropdown">
										<a href="{{url('/courses')}}">All Courses</a>
									</li>
									<li class="hidemenu"><a href="{{url('/courses')}}">Training</a>
									@if(\App\Models\Trainings::where('status','active')->count() >0)
									@php
					                    $menus = \App\Models\Trainings::where('status','active')->orderBy('training_type','desc')->get();
					                @endphp
										<ul class="training submenu">
										@foreach($menus as $menu)
											<li><a href="javascript:void(0);">{{$menu->training_type}}</a></li>
										@endforeach
										</ul>
									@endif
									</li>
									<li><a href="{{url('/about-us')}}">About Us</a></li>
									<li><a href="{{url('/contact')}}">Contact Us</a></li>
									<li class="mobileHide"><a href="javascript:void(0);" class="search-input search">
										<i class="fa fa-search searchIcon"></i>
										<i class="fa fa-times cross-icon"></i>
										</a>
									</li>
									
									
								</ul>
								<form method="GET" action="{{url('search')}}"> 
									<div class="search-toggle forDesktop">
										<input type="text" name="search" placeholder="Search Courses...">
										<button type="submit" class="btn-secarch"><i class="fa fa-search"></i></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</nav>
			
		</header>
		