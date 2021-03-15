@extends('frontEnd.frontLayout')
@section('title', "Moblog Detail")
@section('content')


	<!-- Page Header -->
			<div id="post-header" class="page-header">

				@if(Session::has('success'))
						<p class="alert alert-success">{{session('success')}}</p>
				@endif
	
				<div class="background-img" style="background-image: url('{{asset('uploadimg/post/'.$detail->image)}}');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								@if($detail->category)
								<a class="post-category cat-2" href="{{url('category/'.Str::slug($detail->category->title).'/'.$detail->category->id) }}">{{$detail->category->title}}</a>
								@endif
								<span class="post-date">March 27, 2018</span>
							</div>
							<h1>{{$detail->title}}</h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
			
			<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">

						<div class="section-row sticky-container">


							<div class="main-post">
								<!-- <h3>Lorem Ipsum: when, and when not to use it</h3> -->
								<p> {{$detail->body}}
								</p>
									
								
								
							</div>
							
						</div>

						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="{{asset('frontendlib/img')}}/author.png" alt="">
									</div>
								
									<div class="media-body">
									@if($detail->user_id==0)
										<div class="media-heading">
											<h3>Admin</h3>
										</div>
									@else
										<div class="media-heading">
											<h3>{{$detail->user->name}}</h3>
										</div>
					
										<p>{{$detail->user->about}}</p>
									@endif
									</div>
								
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2> {{count($detail->comment)}} Comments</h2>
							</div>

							<div class="post-comments">
						@if($detail->comment)
							@foreach($detail->comment as $comments)
								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="{{asset('frontendlib')}}./img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>{{$comments->name}}</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>{{$comments->comments}}</p>

										
									</div>
								</div>
								<!-- /comment -->

							@endforeach
						@endif
 							</div>
						</div>
						<!-- /comments -->
						@auth
						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a Comment</h2>
								
							</div>

							<form class="post-reply" action="{{url('save-comment/'.Str::slug($detail->title).'/'.$detail->id)}}" method="Post">
								@csrf
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<span>Name *</span>
											<input class="input" type="text" name="name">
												<span style="color: red;">
						                        	@error('name'){{$message}}@enderror
						                      	</span>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<textarea class="input" name="message" placeholder="Message"></textarea>
											<span style="color: red;">
						                        @error('message'){{$message}}@enderror
						                    </span>
										</div>
										<button class="primary-button">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->
					@else
					<div>
						<p class="alert alert-primary"> Login or Register to Comment</p>
					</div>
					@endauth
					<!-- aside -->
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->

						

						
						
						
						
						
						
					
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

