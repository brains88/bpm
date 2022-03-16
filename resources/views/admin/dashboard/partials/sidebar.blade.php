<div class="card card-raduis border-0 bg-dark mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div class="text-muted">Email Statistics</div>
        <div class="dropdown">
            <a class="text-muted" href="javascript:;" data-toggle="dropdown" id="email-statistics">
                <i class="fa-solid fa-ellipsis"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3 border-0 shadow" aria-labelledby="email-statistics">
                <form></form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <div class="text-muted d-flex justify-content-between mb-3">
                <div>(10%)</div>
                <div>650 Emails</div>
            </div>
            <div class="progress progress-bar-height mb-3">
                <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="text-muted">Monthly maximum of 10,000 emails as stated by <a href="postmarkapp.com" target="_blank">postmark</a> email service.</div>
        </div>
    </div>
</div>
<div class="card card-raduis border-0 bg-info mb-4">
    <div class="card-body">
        <div class="mb-2 d-flex justify-content-between">
            <div class="">Sms Balance</div>
            <div class="dropdown">
                <a class="text-white" href="javascript:;" data-toggle="dropdown" id="email-statistics">
                    <i class="fa-solid fa-ellipsis"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 border-0 shadow" aria-labelledby="email-statistics">
                    <form></form>
                </div>
            </div>
        </div>
        <div class="">
            <h5 class="">
                $120
            </h5>
        </div>
    </div>
    <div class="card-footer">
        <div class=""></div>
        <small class="">Since 26th May 2022</small>
    </div>
</div>
<div class="alert alert-info border border-light icon-raduis">
    <div class="bg-info p-3 d-flex my-4 align-items-center justify-content-between">
        <div class="text-white">New Users</div>
        <small class="px-3 tiny-font py-1 bg-success rounded-pill">
            <small class="text-white">+10</small> 
        </small>
    </div>
    @set('users', \App\Models\User::latest()->take(4)->get())
    @if(empty($users))
        <div class="alert alert-danger">No recent users</div>
    @else
        @foreach($users as $user)
            <div class="p-3 bg-white mb-4 icon-raduis shadow-sm d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="mr-2">
                        @if(empty($user->profile->image))
                            <div class="text-center text-main-dark border rounded-circle" style="height: 35px; width: 35px; line-height: 35px; background-color: {{ randomrgba() }};">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @else
                            <div class="border rounded-circle" style="height: 35px; width: 35px;">
                                <img src="{{ $user->profile->image }}" class="img-fluid rounded-circle w-100 h-100">
                            </div>  
                        @endif
                    </div> 
                    <div class="">
                        <a href="{{ route('admin.user.profile', ['id' => $user->id]) }}">
                            <small class="text-main-dark d-block">
                                {{ \Str::limit($user->name, 12) }}
                            </small>
                        </a> 
                        <small class="text-muted tiny-font">
                            {{ ucwords($user->created_at->diffForHumans()) }}
                        </small>
                    </div>
                </div> 
                <div class="rounded-circle bg-{{ strtolower($user->status) === 'active' ? 'success' : 'danger' }} text-center" style="height: 20px; width: 20px; line-height: 15px;">
                    <small class="text-white tiny-font">
                        <i class="icofont-tick-mark"></i>
                    </small>
                </div>
            </div>
        @endforeach
    @endif
</div>