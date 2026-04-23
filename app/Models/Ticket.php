<?php

namespace App\Models;

use App\Enums\Ticket\Status;
use App\Enums\Ticket\Type;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'type', 'reason', 'name', 'phone_number', 'main_key', 'key', 'text', 'data', 'status'])]
class Ticket extends Model
{
    protected $attributes = ['status' => Status::OPEN];

    protected function casts(): array
    {
        return [
            'type' => Type::class,
            'data' => 'array',
            'status' => Status::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function notes()
    {
        return $this->hasMany(TicketNote::class);
    }
}
