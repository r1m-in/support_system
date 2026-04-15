<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppDriver extends Model
{
   protected $connection = 'aws';
   protected $table = 'drivers';
   protected $keyType = 'string';

   protected $guarded = ['*'];
}
