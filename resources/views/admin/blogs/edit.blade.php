@include('layouts.header')
<div class="bg-white min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding min-vh-100">
        <div class="container pb-4">
            <div class="row">
                <div class="col-12 col-lg-8 mb-4">
                    <div class="alert alert-info d-flex justify-content-between align-items-center">
                        <div class="text-muted mb-0">Edit Blog ({{ $articleid ?? 0 }})</div>
                        <a href="{{ route('admin.blogs') }}" class="text-muted text-underline mb-0">All Blogs</a>
                    </div>
                    @if(empty($singleBlog))
                        <div class="alert alert-danger">Unknown error. Blog post not found.</div>
                    @else
                        <form method="post" action="javascript:;" class="add-blog-form" data-action="{{ route('admin.blog.update', ['id' => $blogid]); }}" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label class="form-label text-muted">Title</label>
                                    <input type="text" name="title" class="form-control title" placeholder="e.g., How to buy a home" value="{{ $singleBlog->title ?? '' }}">
                                    <small class="invalid-feedback title-error"></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-label text-muted">Category (<a href="{{ url('/categories'); }}" target="_blank">Add Category</a>)</label>
                                    <select class="custom-select form-control category" name="category">
                                        <option value="">Select Category</option>
                                        @empty($blogCategories->count())
                                            <option value="">No Categories</option>
                                        @else
                                            @foreach ($blogCategories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $singleBlog->category_id ? 'selected' : 'nill' }}>
                                                    {{ ucwords($category->name) }}
                                                </option>
                                            @endforeach
                                        @endempty
                                    </select>
                                    <small class="invalid-feedback category-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label text-muted">Publish Now?</label>
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
                                <textarea class="form-control description" name="description" rows="4" placeholder="Add book description." id="blogDescription">{{ $singleBlog->description ?? '' }}</textarea>
                                <small class="invalid-feedback description-error"></small>
                            </div>
                            <div class="alert mb-3 add-blog-message d-none"></div>
                            <button type="submit" class="btn btn-lg bg-main-dark text-white add-blog-button btn-block mt-3">
                                <img src="/images/spinner.svg" class="mr-2 d-none add-blog-spinner mb-1">
                                Edit blog
                            </button>
                        </form>
                    @endif
                </div>
                <div class="col-12 col-lg-4">
                    <div class="alert alert-info">Latest Blogs</div>
                    @empty($latestBlogs->count())
                        <div class="alert alert-danger">No Blogs Yet</div>
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
@include('layouts.footer')