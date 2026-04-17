<x-admin-layout>
    <x-slot name="title">App User Rides: {{ $user->name }}</x-slot>
    <x-user-layout :$user>


        @dump($rides)


    </x-user-layout>
</x-admin-layout>
