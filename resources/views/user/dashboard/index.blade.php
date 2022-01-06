@include('layouts.header')
<div class="min-vh-100">
    <div class="app-content app-dashboard pb-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                <div class="text-white">Dashboard</div>
                <div class="text-info">
                    {{ date("F j, Y") }}
                </div>
            </div>
            <div class="row">
            	@include('app.dashboard.partials.panels')
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    