<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

   public function test()
   {
      return view('test');
   }
}
