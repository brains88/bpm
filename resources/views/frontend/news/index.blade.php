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
		<section class="position-relative" style="padding: 100px 0;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
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
										<div class="alert alert-info">No News Available</div>
									@else
										@foreach($articles as $news)
											<div class="col-12 col-md-6">
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
				</div>
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')