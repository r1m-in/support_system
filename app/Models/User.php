<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Enums\User\Status as UserStatus;
use Illuminate\Support\Facades\Storage;

#[Fillable(['code', 'name', 'email', 'password', 'phone_number', 'status'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $appends = [
        'photo',
        'role'
    ];

    protected $attributes = [
        'status' => UserStatus::ACTIVE,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_number_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class,
        ];
    }

    public function getPhotoAttribute()
    {
        if ($this->attributes['photo']) {
            return Storage::url($this->attributes['photo']);
        } else {
            return $this->attributes['photo'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=FFFFFF&background=000000';
        }
    }

    public function getRoleAttribute()
    {
        return ucfirst($this->roles->first()->name) ?? 'Error: Contact Developer';
    }
}
