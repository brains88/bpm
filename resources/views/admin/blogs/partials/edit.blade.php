<div class="modal fade" id="edit-blog-{{ $blog->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0">
            <form method="post" action="javascript:;" class="edit-blog-form" data-action="{{ route('admin.category.edit', ['id' => $blog->id]) }}" autocomplete="off">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <div class="text-smoky mb-0 font-weight-bold">Edit Category</div>
                        <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <i class="icofont-close text-danger"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="form-label text-muted">Title</label>
                            <input type="text" name="title" class="form-control title" placeholder="e.g., How to buy a home" value="{{ $blog->title ?? '' }}">
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
                                        <option value="{{ $blog->id }}" {{ $blog->id == $blog->category_id ? 'selected' : 'nill' }}>
                                            {{ ucwords($blog->name) }}
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
                                        <option value="{{ (boolean)$value }}">
                                            {{ ucfirst($key) }}
                                        </option>
                                    @endforeach
                                @endempty
                            </select>
                            <small class="invalid-feedback status-error"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Description</label>
                        <textarea class="form-control description" name="description" rows="4" placeholder="Add book description." id="blogDescription-{{ $blog->id }}">{{ $blog->description ?? '' }}</textarea>
                        <small class="invalid-feedback description-error"></small>
                    </div>
                    <div class="alert mb-3 add-blog-message d-none"></div>
                    <button type="submit" class="btn btn-lg bg-main-dark text-white add-blog-button btn-block mt-3">
                        <img src="/images/spinner.svg" class="mr-2 d-none add-blog-spinner mb-1">
                        Edit blog
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>