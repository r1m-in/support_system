<x-admin-layout>
    <x-slot name="title">App User Rides: {{ $user->name }}</x-slot>
    <x-user-layout :$user>

        <div class="card">
            <div class="card-body">

                <table>
                    <tbody>
                        @foreach ($rides as $ride)
                            <tr>
                                <td>{{ $ride->request->from_location }}</td>
                                <td>{{ $ride->request->to_location }}</td>
                                <td>{{ $ride->request->status }}</td>
                                <td>Reason: {{ $ride->request->reason }}</td>
                                <td>Distance: {{ $ride->request->distance }}</td>
                                <td>Duration: {{ $ride->request->duration }}</td>
                                <td>
                                    @json($request->request)
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


    </x-user-layout>
</x-admin-layout>
