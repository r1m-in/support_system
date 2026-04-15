<x-admin-layout>
    <x-slot name="title">App Vehicle: {{ $vehicle->registration_number }}</x-slot>

    <div class="card shadow mb-6">
        <div class="card-body pb-0 pt-4">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center mb-2">
                        <span class="bullet bullet-vertical h-40px bg-primary"></span>
                        <div class="flex-grow-1 mx-4">
                            <h2 class="fs-2 mb-0"> {{ $vehicle->registration_number }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow">
        <div class="card-body">

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
                    <div class="text-gray-600">{{ $vehicle->type ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Company</div>
                    <div class="text-gray-600">{{ $vehicle->company ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Model</div>
                    <div class="text-gray-600">{{ $vehicle->model ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Colour</div>
                    <div class="text-gray-600">{{ $vehicle->colour ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Registration Number</div>
                    <div class="text-gray-600">{{ $vehicle->registration_number ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Owner Name</div>
                    <div class="text-gray-600">{{ $vehicle->owner_name ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Registration Expiry</div>
                    <div class="text-gray-600">{{ $vehicle->registration_expiry ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Pollution Expiry</div>
                    <div class="text-gray-600">{{ $vehicle->pollution_expiry ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Road Tax Expiry</div>
                    <div class="text-gray-600">{{ $vehicle->road_tax_expiry ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Insurance Expiry</div>
                    <div class="text-gray-600">{{ $vehicle->insurance_expiry ?? ' - ' }}</div>
                </div>

                <div class="min-w-200px p-3">
                    <div class="fw-bolder">Is Lifetime Road Tax</div>
                    <div class="text-gray-600">{{ $vehicle->is_lifetime_road_tax ?? ' - ' }}</div>
                </div>
            </div>

        </div>
    </div>


</x-admin-layout>
