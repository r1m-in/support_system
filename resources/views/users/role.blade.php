<x-admin-layout>
    <x-slot name="title">Manage Role</x-slot>

    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3">
            <div class="card-header border-0 pt-2">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Role:  {{ ucwords(str_replace("_", " ", $role->name)) }}</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('user.roles') }}" class="btn btn-sm btn-light-dark"><i
                            class="fas fa-angle-double-left"></i>
                        Go Back</a>
                </div>
            </div>

            <x-alert />

            <form method="POST">
                @csrf
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="col-md-3 my-4">
                            <div class="form-check form-check-custom form-check-solid">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                        value="{{ $permission->name }}"
                                        {{ in_array($permission->id, $role_permissions) ? 'checked' : '' }} />
                                    {{ ucwords(str_replace('_', ' ', $permission->name)) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <input type="submit" name="updatePermissions" value="Update Permissions" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>

</x-admin-layout>