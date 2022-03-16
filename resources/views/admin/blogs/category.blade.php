@include('layouts.header')
    <div class="min-vh-100 bg-main-ash">
        @include('admin.layouts.navbar')
        <div class="section-padding pb-4">
            <div class="container-fluid">
                <div class="row flex-md-column-reverse flex-lg-row">
                    <div class="col-12 col-lg-7">
                        <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">
                        <span class="">
                            ({{ $blogs->total() }}) Blogs
                        </span>
                        <a href="{{ route('admin.blog.add') }}" class="text-decoration-none">
                            <i class="icofont-plus"></i>
                        </a>
                    </div>
                        @if(empty($blogs->count()))
                            <div class="alert-info alert">No blogs yet</div>
                        @else
                            <div class="row">
                                @foreach($blogs as $blog)
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        @include('admin.blogs.partials.card')
                                    </div>
                                @endforeach
                            </div>
                            {{ $blogs->onEachSide(1)->links('vendor.pagination.default') }}
                        @endif
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="">
                            <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">
                                <span class="">Blog Categories</span>
                                <div class="cursor-pointer" data-toggle="modal" data-target="#add-category">
                                    <i class="icofont-plus"></i>
                                 </div>
                            </div>
                            @include('admin.categories.partials.add')
                            @if(empty($categories->count()))
                                <div class="alert alert-info">No blog categories</div>
                            @else
                                <div class="row">
                                    @foreach($categories as $category)
                                        <div class="col-12 col-lg-6 mb-4">
                                            <div class="card border-0">
                                                <div class="card-body d-flex justify-content-between">
                                                    <a href="javascript:;" data-toggle="modal" data-target="#edit-category-{{ $category->id }}" class="text-underline">
                                                        {{ ucwords($category->name ?? '') }}
                                                    </a>
                                                    <div class="text-main-dark">
                                                        ({{ $category->blogs()->count() }})
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between bg-main-dark">
                                                    <small class="text-white">
                                                        {{ $category->created_at->diffForHumans() }}
                                                    </small>
                                                    <div class="d-flex">
                                                        <small class="text-danger mr-2 cursor-pointer">
                                                            <i class="icofont-trash"></i>
                                                        </small>
                                                        <small class="text-warning cursor-pointer" data-toggle="modal" data-target="#edit-category-{{ $category->id }}">
                                                            <i class="icofont-edit"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @include('admin.categories.partials.edit')
                                    @endforeach
                                </div>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')    