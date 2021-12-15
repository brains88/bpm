<div class="card">
	<?php $countrycode = $country->code ?? 'ng'; ?>
	<div style="height: 120px;">
		<img src="{{ env('COUNTRY_FLAG_URL') }}/h120/{{ $countrycode }}.png" class="img-fluid object-cover h-100 w-100">
	</div>
	<div class="card-body">
		<div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
			<div class="dropdown">
                <a href="javascript:;" class="text-main-dark d-flex align-items-center" data-toggle="dropdown">
                    <small>{{ ucwords($country->name ?? 'Nill') }}</small>
                    <i class="icofont icofont-caret-down"></i>
                </a>
                <div class="dropdown-menu border-0 shadow dropdown-menu-left">
                	<div class="dropdown-item">
                		<small class="text-dark">
                			{{ ucwords($country->full_name) ?? 'Nill' }}
                		</small>
                	</div>
                </div>
            </div>
            <small class="text-dark">
            	({{ $country->currency_code ?? 'Nill' }})
            </small>
		</div>
		<div class="d-flex align-items-center justify-content-between">
			<a href="{{ route('admin.properties.country', ['countryid' => $country->id]) }}" class="text-underline">
				<small class="text-dark">
	            	({{ $country->properties->count() ?? '0' }}) properties
	            </small>
            </a>
            <a href="{{ route('admin.properties.country', ['countryid' => $country->id]) }}">
            	<small class="text-dark">View </small>
            </a>  
		</div>
	</div>
	<div class="card-footer d-flex justify-content-between align-items-center bg-main-dark">
		<small class="text-white">
			{{ $country->created_at }}
		</small>
		<a href="{{ '' }}">
			<small class="text-warning">
				<i class="icofont-edit"></i>
			</small>
		</a>
	</div>
</div>