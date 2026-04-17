<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use Illuminate\Http\Request;

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
}
