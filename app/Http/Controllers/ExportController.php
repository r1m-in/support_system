<?php

namespace App\Http\Controllers;

use App\Models\AppDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExportController extends Controller
{

   public function owners(Request $request)
   {

      $drivers = collect();

      $data['search'] = ($request->get('q') ? $request->get('q') : '');

      $keyword = $data['search'];

      if ($keyword) {
         $drivers = AppDriver::with('roles')->latest()->where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%")
               ->orWhere('app_driver_id', 'LIKE', "%$keyword%")
               ->orWhere('phone', 'LIKE', "%$keyword%");
         })->whereHas('roles', function ($query) {
            $query->where('role_id', '4b99bc3a-13bc-11f0-a1a1-0a74e7f1ccd1');
         })->get();
      }


      $data['drivers']  = $drivers;

      return view('export.owners', $data);
   }
}
