@include('layouts.header')
    <div class="min-vh-100 bg-main-ash">
        @include('admin.layouts.navbar')
        <div class="section-padding pb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8 mb-4">
                        <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">
                            <span class="">
                                ({{ \App\Models\Blog::count() }}) Blogs
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
                    <div class="col-12 col-lg-4">
                        <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">
                            <span class="">Blog Categories</span>
                            <div class="cursor-pointer" data-toggle="modal" data-target="#add-category">
                                <i class="icofont-plus"></i>
                             </div>
                        </div>
                        <div class="">
                            @include('admin.categories.partials.add')
                            @if(empty($categories->count()))
                                <div class="alert alert-info">No blog categories</div>
                            @else
                                <div class="row">
                                    @foreach($categories as $category)
                                        <div class="col-6 col-md-4 col-lg-6 mb-4">
                                            <div class="card border-0 shadow-sm icon-raduis">
                                                <div class="card-body d-flex align-items-center justify-content-between">
                                                    <a href="javascript:;" data-toggle="modal" data-target="#edit-category-{{ $category->id }}" class="text-underline mr-2">
                                                        {{ ucwords(\Str::limit($category->name ?? '', 6)) }}
                                                    </a>
                                                    <small class="text-main-dark">
                                                        ({{ $category->blogs()->count() }})
                                                    </small>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between bg-main-dark">
                                                    <div class="d-flex">
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