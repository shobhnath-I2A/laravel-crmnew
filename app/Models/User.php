<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserPermission;

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
        'name',
        'last_name',
        'email',
        'password',
        'status',
        'role',
        'role_id',
        'branch_id',
        'user_type',
        'user_country',
        'show_query_status'
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

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function rosters()
    {
        return $this->hasMany(\App\Models\AgentRoster::class);
    }

    public function destinations()
    {
        return $this->hasMany(\App\Models\AgentDestination::class);
    }

    public function leadNotifications()
    {
        return $this->hasMany(\App\Models\LeadNotification::class);
    }

    public function role()
    {
        return $this->belongsTo(Rolemaster::class, 'role_id');
    }

    public function permissions()
{
    return $this->hasMany(UserPermission::class, 'user_id', 'id');
}
}
