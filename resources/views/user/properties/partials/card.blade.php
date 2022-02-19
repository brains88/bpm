<div class="card border-0 position-relative">
	<div class="position-absolute" style="top: 16px; left: 16px; z-index: 2;">
		<div class="dropdown">
            <a href="javascript:;" class="align-items-center d-flex text-decoration-none
            " id="promote-{{ $property->id }}" data-toggle="dropdown">
                <small class="{{ $property->promoted ? 'bg-success' : 'bg-dark' }} rounded px-2">
                	<small class="text-white">
                		{{ $property->promoted ? 'Promoted' : 'Promote' }}
                		<i class="icofont icofont-caret-down"></i>
                	</small>
                </small>
            </a>
            <div class="dropdown-menu border-0 shadow dropdown-menu-left" aria-labelledby="promote-{{ $property->id }}" style="width: 210px !important;">
            	@if($property->promoted)
	            	<?php 
			            $status = strtolower($property->promoted->status ?? ''); 
			            $expiry = empty($property->promoted->expiry) ? null : $property->promoted->expiry;
			            $remainingdays = (\Carbon\Carbon::parse($expiry))->diffInDays(\Carbon\Carbon::today());
			            $duration = empty($property->promoted->duration) ? 1 : (int)$property->promoted->duration;
			            $fraction = $duration > $remainingdays ? ($remainingdays/$duration) : 0;
			            $progress = (100 - round($fraction * 100));  
			        ?>
            		<div class="px-3 py-1 w-100">
            			<div class="d-flex">
            				<div class="mr-2">
					            <small class="text-{{ $progress <= 90 ? 'success' : 'danger' }}">
					                ({{ $progress <= 0 ? 1 : $progress }}%)
					            </small>
					        </div>
	            	 		<div class="">
	            	 			<small class="">
				                    {{ $remainingdays }} day(s) left
				                </small>
	            	 		</div>
            			</div>
            		</div>
            	@else
	            	<form method="post" action="javascript:;" class="promote-property-form p-3 w-100" data-action="{{ route('user.property.promote', ['id' => $property->id]) }}" autocomplete="off">
	            		<?php $credits = auth()->user()->credits()->where(['status' => 'paused'])->get(); ?>
	                    @if(empty($credits->count()))
	                        <div class="alert alert-danger">You have no available credits. <a href="{{ route('user') }}">Click here</a> to buy.</div>
	                    @else
						    <div class="form-row">
		                        <div class="form-group col-12">
		                            <label class="text-smoky">Credits</label>
		                            <select class="form-control custom-select rounded-0 credit" name="credit">
		                                <option value="">-- Select credit --</option>
		                                @if(empty($credits->count()))
		                                    <option>You have no credits</option>
		                                @else
		                                    @foreach ($credits as $credit)
		                                        <option value="{{ $credit->id }}">
		                                            {{ number_format($credit->units).'unit(s) for '.$credit->duration.'day(s)' }}
		                                        </option>
		                                    @endforeach
		                                @endif
		                            </select>
		                            <small class="invalid-feedback credit-error"></small>
		                        </div>
		                    </div>
		                    <input type="hidden" name="property" value="{{ $property->id }}">
		                    <div class="alert mb-3 tiny-font promote-property-message d-none"></div>
		                    <div class="d-flex justify-content-right mb-3 mt-1">
		                        <button type="submit" class="btn btn-info icon-raduis btn-block btn-lg text-white promote-property-button px-4">
		                            <img src="/images/spinner.svg" class="mr-2 d-none promote-property-spinner mb-1">
		                            Promote
		                        </button>
		                    </div>
	                    @endif
					</form>
				@endif
            </div>
        </div>
	</div>
	<div class="position-relative" style="height: 160px; line-height: 160px;">
		<a href="{{ route('user.property.edit', ['category' => $property->category, 'id' => $property->id]) }}" class="text-decoration-none border-0">
			<img src="{{ empty($property->image) ? '/images/banners/holder.png' : $property->image }}" class="img-fluid border-0 w-100 h-100 object-cover">
		</a>
		<div class="position-absolute w-100 px-3 border-top d-flex align-items-center justify-content-between" style="height: 45px; line-height: 45px; bottom: 0; background-color: rgba(0, 0, 0, 0.8);">
			<small class="">
				<small class="text-white">
					{{ \Str::limit(ucwords($property->city), 16) }}
				</small>
			</small>
			<small class="">
				<small class="text-white">
					{{ ucwords($property->category) }}
				</small>
			</small>
		</div>
	</div>
	@include('user.properties.partials.promote')
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
			<small class="text-dark">
				{{ $property->currency ? $property->currency->symbol : '$' }}{{ number_format($property->price) }}
			</small>
			<?php $action = strtolower($property->action ?? 'nill'); $actions = \App\Models\Property::$actions; ?>
			<div class="dropdown">
                <small id="change-action-{{ $property->id }}" data-toggle="dropdown" class="{{ $action === 'sold' ? 'text-danger' : 'text-info' }} cursor-pointer">
					{{ ucwords($actions[$action] ?? 'nill') }} <i class="icofont icofont-caret-down position-relative" style="top: 1px;"></i>
				</small>
                <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="change-action-{{ $property->id }}">
                	<form method="post" class="p-4 w-100 change-property-action-form" action="javascript:;" style="width: 210px !important;" data-action="{{ route('api.property.action.change', ['id' => $property->id]) }}">
					    <div class="form-group">
					      	<label class="text-muted">Change status</label>
					      	<select class="custom-select action" name="action">
					      		@if(empty($actions))
					      			<option>No status listed</option>
					      		@else
					      			<?php unset($actions[$action]); ?>
					      			<option>Select status</option>
					      			@foreach($actions as $key => $value)
					      				<option value="{{ $key }}">
					      					{{ ucwords($value) }}
					      				</option>
					      			@endforeach
					      		@endif
					      	</select>
					      	<span class="invalid-feedback action-error"></span>
					    </div>
					    <div class="alert mb-3 tiny-font change-property-action-message d-none"></div>
	                    <div class="d-flex justify-content-right mb-3 mt-1">
	                        <button type="submit" class="btn btn-info btn-lg btn-block change-property-action-button">
	                            <img src="/images/spinner.svg" class="mr-2 d-none change-property-action-spinner mb-1">
	                            Save
	                        </button>
	                    </div>
					</form>
                </div>
            </div>
		</div>
		<div class="d-flex justify-content-between align-items-center">
			<a href="{{ route('user.property.edit', ['category' => $property->category, 'id' => $property->id]) }}" class="text-underline text-main-dark">
				<small class="">
					{{ \Str::limit($property->address, 18) }}
				</small>
			</a>
			<a href="{{ route('user.property.edit', ['category' => $property->category, 'id' => $property->id]) }}">
				<small class="text-warning">
					<i class="icofont-edit"></i>
				</small>
			</a>
		</div>
	</div>
</div>