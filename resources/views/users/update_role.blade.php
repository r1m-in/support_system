<x-admin-layout>
    <x-slot name="title">Role: {{ $user->name }}</x-slot>

    @include('users.overview')

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">User Role</h3>
            </div>
        </div>

        <div class="card-body border-top p-9">
            <div class="d-flex flex-wrap align-items-center mb-10">
                <div class="flex-row-fluid">
                    <div class="row">

                        @if (!$user->hasRole(\App\Enums\User\RoleEnum::ADMIN) && ($user->provider == \App\Enums\User\Provider::DIRECT))
                            <div class="offset-md-3 col-md-6">
                                <form>
                                    @csrf
                                    <div class="mb-4">
                                        <label for="role" class="form-label">Role</label>
                                        <select required class="form-select" name="role">
                                            <option value="">Select Role</option>
                                            @foreach (\App\Enums\User\RoleEnum::cases() as $role)
                                                @if (\App\Enums\User\RoleEnum::ADMIN != $role)
                                                    <option value="{{ $role }}">{{ ucfirst($role->value) }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="updateRole" value="Update Role"
                                            class="btn btn-primary">Update Role</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
