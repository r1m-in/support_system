<x-admin-layout>
    <x-slot name="title">App User Rides: {{ $user->name }}</x-slot>
    <x-user-layout :$user>

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle gs-0 gy-4 text-center table-hover">
                        <thead>
                            <tr class="fw-bolder text-white bg-dark">
                                <th class="min-w-40px rounded-start text-center">From</th>
                                <th class="min-w-125px">To</th>
                                <th class="min-w-125px">Status</th>
                                <th class="min-w-125px">Reason</th>
                                <th class="min-w-125px text-center">Distance</th>
                                <th class="min-w-100px text-center rounded-end">Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rides as $ride)
                                <tr>
                                    <td>{{ $ride->request->from_location }}</td>
                                    <td>{{ $ride->request->to_location }}</td>
                                    <td>{{ $ride->request->status }}</td>
                                    <td>{{ $ride->request->reason }}</td>
                                    <td>{{ $ride->request->distance }}</td>
                                    <td>{{ $ride->request->duration }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </tbody>
                    </table>
                </div>

            </div>
        </div>


    </x-user-layout>
</x-admin-layout>
