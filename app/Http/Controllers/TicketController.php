<?php

namespace App\Http\Controllers;

use App\Enums\Ticket\Type;
use App\Models\AppDriver;
use App\Models\AppUser;
use App\Models\AppUserRide;
use App\Models\Reason;
use App\Models\Ticket;
use App\Models\TicketNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{

   public function reasons(Request $request)
   {

      if ($request->addReason) {
         Reason::create([
            'type' => $request->type,
            'text' => $request->reason
         ]);
         return redirect()->route('reasons')->with('success', 'New Reason Added Sucessfully');
      }

      if ($request->deleteReason) {
         Reason::where('id', $request->deleteReason)->delete();
         return redirect()->route('reasons')->with('error', 'Reason Deleted Sucessfully');
      }

      $data['reasons'] = Reason::orderBy('type', 'DESC')->get();
      return view('reasons', $data);
   }

   public function create(Request $request)
   {
      if ($request->createTicket) {

         Ticket::create([
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'reason' => $request->reason,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'main_key' => $request->main_key,
            'key' => $request->key,
            'text' => $request->text
         ]);

         return redirect()->back()->with('success', 'Ticket Created Successfully');
      }
   }

   public function index()
   {
      $data['tickets'] = Ticket::latest()->paginate(10);
      return view('ticket.index', $data);
   }

   public function view(Request $request, $id)
   {

      if ($request->addNote) {
         TicketNote::create([
            'ticket_id' => $id,
            'user_id' => Auth::user()->id,
            'text' => $request->text,
            'status' => $request->status
         ]);
         Ticket::where('id', $id)->update(['status' => $request->status]);
         return redirect()->route('ticket.view', $id)->with('success', 'Log Added Successfully');
      }

      $data['ticket'] = Ticket::findOrFail($id);

      if (in_array($data['ticket']->type, [Type::USER_ACCOUNT, Type::USER_RIDE])) {
         $data['user'] = AppUser::where('id', $data['ticket']->main_key)->first();

         if ($data['ticket']->main_key !== $data['ticket']->key) {
            $data['ride'] = AppUserRide::where('id', $data['ticket']->key)->first();
         }

      } else {
         $data['driver'] = AppDriver::where('id', $data['ticket']->main_key)->first();
      }

      return view('ticket.view', $data);
   }
}
