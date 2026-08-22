<?php

namespace App\Enums;

enum AccessStatus: string
{
   case PENDING = 'pending';
   case ACCEPTED = 'accepted';
   case REJECTED = 'rejected';

      public function label(): string
   {
      return match ($this) {
         self::PENDING => 'Pending',
         self::ACCEPTED => 'Accepted',
         self::REJECTED => 'Rejected'
      };
   }

   public function color(): string
   {
      return match ($this) {
         self::PENDING => 'warning',
         self::ACCEPTED => 'success',
         self::REJECTED => 'danger'
      };
   }

   public function span(): string
   {
      return  '<span class="badge badge-' . $this->color() . ' mx-1">' . $this->label() . '</span>';
   }
}
