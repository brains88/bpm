@include('layouts.header')
<div class="min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding pb-4">
        <div class="container-fluid">
            <div class="border-dark-500 py-2 px-3 mb-4 d-flex align-items-center rounded" style="background-color: rgba(0, 0, 0, 0.5);">
                <small class="mr-2 text-white">All users ({{ \App\Models\User::count() }})</small>
                <small class="mr-2 text-white">
                    Search
                </small>
                <div class="dropdown cursor-pointer">
                    <div data-toggle="dropdown">
                        <small class="text-white">Date filter</small>
                    </div>
                    <div class="dropdown-menu border-0 shadow dropdown-menu-left">
                        <form action="javascript:;" class="users-date-filter p-3" data-url="{{ '' }}">
                            <div class="form-group">
                                <input type="date" name="date" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                    {{ $users->onEachSide(1)->links('vendor.pagination.default') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    