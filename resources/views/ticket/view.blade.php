@use('App\Enums\Ticket\Status')
@use('App\Enums\Ticket\Type')
<x-admin-layout>
    <x-slot name="title">Ticket: {{ $ticket->id }}</x-slot>
    <x-slot:style>
        <style>
            .timeline-label:before {
                left: 111px;
            }

            .timeline-label .timeline-label {
                width: 110px;
            }
        </style>
    </x-slot:style>



    <div class="row">
        <div class="col-md-7">

            <x-alert />

            <div class="card mb-4">
                <div class="card-body">

                    <div class="d-flex align-items-center mb-2">
                        <span class="bullet bullet-vertical h-40px bg-primary"></span>
                        <div class="flex-grow-1 mx-4">
                            <h2 class="fs-2 mb-0"># {{ $ticket->id }}</h2>
                        </div>
                        {!! $ticket->status->span() !!}
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <tbody>
                                <tr>
                                    <th class="fw-bolder">Type </th>
                                    <td> {{ $ticket->type->label() }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-bolder">Reason </th>
                                    <td> {{ $ticket->reason }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-bolder">Name </th>
                                    <td> {{ $ticket->name }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-bolder">Phone Number </th>
                                    <td> {{ $ticket->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-bolder">Text </th>
                                    <td> {{ $ticket->text }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    @if (in_array($ticket->type, [Type::USER_ACCOUNT, Type::USER_RIDE]))
                        @if ($user)
                            <div class="d-flex align-items-center mb-2">
                                <span class="bullet bullet-vertical h-40px bg-primary"></span>
                                <div class="flex-grow-1 mx-4">
                                    <h2 class="fs-2 mb-0">User</h2>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-around text-center">

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">E-Mail ID</div>
                                    <div class="text-gray-600">{{ $user->email ?? ' - ' }}</div>
                                </div>

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">Phone Number</div>
                                    <div class="text-gray-600">{{ $user->phone ?? ' - ' }}</div>
                                </div>

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">Status</div>
                                    <div class="text-gray-600">{{ $user->status ?? ' - ' }}</div>
                                </div>

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">Created At</div>
                                    <div class="text-gray-600">{{ $user->created_at ?? ' - ' }}</div>
                                </div>

                            </div>
                        @endif

                        @isset($ride)
                            <div class="d-flex align-items-center mb-2">
                                <span class="bullet bullet-vertical h-40px bg-primary"></span>
                                <div class="flex-grow-1 mx-4">
                                    <h2 class="fs-2 mb-0">Ride</h2>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-around text-center">

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">From</div>
                                    <div class="text-gray-600">{{ $ride->request->from_location }}</div>
                                </div>

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">To</div>
                                    <div class="text-gray-600">{{ $ride->request->to_location }}</div>
                                </div>

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">Created</div>
                                    <div class="text-gray-600">{{ date('dS M Y h:i a', strtotime($ride->created_at)) }}
                                    </div>
                                </div>

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">Driver</div>
                                    <div class="text-gray-600">
                                        @if ($ride->driver)
                                            {{ $ride->driver->name }}
                                            (
                                            <a target="_blank"
                                                href="{{ route('app.driver', $ride->driver->id) }}">{{ $ride->driver->app_driver_id }}</a>)
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>


                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">Status</div>
                                    <div class="text-gray-600"> {{ $ride->request->status }}</div>
                                </div>

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">Reasom</div>
                                    <div class="text-gray-600">{{ $ride->request->reason }}
                                    </div>
                                </div>

                                <div class="min-w-200px p-3">
                                    <div class="fw-bolder">Fare</div>
                                    <div class="text-gray-600"> {{ $ride->fare }}</div>
                                </div>

                            </div>
                        @endisset
                    @else
                    @endif

                </div>
            </div>


        </div>

        <div class="col-md-5">



            <div class="card card-custom">
                <div class="card-body">

                    <div class="d-flex align-items-center mb-8">
                        <span class="bullet bullet-vertical h-40px bg-primary"></span>
                        <div class="flex-grow-1 mx-5">
                            <h2 class="fs-3 mb-0">Activity Logs</h2>
                        </div>


                        @if (in_array($ticket->status, [Status::OPEN]))
                            <button data-bs-toggle="modal" data-bs-target="#addNote" class="btn btn-sm btn-primary">
                                Add Log
                            </button>
                        @endif

                    </div>

                    <div class="timeline-label">

                        <div class="timeline-item">
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">
                                {{ $ticket->created_at->format('dS M Y  h:i A') }}
                            </div>
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-{{ $ticket->status->color() }} fs-1"></i>
                            </div>
                            <div class="timeline-content d-flex">
                                <div class="ps-3">
                                    <span><b>User:</b> {{ $ticket->user->name }} (ID:
                                        {{ $ticket->user->id }})</span>
                                    <br>
                                    <span class="text-gray-800 my-1">
                                        {{ $ticket->text }}</span>
                                </div>
                            </div>
                        </div>

                        @foreach ($ticket->notes as $note)
                            <div class="timeline-item">
                                <div class="timeline-label fw-bolder text-gray-800 fs-6">
                                    {{ $note->created_at->format('dS M Y  h:i A') }}
                                </div>
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-{{ $note->status->color() }} fs-1"></i>
                                </div>
                                <div class="timeline-content d-flex">
                                    <div class="ps-3">
                                        <span><b>User:</b> {{ $note->user->name }} (ID:
                                            {{ $note->user->id }})</span>
                                        <br>
                                        <span class="text-gray-800 my-1">
                                            {{ $note->text }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>




    @if (in_array($ticket->status, [Status::OPEN]))
        <div class="modal fade" id="addNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="d-flex flex-row-reverse">
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span class="svg-icon svg-icon-2x">
                                    <i class="fa fas fa-times"></i>
                                </span>
                            </div>
                        </div>

                        <form method="POST">
                            @csrf

                            <div class="mb-5">
                                <label for="status" class="required form-label">Status</label>
                                <div class="btn-group w-100" data-kt-buttons="true"
                                    data-kt-buttons-target="[data-kt-button]">
                                    @foreach (Status::cases() as $status)
                                        <label
                                            class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-{{ $status->color() }}"
                                            data-kt-button="true">
                                            <input class="btn-check" required type="radio" name="status"
                                                value="{{ $status->value }}" />
                                            {{ $status->label() }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="text" class="form-label required">Note </label>
                                <textarea class="form-control" required name="text" rows="2"></textarea>
                            </div>

                            <div class="d-flex justify-content-end">
                                <input type="submit" class="btn btn-primary float-right" name="addNote"
                                    value="Add Note">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif


</x-admin-layout>
