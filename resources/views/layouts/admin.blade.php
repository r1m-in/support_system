<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ url('assets/img/one.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ url('assets/plugins/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/plugins/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{ $style ?? '' }}
    {{ $head ?? '' }}
    @livewireStyles
</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                    <a href="{{ route('dashboard') }}">
                        <h1 class="text-white logo">ONE PANEL</h1>
                    </a>
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                        data-kt-toggle-name="aside-minimize">
                        <span class="svg-icon svg-icon-1 rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.5"
                                    d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                    fill="currentColor" />
                                <path
                                    d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="aside-menu flex-column-fluid">
                    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                            id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

                            <div class="menu-item">
                                <a class="menu-link  @if (request()->routeIs('dashboard')) active @endif"
                                    href="{{ route('dashboard') }}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9" rx="2"
                                                    fill="currentColor" />
                                                <rect opacity="0.3" x="13" y="2" width="9" height="9"
                                                    rx="2" fill="currentColor" />
                                                <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                                    rx="2" fill="currentColor" />
                                                <rect opacity="0.3" x="2" y="13" width="9" height="9"
                                                    rx="2" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </div>


                            <div class="menu-item">
                                <div class="menu-content pt-4 pb-0">
                                    <span class="menu-section text-muted text-uppercase fs-7">Modules </span>
                                </div>
                            </div>




                            <div class="menu-item">
                                <a class="menu-link @if (request()->routeIs('app.users')) active @endif"
                                    href="{{ route('app.users') }}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M3 6C2.4 6 2 5.6 2 5V3C2 2.4 2.4 2 3 2H5C5.6 2 6 2.4 6 3C6 3.6 5.6 4 5 4H4V5C4 5.6 3.6 6 3 6ZM22 5V3C22 2.4 21.6 2 21 2H19C18.4 2 18 2.4 18 3C18 3.6 18.4 4 19 4H20V5C20 5.6 20.4 6 21 6C21.6 6 22 5.6 22 5ZM6 21C6 20.4 5.6 20 5 20H4V19C4 18.4 3.6 18 3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H5C5.6 22 6 21.6 6 21ZM22 21V19C22 18.4 21.6 18 21 18C20.4 18 20 18.4 20 19V20H19C18.4 20 18 20.4 18 21C18 21.6 18.4 22 19 22H21C21.6 22 22 21.6 22 21ZM16 11V9C16 6.8 14.2 5 12 5C9.8 5 8 6.8 8 9V11C7.2 11 6.5 11.7 6.5 12.5C6.5 13.3 7.2 14 8 14V15C8 17.2 9.8 19 12 19C14.2 19 16 17.2 16 15V14C16.8 14 17.5 13.3 17.5 12.5C17.5 11.7 16.8 11 16 11ZM13.4 15C13.7 15 14 15.3 13.9 15.6C13.6 16.4 12.9 17 12 17C11.1 17 10.4 16.5 10.1 15.7C10 15.4 10.2 15 10.6 15H13.4Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M9.2 12.9C9.1 12.8 9.10001 12.7 9.10001 12.6C9.00001 12.2 9.3 11.7 9.7 11.6C10.1 11.5 10.6 11.8 10.7 12.2C10.7 12.3 10.7 12.4 10.7 12.5L9.2 12.9ZM14.8 12.9C14.9 12.8 14.9 12.7 14.9 12.6C15 12.2 14.7 11.7 14.3 11.6C13.9 11.5 13.4 11.8 13.3 12.2C13.3 12.3 13.3 12.4 13.3 12.5L14.8 12.9ZM16 7.29998C16.3 6.99998 16.5 6.69998 16.7 6.29998C16.3 6.29998 15.8 6.30001 15.4 6.20001C15 6.10001 14.7 5.90001 14.4 5.70001C13.8 5.20001 13 5.00002 12.2 4.90002C9.9 4.80002 8.10001 6.79997 8.10001 9.09997V11.4C8.90001 10.7 9.40001 9.8 9.60001 9C11 9.1 13.4 8.69998 14.5 8.29998C14.7 9.39998 15.3 10.5 16.1 11.4V9C16.1 8.5 16 8 15.8 7.5C15.8 7.5 15.9 7.39998 16 7.29998Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="menu-title">App Users</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link @if (request()->routeIs('app.drivers')) active @endif"
                                    href="{{ route('app.drivers') }}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"
                                                width="30" height="30" fill="#000000" style="opacity:1;">
                                                <path
                                                    d="M222.4 145.55a96.6 96.6 0 0 1-3.86 14.45h-53a8 8 0 0 0-7.5 5.19l-21.9 58.47c-2.69.22-5.41.34-8.15.34s-5.5-.12-8.2-.35L97.94 165.2a8 8 0 0 0-7.49-5.2h-53a96.6 96.6 0 0 1-3.86-14.45a128 128 0 0 1 188.8 0Z"
                                                    opacity=".2" fill="currentColor" />
                                                <path
                                                    d="M128 152a12 12 0 1 1 12-12a12 12 0 0 1-12 12m104-24A104 104 0 1 1 128 24a104.11 104.11 0 0 1 104 104m-192 0v.33a135.93 135.93 0 0 1 176 0V128a88 88 0 0 0-176 0m67.5 85.58L90.45 168H49.63a88.35 88.35 0 0 0 57.87 45.58M128 216h2.49l20.07-53.57a16.07 16.07 0 0 1 15-10.39h47.12c.38-1.31.72-2.64 1-4a120 120 0 0 0-171.4 0c.31 1.34.65 2.67 1 4h47.17a16.08 16.08 0 0 1 15 10.4l20 53.56zm78.37-48h-40.82l-17.09 45.59A88.34 88.34 0 0 0 206.37 168" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="menu-title">Drivers</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link @if (request()->routeIs('app.vehicles')) active @endif"
                                    href="{{ route('app.vehicles') }}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path
                                                    d="M192 0c-17.7 0-32 14.3-32 32l0 32 0 .2c-38.6 2.2-72.3 27.3-85.2 64.1L39.6 228.8C16.4 238.4 0 261.3 0 288L0 432l0 48c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-48 320 0 0 48c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-48 0-144c0-26.7-16.4-49.6-39.6-59.2L437.2 128.3c-12.9-36.8-46.6-62-85.2-64.1l0-.2 0-32c0-17.7-14.3-32-32-32L192 0zM165.4 128l181.2 0c13.6 0 25.7 8.6 30.2 21.4L402.9 224l-293.8 0 26.1-74.6c4.5-12.8 16.6-21.4 30.2-21.4zM96 288a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm288 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="menu-title">Vehicles</span>
                                </a>
                            </div>


                            <div class="menu-item">
                                <a class="menu-link @if (request()->routeIs('documents')) active @endif"
                                    href="{{ route('dashboard') }}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                viewBox="0 0 24 25" fill="none">
                                                <path opacity="0.3"
                                                    d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="menu-title">Tickets</span>
                                </a>
                            </div>




                            <div class="menu-item">
                                <div class="menu-content pt-4 pb-0">
                                    <span class="menu-section text-muted text-uppercase fs-7">Settings</span>
                                </div>
                            </div>


                            @can(\App\Enums\User\PermissionEnum::USER_VIEW)
                                <div data-kt-menu-trigger="click"
                                    class="menu-item  @if (request()->routeIs('user.*') || request()->routeIs('users')) here show @endif menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                    fill="none">
                                                    <path opacity="0.3"
                                                        d="M96 224a64 64 0 1 0-64-64 64.06 64.06 0 0 0 64 64zm480 32h-64a63.81 63.81 0 0 0-45.1 18.6A146.27 146.27 0 0 1 542 384h66a32 32 0 0 0 32-32v-32a64.06 64.06 0 0 0-64-64zm-512 0a64.06 64.06 0 0 0-64 64v32a32 32 0 0 0 32 32h65.9a146.64 146.64 0 0 1 75.2-109.4A63.81 63.81 0 0 0 128 256zm480-32a64 64 0 1 0-64-64 64.06 64.06 0 0 0 64 64z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M396.8 288h-8.3a157.53 157.53 0 0 1-68.5 16c-24.6 0-47.6-6-68.5-16h-8.3A115.23 115.23 0 0 0 128 403.2V432a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48v-28.8A115.23 115.23 0 0 0 396.8 288zM320 256a112 112 0 1 0-112-112 111.94 111.94 0 0 0 112 112z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="menu-title">Users</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a class="menu-link @if (request()->routeIs('users')) active @endif"
                                                href="{{ route('users') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">All Users</span>
                                            </a>
                                        </div>

                                        @role(\App\Enums\User\RoleEnum::ADMIN)
                                            <div class="menu-item">
                                                <a class="menu-link @if (request()->routeIs('user.roles')) active @endif"
                                                    href="{{ route('user.roles') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Roles</span>
                                                </a>
                                            </div>
                                        @endrole
                                    </div>
                                </div>
                            @endcan


                            <div class="menu-item">
                                <a class="menu-link  @if (request()->routeIs('profile')) active @endif"
                                    href="{{ route('dashboard') }}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                    fill="currentColor" />
                                                <rect x="7" y="6" width="4" height="4" rx="2"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="menu-title">Profile</span>
                                </a>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-custom btn-primary w-100" type="submit">
                            <span class="btn-label"><i class="fa fa-sign-out-alt"></i> Logout</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="toolbar" id="kt_toolbar">
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <div class="d-flex align-items-center d-lg-none d-print-none ms-n3 me-1"
                                data-bs-toggle="tooltip" title="Show aside menu">
                                <div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
                                    <span class="svg-icon svg-icon-2x mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" x="4" y="5" width="16" height="3"
                                                    rx="1.5" />
                                                <path
                                                    d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center me-3">
                                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">
                                    {{ $title }}
                                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                                    <small class="text-muted fs-7 fw-bold my-1 ms-1">{{ config('app.name') }}</small>
                                </h1>
                            </div>
                            <div class="d-flex align-items-center py-1">
                                <div class="me-4">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-danger d-print-none" type="submit"><i
                                                class="fa fa-sign-out-alt"></i> Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <div class="container-fluid d-flex flex-column  text-center">
                        <div class="text-dark">
                            <span class="text-muted fw-bold me-1">Designed & Developed By </span>
                            <a href="https://www.aarkasolutions.com/" target="_blank"
                                class="text-gray-800 text-hover-primary fw-bolder">Aarka Solutions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
    </div>

    <script src="{{ url('assets/plugins/plugins.bundle.js') }}"></script>
    <script src="{{ url('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables.bundle.js') }}"></script>
    <script src="{{ url('assets/plugins/tinymce.bundle.js') }}"></script>
    <script src="{{ url('assets/plugins/fslightbox.bundle.js') }}"></script>
    @livewireScripts
    <script>
        $("#datatable").DataTable({
            language: {
                lengthMenu: "Show _MENU_"
            },
            dom: "<'row'<'col-sm-6 d-flex align-items-center justify-conten-start'l><'col-sm-6 d-flex align-items-center justify-content-end'f>><'table-responsive'tr><'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i><'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>"
        }), tinymce.init({
            selector: ".text_editor",
            menubar: !1,
            toolbar: ["styleselect  fontsizeselect",
                "undo redo | bold italic | link image media | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | blockquote | advlist | autolink | lists charmap | code"
            ],
            plugins: "advlist autolink link image media lists charmap code"
        });
    </script>
    {{ $scripts ?? '' }}
</body>

</html>
