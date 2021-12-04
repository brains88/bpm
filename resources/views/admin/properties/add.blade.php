@include('layouts.header')
<div class="bg-alabaster min-vh-100">
    @include('admin.partials.navbar')
    <div class="section-padding">
        <div class="container">
            <div class="alert alert-info mb-4">Add Properties Below</div>
            @if(empty($propertyCategories))
                <div class="alert alert-danger">No Property Categoies. Please <a href="{{ route('admin.property.categories') }}">Click Here</a> to Add a Category</div>
            @else
                <div class="row">
                    <div class="col-6 col-md-3 mb-4">
                        <a class="btn btn-block bg-main-dark rounded-0" href="javascript:;">
                            <div class="d-flex align-items-center justify-content-center">
                                <small class="text-white mb-1 mr-2" style="font-size: 10px !important;">
                                    <i class="icofont-plus"></i>
                                </small>
                                <small class="text-white">Land</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <a class="btn btn-block bg-main-dark rounded-0" href="javascript:;">
                            <div class="d-flex align-items-center justify-content-center">
                                <small class="text-white mb-1 mr-2" style="font-size: 10px !important;">
                                    <i class="icofont-plus"></i>
                                </small>
                                <small class="text-white">Commercial</small>
                            </div>  
                        </a>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <a class="btn btn-block bg-main-dark rounded-0" href="javascript:;">
                            <div class="d-flex align-items-center justify-content-center">
                                <small class="text-white mb-1 mr-2" style="font-size: 10px !important;">
                                    <i class="icofont-plus"></i>
                                </small>
                                <small class="text-white">Industrial</small>
                            </div>  
                        </a>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <a class="btn btn-block bg-main-dark rounded-0" href="javascript:;">
                            <div class="d-flex align-items-center justify-content-center">
                                <small class="text-white mb-1 mr-2" style="font-size: 10px !important;">
                                    <i class="icofont-plus"></i>
                                </small>
                                <small class="text-white">Residential</small>
                            </div>  
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')    