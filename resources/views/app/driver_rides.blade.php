<x-admin-layout>
    <x-slot name="title">App Driver Rides: {{ $driver->name }}</x-slot>

    <x-driver-layout :name="$driver->name" :code="$driver->app_driver_id" :driver="$driver">
     
      

            </div>
        </div>

    </x-driver-layout>
</x-admin-layout>
