<x-admin-layout>
    <x-slot name="title">App Driver Transactions: {{ $driver->name }}</x-slot>
    <x-driver-layout :name="$driver->name" :code="$driver->app_driver_id" :driver="$driver">


        <div class="card">
            <div class="card-header border-0 pt-5">
                <div class="card-title">

                </div>
                <div class="card-toolbar">
                    <form method="GET" class="input-group mb-3">
                        <select name="status" class="form-select rounded-0 rounded-start">
                            <option value="">All Statuses</option>

                        </select>
                        <input class="form-control rounded-0" placeholder="Pick dates" name="dates"
                            id="date_ranger" />
                        <div class="input-group-append">
                            <button class="btn btn-primary rounded-0 rounded-end" type="submit"> <i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle gs-0 gy-4 text-center table-hover">
                        <thead>
                            <tr class="fw-bolder text-white bg-dark">
                                <th class="min-w-125px rounded-start ps-2">From</th>
                                <th class="min-w-125px">To</th>
                                <th class="min-w-125px">Created</th>
                                <th class="min-w-50px">Status</th>
                                <th class="min-w-125px">User Name</th>
                                <th class="min-w-50px">Fare</th>
                                <th class="min-w-150px rounded-end pe-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td class="text-start">{{ $transaction->type }}</td>
                                    <td class="text-start">{{ $transaction->description }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7"> No Records Found </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $transactions->appends(request()->input())->onEachSide(3)->links() }}
            </div>
        </div>


    </x-driver-layout>
</x-admin-layout>
