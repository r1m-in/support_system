<x-auth-layout>
    <x-slot name="title">Login - {{ config('app.name') }}</x-slot>
    <x-alert />
    <x-errors />
    <form class="form w-100" method="POST">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Sign In to {{ config('app.name') }}</h1>
        </div>
        
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                autocomplete="off" />
        </div>
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
            </div>
            <input class="form-control form-control-lg form-control-solid" type="password"
                name="password" autocomplete="off" />
        </div>

        <div class="fv-row mb-8">
            <label class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="remember_me" name="remember" />
                <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">
                    Remember Me
                </span>
            </label>
        </div>

        <div class="text-center">
            <button type="submit" name="userSignin" value="Signin Request"
                class="btn btn-lg btn-primary w-100 mb-5">Login</button>
        </div>
    </form>
</x-auth-layout>