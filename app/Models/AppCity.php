<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppCity extends Model
{
   protected $connection = 'aws';
   protected $table = 'cities';
   protected $keyType = 'string';

   protected $guarded = ['*'];

   // id, code, name, is_active, 
   // created_by, created_at, updated_by, updated_at 
 
}
