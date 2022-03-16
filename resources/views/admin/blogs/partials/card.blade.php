<div class="card border-0">
    <div class="card-img position-relative">
        <div class="position-absolute border-top d-flex justify-content-between px-3 align-items-center" style="left: 0; bottom: 0; right: 0; z-index: 3; height: 50px; line-height: 50px; background-color: rgba(0, 0, 0, 0.4);">
            <small class="text-white">
                (1280 X 960)
            </small>
            <div class="d-flex position-relative">
                <small>
                    <i class="icofont-camera cursor-pointer text-white add-blog-image-{{ $blog->id }}" data-id="{{ $blog->id }}">
                    </i>
                </small>
            </div>
        </div>
        <form action="javascript:;">
            <input type="file" name="image" accept="image/*" class="blog-image-input-{{ $blog->id }} d-none" data-url="{{ route('blog.image.upload', ['id' => $blog->id ]) }}">
        </form>
        <div class="add-blog-image-loader-{{ $blog->id }} upload-image-loader d-none position-absolute rounded-circle text-center border" data-id="{{ $blog->id }}">
            <img src="/images/spinner.svg">
        </div>
        <div style="height: 160px;">
            <img src="{{ empty($blog->image) ? '/images/banners/holder.png' : $blog->image }}" class="img-fluid blog-image-preview-{{ $blog->id }} h-100 w-100 object-cover">
        </div>
    </div>
    <div class="card-body">
        <div class="pb-3 mb-3 border-bottom d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}" class="text-underline">
                {{ \Str::limit(strip_tags($blog->title), 10) }}
            </a>
            <div class="dropdown">
                <a href="javascript:;" class="rounded-circle d-block sm-circle bg-{{ $blog->published ? 'success' : 'danger' }} text-center" id="status-{{ $blog->id }}" data-toggle="dropdown">
                    <small class="text-white tiny-font">
                        <i class="icofont-{{ $blog->published ? 'tick-mark' : 'close' }}"></i>
                    </small>
                </a>
                <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="status-{{ $blog->id }}">
                    <form method="post" class="p-4 w-100 update-blog-status-form" action="javascript:;" style="width: 210px !important;" data-action="{{ route('blog.status.update', ['id' => $blog->id]) }}">
                        <div class="form-group">
                            <label class="form-label text-muted">Published?</label>
                            <select class="custom-select form-control status" name="status">
                                <?php $status = \App\Models\Blog::$publish; ?>
                                @empty($status)
                                    <option value="">No Status</option>
                                @else
                                    <option value="">Select option</option>
                                    @foreach ($status as $key => $value)
                                        <option value="{{ (boolean)$value }}" {{ (boolean)$blog->published == (boolean)$value ? 'selected' : '' }}>
                                            {{ ucfirst($key) }}
                                        </option>
                                    @endforeach
                                @endempty
                            </select>
                            <small class="invalid-feedback status-error"></small>
                        </div>
                        <div class="alert mb-3 update-blog-status-message d-none"></div>
                        <div class="d-flex justify-content-right mb-3 mt-1">
                            <button type="submit" class="btn btn-info btn-lg btn-block update-blog-status-button">
                                <img src="/images/spinner.svg" class="mr-2 d-none update-blog-status-spinner mb-1">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-main-dark">
                {{ number_format($blog->views ?? 0) }} views
            </small>
            <a href="{{ route('admin.blogs.category', ['categoryid' => $blog->category->id]) }}" class="text-main-dark text-underline">
                {{ ucwords(\Str::limit($blog->category->name, 5) ?? 'Nill') }}
            </a>
        </div>
    </div>
    <div class="card-footer bg-main-dark d-flex justify-content-between">
        <small class="text-white">
            {{ $blog->created_at->diffForHumans() }}
        </small>
        <div class="d-flex">
            <small class="mr-2">
                <a href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}" class=" text-warning">
                    <i class="icofont-edit"></i>
                </a>
            </small>
            <small class="text-danger cursor-pointer delete-blog" data-url='{{ route('blog.delete', ['id' => $blog->id]) }}'>
                <i class="icofont-trash"></i>
            </small>
        </div>
    </div>
</div>