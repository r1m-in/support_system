<x-admin-layout>
    <x-slot name="title">Export App Owners</x-slot>

    <style>
        div.dt-buttons {
            float: right;
            margin-bottom: 8px;
        }
    </style>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <div class="card-title">

            </div>
            <div class="card-toolbar">
                <form method="GET" class="input-group mb-3">

                    <input type="date" name="from" class="form-control rounded-start">
                    <input type="date" name="to" class="form-control">

                    <input type="text" name="q" value="{{ $search }}" placeholder="query"
                        class="form-control">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-0 rounded-end" type="submit"> <i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body py-3">
            <div class="table-responsive">
                <table id="datatable_buttons" class="table align-middle gs-0 gy-4 text-center table-hover">
                    <thead>
                        <tr class="fw-bolder text-white bg-dark">
                            <th class="min-w-40px rounded-start text-center">ID</th>
                            <th class="min-w-40px text-center">App ID</th>
                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Phone Number</th>
                            <th class="min-w-125px text-center">Role</th>
                            <th class="min-w-125px text-center">Status</th>
                            <th class="min-w-100px text-center rounded-end">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $key => $driver)
                            <tr>
                                <td class="text-dark fw-bolder text-center"> {{ $key + 1 }} </td>
                                <td class="text-dark fw-bolder text-center"> {{ $driver->app_driver_id }} </td>
                                <td class="text-dark fw-bolder"> {{ $driver->name }} </td>
                                <td class="text-dark fw-bolder"> {{ $driver->phone ?? ' - ' }} </td>
                                <td class="text-dark fw-bolder">
                                    @foreach ($driver->roles as $role)
                                        <span class="badge badge-dark">{{ $role->role->name }}</span>
                                    @endforeach
                                </td>
                                <td class="text-dark fw-bolder"> {{ $driver->status }} </td>
                                <td class="text-dark fw-bolder"> {{ $driver->created_at->format('dS M Y h:i a') }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <x-slot:scripts>
        <script>
            $(document).ready(function() {
                $("#datatable_buttons").DataTable({
                    searching: false,
                    dom: 'Brtip',
                    buttons: [{
                            extend: 'copy',
                            text: '<i class="fa-solid fa-copy me-1"></i> Copy',
                            className: 'btn btn-dark'
                        },
                        {
                            extend: 'csv',
                            text: '<i class="fa-solid fa-file-csv me-1"></i> CSV',
                            className: 'btn btn-dark'
                        },
                        {
                            extend: 'excel',
                            text: '<i class="fa-solid fa-file-excel me-1"></i> Excel',
                            className: 'btn btn-dark'
                        }
                    ]
                });
            });
        </script>
    </x-slot:scripts>

</x-admin-layout>
