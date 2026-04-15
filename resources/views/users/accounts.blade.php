<x-admin-layout>
    <x-slot name="title">Accounts: {{ $user->name }}</x-slot>

    @include('admin.users.overview')

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Accounts</h3>
            </div>
        </div>

        <div class="card-body border-top p-9">
            <div class="table-responsive">
                <table class="table align-middle text-center gs-0 gy-4  table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-40px rounded-start text-center">Code</th>
                            <th class="min-w-125px">Type</th>
                            <th class="min-w-125px">Duration</th>
                            <th class="min-w-125px">Percentage</th>
                            <th class="min-w-125px text-center">Points</th>
                            <th class="min-w-100px text-center rounded-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $account)
                            <tr>
                                <td>{{ $account->code }}</td>
                                <td>{{ $account->name }}</td>
                                <td>{{ ucfirst($account->duration) }}</td>
                                <td>{{ $account->percentage }}%</td>
                                <td>{{ number_format($account->points) }}</td>
                                <td>
                                    @if ($account->status == \App\Enums\StatusEnum::ACTIVE)
                                        <span class="badge bg-success">ACTIVE</span>
                                    @else
                                        <span class="badge bg-danger">INACTIVE</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin-layout>
