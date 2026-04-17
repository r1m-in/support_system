<x-admin-layout>
    <x-slot name="title">App User Rides: {{ $user->name }}</x-slot>
    <x-user-layout :$user>

        <div class="card">
            <div class="card-header border-0 pt-5">
                <div class="card-title">

                </div>
                <div class="card-toolbar">
                    <form method="GET" class="input-group mb-3">
                        <select class="form-select rounded-start">
                            <option value="">All Statuses</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary rounded-0 rounded-end" type="submit"> <i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle gs-0 gy-4 table-hover">
                        <thead>
                            <tr class="fw-bolder text-white bg-dark">
                                <th class="min-w-125px rounded-start ps-2">From</th>
                                <th class="min-w-125px">To</th>
                                <th class="min-w-100px">Created</th>
                                <th class="min-w-50px">Status</th>
                                <th class="min-w-80px">Reason</th>
                                <th class="min-w-80px">Driver Name</th>
                                <th class="min-w-50px">Fare</th>
                                <th class="min-w-100px text-center rounded-end pe-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rides as $ride)
                                <tr>
                                    <td>{{ $ride->request->from_location }}</td>
                                    <td>{{ $ride->request->to_location }}</td>
                                    <td>
                                       {{ date('dS M Y', strtotime($ride->created_at)) }} <br>
                                       {{ date('h:i a', strtotime($ride->created_at)) }} <br>
                                    </td>
                                    <td>{{ $ride->request->status }}</td>
                                    <td>{{ $ride->request->reason }}</td>
                                    <td>
                                        @if ($ride->driver)
                                            {{ $ride->driver->name }} 
                                            (<a target="_blank" href="{{ route('app.driver', $ride->driver->id) }}">{{ $ride->driver->app_driver_id }}</a>)
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $ride->fare }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#createTicket"
                                            class="btn btn-primary btn-sm"
                                            data-type="{{ \App\Enums\Ticket\Type::USER_RIDE->value }}"
                                            data-key="{{ $ride->id }}"><i class="fas fa-ticket me-2"></i> Create
                                            Ticket</button>
                                    </td>
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
