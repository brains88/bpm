@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content pb-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="mb-3">
                    <h4 class="text-main-dark">My Gigs (Services)</h4>
                    <div class="text-muted">Welcome  <a href="{{ route('user.profile') }}" class="text-decoration-underline">{{ auth()->user()->name }}</a>. View all your gigs here.</div>
                </div>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn-info btn text-white mb-4 icon-raduis text-decoration-none" data-toggle="modal" data-target="#create-gig">
                            <small class="mr-1">
                                <i class="icofont-plus"></i>
                            </small>
                            <div class="d-inline">Create Gig</div>
                        </a>
                    </div>
                    @include('user.gigs.partials.create')
                </div>
            </div>
            <div class="">
                @if(empty($gigs->count()))
                    <div class="alert-danger alert">You have no gigs yet</div>
                @else
                    <div class="row">
                        @foreach($gigs as $gig)
                            <div class="col-12 col-md-4 mb-4">
                                @include('user.gigs.partials.card')
                            </div>
                            @include('user.gigs.partials.edit')
                        @endforeach
                    </div>
                    {{-- {{ $gigs->links('vendor.pagination.default') }} --}}
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    