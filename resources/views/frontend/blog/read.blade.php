@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
    	<section class="" style="padding: 140px 0;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-8 col-lg-8">
						<div class="mb-4">
							@empty($blog)
								<div class="alert alert-danger">Post No Found</div>
							@else
								<div class="mb-4">
									<h3 class="text-main-dark mb-3">
										{{ ucfirst($blog->title) }}
									</h3>
									<div class="mb-4" style="height: 380px;">
										<img src="{{ $blog->image }}" class="img-fluid border h-100 w-100 object-cover">
									</div>
									<div class="mb-4">
										<div class="text-main-dark">
											{{ $blog->description }}
										</div>
									</div>
									<div class="p-3 rounded border">
										<div class="text-main-dark">By {{ $blog->user ? ucwords($blog->user->name) : 'Best Property Market' }}</div>
									</div>
								</div>
							@endempty
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-4">
						<div class="mb-4">
							<div class="p-3 mb-4 bg-white shadow-sm icon-raduis">
								<h5 class="m-0">Blog Categories</h5>
							</div>
							<?php $categories = \App\Models\Category::where(['type' => 'blog'])->get(); ?>
							@empty($categories->count())
			                    <div class="alert alert-info">No Categories Yet</div>
			                @else
			                	<div class="row">
			                        @foreach($categories as $category)
				                        <div class="col-12">
				                        	@include('frontend.blog.partials.categories')
				                        </div>
			                        @endforeach
			                    </div>
			                @endempty
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')