<?php

namespace App\Http\Controllers;

use App\Models\AppUser; 

class TestController extends Controller
{

   public function test()
   {
      $users = AppUser::limit(10)->get();
      dd($users);
   }
}
