@include('layouts.header')
    <div class="min-vh-100 bg-main-ash">
        @include('admin.layouts.navbar')
        <div class="section-padding pb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-9 mb-4">
                        <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">Add Blog</div>
                        <div class="bg-white p-4 card-raduis shadow-sm">
                            <form method="post" action="javascript:;" class="add-blog-form" data-action="{{ route('blog.store'); }}" autocomplete="off">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="form-label text-muted">Title</label>
                                        <input type="text" name="title" class="form-control title" placeholder="e.g., How to buy a home">
                                        <small class="invalid-feedback title-error"></small>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label text-muted">Category</label>
                                        <select class="custom-select form-control category" name="category">
                                            <option value="">Select Category</option>
                                            @empty($categories->count())
                                                <option value="">No Categories</option>
                                            @else
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ ucwords($category->name) }}
                                                    </option>
                                                @endforeach
                                            @endempty
                                        </select>
                                        <small class="invalid-feedback category-error"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label text-muted">Publish now?</label>
                                        <select class="custom-select form-control istatus" name="status">
                                            <?php $status = \App\Models\Blog::$publish; ?>
                                            @empty($status)
                                                <option>No Status</option>
                                            @else
                                                @foreach ($status as $key => $value)
                                                    <option value="{{ (boolean)$value }}">
                                                        {{ ucfirst($key) }}
                                                    </option>
                                                @endforeach
                                            @endempty
                                        </select>
                                        <small class="invalid-feedback status-error"></small>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="text-muted">Description</label>
                                    <div class="bg-white">
                                        <textarea class="form-control description" name="description" rows="4" placeholder="Add book description" id="description"></textarea>
                                    </div>
                                    <small class="invalid-feedback description-error"></small>
                                </div>
                                <div class="alert mb-3 add-blog-message d-none"></div>
                                <button type="submit" class="btn btn-lg btn-info text-white add-blog-button mt-3 px-4">
                                    <img src="/images/spinner.svg" class="mr-2 d-none add-blog-spinner mb-1">
                                    Post
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="alert alert-info d-flex align-items-center justify-content-between mb-4">Recent Blogs</div>
                        <div class="rows">
                            @if(empty($blogs->count()))
                                <div class="alert alert-danger mb-4">No Recent Blogs</div>
                            @else
                                <div class="row">
                                    @foreach($blogs as $blog)
                                        <div class="col-12 col-md-4 col-lg-12 mb-4">
                                            @include('admin.blogs.partials.card')
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