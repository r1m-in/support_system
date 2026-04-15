<x-alert />
<x-errors />
<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="{{ $user->photo }}" alt="{{ $user->name }}" />
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <a href="javascript:void();"
                                class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $user->name }}</a>
                            <span class="badge badge-dark">{{ $user->role }}</span>
                        </div>
                        <div class="d-flex flex-column fw-bold fs-6 mb-4 pe-2 mt-2">
                            <a href="#"
                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                <span class="svg-icon svg-icon-4 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                {{ $user->email }}
                            </a>
                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                <span class="svg-icon svg-icon-4 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        viewBox="0 0 512 512" fill="none">
                                        <path
                                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"
                                            fill="currentColor" />
                                    </svg>

                                </span>
                                {{ $user->phone_number }}</a>
                        </div>
                    </div>
                    <div class="d-flex my-4">
                        @if ($user->status == \App\Enums\User\Status::ACTIVE)
                            <span class="badge badge-success px-4"> Acive</span>
                        @endif
                        @if ($user->status == \App\Enums\User\Status::INACTIVE)
                            <span class="badge badge-danger px-4"> Deactivated</span>
                        @endif
                        @if ($user->status == \App\Enums\User\Status::BLOCKED)
                            <span class="badge badge-dark px-4"> Blocked</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">

            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if (request()->routeIs('user.view')) active @endif"
                    href="{{ route('user.view', $user->id) }}">Overview</a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if (request()->routeIs('user.edit')) active @endif"
                    href="{{ route('user.edit', $user->id) }}">Edit </a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if (request()->routeIs('user.password')) active @endif"
                    href="{{ route('user.password', $user->id) }}">Password </a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if (request()->routeIs('user.update_role')) active @endif"
                    href="{{ route('user.update_role', $user->id) }}">Role </a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if (request()->routeIs('user.status')) active @endif"
                    href="{{ route('user.status', $user->id) }}">Status </a>
            </li>

        </ul>
    </div>
</div>
