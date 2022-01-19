<div class="pb-3">
    @if(empty($subscription))
        <div class="alert alert-danger m-0">Subscribe to list more properties. <a href="javascript:;" data-target="#membership-subscription" data-toggle="modal">Click here</a> to get started.</div>
        @include('user.subscriptions.partials.subscribe')
    @else
        <?php 
            $status = strtolower($subscription->status ?? ''); 
            $expiry = empty($subscription->expiry) ? null : $subscription->expiry;

            $remainingdays = (\Carbon\Carbon::parse($expiry))->diffInDays(\Carbon\Carbon::today());
            $duration = empty($subscription->duration) ? 1 : (int)$subscription->duration;

            $fraction = $duration > $remainingdays ? ($remainingdays/$duration) : 0;
            $progress = $fraction >= 0 ? 0 : (100 - round($fraction * 100));  
        ?>

        <div class="d-flex position-relative" style="top: -25px;">
            <small class="text-white bg-{{ $status == 'expired' ? 'danger' : ($status === 'cancelled' ? 'secondary' : 'success') }} px-2 rounded mr-3">
                {{ ucfirst($status) }}
            </small>
            <small class="text-white bg-{{ $progress <= 90 ? 'success' : 'danger' }} px-2 rounded mr-3">
                {{ $progress <= 0 ? 1 : $property }}%
            </small>
        </div>
        <div class="">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="">
                    {{ ucwords($subscription->membership->name) }} Plan ({{ ucwords($duration) }}days)
                </small>
                <small class="">
                    {{ $remainingdays }} Day(s) remaining
                </small>
            </div>
            <div class="mb-4">
                <div class="progress" style="height: 7.5px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $progress <= 90 ? 'success' : 'danger' }}" role="progressbar" aria-valuenow="{{ $progress <= 0 ? 1 : $progress }}" aria-valuemin="1" aria-valuemax="100" style="width: {{ $progress <= 0 ? 1 : $progress }}%"></div>
                </div>
            </div>
            <div class="">
                @if($status === 'active' || $progress <= 50)
                    <div class="d-flex">
                        <a href="javascript:;" class="btn btn-info icon-raduis px-4 mr-3" data-toggle="modal" data-target="#renew-subscription">
                            Renew
                        </a>
                        <a href="javascript:;" class="btn btn-dark icon-raduis px-4 user-cancel-subscription" data-url="{{ route('user.subscription.cancel', ['id' => $subscription->id]) }}">
                            <img src="/images/spinner.svg" class="mr-2 d-none cancel-subscription-spinner mb-1">
                            Cancel
                        </a>
                    </div>
                    @include('user.subscriptions.partials.renew')
                @elseif($status === 'cancelled')
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-info icon-raduis btn-block px-4 user-activate-subscription" data-url="{{ route('user.subscription.activate', ['id' => $subscription->id]) }}">
                            <img src="/images/spinner.svg" class="mr-2 d-none activate-subscription-spinner mb-1">
                            Activate
                        </a>
                    </div>
                @else
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-info icon-raduis btn-block px-4 user-cancel-subscription" data-url="{{ route('user.subscription.cancel', ['id' => $subscription->id]) }}">
                            <img src="/images/spinner.svg" class="mr-2 d-none cancel-subscription-spinner mb-1">
                            Cancel
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>