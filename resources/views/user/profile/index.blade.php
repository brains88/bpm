@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="">
                        @if(empty(auth()->user()->profile))
                            <h6 class="alert alert-info mb-4">Setup Profile details</h6>
                            <div class="p-4 card-raduis bg-white border mb-4">
                                @include('user.profile.partials.add')
                            </div>
                        @else
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <div class="position-relative bg-white d-flex justify-content-between align-items-center mb-4 p-4 border-success border-bottom">
                                        <div class="d-flex align-items-center">
                                            <div class="border border-success position-relative rounded-circle mr-2" style="width: 55px; height: 55px;">
                                                <form action="javascript:;">
                                                    <input type="file" name="image" accept="image/*" class="profile-image-input d-none" data-url="{{ route('user.image.upload', ['id' => auth()->user()->profile->id ]) }}">
                                                </form>
                                                <div class="upload-profile-image-loader d-none position-absolute rounded-circle text-center border" data-id="{{ auth()->id() }}" style="top: 50%; right: 50%; transform: translate(-50%, -50%);">
                                                    <img src="/images/spinner.svg">
                                                </div>
                                                <div class="position-absolute text-center rounded-circle bg-info cursor-pointer upload-profile-image" style="top: -3px; left: -3px; width: 20px; height: 20px; line-height: 10px; z-index: 2; border: 2px solid #fff;">
                                                    <small class="text-white tiny-font">
                                                        <small><i class="icofont-camera"></i></small>
                                                    </small>
                                                </div>
                                                @if(!empty(auth()->user()->profile->image))
                                                    <div class="position-absolute text-center rounded-circle bg-danger cursor-pointer upload-profile-image p-0 m-0" style="bottom: -3px; left: -3px; width: 20px; height: 20px; line-height: 10px; z-index: 2; border: 2px solid #fff;">
                                                        <small class="text-white tiny-font">
                                                            <small><i class="icofont-trash"></i></small>
                                                        </small>
                                                    </div>
                                                @endif
                                                <a href="{{ empty(auth()->user()->profile->image) ? 'javascript:;' : auth()->user()->profile->image }}">
                                                    <img src="{{ empty(auth()->user()->profile->image) ? '/images/profiles/avatar.jpg' : auth()->user()->profile->image }}" class="img-fluid w-100 h-100 object-cover border border-success rounded-circle profile-image-preview border">
                                                </a>
                                                    
                                            </div>
                                            <div class="">
                                                <div class="">
                                                    <small>
                                                        {{ ucwords(auth()->user()->name) }}
                                                    </small>
                                                </div>
                                                <small class="text-main-dark tiny-font">
                                                    Since {{ ucwords(auth()->user()->created_at->diffForHumans()) }}
                                                </small>
                                            </div>
                                        </div> 
                                        <div class="{{ auth()->user()->status == 'active' ? 'bg-success' : 'bg-secondary' }} text-center rounded-circle" style="width: 20px; height: 20px; line-height: 20px; z-index: 2;">
                                            <small class="text-white position-relative tiny-font" style="top: -1.5px">
                                                <i class="icofont-tick-mark"></i>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="">
                                        <h6 class="alert alert-info mb-4">Manage Profile details</h6>
                                        <div class="p-4 card-raduis bg-white border">
                                            @include('user.profile.partials.edit')
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="alert alert-info mb-4 pt-4 pb-0 position-relative icon-raduis">
                                        <?php $social = auth()->user()->social ?? ''; ?>
                                        <h6 class="bg-white p-3 mb-4 rounded d-flex justify-content-between align-items-center" style="top: -30px;">
                                            Social handles
                                            @if(!empty($social))
                                                <a href="javascript:;" class="text-underline" data-toggle="modal" data-target="#edit-social">Edit</a>
                                                @include('user.socials.partials.edit')
                                            @endif
                                        </h6>
                                        @if(empty($social))
                                            <div class="alert alert-danger mb-4">Add your social handles</div>
                                            @include('user.socials.partials.add')
                                        @else
                                            <div class="row">
                                                <?php $socials = ['facebook' => $social->facebook, 'twitter' => $social->twitter, 'linkedin' => $social->linkedin, 'whatsapp' => $social->whatsapp, 'instagram' => $social->instagram, 'youtube' => $social->youtube ?? '']; ?>
                                                @foreach($socials as $name => $link)
                                                    <div class="col-4 col-lg-2 mb-4">
                                                        @if(empty($link))
                                                            <div class="d-block border p-3 bg-light position-relative">
                                                                <img src="/images/socials/{{ $name }}.png" class="img-fluid w-100 h-100">
                                                            </div>
                                                        @else
                                                            <a href="{{ $name == 'whatsapp' ? 'tel:'.$link : $link }}" class="d-block border border-success p-3 bg-white position-relative">
                                                                <img src="/images/socials/{{ $name }}.png" class="img-fluid w-100 h-100">
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <?php $qualifications = \App\Models\Profile::$qualifications; ?>
                                        <h6 class="alert alert-warning mb-4 d-flex align-items-center justify-content-between">
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
                                                                <a href="javascript:;" data-url="{{ '' }}">
                                                                    <small class="mr-1 text-danger">
                                                                        <i class="icofont-trash"></i>
                                                                    </small>
                                                                </a>
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