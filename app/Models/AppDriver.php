<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppDriver extends Model
{
   protected $connection = 'aws';
   protected $table = 'drivers';
   protected $keyType = 'string';

   protected $guarded = ['*'];

   public function appCity()
   {
      return $this->belongsTo(AppCity::class, 'city', 'id');
   }

   // id, app_driver_id, name, email, phone, gender, dob, staff_id, city, referral_code, referred_by
   // status, provider, created_by, created_at, updated_by, updated_at 

}
