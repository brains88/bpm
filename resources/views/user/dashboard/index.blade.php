@include('layouts.header')
<div class="min-vh-100">
    <div class="user-content user-dashboard-banner pb-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="mb-3">
                    <h4 class="text-white">Dashboard</h4>
                    <div class="text-muted">Welcome Melim Homes. List your properties and building materials.</div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="user-icon bg-dark text-white mr-3 mb-3 px-3 py-2 icon-raduis">
                            <i class="icofont-notification"></i>
                        </div>
                        <div class="user-icon bg-dark text-white mr-3 mb-3 px-3 py-2 icon-raduis">
                            <i class="icofont-settings"></i>
                        </div>
                        <div class="user-icon bg-info text-white mr-3 mb-3 px-3 py-2 icon-raduis">
                            <i class="icofont-ui-user"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="user-icon bg-dark text-white mb-3 px-3 py-2 icon-raduis">
                            <i class="icofont-navigation-menu"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	@include('user.dashboard.partials.panels')
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    