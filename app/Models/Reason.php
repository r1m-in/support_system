<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Ticket\Type;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['type', 'text'])]
class Reason extends Model
{
    protected function casts(): array
    {
        return [
            'type' => Type::class
        ];
    }
}
