@use('App\Enums\Ticket\Status')
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

            <div class="card  card-flush pb-0  mb-4">
                <div class="card-header pt-6">
                    <div class="d-flex flex-column">
                        <h2 class="mb-1">#{{ $ticket->id }} </h2>
                        <div>
                            {!! $ticket->status->span() !!}
                        </div>
                    </div>
                    <div class="card-toolbar">
                        {!! $ticket->status->span() !!}
                    </div>
                </div>

                <div class="card-body py-0">

                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">

                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-3 active" data-bs-toggle="tab"
                                href="#order_details">Order Details</a>
                        </li>

                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-3" data-bs-toggle="tab"
                                href="#user_details">User</a>
                        </li>
                    </ul>

                </div>
            </div>


            <div class="card mb-4">
                <div class="card-body py-3">

                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="order_details">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="user_details">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <tbody>
                                        <tr>
                                            <th class="fw-bolder">User </th>
                                            <td> {{ $order->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-bolder">E-Mail ID </th>
                                            <td> {{ $order->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-bolder">Phone Number</th>
                                            <td>(+91) {{ $order->user->phone_number }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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


                        @if (!in_array($order->status, [Status::OPEN]))
                            <button data-bs-toggle="modal" data-bs-target="#addNote" class="btn btn-sm btn-primary">
                                Add Log
                            </button>
                        @endif

                    </div>

                    <div class="timeline-label">


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




    @if (!in_array($ticket->status, [Status::OPEN]))
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
                                    @foreach (Status::statuses() as $status)
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
