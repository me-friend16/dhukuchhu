<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'email','phone' , 'password', 'role', 'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
            'password' => 'hashed',
        ];
    }
    // public function firm()
    // {
    //     return $this->hasOne(FirmUser::class);
    // }

    // public function isAdmin()
    // {
    //     return $this->role === 'admin';
    // }

    // public function isFirmAdmin()
    // {
    //     return $this->role === 'firm_admin';
    // }

    // public function isFirmUser()
    // {
    //     return $this->role === 'firm_user';
    // }
    public function firmUser()
    {
        return $this->hasOne(FirmUser::class);
    }

    // This relationship returns the firm associated with the user through the firm_users mapping.
    public function firm()
    {
        // Using hasOneThrough: user -> firm_user -> firm
        return $this->hasOneThrough(Firm::class, FirmUser::class, 'user_id', 'id', 'id', 'firm_id');
    }

    // Helper to check if a user has a firm mapping (i.e. is a firm user)
    public function isFirmMember()
    {
        return (bool) $this->firmUser;
    }

    // Check if the user is a firm admin
    public function isFirmAdmin()
    {
        return $this->firmUser && $this->firmUser->role === 'firm_admin';
    }

    // Check if the user is a firm user with limited access
    public function isFirmUser()
    {
        return $this->firmUser && $this->firmUser->role === 'firm_user';
    }

    // Check if the user is a general admin (from the users table role)
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
