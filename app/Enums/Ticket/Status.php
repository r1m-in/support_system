<?php

namespace App\Enums\Ticket;

enum Status: string
{
   case OPEN = 'open';
   case CLOSED = 'closed';

   public function label(): string
   {
      return match ($this) {
         self::OPEN => 'OPEN',
         self::CLOSED => 'CLOSED'
      };
   }

   public function color(): string
   {
      return match ($this) {
         self::OPEN => 'success',
         self::CLOSED => 'danger'
      };
   }

   public function span(): string
   {
      return  '<span class="badge badge-' . $this->color() . ' mx-1">' . $this->label() . '</span>';
   }
}
