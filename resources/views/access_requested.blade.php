<x-admin-layout>
    <x-slot name="title">Access Requested</x-slot>
    <x-alert />


    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4 text-center table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-40px rounded-start text-center">ID</th>
                            <th class="min-w-100px">Staff</th>
                            <th class="min-w-100px">Owner</th>
                            <th class="min-w-125px">Note</th>
                            <th class="min-w-80px text-center">Expiry</th>
                            <th class="min-w-80px text-center">Status</th>
                            <th class="min-w-80px text-center rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accessRequests as $single)
                            <tr>
                                <td class="text-dark fw-bolder text-center"> {{ $single->id }} </td>
                                <td class="text-dark fw-bolder"> {{ $single->user->name }}
                                    ({{ $single->user->phone_number }})
                                    <br>
                                    {{ $single->user->email }}
                                </td>
                                <td class="text-dark fw-bolder"> {{ $single->owner_name }} ({{ $single->owner_phone }})
                                    <br> {{ $single->owner_email }}
                                </td>
                                <td>{{ $single->note }}</td>
                                <td>{{ $single->expiry }}</td>
                                <td class="text-center">
                                    {!! $single->status->span() !!}
                                </td>
                                <td class="text-center">
                                    @if ($single->status->value === \App\Enums\AccessStatus::ACCEPTED->value)
                                        <a class="btn btn-sm btn-dark fw-bolder" href="https://owner.pikbike.com/?auth_code={{ $single->access_key }}" target="_blank">Login to Owner Panel</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $accessRequests->appends(request()->input())->onEachSide(3)->links() }}
        </div>
    </div>


</x-admin-layout>
