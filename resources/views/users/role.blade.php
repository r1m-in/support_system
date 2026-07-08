<x-admin-layout>
    <x-slot name="title">Manage Role</x-slot>

    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3">

            <div class="d-flex align-items-center mb-8">
                <span class="bullet bullet-vertical h-40px bg-primary"></span>
                <div class="flex-grow-1 mx-4">
                    <h2 class="fs-2 mb-0">Role: {{ \App\Enums\User\RoleEnum::tryFrom($role->name)->label() }}</h2>
                </div>

                <a href="{{ route('user.roles') }}" class="btn btn-sm btn-light-dark"><i
                        class="fas fa-angle-double-left"></i>
                    Go Back</a>
            </div>


            <x-alert />

            <form method="POST">
                @csrf
                @foreach (\App\Enums\User\PermissionEnum::grouped() as $key => $values)
                    <div class="row py-2  border-bottom border-2 border-gray-500">

                        <div class="col-xl-3">
                            <div class="fs-5 fw-bolder mt-2 mb-3">{{ $key }}</div>
                        </div>

                        <div class="col-xl-9">
                            <div class="d-flex  fw-bold h-100">

                                @foreach ($values as $value)
                                    <div class="form-check form-check-custom form-check-solid me-4">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                value="{{ $value->value }}"
                                                {{ in_array($value->value, $role_permissions) ? 'checked' : '' }} />
                                            <span class="ms-1">{{ $value->label() }}</span>
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center my-4">
                    <input type="submit" name="updatePermissions" value="Update Permissions" class="btn btn-primary">
                </div>
            </form>


        </div>
    </div>

</x-admin-layout>
