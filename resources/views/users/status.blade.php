<x-admin-layout>
   <x-slot name="title">Account Status: {{ $user->name }}</x-slot>

   @include('users.overview')

   <div class="card mb-5 mb-xl-10">
       <div class="card-header border-0">
           <div class="card-title m-0">
               <h3 class="fw-bolder m-0">User Role</h3>
           </div>
       </div>

       <div class="card-body border-top p-9">
           <div class="d-flex flex-wrap align-items-center mb-10">
               <div class="flex-row-fluid">
                   <div class="row">
                       <div class="offset-md-3 col-md-6">
                           <form method="POST">
                               @csrf

                               <div class="mb-4">
                                   <label for="status" class="form-label">Status</label>
                                   <select required class="form-select" name="status">
                                       <option value="">Select Status</option>
                                       @foreach (\App\Enums\User\Status::cases() as $status) 
                                               <option value="{{ $status->value }}">{{ ucfirst($status->value) }}</option>
                                       @endforeach

                                   </select>
                               </div>

                               <div class="d-flex justify-content-center">
                                   <button type="submit" name="updateStatus" value="Update Status"
                                       class="btn btn-primary">Update Status</button>
                               </div>


                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

</x-admin-layout>