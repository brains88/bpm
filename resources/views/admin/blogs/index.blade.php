@include('layouts.header')
    <div class="bg-white min-vh-100">
        @include('admin.layouts.navbar')
        <div class="section-padding">
            <div class="container">
                <div class="nav nav-pills row" id="pills-tab" role="tablist">
                    <div class="nav-item col-6 col-md-3 col-lg-2 mb-4" role="presentation">
                        <a class="nav-link text-center active border-main-dark bg-transparent" id="pills-blogs-tab" data-toggle="pill" href="#pills-blogs" role="tab" aria-controls="pills-blog-listings" aria-selected="true">
                            <small class="text-dark">All blogs ({{ \App\Models\Blog::count() }})</small>
                        </a>
                    </div>
                    <div class="nav-item col-6 col-md-3 col-lg-2 mb-4" role="presentation">
                        <a class="nav-link text-center border-main-dark bg-transparent" id="pills-add-blog-tab" data-toggle="pill" href="#pills-add-blog" role="tab" aria-controls="pills-add-blog" aria-selected="false">
                            <small class="text-dark">Add blog</small>
                        </a>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-blogs" role="tabpanel" aria-labelledby="pills-blogs-tab">
                        @if(empty($allBlogs->count()))
                            <div class="alert-info alert">No blogs yet</div>
                        @else
                            <div class="row">
                                @foreach($allBlogs as $blog)
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        @include('admin.blogs.partials.card')
                                    </div>
                                    @include('admin.blogs.partials.edit')
                                @endforeach
                            </div>
                            <div class="mb-4">
                                {{ $allBlogs->links('vendor.pagination.links') }}
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="pills-add-blog" role="tabpanel" aria-labelledby="pills-add-blog-tab">
                        <div class="row">
                            <div class="col-12 col-lg-8 mb-4">
                                <div class="alert alert-info d-flex justify-content-between align-items-center">
                                    <div class="text-muted mb-0">Add blog</div>
                                    <a href="{{ route('admin.blogs') }}" class="text-muted text-underline mb-0">All blogs</a>
                                </div>
                                <form method="post" action="javascript:;" class="add-blog-form" data-action="{{ route('admin.blog.store'); }}" autocomplete="off">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="form-label text-muted">Title</label>
                                            <input type="text" name="title" class="form-control title" placeholder="e.g., How to buy a home">
                                            <small class="invalid-feedback title-error"></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label text-muted">Category (<a href="{{ url('/categories'); }}" target="_blank">Add category</a>)</label>
                                            <select class="custom-select form-control category" name="category">
                                                <option value="">Select Category</option>
                                                @empty($blogCategories->count())
                                                    <option value="">No Categories</option>
                                                @else
                                                    @foreach ($blogCategories as $category)
                                                        <option value="{{ $category->id; }}">
                                                            {{ ucwords($category->name) }}
                                                        </option>
                                                    @endforeach
                                                @endempty
                                            </select>
                                            <small class="invalid-feedback category-error"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label text-muted">Publish now?</label>
                                            <select class="custom-select form-control status" name="status">
                                                <?php $publishStatus = \App\Models\Blog::$publish; ?>
                                                @empty($publishStatus)
                                                    <option value="">No Status</option>
                                                @else
                                                    @foreach ($publishStatus as $key => $value)
                                                        <option value="{{ (boolean)$value; }}">
                                                            {{ ucfirst($key); }}
                                                        </option>
                                                    @endforeach
                                                @endempty
                                            </select>
                                            <small class="invalid-feedback status-error"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted">Description</label>
                                        <textarea class="form-control description" name="description" rows="4" placeholder="Add book description." id="blogDescription"></textarea>
                                        <small class="invalid-feedback description-error"></small>
                                    </div>
                                    <div class="alert mb-3 add-blog-message d-none"></div>
                                    <button type="submit" class="btn btn-lg bg-main-dark text-white add-blog-button btn-block mt-3">
                                        <img src="/images/spinner.svg" class="mr-2 d-none add-blog-spinner mb-1">
                                        Add blog
                                    </button>
                                </form>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="alert alert-info">Latest blogs</div>
                                @empty($latestBlogs->count())
                                    <div class="alert alert-danger">No blogs yet</div>
                                @else
                                    <div class="row">
                                        @foreach ($latestBlogs as $blog)
                                            <div class="col-12 col-md-6 col-lg-12 mb-4">
                                                @include('admin.blogs.partials.card')
                                            </div>
                                        @endforeach
                                    </div>
                                @endempty 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')    