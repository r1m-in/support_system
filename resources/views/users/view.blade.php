<x-admin-layout>
    <x-slot name="title">User: {{ $user->name }}</x-slot>

    @include('users.overview')


    <div class="card mb-5 mb-xl-10">
        <div class="card-header cursor-pointer">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Profile Details</h3>
            </div>
        </div>
        <div class="card-body p-9">

            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">Name</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $user->name }}</span>
                </div>
            </div>

            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">E-Mail ID</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $user->email }}</span>
                </div>
            </div>

            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">Phone Number</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $user->phone_number }}</span>
                </div>
            </div>
 
        </div>
    </div>

</x-admin-layout>