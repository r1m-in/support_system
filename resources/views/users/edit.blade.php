<x-admin-layout>
    <x-slot name="title">Edit User: {{ $user->name }}</x-slot>

    @include('users.overview')

    <div class="card mb-5 mb-xl-10">
        <form method="POST" class="form">
            <div class="card-body border-top p-9">
               @csrf
                <div class="row mb-6"> 
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Name</label> 
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="name" required class="form-control form-control-lg form-control-solid"
                            placeholder="Name" value="{{ $user->name }}" />
                    </div> 
                </div>
                
                <div class="row mb-6"> 
                    <label class="col-lg-4 col-form-label required fw-bold fs-6"> Phone Number</label> 
                    <div class="col-lg-8 fv-row">
                        <input type="tel"  pattern="[0-9]{10}" required name="phone_number" class="form-control form-control-lg form-control-solid"
                            placeholder="Phone number" value="{{ $user->phone_number }}" />
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <label class="col-lg-4 col-form-label required fw-bold fs-6"> E-Mail ID</label> 
                    <div class="col-lg-8 fv-row">
                        <input type="email"  name="email" required class="form-control form-control-lg form-control-solid"
                            placeholder="Phone number" value="{{ $user->email }}" />
                    </div> 
                </div>
 
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" name="updateUser" value="Update User" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</x-admin-layout>