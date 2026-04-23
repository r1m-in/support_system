<?php

namespace App\Models;

use App\Enums\Ticket\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'ticket_id', 'text', 'status'])]
class TicketNote extends Model
{
    protected $attributes = ['status' => Status::OPEN];

    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }
}
