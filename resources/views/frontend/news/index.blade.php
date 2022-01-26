@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
    	<section class="news-banner">
			<div class="container-fluid">
				<div class="row mb-4">
					<div class="col-12 mb-4">
						<h1 class="text-white">Real Estate News</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="position-relative" style="padding: 100px 0 60px;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-7 col-lg-9">
						@if($newsapi['status'] === 1)
							<?php $newsdata = $newsapi['data'] ?? []; ?>
							@if(isset($newsdata['status']) && strtolower($newsdata['status']) === 'ok')
								<div class="bg-main-dark p-3 mb-4">
									<h5 class="text-white m-0">
										{{ ucwords($newsdata['user_input']['q'] ?? 'Real Estate') }} News ({{ $newsdata['total_hits'] ?? 0 }})
									</h5>
								</div>
								<?php $articles = $newsdata['articles'] ?? []; ?>
								<div class="row">
									@if(empty($articles))
										<div class="alert alert-info">No new available</div>
									@else
										@foreach($articles as $news)
											<div class="col-12">
												@include('frontend.news.partials.card')
											</div>
										@endforeach
									@endif
								</div>
							@else
								<div class="alert alert-info">News not available</div>
							@endif
						@else
							<div class="alert alert-info">Try again later</div>
						@endif
					</div>
					<div class="col-12 col-md-5 col-lg-3">
						<div class="">
							<div class="p-3 bg-main-dark mb-4">
								<h5 class="text-white m-0">Other News</h5>
							</div>
							<div class="row">
								<div class="col-12 mb-4">
									{{-- @include('news.partials.card') --}}
									<div class="card p-0 border-0">
									    <img src="/images/news/5.jpg" class="img-fluid rounded-0 card-img-top" alt="">
									    <div class="card-body px-0">
									    	<div class="text-muted">Lipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</div>
									    </div>
									</div>
								</div>
								<div class="col-12 mb-4">
									{{-- @include('frontend.news.partials.card') --}}
									<div class="card p-0 border-0">
									    <img src="/images/news/1.jpg" class="img-fluid rounded-0 card-img-top" alt="">
									    <div class="card-body px-0">
									    	<div class="text-muted">Enum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</div>
									    </div>
									</div>
								</div>
								<div class="col-12 mb-4">
									{{-- @include('news.partials.card') --}}
									<div class="card p-0 border-0">
									    <img src="/images/news/6.jpg" class="img-fluid rounded-0 card-img-top" alt="">
									    <div class="card-body px-0">
									    	<div class="text-muted">Raft dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</div>
									    </div>
									</div>
								</div>
								<div class="col-12 mb-4">
									{{-- @include('news.partials.card') --}}
									<div class="card p-0 border-0">
									    <img src="/images/news/7.jpg" class="img-fluid rounded-0 card-img-top" alt="">
									    <div class="card-body px-0">
									    	<div class="text-muted">Manil dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</div>
									    </div>
									</div>
								</div>
							</div>
						</div>
						<div class="">
							<div class="bg-main-dark p-3 mb-4">
								<h5 class="text-white m-0">News Categories</h5>
							</div>
							<div class="">
								<a href="" class="mb-4 pb-3 mb-3 border-bottom d-flex align-items-center justify-content-between">
									<div class="text-main-dark">
										Surveying
									</div>
									<div class="bg-main-red rounded px-2 py-1 text-white" style="font-size: 8px;">34</div>
								</a>
								<a href="" class="mb-4 pb-3 mb-3 border-bottom d-flex align-items-center justify-content-between">
									<div class="text-main-dark">
										Construction
									</div>
									<div class="bg-main-red rounded px-2 py-1 text-white" style="font-size: 8px;">27</div>
								</a>
								<a href="" class="mb-4 pb-3 mb-3 border-bottom d-flex align-items-center justify-content-between">
									<div class="text-main-dark">
										Real Estate
									</div>
									<div class="bg-main-red rounded px-2 py-1 text-white" style="font-size: 8px;">11</div>
								</a>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')