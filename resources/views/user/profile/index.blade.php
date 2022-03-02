@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="">
                        {{-- {{ dd(auth()->user()->profile) }} --}}
                        @if(empty(auth()->user()->profile))
                            <h6 class="alert alert-info mb-4">Setup Profile details</h6>
                            <div class="p-4 card-raduis bg-white border mb-4">
                                @include('user.profile.partials.add')
                            </div>
                        @else
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <h6 class="alert alert-info mb-4">Manage Profile details</h6>
                                    <div class="p-4 card-raduis bg-white border">
                                        @include('user.profile.partials.edit')
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="">
                                        <h6 class="alert alert-info mb-4">Social handles</h6>
                                        <?php $social = auth()->user()->social ?? ''; ?>
                                        @if(empty($social))
                                            <div class="alert alert-danger mb-4">Add your social handles</div>
                                            @include('user.socials.partials.add')
                                        @else
                                            <div class="row">
                                                <?php $socials = ['facebook' => $social->facebook, 'twitter' => $social->twitter, 'linkedin' => $social->linkedin, 'whatsapp' => $social->whatsapp, 'instagram' => $social->instagram, 'youtube' => $social->youtube ?? '']; ?>
                                                @foreach($socials as $name => $link)
                                                    <div class="col-3 col-lg-2 mb-4">
                                                        <a href="{{ $link }}" class="d-block border p-3 bg-white">
                                                            <img src="/images/socials/{{ $name }}.png" class="img-fluid w-100 h-100">
                                                        </a>
                                                    </div>
                                                @endforeach
                                                {{-- <div class="col-3 mb-4">
                                                    <a href="{{ $social->instagram }}" class="d-block border p-3 bg-white">
                                                        <img src="/images/socials/instagram.png" class="img-fluid w-100 h-100">
                                                    </a>
                                                </div> --}}
                                                {{-- <div class="col-3 mb-4">
                                                    <a href="{{ $social->twitter }}" class="d-block border p-3 bg-white">
                                                        <img src="/images/socials/twitter.png" class="img-fluid w-100 h-100">
                                                    </a>
                                                </div>
                                                <div class="col-3 mb-4">
                                                    <a href="{{ $social->linkedin }}" class="d-block border p-3 bg-white">
                                                        <img src="/images/socials/linkedin.png" class="img-fluid w-100 h-100">
                                                    </a>
                                                </div>
                                                <div class="col-3 mb-4">
                                                    <a href="{{ $social->linkedin }}" class="d-block border p-3 bg-white">
                                                        <img src="/images/socials/linkedin.png" class="img-fluid w-100 h-100">
                                                    </a>
                                                </div>
                                                <div class="col-3 mb-4">
                                                    <a href="{{ $social->linkedin }}" class="d-block border p-3 bg-white">
                                                        <img src="/images/socials/linkedin.png" class="img-fluid w-100 h-100">
                                                    </a>
                                                </div> --}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <?php $qualifications = \App\Models\Profile::$qualifications; ?>
                                        <h6 class="alert alert-info mb-4 d-flex align-items-center justify-content-between">
                                            <span>Certifications list</span>
                                            <a href="javascript:;" data-toggle="modal" data-target="#add-certification">Add</a>
                                        </h6>
                                        @if(auth()->user()->certifications()->exists())
                                            <?php $certifications = auth()->user()->certifications; ?>
                                            <div class="row">
                                                @foreach($certifications as $certificate)
                                                    <div class="col-12 col-lg-6 mb-4">
                                                        <div class="card border-0 shadow">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <a href="javascript:;" data-target="#edit-certification-{{ $certificate->id }}" data-toggle="modal">
                                                                        <small class="text-main-dark text-underline">
                                                                            {{ \Str::limit($qualifications[$certificate->qualification], 14) }}
                                                                        </small>
                                                                    </a>
                                                                    <a href="javascript:;" data-target="#edit-certification-{{ $certificate->id }}" data-toggle="modal">
                                                                        <small class="text-main-dark text-underline">
                                                                            {{ $certificate->year }}
                                                                        </small>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-main-dark d-flex align-items-center justify-content-between">
                                                            <small class="text-white">
                                                                {{ $certificate->created_at->diffForHumans() }}
                                                            </small>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:;" data-target="#edit-certification-{{ $certificate->id }}" data-toggle="modal">
                                                                    <small class="mr-1 text-warning">
                                                                        <i class="icofont-edit"></i>
                                                                    </small>
                                                                </a>
                                                                <small class="mr-1 text-danger">
                                                                    <i class="icofont-trash"></i>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @include('user.certifications.partials.edit')
                                                @endforeach
                                            </div>   
                                        @else
                                            <div class="alert alert-danger">No certifications. <a href="javascript:;" data-toggle="modal" data-target="#add-certification">Add certificate</a></div>
                                        @endif
                                        @include('user.certifications.partials.add')
                                    </div>
                                </div>
                            </div>   
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    