<x-admin-layout>
    <x-slot name="title">App User</x-slot>

    @php
        $name = 'User Name';
        $code = 'APX35CVD';
    @endphp

    <x-user-layout :name="$name" :code="$code">


        <div class="card shadow">
            <div class="card-body p-2">

                <div class="d-flex flex-wrap justify-content-around text-center">

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">9999345677</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">9999345677</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">9999345677</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">9999345677</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">9999345677</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">9999345677</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">9999345677</div>
                    </div>

                    <div class="min-w-200px p-3">
                        <div class="fw-bolder">Phone Number</div>
                        <div class="text-gray-600">9999345677</div>
                    </div>
                </div>
            </div>
        </div>

    </x-user-layout>

</x-admin-layout>
