<x-admin-layout>
    <x-slot name="title">App User Rides: {{ $user->name }}</x-slot>
    <x-user-layout :$user>


        <table>
            <tbody>
                @foreach ($rides as $ride)
                    <tr>
                        <td>{{ $ride->request->from_location }}</td>
                        <td>{{ $ride->request->to_location }}</td>
                        <td>{{ $ride->status }}</td> 
                        <td>{{ $ride->distance }}</td> 
                        <td>{{ $ride->duration }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>

        @dump($rides)

        @dump($requests)


    </x-user-layout>
</x-admin-layout>
