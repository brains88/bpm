<form method="post" action="javascript:;" class="add-blog-form rounded p-3 border-dark-500" data-action="{{ route('admin.blog.store'); }}" style="background-color: rgba(0, 0, 0, 0.5);" autocomplete="off">
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
            <textarea class="form-control description" name="description" rows="4" placeholder="Add book description." id="description"></textarea>
        </div>
        <small class="invalid-feedback description-error"></small>
    </div>
    <div class="alert mb-3 add-blog-message d-none"></div>
    <button type="submit" class="btn btn-lg btn-info text-white add-blog-button mt-3">
        <img src="/images/spinner.svg" class="mr-2 d-none add-blog-spinner mb-1">
        Post
    </button>
</form>