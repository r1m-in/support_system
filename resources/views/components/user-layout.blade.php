 <div class="card shadow mb-6">
     <div class="card-body pb-0 pt-4">
         <div class="d-flex flex-wrap flex-sm-nowrap">
             <div class="flex-grow-1">
                 <div class="d-flex align-items-center mb-2">
                     <span class="bullet bullet-vertical h-40px bg-primary"></span>
                     <div class="flex-grow-1 mx-4">
                         <h2 class="fs-2 mb-0"> {{ $user->name }} ({{ $user->app_user_id }})</h2>
                     </div>
                     <button type="button" data-bs-toggle="modal" data-bs-target="#createTicket"
                         class="btn btn-primary btn-sm" data-type="{{ \App\Enums\Ticket\Type::USER_ACCOUNT->value }}"
                         data-key="{{ $user->id }}"><i class="fas fa-ticket me-2"></i> Create Ticket</button>
                 </div>
             </div>
         </div>


         <div class="separator"></div>

         <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">

             <li class="nav-item">
                 <a class="nav-link text-active-primary py-3 me-6 @if (request()->routeIs('app.user')) active @endif"
                     href="{{ route('app.user', $user->id) }}">Overview</a>
             </li>

             <li class="nav-item">
                 <a class="nav-link text-active-primary py-3 me-6 @if (request()->routeIs('app.user_rides')) active @endif"
                     href="{{ route('app.user_rides', $user->id) }}">Ride
                     History</a>
             </li>

             <li class="nav-item">
                 <a class="nav-link text-active-primary py-3 me-6" href="#">Tickets</a>
             </li>

         </ul>
     </div>
 </div>

 {{ $slot }}


 <div class="modal fade" id="createTicket" tabindex="-1" role="dialog" aria-labelledby="createTicketModalLabel"
     aria-hidden="true">
     <div class="modal-dialog  modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-body">

                 <div class="d-flex flex-row-reverse">
                     <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                         <span class="svg-icon svg-icon-2x"><i class="fa fas fa-times"></i></span>
                     </div>
                 </div>


                 <form method="POST">
                     @csrf

                     <div class="form-group mb-4">
                         <label for="name" class="required form-label">Type </label>
                         <input type="text" class="form-control" required name="type" id="type"
                             placeholder="Type" readonly />
                     </div>

                     <div class="form-group mb-4">
                         <label for="name" class="required form-label">Name </label>
                         <input type="text" class="form-control" required name="name" value="{{ $user->name }}"
                             placeholder="Name" readonly />
                     </div>

                     <div class="form-group mb-4">
                         <label for="phone_number" class="required form-label">Phone Number</label>
                         <input type="text" class="form-control" required name="phone_number"
                             value="{{ $user->phone }}" placeholder="Phone Number" readonly />
                     </div>

                     <div class="form-group mb-4">
                         <label for="name" class="required form-label">Key </label>
                         <input type="text" class="form-control" required name="key" id="key"
                             placeholder="Key" readonly />
                     </div>

                     <div class="form-group mb-4">
                         <label class="form-label required">Reason</label>
                         <textarea name="text" required class="form-control" rows="4"></textarea>
                     </div>

                     <div class="d-flex justify-content-end">
                         <button type="submit" class="btn btn-primary float-right" name="addTicket"
                             value="Add New Ticket"> Create Ticket </button>
                     </div>

                 </form>

             </div>

         </div>
     </div>
 </div>

 <x-slot:scripts>
     <script>
         var createTicket = document.getElementById('createTicket')
         createTicket.addEventListener('show.bs.modal', function(event) {
             var button = event.relatedTarget
             createTicket.querySelector('#type').value = button.getAttribute('data-type')
             createTicket.querySelector('#key').value = button.getAttribute('data-key')
         });
     </script>
 </x-slot:scripts>
