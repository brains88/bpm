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
            <div class="custom-control custom-switch p-0">
                <input class="custom-control-input blog-status m-0" type="checkbox" data-url='{{ route('blog.status', ['id' => $blog->id]) }}' id="status-{{ $blog->id }}" {{ $blog->published ? 'checked' : '' }} data-status="{{ $blog->published }}">
                <label class="custom-control-label" for="status-{{ $blog->id }}"></label>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <small class="bg-info px-3 rounded-pill">
                <small class="text-white tiny-font">
                    {{ number_format($blog->views ?? 0) }} views
                </small>
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
                <a href="javascript:;" class=" text-warning" data-toggle="modal" data-target="#edit-blog-{{ $blog->id }}">
                    <i class="icofont-edit"></i>
                </a>
            </small>
            <small class="text-danger cursor-pointer delete-blog" data-url='{{ route('blog.delete', ['id' => $blog->id]) }}'>
                <i class="icofont-trash"></i>
            </small>
        </div>
    </div>
</div>