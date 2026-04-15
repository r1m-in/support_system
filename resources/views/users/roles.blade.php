<x-admin-layout>
    <x-slot name="title">User Roles</x-slot>


    <div class="card mb-5 mb-xl-8"> 
        <div class="card-body py-3">
            <x-alert />
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4  table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-40px rounded-start text-center">ID</th>
                            <th class="min-w-125px">Role</th>
                            <th class="min-w-125px">Guard</th>
                            <th class="min-w-125px">Permissions</th>
                            <th class="min-w-100px text-center rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="text-dark fw-bolder text-center"> {{ $role->id }} </td>
                                <td class="text-dark fw-bolder"> {{ ucwords(str_replace("_", " ", $role->name)) }} </td>
                                <td>
                                    <span class="badge badge-light-dark fs-7 fw-bold">{{ $role->guard_name }}</span>
                                </td>
                                <td>
                                    @if($role->name == \App\Enums\User\RoleEnum::ADMIN->value)
                                    All Permissions Allowed
                                    @elseif($role->name == \App\Enums\User\RoleEnum::USER->value)
                                    No Permissions Allowed
                                    @else
                                    {{ $role->permissions->count() }} Permissions Allowed
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($role->id > 2)
                                        <a href="{{ route('user.role', $role->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-tools"></i> Manage Permissions
                                        </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin-layout>