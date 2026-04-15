<x-admin-layout>
    <x-slot name="title">App Driver: {{ $driver->name }}</x-slot>

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
                                <div class="fs-4 fw-bolder">{{ $driver->status ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Status</div>
                            </div>


                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder"> {{ $driver->provider ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Provider</div>
                            </div>


                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder">{{ $driver->created_at ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Created Date</div>
                            </div>


                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder">{{ $driver->created_by ?? ' - ' }}</div>
                                <div class="fw-bold fs-6 text-gray-400">Created By</div>
                            </div>


                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder">{{ $driver->updated_at ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Updated Date</div>
                            </div>


                            <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                <div class="fs-4 fw-bolder">{{ $driver->updated_by ?? ' - ' }} </div>
                                <div class="fw-bold fs-6 text-gray-400">Updated by</div>
                            </div>

                            @if ($driver->appCity)
                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->appCity->name ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">City</div>
                                </div>
                            @endif

                            @if ($driver->details)

                                <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->details->aadhar_number ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">Aadhar Number</div>
                                </div>

                                  <div class="border border-gray-500 border-dashed rounded min-w-175px py-3 px-4 m-3">
                                    <div class="fs-4 fw-bolder">{{ $driver->details->licence_number ?? ' - ' }} </div>
                                    <div class="fw-bold fs-6 text-gray-400">Licence Number</div>
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
