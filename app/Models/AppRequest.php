<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppRequest extends Model
{
   protected $connection = 'rds';
   protected $table = 'requests';
   protected $keyType = 'string';

   protected $guarded = ['*'];

   // app_user_id, name, email, phone, referred_by 
   // status, provider, created_by, created_at, updated_by, updated_at 

}
