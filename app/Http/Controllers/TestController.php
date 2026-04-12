<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

   public function test()
   {
      $users = DB::connection('aws')->table('users')->limit(10)->get();

      dd($users);
   }
}
