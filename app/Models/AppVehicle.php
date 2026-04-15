<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppVehicle extends Model
{
   protected $connection = 'aws';
   protected $table = 'vehicle';
   protected $keyType = 'string';

   protected $guarded = ['*'];

   // id, owner_name, registration_number, registration_expiry, chassis_number, pollution_expiry
   // company, model, colour, manufacture_year, type, verification_status, reject_reason, road_tax_expiry, driver_id
   // insurance_expiry, engine_number, rto, 
   // status, provider, created_by, created_at, updated_by, updated_at 

}
