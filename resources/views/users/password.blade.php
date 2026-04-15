<x-admin-layout>
    <x-slot name="title">Password: {{ $user->name }}</x-slot>

    @include('users.overview')

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Change Password</h3>
            </div>
        </div>

        <div class="card-body border-top p-9">
            <div class="d-flex flex-wrap align-items-center mb-10">
                <div class="flex-row-fluid">
                    <form class="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <div class="fv-row mb-2">
                                    <label for="password" class="form-label fs-6 fw-bolder mb-3">New
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="password" required />
                                </div>

                                <div class="fv-row">
                                    <label for="password_confirmation" class="form-label fs-6 fw-bolder mb-3">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="password_confirmation" required />
                                </div>

                                <div class="form-text fw-bold mb-5">Password must be at least 8 character and contain symbols
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="changePassword" value="Change Password"
                                        class="btn btn-primary">Update
                                        Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>