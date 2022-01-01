@include('layouts.header')
<div class="bg-alabaster min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            @if(empty($property))
                <div class="alert alert-danger">Property not found. May have been deleted.</div>
            @else
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="alert alert-info mb-4 d-flex align-items-center">
                            <a href="{{ route('admin.properties') }}" class="mr-2">
                                <i class="icofont-long-arrow-left"></i>
                            </a>
                            <small>Manage property images</small>
                        </div>
                        <div class="">
                            <div class="position-relative card mb-4">
                                <small class="card-header bg-light">Main property view</small>
                                <form action="javascript:;">
                                    <input type="file" name="image" accept="image/*" class="main-property-image-input-{{ $property->id }}" data-url="{{ route('admin.property.image.upload', ['id' => $property->id, 'role' => 'main' ]) }}" style="display: none;">
                                </form>
                                <div class="main-property-image-loader-{{ $property->id }} upload-image-loader  position-absolute d-none rounded-circle text-center border" data-id="{{ $property->id}}">
                                    <img src="/images/spinner.svg">
                                </div>
                                <?php $imagelink = empty($property->image) ? '/images/banners/holder.png' : $property->image; ?>
                                <div class="bg-dark" style="height: 260px;">
                                    <a href="{{ $imagelink }}" class="text-main-dark">
                                        <img src="{{ $imagelink }}" class="img-fluid main-property-image-preview-{{ $property->id }} h-100 w-100 object-cover">
                                    </a>
                                </div>
                                <div class=" card-footer d-flex align-items-center justify-content-between">
                                    <small class="mt-2 add-main-property-image-{{ $property->id }} cursor-pointer text-main-dark" data-id="{{ $property->id }}">
                                        <i class="icofont-camera"></i>
                                    </small>
                                    <a class="text-decoration-none" href="{{ $imagelink }}">
                                        <i class="icofont-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <?php $total = 3; ?> {{--  Equivalent to 4 --}}
                            @if(!empty($total))
                                <div class="row">
                                    @for($key = 0; $key <= $total; $key++)
                                        <?php $imageid = $property->images[$key]->id ?? 'create-'.$key; ?>
                                        <div class="col-6 mb-4">
                                            <div class="w-100 position-relative card">
                                                <small class="card-header bg-light">View ({{ $key + 1 }})</small>
                                                <form action="javascript:;">
                                                    <input type="file" name="image" accept="image/*" class="other-property-image-input-{{ $imageid }}" data-url="{{ route('admin.property.image.upload', ['id' => $property->id, 'role' => $imageid ]) }}" style="display: none;">
                                                </form>
                                                <div class="other-property-image-loader-{{ $imageid }} upload-image-loader  position-absolute d-none rounded-circle text-center border">
                                                    <img src="/images/spinner.svg">
                                                </div>
                                                <div class="bg-dark" style="height: 140px;">
                                                    <?php $imagelink = isset($property->images[$key]->link) ? $property->images[$key]->link  : '/images/banners/holder.png'; ?>
                                                    <a href="{{ $imagelink }}" class="text-main-dark">
                                                        <img src="{{ $imagelink }}" class="img-fluid other-property-image-preview-{{ $imageid }} h-100 w-100 object-cover">
                                                    </a>
                                                </div>
                                                <div class=" card-footer d-flex justify-content-between align-items-center">
                                                    <small class="add-other-property-image-{{ $imageid }} cursor-pointer text-main-dark" data-id="{{ $imageid }}">
                                                        <i class="icofont-camera"></i>
                                                    </small>
                                                    <a class="text-decoration-none" href="{{ $imagelink }}">
                                                        <i class="icofont-long-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-7 mb-4">
                        <div class="accordion" id="edit-property-form-accordion">
                            <div class="">
                                <div id="heading-one" data-toggle="collapse" data-target="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                                    <div class="alert alert-info d-flex justify-content-between align-items-center cursor-pointer mb-4">
                                        <small>Edit main property details</small>
                                        <small>
                                            <i class="icofont-caret-down"></i>
                                        </small>
                                    </div>
                                </div>
                                <div id="collapse-one" class="collapse show" aria-labelledby="heading-one" data-parent="#edit-property-form-accordion">
                                    @include('admin.properties.forms.edit')
                                </div>
                            </div>
                        </div>                   
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')    