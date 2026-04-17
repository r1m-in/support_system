<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUserRide extends Model
{
   protected $connection = 'rds';
   protected $table = 'request_ride';
   protected $keyType = 'string';

   protected $guarded = ['*'];

   public function request()
   {
      return $this->belongsTo(AppRequest::class, 'request_id', 'id');
   }

}
