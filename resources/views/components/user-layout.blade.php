 <div class="card shadow mb-6">
     <div class="card-body pb-0 pt-4">
         <div class="d-flex flex-wrap flex-sm-nowrap">
             <div class="flex-grow-1">
                 <div class="d-flex align-items-center mb-2">
                     <span class="bullet bullet-vertical h-40px bg-primary"></span>
                     <div class="flex-grow-1 mx-4">
                         <h2 class="fs-2 mb-0"> {{ $name }} ({{ $code }})</h2>
                     </div>
                     <button class="btn btn-primary btn-sm"><i class="fas fa-ticket me-2"></i> Create Ticket</button>
                 </div>
             </div>
         </div>


         <div class="separator"></div>

         <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">

             <li class="nav-item">
                 <a class="nav-link text-active-primary py-3 me-6 active" href="#">Overview</a>
             </li>

             <li class="nav-item">
                 <a class="nav-link text-active-primary py-3 me-6" href="#">Ride History</a>
             </li>

             <li class="nav-item">
                 <a class="nav-link text-active-primary py-3 me-6" href="#">Tickets</a>
             </li>

         </ul>
     </div>
 </div>

 {{ $slot }}
