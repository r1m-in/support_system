<x-admin-layout>
    <x-slot name="title">Tickets</x-slot>

    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3">
            <x-alert />
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4 text-center table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-40px rounded-start text-center">ID</th>
                            <th class="min-w-80px">Staff</th>
                            <th class="min-w-125px">Type</th>
                            <th class="min-w-125px">E-Mail ID</th>
                            <th class="min-w-125px">User / Driver</th>
                            <th class="min-w-125px text-center">Status</th>
                            <th class="min-w-100px text-center rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td class="text-dark fw-bolder text-center"> {{ $ticket->id }} </td>
                                <td class="text-dark fw-bolder"> {{ $ticket->user->name }} </td>
                                <td class="text-dark fw-bolder"> {{ $ticket->type->label() }} </td>
                                <td class="text-dark fw-bolder"> {{ $ticket->name }} ({{ $ticket->phone_number }}) </td>
                                <td class="text-center">
                                    {!! $ticket->status->span() !!}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('ticket.view', $ticket->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> View Ticket
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $tickets->appends(request()->input())->onEachSide(3)->links() }}
        </div>
    </div>

</x-admin-layout>
