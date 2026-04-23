 <x-alert />
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
                 <a class="nav-link text-active-primary py-3 me-6 @if (request()->routeIs('app.user_tickets')) active @endif"
                     href="{{ route('app.user_tickets', $user->id) }}">
                     Tickets</a>
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


                 <form method="POST" action="{{ route('ticket.create') }}">
                     @csrf

                     <div class="form-group mb-4 d-none">
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

                     <div class="form-group mb-4 d-none">
                         <label for="main_key" class="required form-label">Main Key </label>
                         <input type="text" class="form-control" required name="main_key"
                             value="{{ $user->id }}" placeholder="Main Key" readonly />
                     </div>

                     <div class="form-group mb-4 d-none">
                         <label for="key" class="required form-label">Key </label>
                         <input type="text" class="form-control" required name="key" id="key"
                             placeholder="Key" readonly />
                     </div>

                     <div class="form-group mb-4">
                         <label class="form-label required">Reason</label>
                         <select name="reason" id="reasons" class="form-select">
                             <option value="">Select Reason</option>
                         </select>
                     </div>

                     <div class="form-group mb-4">
                         <label class="form-label required">Text</label>
                         <textarea name="text" required class="form-control" rows="4"></textarea>
                     </div>

                     <div class="d-flex justify-content-end">
                         <button type="submit" class="btn btn-primary float-right" name="createTicket"
                             value="Add New Ticket"> Create Ticket </button>
                     </div>

                 </form>

             </div>

         </div>
     </div>
 </div>

 <x-slot:scripts>
     <script>
         $(function() {
             $('#date_ranger').daterangepicker({
                 autoUpdateInput: false,
                 locale: {
                     cancelLabel: 'Clear'
                 }
             });
             $('#date_ranger').on('apply.daterangepicker', function(ev, picker) {
                 $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format(
                     'YYYY-MM-DD'));
             });
             $('#date_ranger').on('cancel.daterangepicker', function(ev, picker) {
                 $(this).val('');
             });
         });

         var userAccount = @json(\App\Models\Reason::where('type', \App\Enums\Ticket\Type::USER_ACCOUNT)->pluck('text'));
         var userRide = @json(\App\Models\Reason::where('type', \App\Enums\Ticket\Type::USER_RIDE)->pluck('text'));

         var createTicket = document.getElementById('createTicket')
         createTicket.addEventListener('show.bs.modal', function(event) {
             var button = event.relatedTarget
             createTicket.querySelector('#type').value = button.getAttribute('data-type')
             createTicket.querySelector('#key').value = button.getAttribute('data-key')
             if (button.getAttribute('data-type') == 'user-account') {
                 options = userAccount;
             } else {
                 options = userRide;
             }
             if (Array.isArray(options) && options.length > 0) {
                 let optionsHtml = '<option value="">Select Reason</option>';
                 options.forEach(function(value) {
                     const safeValue = $('<div>').text(value).html();
                     optionsHtml += `<option value="${safeValue}">${safeValue}</option>`;
                 });
                 optionsHtml += '<option value="Other">Other</option>'
                 $('#reasons').html(optionsHtml);
             }
         });
     </script>
 </x-slot:scripts>
