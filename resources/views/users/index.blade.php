<x-admin-layout>
    <x-slot name="title">All Users</x-slot>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <div class="card-title">
                <button type="button" data-bs-toggle="modal" data-bs-target="#addNewUser" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i> Add User
                </button>
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
                            <th class="min-w-80px">Provider</th>
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
                                <td class="text-dark fw-bolder"> {{ ucfirst($user->name) }} </td>
                                <td class="text-dark fw-bolder"> {{ $user->email }} </td>
                                <td class="text-dark fw-bolder"> {{ $user->phone_number }} </td>
                                <td class="text-center">
                                    <span class="badge badge-dark fs-7 fw-bolder">{{ $user->role }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('user.view', $user->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user-cog"></i> Manage User
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->appends(request()->input())->onEachSide(3)->links() }}
        </div>
    </div>


    <div class="modal fade" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST">
                        @csrf

                        <div class="mb-5">
                            <label for="name" class="required form-label">Name </label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                required placeholder="Name" />
                        </div>

                        <div class="mb-5">
                            <label for="email" class="required form-label">E-Mail ID</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" name="email"
                                required placeholder="E-Mail ID" />
                        </div>

                        <div class="mb-5">
                            <label for="phone_number" class="required form-label">Phone Number</label>
                            <input type="tel" pattern="[0-9]{10}" class="form-control" required
                                value="{{ old('phone_number') }}" name="phone_number" placeholder="Phone Number" />
                        </div>

                        <div class="mb-5">
                            <label for="password" class="form-label required">Password</label>
                            <input type="text" class="form-control" name="password" required
                                placeholder="Password" />
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary float-right" name="addNewUser"
                                value="Add New User"><i class="fa fa-plus"></i> Add New User </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>


    <x-slot name="scripts">
        @if ($errors->any())
            <script>
                $(window).on('load', function() {
                    $('#addNewUser').modal('show');
                });
            </script>
        @endif
    </x-slot>

</x-admin-layout>
