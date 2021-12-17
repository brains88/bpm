@include('layouts.header')
<div class="bg-white min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex align-items-center">
                        <small class="mr-2">All users ({{ \App\Models\User::count() }})</small>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex align-items-center">
                        <a class="text-underline" href="javascript:;">
                            <small class="mr-2">
                                Search
                            </small>
                        </a>
                        <div class="dropdown">
                            <a href="javascript:;" class="text-underline">
                                <div data-toggle="dropdown">
                                    <small>Date filter</small>
                                </div>
                                <div class="dropdown-menu border-0 shadow dropdown-menu-left">
                                    <form action="javascript:;" class="users-date-filter" data-url="{{ '' }}">
                                        <div class="form-group">
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.users.partials.roles')
            <div class="">
                @if(empty($users->count()))
                    <div class="alert-info alert">No users yet</div>
                @else
                    <div class="row">
                        @foreach($users as $user)
                            <div class="col-12 col-md-4 col-lg-3 mb-4">
                                @include('admin.users.partials.card')
                            </div>
                        @endforeach
                    </div>
                    {{ $users->onEachSide(5)->links('vendor.pagination.links') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    