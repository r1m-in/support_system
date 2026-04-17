<x-admin-layout>
    <x-slot name="title">Reasons</x-slot>

    <x-alert />




    <div class="card">
        <div class="card-header border-0 pt-5">
            <div class="card-title">

            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addReason" class="btn btn-primary">
                        Add Reason
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-125px text-center rounded-start ps-2">Type</th>
                            <th class="min-w-250px">Text</th>
                            <th class="min-w-150px text-center rounded-end pe-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reasons as $reason)
                            <tr>
                                <td class="text-center fs-4">{!! $reason->type->span() !!}</td>
                                <td>{{ $reason->text }}</td>
                                <td class="text-center">
                                    <form method="POST">
                                        @csrf
                                        <button type="submit" name="deleteReason" value="{{ $reason->id }}"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>




        <div class="modal fade" id="addReason" tabindex="-1" role="dialog" aria-labelledby="addReasonModalLabel"
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


                        <form method="POST">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="type" class="required form-label">Type </label>
                                <select class="form-select" name="type" required>
                                    <option value="">Select Type</option>
                                    @foreach (\App\Enums\Ticket\Type::cases() as $type)
                                        <option value="{{ $type->value }}">{{ $type->label() }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="name" class="required form-label">Reason </label>
                                <input type="text" class="form-control" name="reason" required
                                    placeholder="Reason" />
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary float-right" name="addReason"
                                    value="Add Reason"> Add Reason </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>

</x-admin-layout>
