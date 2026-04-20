<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppDriverRole extends Model
{
   protected $connection = 'aws';
   protected $table = 'driver_roles';
   protected $keyType = 'string';

   protected $guarded = ['*'];

   public function role()
   {
      return $this->belongsTo(AppRole::class, 'role_id', 'id');
   }

   public function driver()
   {
      return $this->belongsTo(AppDriver::class, 'driver_id', 'id');
   }
}
