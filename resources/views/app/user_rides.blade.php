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
                                <td>{{ $ride->status }}</td>
                                <td>distance: {{ $ride->distance }}</td>
                                <td>duration: {{ $ride->duration }}</td>
                            </tr>
                            @dump($ride->request)
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div> 


    </x-user-layout>
</x-admin-layout>
