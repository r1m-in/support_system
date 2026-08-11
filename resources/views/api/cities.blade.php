<x-admin-layout>
    <x-slot name="title">Cities</x-slot>

    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3">

            @isset($error)
                <p class="text-danger">{{ $error }}</p>
            @endisset

            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4 text-center table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-40px rounded-start text-center">ID</th>
                            <th class="min-w-125px">Code</th>
                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Is Active</th>
                            <th class="min-w-100px text-center rounded-end">Vehicles Allowes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cities as $city)
                            <tr>
                                <td class="text-dark fw-bolder text-center"> {{ $city['id'] }} </td>
                                <td class="text-dark fw-bolder">{{ $city['code'] }} </td>
                                <td class="text-dark fw-bolder"> {{ $city['name'] }} </td>
                                <td class="text-dark fw-bolder"> {{ $city['is_active'] }} </td>
                                <td class="text-center">
                                    @foreach ($city['CityVehicleTypes'] as $type)
                                        <span
                                            class="badge badge-dark fs-7 fw-bolder">{{ $type['VehicleType']['name'] }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No cities available.</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin-layout>
