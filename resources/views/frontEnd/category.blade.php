@extends('frontEnd.frontLayout')
@section('content')

<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				
			

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2> Posts according to Category</h2>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row">
							

				@if(count($posts) > 0)
					@foreach($posts as $post)
					<!-- post -->
					<div class="col-md-6">
						<div class="post">
							<a class="post-img" href="{{url('blog-detail/'.Str::slug($post->title).'/'.$post->id)}}"><img height="130" src="{{asset('uploadimg/post/'.$post->image)}}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									@if($post->category)
									<a class="post-category cat-1" href="{{url('category/'.Str::slug($post->category->title).'/'.$post->category->id) }}">{{$post->category->title}}</a>
									@endif
									<span class="post-date"> {{$post->created_at}}</span>
								</div>
								<h3 class="post-title"><a href="{{url('blog-detail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
					@endforeach
				@else
					<p>No Post Yet!!!</p>
				@endif
	
						</div>
						<!-- Pagination -->
				{{$posts->links()}}
					</div>

					<div class="col-md-4">
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
						@if($most_read_posts)
							@foreach($most_read_posts as $post)
							<div class="post post-widget">
								<a class="post-img" href="{{url('blog-detail/'.Str::slug($post->title).'/'.$post->id)}}"><img src="{{asset('uploadimg/post/'.$post->image)}}" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="{{url('blog-detail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a></h3>
								</div>
							</div>
							@endforeach
						@endif

							
						</div>
						<!-- /post widget -->

						<!-- post widget -->
						<!-- <div class="aside-widget">
							<div class="section-title">
								<h2>Featured Posts</h2>
							</div>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="./img/post-2.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-3" href="category.html">Jquery</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
								</div>
							</div>

							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="category.html">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								</div>
							</div>
						</div> -->
						<!-- /post widget -->
						
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->








@endsection('content')