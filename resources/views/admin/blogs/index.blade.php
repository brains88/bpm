@include('layouts.header')
    <div class="bg-white min-vh-100">
        @include('admin.layouts.navbar')
        <div class="section-padding">
            <div class="container">
                <div class="d-flex align-items-center flex-wrap">
                    <a class="btn px-4 mr-3 btn-sm border-main-dark bg-transparent mb-4">
                        <small class="text-main-dark">Blogs (0)</small>
                    </a>
                    <a class="btn px-4 btn-sm border-main-dark bg-transparent mb-4" href="{{ route('admin.blog.add') }}">
                        <small class="text-main-dark">Add Blog</small>
                    </a>
                </div>
                <div class="">
                    @if(empty($allBlogs->count()))
                        <div class="alert-info alert">No blogs yet</div>
                    @else
                        <div class="row">
                            @foreach($allBlogs as $blog)
                                <div class="col-12 col-md-6 col-lg-4 mb-4">
                                    @include('admin.blogs.partials.card')
                                </div>
                            @endforeach
                        </div>
                        {{ $allBlogs->links('vendor.pagination.links') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')    