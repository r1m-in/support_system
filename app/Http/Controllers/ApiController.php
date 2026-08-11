<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{

   public function cities()
   {
      try {
         $url = 'https://api.pikbike.com/user/cities?active=true';

         $response = Http::timeout(10)->acceptJson()->get($url);

         if ($response->successful()) {
            $cities = $response->json();  
            return view('api.cities', compact('cities'));
         }

         return view('api.cities', [
            'cities' => [],
            'error' => 'API returned status: ' . $response->status()
         ]);

      } catch (\Exception $e) {
         return view('api.cities', [
            'cities' => [],
            'error' => 'Request failed: ' . $e->getMessage()
         ]);
      }
   }

   
}
