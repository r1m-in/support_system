<x-admin-layout>
    <x-slot name="title">Cashback</x-slot>


    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4 text-center table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-100px rounded-start ps-2">Date</th>
                            <th class="min-w-100px">App Driver ID</th>
                            <th class="min-w-150px">Balance</th>
                            <th class="min-w-80px rounded-end pe-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($list as $item)
                            <tr>
                                <td>{{ date('dS M Y h:i a', strtotime($item['created_at'])) }}</td>
                                <td>{{ $item['app_driver_id'] ?? '' }}</td>
                                <td>{{ $item['balance'] }}</td>
                                <td class="text-center">
                                    <a href="{{ route('app.driver_cashback', $item['driver_id']) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> View
                                    </a>
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


            <div class="d-flex justify-content-between">
                @if (request()->has('next_page_token'))
                    <a href="{{ route('app.cashback') }}" class="btn btn-primary">
                        << First Page </a>
                        @else
                            <span class="btn btn-primary disabled">
                                End of Data
                            </span>
                @endif

                @if ($nextPageToken)
                    <a href="{{ route('app.cashback', ['next_page_token' => $nextPageToken]) }}"
                        class="btn btn-primary">
                        Next Page >>
                    </a>
                @else
                    <span class="btn btn-primary disabled">
                        End of Data
                    </span>
                @endif
            </div>




        </div>
    </div>




</x-admin-layout>
