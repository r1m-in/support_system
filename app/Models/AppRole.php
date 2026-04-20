<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppRole extends Model
{
   protected $connection = 'aws';
   protected $table = 'roles';
   protected $keyType = 'string';

   protected $guarded = ['*'];


}
