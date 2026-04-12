<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
   protected $connection = 'aws';
   protected $table = 'users';

   protected $guarded = ['*'];
}
