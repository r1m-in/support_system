<?php

namespace App\Models;

use App\Enums\AccessStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'owner_uid', 'owner_name', 'owner_phone', 'owner_email', 'note', 'admin_note', 'access_key', 'expiry', 'status'])]
class AccessRequest extends Model
{
   protected $attributes = ['status' => AccessStatus::PENDING];

   protected function casts(): array
   {
      return [
         'status' => AccessStatus::class,
      ];
   }

   public function user()
   {
      return $this->belongsTo(User::class, 'user_id', 'id');
   }  
}
