@include('layouts.header')
    <div class="bg-white min-vh-100">
        @include('admin.layouts.navbar')
        <div class="section-padding">
            <div class="container">
                <div class="row flex-md-column-reverse flex-lg-row">
                    <div class="col-12 col-lg-6">
                        @if(empty($allBlogs->count()))
                            <div class="alert-info alert">No blogs yet</div>
                        @else
                            <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">
<<<<<<< HEAD
                                <a href="{{ route('admin.blogs') }}" class="text-underline">
                                    <small class="">All blogs ({{ \App\Models\Blog::count() }})</small>
                                </a>
=======
                                <small class="">All blogs ({{ \App\Models\Blog::count() }})</small>
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
                            </div>
                            <div class="row">
                                @foreach($allBlogs as $blog)
                                    <div class="col-12 col-md-6 mb-4">
                                        @include('admin.blogs.partials.card')
                                    </div>
                                    @include('admin.blogs.partials.edit')
                                @endforeach
                            </div>
                            <div class="mb-4 alert-info alert">
                                {{ $allBlogs->links('vendor.pagination.links') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-4 accordion" id="add-blog-accordion">
                            <div class="alert alert-info d-flex justify-content-between align-items-center cursor-pointer" data-toggle="collapse" data-target="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                                <small class="">Add blog</small>
                                <small class="">
                                    <i class="icofont-caret-down"></i>
                                </small>
                            </div>
                            <div id="collapse-one" class="collapse" aria-labelledby="heading-one" data-parent="#add-blog-accordion">
                                @include('admin.blogs.partials.add')
                            </div>
                        </div>
                        <div class="">
                            <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">
                                <small class="">Blog categories</small>
                                <div class="d-flex align-items-center">
                                    <div class="mr-1" style="font-size: 8px;">
                                        <i class="icofont-ui-add"></i>
                                    </div>
                                     <small class="">Add</small>
                                 </div>
                            </div>
                            @if(empty($blogCategories->count()))
                                <div class="alert alert-info">No blog categories</div>
                            @else
                                <div class="row">
                                    @foreach($blogCategories as $category)
                                        <div class="col-12 col-lg-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="javascript:;" data-toggle="modal" data-target="#add-category">
                                                        <small class="text-underline">
                                                            {{ ucwords($category->name ?? '') }}
                                                        </small>
                                                    </a>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between bg-main-dark">
                                                    <small class="text-white">
                                                        {{ $category->created_at->diffForHumans() }}
                                                    </small>
                                                    <div class="d-flex">
                                                        <small class="text-danger mr-2 cursor-pointer">
                                                            <i class="icofont-trash"></i>
                                                        </small>
                                                        <small class="text-warning cursor-pointer">
                                                            <i class="icofont-edit"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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