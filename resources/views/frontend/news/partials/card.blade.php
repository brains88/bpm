<div class="card p-0 border-0">
    <div class="row align-items-center">
        <div class="col-12 col-lg-4 mb-3">
            <a href="{{ $news['link'] }}" target="_blank" class="w-100">
                <div style="height: 180px !important;">
                    <img src="{{ $news['media'] }}" class="img-fluid object-cover border w-100 h-100" alt="{{ $news['title'] }}">
                </div>
            </a>
        </div>
        <div class="col-12 col-lg-8 mb-3">
            <div class="card-body py-md-4 py-lg-0 px-0">
                <h4 class="mb-3">
                    <a href="{{ $news['link'] }}" target="_blank" class="text-main-dark text-underline">
                        {{ \Str::limit($news['title'], 40) }}
                    </a>
                </h4>
                <div class="">
                    @if(!empty($news['author']))
                        <div class="">By {{ $news['author'] }}</div>
                    @endif
                    <div class="text-muted">
                        <small class="text-muted">
                            Published {{ date("F j, Y, g:i a", strtotime($news['published_date'])) }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>