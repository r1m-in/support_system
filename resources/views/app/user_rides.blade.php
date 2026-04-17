<x-admin-layout>
    <x-slot name="title">App User Rides: {{ $user->name }}</x-slot>
    <x-user-layout :$user>


        @dump($rides)

        @dump($requests)


    </x-user-layout>
</x-admin-layout>
