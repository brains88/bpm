<div class="card p-0 bg-transparent">
    <div class="">
        <a href="{{ route('blog.read', ['id' => $blog->id, 'slug' => \Str::slug(strtolower($blog->title))]) }}" class="w-100">
            <div style="height: 160px !important;">
                <img src="{{ $blog->image ?? '' }}" class="img-fluid object-cover rounded border w-100 h-100" alt="{{ $blog['title'] }}">
            </div>
        </a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('blog.read', ['id' => $blog->id, 'slug' => \Str::slug(strtolower($blog->title))]) }}" class="text-main-dark text-underline">
                {{ \Str::limit(ucwords($blog->title), 55) }}
            </a>
        </div>
        <div class="">
            <div class="">
                <small class="text-muted">
                    Published {{ $blog->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
    </div>
</div>