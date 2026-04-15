<x-admin-layout>
    <x-slot name="title">App User: {{ $user->name }}</x-slot>


    <x-user-layout :name="$user->name" :code="$user->app_user_id">


        <div class="card shadow">
            <div class="card-body">

                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <span class="bullet bullet-vertical h-40px bg-primary"></span>
                            <div class="flex-grow-1 mx-4">
                                <h2 class="fs-2 mb-0"> User Details</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-around text-center">

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">E-Mail ID</div>
                        <div class="text-gray-600">{{ $user->email ?? ' - ' }}</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">{{ $user->phone ?? ' - ' }}</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Status</div>
                        <div class="text-gray-600">{{ $user->status ?? ' - ' }}</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Created At</div>
                        <div class="text-gray-600">{{ $user->created_at ?? ' - ' }}</div>
                    </div>


                </div>
            </div>
        </div>

    </x-user-layout>
</x-admin-layout>
