<x-admin-layout>
    <x-slot name="title">App Driver: {{ $driver->name }}</x-slot>

    <x-driver-layout :name="$driver->name" :code="$driver->app_driver_id">


        <div class="card shadow">
            <div class="card-body p-2">

                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <span class="bullet bullet-vertical h-40px bg-primary"></span>
                            <div class="flex-grow-1 mx-4">
                                <h2 class="fs-2 mb-0"> Driver Details</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-around text-center">

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
                            <div class="fw-bolder">Registration Number</div>
                            <div class="text-gray-600">{{ $driver->vehicle->registration_number ?? ' - ' }}</div>
                        </div>


                    </div>
                @endif


            </div>
        </div>

    </x-driver-layout>

    <div class="card shadow mb-6">
        <div class="card-body pb-0">
            <div class="d-flex flex-wrap flex-sm-nowrap mb-6">

                <div class="flex-grow-1">

                    <div class="d-flex align-items-center mb-4">
                        <span class="bullet bullet-vertical h-40px bg-primary"></span>
                        <div class="flex-grow-1 mx-5">
                            <h2 class="fs-2 mb-0"> {{ $driver->name }} ( {{ $driver->app_driver_id }})</h2>
                        </div>
                    </div>


                    <div class="d-flex flex-wrap justify-content-start">

                        <div class="d-flex flex-wrap justify-content-center text-center">

                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder"> {{ $driver->email ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">E-Mail ID</div>
                            </div>

                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder">{{ $driver->phone ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Phone Number</div>
                            </div>

                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder">{{ $driver->dob ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Date of Birth</div>
                            </div>

                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder">{{ $driver->gender ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Gender</div>
                            </div>


                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder">{{ $driver->status ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Status</div>
                            </div>


                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder">{{ $driver->created_at ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Created Date</div>
                            </div>

                            @if ($driver->appCity)
                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->appCity->name ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">City</div>
                                </div>
                            @endif

                            @if ($driver->details)
                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">
                                        {{ $driver->details->aadhar_number ? 'XXXX XXXX ' . substr($driver->details->aadhar_number, -4) : ' - ' }}
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Aadhar Number</div>
                                </div>


                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">
                                        {{ $driver->details->licence_number ? substr($driver->details->licence_number, 0, 2) . ' XXXXX ' . substr($driver->details->licence_number, -4) : ' - ' }}
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Licence Number</div>
                                </div>



                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->details->total_rides ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">Total Rides</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->details->rating ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">Rating</div>
                                </div>
                            @endif

                            @if ($driver->vehicle)
                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->type ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">Type</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->owner_name ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">Owner Name</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->registration_number ?? ' - ' }}
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Registration Number</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->registration_expiry ?? ' - ' }}
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Registration Expiry</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->pollution_expiry ?? ' - ' }}
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Pollution Expiry</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->company ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">Company</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->model ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">Model</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->colour ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">Colour</div>
                                </div>


                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->road_tax_expiry ?? ' - ' }}
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Road Tax Expiry</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->insurance_expiry ?? ' - ' }}
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">insurance Expiry</div>
                                </div>

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->vehicle->is_lifetime_road_tax ?? ' - ' }}
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">is_lifetime_road_tax</div>
                                </div>
                            @endif



                        </div>
                    </div>
                </div>
            </div>


            <div class="separator"></div>

            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">

                <li class="nav-item">
                    <a class="nav-link text-active-primary py-3 me-6 active" href="#">Overview</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-active-primary py-3 me-6" href="#">Rides</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-active-primary py-3 me-6" href="#">Transcations</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-active-primary py-3 me-6" href="#">Tickets</a>
                </li>

            </ul>
        </div>
    </div>

</x-admin-layout>
