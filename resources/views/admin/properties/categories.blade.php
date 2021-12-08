@include('layouts.header')
<div class="bg-alabaster min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent rounded-0" href="javascript:;" data-toggle="modal" data-target="#add-category">
                        <small class="text-main-dark">Add Category</small>
                    </a>
                    @include('admin.properties.create')
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent rounded-0" href="javascript:;" data-toggle="modal" data-target="#add-subcategory">
                        <small class="text-main-dark">Add Subcategory</small>
                    </a>
                    @include('admin.subcategories.partials.add')
                </div>
            </div>
            <div class="">
                @if(empty($propertiesCategories->count()))
                    <div class="alert-info alert">No properties categories yet</div>
                @else
                    <div class="accordion" id="properties-categories-accordion">
                        <?php $count = 0; ?>
                        @foreach($propertiesCategories as $category)
                            <?php $count++; ?>
                            <div class="card border mb-4 px-4 pt-4 shadow-sm rounded">
                                <div class="card-header p-0" id="heading-{{ $category->id }}">
                                    <a href="javascript:;" class="bg-main-dark p-3 d-block border-bottom-dark-500" data-toggle="collapse" data-target="#collapse-{{ $category->id }}" aria-expanded="true" aria-controls="collapse-{{ $category->id }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-white">
                                                {{ ucwords($category->name ?? '') }}
                                            </span>
                                            <div class="text-white">
                                                ({{ $category->properties->count() }} Properties)
                                            </div>
                                        </div>
                                    </a>      
                                </div>
                                <div id="collapse-{{ $category->id }}" class="collapse show mt-4" aria-labelledby="heading-{{ $category->id }}" data-parent="#properties-categories-accordion">
                                    @if(empty($category->subcategories->count()))
                                        <div class="alert alert-info mb-4">No {{ ucwords($category->name) }} Subcategories Yet</div>
                                    @else
                                    <div class="alert alert-info mb-4">{{ ucwords($category->name) }} Subcategories</div>
                                        <div class="row">
                                            @foreach($category->subcategories as $sub)
                                                <div class="col-12 col-md-4 col-lg-3 mb-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <a href="javascript:;" class="text-primary text-underline" data-toggle="modal" data-target="#edit-subcategory-{{ $sub->id }}">
                                                                {{ ucwords($sub->name ?? 'Nill') }}
                                                            </a>
                                                        </div>
                                                        <div class="card-footer d-flex justify-content-between bg-dark">
                                                            <small class="text-white">
                                                                {{ $sub->created_at->diffForHumans() }}
                                                            </small>
                                                            <div class="d-flex">
                                                                <small class="text-danger mr-2 cursor-pointer">
                                                                    <i class="icofont-trash"></i>
                                                                </small>
                                                                <small class="text-warning cursor-pointer" data-toggle="modal" data-target="#edit-subcategory-{{ $sub->id }}">
                                                                    <i class="icofont-edit"></i>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @include('admin.subcategories.partials.edit')
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif   
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    