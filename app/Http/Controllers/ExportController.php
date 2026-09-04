<?php

namespace App\Http\Controllers;

use App\Models\AppDriver;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExportController extends Controller
{

   public function owners(Request $request)
   {

      $drivers = collect();

      $data['search'] = ($request->get('q') ? $request->get('q') : '');

      if ($request->from && $request->to) {
         $from = Carbon::parse($request->from)->toDateString();
         $to = Carbon::parse($request->to)->toDateString();
         $drivers = AppDriver::with('roles')->latest()->whereBetween('created_at', [$from, $to]);
      }

      $keyword = $data['search'];

      if ($keyword) {
         $drivers->where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%")
               ->orWhere('app_driver_id', 'LIKE', "%$keyword%")
               ->orWhere('phone', 'LIKE', "%$keyword%");
         })->whereHas('roles', function ($query) {
            $query->where('role_id', '4b99bc3a-13bc-11f0-a1a1-0a74e7f1ccd1');
         });
      }

      $data['drivers']  = $drivers->get();

      return view('export.owners', $data);
   }
}
