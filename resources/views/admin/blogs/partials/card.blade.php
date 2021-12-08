<div class="card">
    <div class="card-img position-relative">
        <div class="position-absolute d-flex justify-content-between px-3 align-items-center" style="left: 0; bottom: 0; right: 0; z-index: 3; height: 50px; line-height: 50px; background-color: rgba(0, 0, 0, 0.4);">
            <div class="text-white">(1260 x 960)</div>
            <div class="d-flex position-relative">
                <small>
                    <i class="icofont-camera cursor-pointer text-white add-blog-image-{{ $blog->id }}" data-id="{{ $blog->id }}">
                    </i>
                </small>
            </div>
        </div>
        <form action="javascript:;">
            @csrf
            <input type="file" name="image" accept="image/*" class="blog-image-input-{{ $blog->id }}" style='display: none;' data-url="{{ route('blog.image.upload', ['id' => $blog->id ]) }}">
        </form>
        <div class="add-blog-image-loader-{{ $blog->id }} d-none position-absolute p-3 rounded-circle text-center border" style="bottom: 50%; right: 50%; z-index: 4; transform: translate(50%, 50%); background-color: rgba(0, 0, 0, 0.75); width: 70px; height: 70px; line-height: 35px;" data-id="{{ $blog->id }}">
            <img src="/images/spinner.svg">
        </div>
        <div style="height: 210px;">
            <img src="{{ empty($blog->image) ? 'https://picsum.photos/1260/960?random'.rand(25434, 90920) : $blog->image }}" class="img-fluid blog-image-preview-{{ $blog->id }} h-100 w-100 object-fit-cover">
        </div>
    </div>
    <div class="card-body">
        <div class="pb-3 mb-3 border-bottom d-flex justify-content-between align-items-center">
            <a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="text-muted">
                {{ \Str::limit(strip_tags($blog->description), 20) }}
            </a>
            <div class="text-muted">
                {{ number_format($blog->views) }} Views
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted">
                {{ ucfirst($blog->category->name ?? 'Nill') }}
            </div>
            <div class="custom-control custom-switch">
                <input class="custom-control-input blog-status" type="checkbox" data-url='{{ route('blog.status', ['id' => $blog->id]) }}' id="status-{{ $blog->id }}" {{ $blog->published ? 'checked' : '' }} data-status="{{ $blog->published }}">
                <label class="custom-control-label" for="status-{{ $blog->id }}"></label>
            </div>
        </div>
    </div>
    <div class="card-footer bg-main-dark d-flex justify-content-between">
        <small class="text-white">
            {{ date('jS F Y', strtotime($blog->created_at)) }}
        </small>
        <div class="d-flex">
            <small class="mr-2">
                <a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class=" text-warning">
                    <i class="icofont-edit"></i>
                </a>
            </small>
            <small class="text-danger cursor-pointer delete-blog" data-url='{{ route('blog.delete', ['id' => $blog->id]) }}'>
                <i class="icofont-trash"></i>
            </small>
        </div>
    </div>
</div>