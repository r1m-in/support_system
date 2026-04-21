<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use App\Models\Ticket;
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

   public function view($id)
   {
      $data['ticket'] = Ticket::findOrFail($id);
      return view('ticket.view', $data);
   }
}
