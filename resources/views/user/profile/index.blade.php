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
                                    <div class="position-relative bg-info mb-4 px-4" style="border-bottom-right-radius: 25px; border-bottom-left-radius: 25px;">
                                        <div class="d-flex">
                                            <div class="position-relative rounded-circle mr-3" style="width: 70px; height: 70px; top: -20px;">
                                                <a href="{{ empty(auth()->user()->profile->image) ? 'javascript:;' : auth()->user()->profile->image }}">
                                                    <img src="{{ empty(auth()->user()->profile->image) ? '/images/profiles/avatar.jpg' : auth()->user()->profile->image }}" class="img-fluid w-100 h-100 object-cover border border-info rounded-circle profile-image-preview border">
                                                </a>
                                                <div class="upload-profile-image-loader d-none position-absolute" data-id="{{ auth()->id() }}" style="top: 30%; right: 35%;">
                                                    <img src="/images/spinner.svg" class="position-relative">
                                                </div>
                                            </div>
                                            <div class="text-center d-flex align-items-center position-relative   cursor-pointer" style="top: -35px;">
                                                <small class="upload-profile-image text-white mr-3 tiny-font rounded-circle bg-success border" style="width: 25px; height: 25px; line-height: 25px;">
                                                    <i class="icofont-camera"></i>
                                                </small>
                                                @if(!empty(auth()->user()->profile->image))
                                                    <small class="btn btn-sm btn-danger tiny-font px-4 py-1 rounded-pill delete-profile-image" data-url="{{ route('user.profile.image.remove', ['id' => auth()->user()->profile->id]) }}" data-message="Are you sure to remove your profile image?">
                                                        Remove
                                                    </small>
                                                @endif
                                            </div> 
                                        </div>
                                        <div class="">
                                            <form action="javascript:;">
                                                {{-- <input type="file" name="image" accept="image/*" class="profile-image-input d-none" data-url="{{ route('user.profile.image.upload', ['id' => auth()->user()->profile->id ]) }}"> --}}
                                            </form>
                                        </div>
                                        <div class="pb-5">
                                            <h5 class="text-main-dark mb-3">
                                                {{ ucwords(auth()->user()->name) }}
                                            </h5>
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="d-flex align-items-center">
                                                    <small class="text-white mr-3 rounded-pill tiny-font px-4 py-1 border">
                                                        {{ ucwords(auth()->user()->created_at->diffForHumans()) }}
                                                    </small>
                                                    <small class="text-white mr-3 rounded-pill tiny-font px-4 py-1 border">
                                                        {{ ucwords(auth()->user()->profile->designation) }}
                                                    </small>
                                                </div>
                                                <div class="{{ auth()->user()->status == 'active' ? 'bg-success' : 'bg-secondary' }} text-center border rounded-circle" style="width: 25px; height: 25px; line-height: 20px;">
                                                    <small class="text-white position-relative tiny-font">
                                                        <i class="icofont-tick-mark"></i>
                                                    </small>
                                                </div>
                                            </div>        
                                        </div>   
                                    </div>
                                    @if(auth()->user()->profile->role == 'artisan')
                                        @if(auth()->user()->gigs()->exists())
                                            <div class="d-flex flex-wrap alert alert-info pt-4 icon-raduis border-info border border mb-4">
                                                @foreach(auth()->user()->gigs as $gig)
                                                    <div class="mr-2 mb-4 position-relative">
                                                        <small class="px-3 py-1 border-info border bg-white text-main-dark rounded-pill">
                                                            {{ ucfirst($gig->service->name) }}
                                                        </small>
                                                    </div>
                                                @endforeach
                                            </div>   
                                        @endif
                                    @endif
                                    <div class="">
                                        <div class="">
                                            <h6 class="alert m-0 d-flex justify-content-between cursor-pointer alert-info" data-toggle="collapse" data-target="#edit-profile-dion" aria-expanded="false" aria-controls="edit-profile-dion">
                                                <span>Manage Profile details</span>
                                                <span>
                                                    <i class="icofont-caret-down"></i>
                                                </span>
                                            </h6>
                                        </div>
                                        <div class="collapse show" id="edit-profile-dion">
                                            <div class="p-4 mt-4 card-raduis bg-white border">
                                                @include('user.profile.partials.edit')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="alert alert-info mb-4 pt-4 pb-0 position-relative icon-raduis">
                                        <?php $social = auth()->user()->social ?? ''; ?>
                                        @if(!empty($social))
                                            <div class="alert alert-danger mb-4">Add your social handles</div>
                                            @include('user.socials.partials.add')
                                        @else
                                            <h6 class="bg-white p-3 mb-4 rounded d-flex justify-content-between align-items-center" style="top: -30px;">
                                                Social handles
                                                @if(!empty($social))
                                                    <a href="javascript:;" class="text-underline" data-toggle="modal" data-target="#edit-social">Edit</a>
                                                    @include('user.socials.partials.edit')
                                                @endif
                                            </h6>
                                            <div class="row">
                                                <?php $socials = ['facebook' => $social->facebook, 'twitter' => $social->twitter, 'linkedin' => $social->linkedin, 'whatsapp' => $social->whatsapp, 'instagram' => $social->instagram, 'youtube' => $social->youtube ?? '']; ?>
                                                @foreach($socials as $name => $link)
                                                    <div class="col-3 col-lg-2 mb-4">
                                                        @if(empty($link))
                                                            <div class="d-block border p-2 bg-light position-relative">
                                                                <img src="/images/socials/{{ $name }}.png" class="img-fluid w-100 h-100">
                                                            </div>
                                                        @else
                                                            <a href="{{ $name == 'whatsapp' ? 'tel:'.$link : $link }}" class="d-block border border-info p-2 bg-white position-relative">
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