<?php

namespace App\Enums\Ticket;

enum Type: string
{
   case USER_ACCOUNT = 'user-account';
   case USER_RIDE = 'user-ride';
   case DRIVER_ACCOUNT = 'driver-account';
   case DRIVER_RIDE = 'driver-ride';
   case DRIVER_TRANSACTION = 'driver-transaction';

   public function label(): string
   {
      return match ($this) {
         self::USER_ACCOUNT => 'User Account',
         self::USER_RIDE => 'User Ride',
         self::DRIVER_ACCOUNT => 'Driver Account',
         self::DRIVER_RIDE => 'Driver Ride',
         self::DRIVER_TRANSACTION => 'Driver Transaction'
      };
   }

   public static function user(): array
   {
      return [
         self::USER_ACCOUNT,
         self::USER_RIDE
      ];
   }

   public static function driver(): array
   {
      return [
         self::DRIVER_ACCOUNT,
         self::DRIVER_RIDE,
         self::DRIVER_TRANSACTION
      ];
   }

   public function span(): string
   {
      return  '<span class="badge badge-dark mx-1">' . $this->label() . '</span>';
   }
}
