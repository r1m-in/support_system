<x-admin-layout>
    <x-slot name="title">App Driver Cashback: {{ $driver->name }}</x-slot>

    <x-driver-layout :name="$driver->name" :code="$driver->app_driver_id" :driver="$driver">

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle gs-0 gy-4 text-center table-hover">
                        <thead>
                            <tr class="fw-bolder text-white bg-dark">
                                <th class="min-w-100px rounded-start ps-2">Date</th>
                                <th class="min-w-100px">From</th>
                                <th class="min-w-100px">To</th>
                                <th class="min-w-150px">Description</th>
                                <th class="min-w-80px">Type</th>
                                <th class="min-w-80px rounded-end pe-2">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ date('dS M Y h:i a', strtotime($transaction['created_at'])) }}</td>
                                    <td>{{ $transaction['request_from'] }}</td>
                                    <td>{{ $transaction['request_to'] }}</td>
                                    <td>{{ $transaction['description'] }}</td>
                                    <td>{{ $transaction['type'] }}</td>
                                    <td><span
                                            class="fw-bolder @if ($transaction['type'] == 'CREDIT') text-success
                                    @else
                                        text-danger @endif ">
                                            @if ($transaction['type'] == 'CREDIT')
                                                +
                                            @else
                                                -
                                            @endif {{ $transaction['amount'] }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7"> No Records Found </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>



    </x-driver-layout>
</x-admin-layout>
