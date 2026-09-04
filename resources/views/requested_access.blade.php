<x-admin-layout>
    <x-slot name="title">Requested Access</x-slot>
    <x-alert />


    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <div class="card-title">

            </div>
            <div class="card-toolbar">
                <form method="GET" class="input-group mb-3">
                    <select name="user" class="form-select rounded-0 rounded-start">
                        <option value="">All Staff</option>
                        @foreach ($users as $user)
                            <option @if (request()->user == $user->id) selected @endif value="{{ $user->id }}">
                                {{ $user->name }} ({{ $user->phone_number }})</option>
                        @endforeach
                    </select>
                    <select name="status" class="form-select rounded-0">
                        <option value="">All Statuses</option>
                        @foreach (\App\Enums\AccessStatus::cases() as $case)
                            <option @if (request()->status == $case->value) selected @endif value="{{ $case->value }}">
                               {{  $case->label() }} </option>
                        @endforeach
                    </select>
                    <input type="text" name="q" value="{{ $search }}" placeholder="query"
                        class="form-control rounded-0">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-0 rounded-end" type="submit"> <i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4 text-center table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-40px rounded-start text-center">ID</th>
                            <th class="min-w-100px">Staff</th>
                            <th class="min-w-100px">Owner</th>
                            <th class="min-w-125px">Note</th>
                            <th class="min-w-80px text-center">Status</th>
                            <th class="min-w-80px text-center rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($accessRequests as $single)
                            <tr>
                                <td class="text-dark fw-bolder text-center"> {{ $single->id }} </td>
                                <td class="text-dark fw-bolder"> {{ $single->user->name }}
                                    ({{ $single->user->phone_number }})
                                    <br>
                                    {{ $single->user->email }}
                                </td>
                                <td class="text-dark fw-bolder"> {{ $single->owner_name }}
                                    ({{ $single->owner_phone }})
                                    <br> {{ $single->owner_email }}
                                </td>
                                <td>{{ $single->note }}</td>
                                <td class="text-center">
                                    {!! $single->status->span() !!}
                                </td>
                                <td class="text-center">
                                    @if ($single->status->value === \App\Enums\AccessStatus::PENDING->value)
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#takeAction"
                                            data-access_id="{{ $single->id }}" data-note="{{ $single->note }}"
                                            data-staff_name="{{ $single->user->name }}"
                                            data-staff_phone="{{ $single->user->phone_number }}"
                                            data-staff_email="{{ $single->user->email }}"
                                            data-owner_name="{{ $single->owner_name }}"
                                            data-owner_phone="{{ $single->owner_phone }}"
                                            data-owner_email="{{ $single->owner_email }}"
                                            class="btn btn-sm btn-primary fw-bolder">Taken
                                            Action</button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center fw-bolder">No Results</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $accessRequests->appends(request()->input())->onEachSide(3)->links() }}
        </div>
    </div>




    <div class="modal fade" id="takeAction" tabindex="-1" role="dialog" aria-labelledby="takeActionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="d-flex flex-row-reverse">
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span class="svg-icon svg-icon-2x"><i class="fa fas fa-times"></i></span>
                        </div>
                    </div>

                    <div class="row border border-2 border-gray-500 rounded mb-2">
                        <div class="col-6  p-2">
                            <div class="bg-dark w-100 text-center rounded text-white p-1 mb-1">STAFF</div>
                            <div class="m-2" id="staff_data">
                                <b>Name: </b> <br><span id="staff_name"></span> <br />
                                <b>Phone Number: <br></b> <span id="staff_phone"></span> <br />
                                <b>E-Mail: </b> <br><span id="staff_email"></span> <br />
                            </div>
                        </div>
                        <div class="col-6 p-2">
                            <div class="bg-dark w-100 text-center rounded text-white p-1">OWNER</div>
                            <div class="m-2" id="owner_data">
                                <b>Name: </b> <br><span id="owner_name"></span> <br />
                                <b>Phone Number: <br></b> <span id="owner_phone"></span> <br />
                                <b>E-Mail: </b> <br><span id="owner_email"></span> <br />
                            </div>
                        </div>
                        <div class="col-12 p-2">
                            <div class="bg-dark w-100 text-center rounded text-white p-1">NOTE</div>
                            <div class="m-2" id="note"></div>
                        </div>
                    </div>

                    <form method="POST">
                        @csrf

                        <input type="hidden" name="access_id" id="access_id" />

                        <div class="mb-4">
                            <label for="admin_note" class="form-label">Admin Note </label>
                            <input type="text" class="form-control" name="admin_note" placeholder="Admin Note" />
                        </div>

                        <div class="mb-4">
                            <label for="expiry" class="form-label">Expiry Date </label>
                            <input type="date" min="{{ today()->format('Y-m-d') }}" class="form-control"
                                name="expiry" />
                        </div>


                        <div class="d-flex justify-content-around">
                            <button type="submit" name="takeAction" value="rejected" class="btn btn-danger"><i
                                    class="fa fa-times"></i> Reject</button>
                            <button type="submit" name="takeAction" value="accepted" class="btn btn-success"><i
                                    class="fa fa-check"></i> Accept</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




    <x-slot:scripts>
        <script>
            var takeAction = document.getElementById('takeAction')
            takeAction.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                takeAction.querySelector('#access_id').value = button.getAttribute('data-access_id')
                takeAction.querySelector('#note').innerHTML = button.getAttribute('data-note')
                takeAction.querySelector('#staff_name').innerHTML = button.getAttribute('data-staff_name')
                takeAction.querySelector('#staff_phone').innerHTML = button.getAttribute('data-staff_phone')
                takeAction.querySelector('#staff_email').innerHTML = button.getAttribute('data-staff_email')
                takeAction.querySelector('#owner_name').innerHTML = button.getAttribute('data-owner_name')
                takeAction.querySelector('#owner_phone').innerHTML = button.getAttribute('data-owner_phone')
                takeAction.querySelector('#owner_email').innerHTML = button.getAttribute('data-owner_email')
            });
        </script>
    </x-slot:scripts>


</x-admin-layout>
