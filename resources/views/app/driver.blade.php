<x-admin-layout>
    <x-slot name="title">App Driver: {{ $driver->name }}</x-slot>

    <x-driver-layout :name="$driver->name" :code="$driver->app_driver_id">


        <div class="card shadow">
            <div class="card-body">

                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <span class="bullet bullet-vertical h-40px bg-primary"></span>
                            <div class="flex-grow-1 mx-4">
                                <h2 class="fs-2 mb-0"> Driver Details</h2>
                            </div>
                            <span class="badge badge-dark">{{ $driver->role->role->name }}</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-around text-center">

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Role</div>
                        <div class="text-gray-600">{{ $driver->role->role->name }}</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">E-Mail ID</div>
                        <div class="text-gray-600">{{ $driver->email ?? ' - ' }}</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">{{ $driver->phone ?? ' - ' }}</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Status</div>
                        <div class="text-gray-600">{{ $driver->status ?? ' - ' }}</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Created At</div>
                        <div class="text-gray-600">{{ $driver->created_at ?? ' - ' }}</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Date of Birth</div>
                        <div class="text-gray-600">{{ $driver->dob ?? ' - ' }}</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Gender</div>
                        <div class="text-gray-600">{{ $driver->gender ?? ' - ' }}</div>
                    </div>

                    @if ($driver->appCity)
                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">City</div>
                            <div class="text-gray-600">{{ $driver->appCity->name ?? ' - ' }}</div>
                        </div>
                    @endif


                    @if ($driver->details)
                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Aadhar Number</div>
                            <div class="text-gray-600">
                                {{ $driver->details->aadhar_number ? 'XXXX XXXX ' . substr($driver->details->aadhar_number, -4) : ' - ' }}
                            </div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Licence Number</div>
                            <div class="text-gray-600">
                                {{ $driver->details->licence_number ? substr($driver->details->licence_number, 0, 2) . '******' . substr($driver->details->licence_number, -4) : ' - ' }}
                            </div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Total Rides</div>
                            <div class="text-gray-600">{{ $driver->details->total_rides ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Rating</div>
                            <div class="text-gray-600">{{ $driver->details->rating ?? ' - ' }}</div>
                        </div>
                    @endif

                </div>

                @if ($driver->vehicle)
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center mb-2">
                                <span class="bullet bullet-vertical h-40px bg-primary"></span>
                                <div class="flex-grow-1 mx-4">
                                    <h2 class="fs-2 mb-0"> Vehicle Details</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-around text-center">

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Type</div>
                            <div class="text-gray-600">{{ $driver->vehicle->type ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Company</div>
                            <div class="text-gray-600">{{ $driver->vehicle->company ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Model</div>
                            <div class="text-gray-600">{{ $driver->vehicle->model ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Colour</div>
                            <div class="text-gray-600">{{ $driver->vehicle->colour ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Registration Number</div>
                            <div class="text-gray-600">{{ $driver->vehicle->registration_number ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Owner Name</div>
                            <div class="text-gray-600">{{ $driver->vehicle->owner_name ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Registration Expiry</div>
                            <div class="text-gray-600">{{ $driver->vehicle->registration_expiry ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Pollution Expiry</div>
                            <div class="text-gray-600">{{ $driver->vehicle->pollution_expiry ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Road Tax Expiry</div>
                            <div class="text-gray-600">{{ $driver->vehicle->road_tax_expiry ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Insurance Expiry</div>
                            <div class="text-gray-600">{{ $driver->vehicle->insurance_expiry ?? ' - ' }}</div>
                        </div>

                        <div class="min-w-200px p-3">
                            <div class="fw-bolder">Is Lifetime Road Tax</div>
                            <div class="text-gray-600">{{ $driver->vehicle->is_lifetime_road_tax ?? ' - ' }}</div>
                        </div>
                    </div>
                @endif


            </div>
        </div>

    </x-driver-layout>
</x-admin-layout>
