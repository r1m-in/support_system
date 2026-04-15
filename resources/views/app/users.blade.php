<x-admin-layout>
    <x-slot name="title">App Users</x-slot>

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
                            <th class="min-w-40px rounded-start text-center">ID</th>
                            <th class="min-w-125px">User</th>
                            <th class="min-w-125px">E-Mail ID</th>
                            <th class="min-w-125px">Phone Number</th>
                            <th class="min-w-125px text-center">Role</th>
                            <th class="min-w-100px text-center rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-dark fw-bolder text-center"> {{ $user->id }} </td>
                                <td class="text-dark fw-bolder text-center"> {{ $user->app_user_id }} </td>
                                <td class="text-dark fw-bolder"> {{ ucfirst($user->name) }} </td>
                                <td class="text-dark fw-bolder"> {{ $user->email }} </td>
                                <td class="text-dark fw-bolder"> {{ $user->phone }} </td>
                                <td class="text-center">
                                    <a href="{{ route('app.user', $user->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($users)
                {{ $users->appends(request()->input())->onEachSide(3)->links() }}
            @endif
        </div>
    </div>

</x-admin-layout>
