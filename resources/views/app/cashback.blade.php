<x-admin-layout>
    <x-slot name="title">Cashback</x-slot>


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
                            <th class="min-w-80px rounded-end pe-2">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($list as $item)
                            <tr>
                                <td>{{ date('dS M Y h:i a', strtotime($item['created_at'])) }}</td>
                                <td>{{ $item['app_driver_id'] ?? '' }}</td>
                                <td>{{ $item['balance'] }}</td>
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




</x-admin-layout>
