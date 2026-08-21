<x-admin-layout>
    <x-slot name="title">App Owners</x-slot>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <div class="card-title">

            </div>
            <div class="card-toolbar">
                <form method="GET" class="input-group mb-3">
                    <input type="text" name="q" value="{{ $search }}" placeholder="query"
                        class="form-control rounded-start">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-0 rounded-end" type="submit"> <i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body py-3">
            <x-alert />
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4 text-center table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-40px rounded-start text-center">App Driver ID</th>
                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Phone Number</th>
                            <th class="min-w-125px text-center">Role</th>
                            <th class="min-w-125px text-center">Status</th>
                            <th class="min-w-100px text-center rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $driver)
                            <tr>
                                <td class="text-dark fw-bolder text-center"> {{ $driver->app_driver_id }} </td>
                                <td class="text-dark fw-bolder"> {{ $driver->name }} </td>
                                <td class="text-dark fw-bolder">
                                    @can(\App\Enums\User\PermissionEnum::APP_DRIVER_MOBILE)
                                        {{ $driver->phone ?? ' - ' }}
                                    @else
                                        No Access
                                    @endcan
                                </td>
                                <td class="text-dark fw-bolder">
                                    @foreach ($driver->roles as $role)
                                        <span class="badge badge-dark">{{ $role->role->name }}</span>
                                    @endforeach
                                </td>
                                <td class="text-dark fw-bolder"> {{ $driver->status }} </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#requestOwnerAccess" data-owner_uid="{{ $driver->id }}"
                                        data-owner_name="{{ $driver->name }}" data-owner_phone="{{ $driver->phone }}"
                                        data-owner_email="{{ $driver->email }}">
                                        <i class="fas fa-user-lock"></i> Request Access
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>



    <div class="modal fade" id="requestOwnerAccess" tabindex="-1" role="dialog"
        aria-labelledby="requestOwnerAccessModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="d-flex flex-row-reverse">
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span class="svg-icon svg-icon-2x"><i class="fa fas fa-times"></i></span>
                        </div>
                    </div>

                    <form method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="owner_uid" class="form-label required">Owner UID</label>
                            <input type="text" name="owner_uid" id="owner_uid" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="owner_name" class="form-label required">Name</label>
                            <input type="text" name="owner_name" id="owner_name" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="owner_phone" class="form-label required">Phone Number</label>
                            <input type="text" name="owner_phone" id="owner_phone" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="owner_email" class="form-label required">E-Mail ID</label>
                            <input type="text" name="owner_email" id="owner_email" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="note" class="form-label required">Note</label>
                            <textarea name="note" id="note" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary float-right" name="requestOwnerAccess"
                                value="Request Owner Access"> Request Access </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>


    <x-slot:scripts>
        <script>
            var requestOwnerAccess = document.getElementById('requestOwnerAccess')
            editShop.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                requestOwnerAccess.querySelector('#owner_uid').value = button.getAttribute('data-owner_uid')
                requestOwnerAccess.querySelector('#owner_name').value = button.getAttribute('data-owner_name')
                requestOwnerAccess.querySelector('#owner_phone').value = button.getAttribute('data-owner_phone')
                requestOwnerAccess.querySelector('#owner_email').value = button.getAttribute('data-owner_email')
            });
        </script>
    </x-slot:scripts>

</x-admin-layout>
