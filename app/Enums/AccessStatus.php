<?php

namespace App\Enums;

enum AccessStatus: string
{
   case PENDING = 'pending';
   case ACCEPTED = 'accepted';
   case REJECTED = 'rejected';
}
