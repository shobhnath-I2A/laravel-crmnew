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
        'show_query_status',

        'submit_name',
        'mobile_code',
        'mobile',
        'website',
        'profile_image',
        'theme_color',
        'created_by',
        'last_seen_at'
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
            'last_seen_at' => 'datetime',
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
    public function isAdmin()
    {
        return $this->role_id == 1;
    }
    // public function isAdmin()
    // {
    //     return strtolower($this->roleData->name ?? '') === 'director';
    // }
    public function hasPermission($module, $permission)
    {
        if ($this->isAdmin()) {
            return true;
        }

        return $this->permissions()
            ->where('module', $module)
            ->where($permission, 1)
            ->exists();
    }
    public function canView($module)
    {
        return $this->hasPermission($module, 'can_view');
    }

    public function canAdd($module)
    {
        return $this->hasPermission($module, 'can_add');
    }

    public function canEdit($module)
    {
        return $this->hasPermission($module, 'can_edit');
    }

    public function canDelete($module)
    {
        return $this->hasPermission($module, 'can_delete');
    }

    public function canDownload($module)
    {
        return $this->hasPermission($module, 'can_download');
    }
    public function country()
    {
        return $this->belongsTo(
            CountryMaster::class,
            'user_country',
            'country_code'
        );
    }
}
