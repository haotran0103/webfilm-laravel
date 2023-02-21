@extends('layout')
@section('SEASON')
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title">{{$movie_slug->title}}{{isset($newmovie->season)? 'PHẦN '.$newmovie->season: ''}}</h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="{{asset('uploads/movie/'.$movie_slug->image)}}" alt="">
									<button class="btn btn-primary" style="background-color: rgb(223,80,133); width: 100%;height: 70%"><a href="{{url('xem-phim/'.$first_episode->movie->slug.'/tap-'.$first_episode->episode)}}" style="color: #ffff">xem phim</a> </button>

								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<div class="card__wrap">
										<ul class="card__list">
											@if($movie_slug->resolution==0)
												<li>HD</li>
												@elseif($movie_slug->resolution==1)
												<li>SD</li>
												@else
												<li>FullHD</li>
											@endif
											 @if($movie_slug->phuDe==0)
							                    <li>vietSub</li> 
							                    @else
							                   <li>thuyết minh</li> 
							                  @endif
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>thể loại:</span> 
											@foreach($movie_slug->movie_genre as $gen)
											<a href="{{route('danhmuc2',$gen->slug)}}">
											{{$gen->title}}
											</a>
											@endforeach
											</li>
										<li><span>loại:</span> <a href="">
											{{$movie_slug->category->title}}
										</a></li>
										<li><span>thời lượng phim:</span>{{$movie_slug->thoiLuong.''}} </li>@if($movie_slug->category->title!='movie')
										<li><span>số tập:</span>{{$curr_ep->episode}}/{{$movie_slug->sotap}} </li>
										@endif
									</ul>

									<div class="card__description card__description--details">
										{{$movie_slug->description}}
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<iframe width="100%" height="300px" src="https://www.youtube.com/embed/2pD50-A3OKk"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
				<!-- end player -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Available on devices:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
								<li><i class="icon ion-logo-android"></i><span>Android</span></li>
								<li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
								<li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
							</ul>
						</div>
						<!-- end availables -->

						<!-- share -->
						<div class="details__share">
							<span class="details__share-title">Share with friends:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
							</ul>
						</div>
						<!-- end share -->
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Discover</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a>
							</li>

						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Comments">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								@php
									$curr_url=Request::url();
									@endphp
								<!-- comments -->

								<div class="fb-comments" data-href="{{$curr_url}}" data-width="" data-numposts="10"></div>
								<!-- end comments -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
							@php
							$curr_url=Request::url();
							@endphp
							<div class="row">
								<!-- reviews -->
								<div class="fb-comments" data-href="{{$curr_url}}" data-width="" data-numposts="10"></div>
								<!-- end reviews -->
							</div>
						</div>
					</div>
					<!-- end content tabs -->
				</div>

				<!-- sidebar -->
				<div class="col-12 col-lg-4 col-xl-4">
					<div class="row">
						<!-- section title -->
						<div class="col-12">
							<h2 class="section__title section__title--sidebar">có thể bạn sẽ thích</h2>
						</div>
						<!-- end section title -->

						<!-- card -->
						@foreach($relate as $key =>$relate)
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<img src="{{asset('uploads/movie/'.$relate->image)}}" alt="">
									<a href="{{route('detail',$relate->slug)}}" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">{{$relate->title}}{{isset($newmovie->season)? 'PHẦN '.$newmovie->season: ''}}</a></h3>
									<span class="card__category">
										<a href="#">Action</a>
										<a href="#">Triler</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<!-- end sidebar -->
			</div>
		</div>
	</section>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0" nonce="43IGUwg5"></script>
	<script type="text/javascript">
		.fb-comments span, .fb-comments span iframe {
									   color: white !important;
									}
	</script>
@endsection