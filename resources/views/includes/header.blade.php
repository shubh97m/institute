		<header>
			<div class="topHeader">
				<div class="container">
					<div class="headerflex">   
				@php     
			   $settings= _arefy(App\Models\generalSettings::where('status','!=','trashed')->first()); @endphp

					<ul class="htop-wrap float-left">
						<li class="mobile-hide"><a href="tel:{{$settings['phone']}}"><i class="fa fa-phone"></i>{{$settings['phone']}}</a></li>
							<li ><a href="tel:+91-{{$settings['phone2']}}"><i class="fa fa-mobile"></i>{{$settings['phone2']}}</a></li>
							<li class="mobile-hide"><a href="mailto:admin@enntechnologies.in"><i class="fa fa-envelope"></i>{{$settings['email']}}</a></li>
						</ul>
						<ul class="rightHeader">
							<li class="rightListli boxli"><a href="#askdemo" data-toggle="modal"><i class="fa fa-caret-square-o-up" style="padding-right:5px;"></i>Ask a Demo</a></li>
							<li class="rightListli boxli1"><a href="#call-back" data-toggle="collapse" aria-expanded="true" aria-controls="call-back" class="call-back-bt"><img src="{{url('images/phone.gif')}}" style="padding-right:5px;height: 20px;">Get a Call Back</a>
							<div class="call-back-form collapse in" id="call-back" aria-expanded="true" style="">

                            <div class="call-form-field text-left">
                                <button type="button" onclick="$('.call-back-form').removeClass('show');" class="close" data-dismiss="collapse" aria-label="Close"><span aria-hidden="false">×</span></button>

                                <span class="ttl">Provide Your Detail</span>

                                <form action="/ajax/send-enquiry" method="POST" id="iq_form">
                                    <div class="form-group">
										<input type="text" class="form-control" name="iq_name" id="iq_name" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="iq_email" id="iq_email" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="iq_mobile" id="iq_mobile" placeholder="Enter Mobile No.">
                                    </div>
									<div class="form-group">
                                        <input type="text" class="form-control" name="iq_course" id="iq_course" placeholder="Enter Course">
                                    </div>
									
									<div class="form-group">
                                        <textarea class="form-control" name="iq_message" rows="3" placeholder="Enter your message"></textarea>
                                    </div>
									<div class="form-group">
										<div class="checkbox">
										   <input type="checkbox" value="1" name="tos" id="iq_check_callback" class="css-checkbox">
										   <label for="iq_check_callback" class="css-label human" style="background-position: 0px 0px;">I am Human.</label>
										   <input type="hidden" class="hidden_human" value="" name="iq_human">
										</div>
									</div>
									<input type="submit" class="btn btn-default btn-stick-submit btn-black" value="Send Enquiry">
									
                                </form>
                            </div>
                        </div>
							</li>
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
							<div class="col-md-3 col-sm-3 col-xs-4">
								<div id="jsnn-logo"><a href="{{url('/')}}"><img src="{{url('images/logo/logo-1.png')}}"></a></div>
								<div class="new-offered-blink1 formobileblink">
				   					<div class="quadrat_s"><a href="{{url('courseOffered')}}">
				   						Summer Training / Internship
				   						<div class="new_round">
				   							<img src="{{asset('images/new_red.gif')}}" alt="new">
				   						</div>
				   					</a></div>
				   				</div>
							</div>
							<div class="col-md-9 col-sm-9 col-xs-8 menu-1">
								<ul class="menuListing">
									<li class=""><a href="{{url('/')}}">Home</a></li>
									<li class="has-dropdown">
										<a href="javascript:void(0);">All Courses</a>
										<div class="dropdownMenu">
											<!-- <i class="caret-up"></i> -->
											<ul class="allcourse-main">
											@if(!empty($course))
											@php
												$course = _arefy(App\Models\MainCourses::where('status','=','active')->get());
												@endphp
												@foreach($course as $courses)
													<li class="menu-item-1 hover-menu child-active">
													<a href="javascript:void(0);" title="{{$courses['name']}}">
														<img src="{{asset('assets/img/Courses')}}/{{$courses['image']}}" alt="course" width="24px" height="24px">
														<br>{{$courses['name']}}
													</a>
													<ul class="sub-allcourse-main sub-hover">
														@php
														$sub_course =_arefy(App\Models\SubCourses::where(['course_id'=>$courses['id'],'status'=>'active'])->get());
														@endphp
														@if(!empty($sub_course))
															@foreach($sub_course as $sub_courses)
														<li class="sub-sub-allcourse-list">
															<a title="{{$sub_courses['name']}}" href="javascript:void(0);">{{$sub_courses['name']}}</a>
															<ul class="sub-allcourse-main">
															@php
															$child_course =_arefy(App\Models\ChildCourses::where(['sub_course'=>$sub_courses['id'],'status'=>'active'])->get());
															@endphp
																@if(!empty($child_course))
																@foreach($child_course as $child_courses)
																<li><a title="{{$child_courses['name']}}" href="javascript:void(0);">{{$child_courses['name']}}</a></li>
																@endforeach
																@endif
															</ul>
														</li>
														@endforeach
														@endif
														
													</ul>
													</li>
												@endforeach
											@endif
												
											</ul>
										</div>
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
									<!-- <li class="mobileHide"><a href="javascript:void(0);" class="search-input search">
										<i class="fa fa-search searchIcon"></i>
										<i class="fa fa-times cross-icon"></i>
										</a>
									</li> -->
									
									
								</ul>
								<form method="GET" action="{{url('search')}}"> 
									<div class="search-toggle forDesktop">
										<input type="text" name="search" placeholder="Search for courses">
										<button type="submit" class="btn-secarch"><i class="fa fa-search"></i></button>
									</div>
								</form>
								<div class="new-offered-blink1">
				   					<div class="quadrat_s"><a href="{{url('courseOffered')}}">
				   						Summer Training / Internship
				   						<div class="new_round">
				   							<img src="{{asset('images/new_red.gif')}}" alt="new">
				   						</div>
				   					</a></div>
				   				</div> 
							</div>
						</div>
					</div>
				</div>
			</nav>
			
		</header>
		