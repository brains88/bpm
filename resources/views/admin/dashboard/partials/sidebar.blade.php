<div class="mb-4">
    <div class="p-3 mb-4 rounded bg-info d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <small class="text-white">New users</small>
            <small class="ml-2">
                <small class="text-white px-2 py-1 rounded-pill bg-danger">+22</small>
            </small>
        </div>
        <a href="{{ route('admin.users') }}" class="text-decoration-none">
            <small class="text-white">
                <i class="icofont-long-arrow-right"></i>
            </small>
        </a> 
    </div>
    <div class="rounded p-3 mb-4 bg-white d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="mr-3" style="height: 40px; width: 40px;">
                <img src="/images/artisans/1.jpg" class="img-fluid object-cover rounded-circle w-100 h-100">
            </div>
            <div class="">
                <small class="d-block text-dark">Johnshons Nwachukwu</small>
                <small class="d-block text-dark">3hours ago</small>
            </div>
        </div>
        <small class="">
            <small class="text-white px-2 py-1 rounded-pill bg-danger">Pending</small>
        </small>
    </div>
    <a href="{{ route('admin.users') }}" class="btn-block btn text-white bg-main-dark">View all</a>
</div>
<div class="mb-4">
    <div class="p-3 mb-4 rounded bg-info d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <small class="text-white">New subscriptions</small>
            <small class="ml-2">
                <small class="text-white px-2 py-1 rounded-pill bg-danger">+16</small>
            </small>
        </div>
        <a href="{{ route('admin.subscriptions') }}" class="text-decoration-none">
            <small class="text-white">
                <i class="icofont-long-arrow-right"></i>
            </small>
        </a> 
    </div>
    <div class="rounded p-3 mb-4 shadow-sm d-flex justify-content-between align-items-center" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="d-flex align-items-center">
            <div class="mr-3 rounded text-center bg-warning" style="height: 30px; width: 30px; line-height: 30px;">
                <small class="text-dark text-center">
                    <i class="icofont-users-alt-6"></i>
                </small>
            </div>
            <div class="">
                <small class="d-block text-white">Johnshons Nwachukwu</small>
                <small class="d-block text-white">3hours ago</small>
            </div>
        </div>
        <small class="">
            <small class="text-white px-2 py-1 rounded-pill bg-success">$97</small>
        </small>
    </div>
    <a href="{{ route('admin.subscriptions') }}" class="btn-block btn text-white bg-main-dark">View all</a>
</div> 