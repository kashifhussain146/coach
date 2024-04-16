<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admins extends Authenticatable
{
    use HasRoles;
    protected $table = 'admins';
    protected $guarded = ['id'];
    protected $fillable = ['role_id', 'name', 'last_name', 'email', 'mobile_no', 'user_name', 'email_verified_at', 'profile_image', 'status', 'password', 'catagory', 'created_by', 'remember_token', 'created_at', 'updated_at'];
    protected $hidden = ['password'];
    public function getFullNameAttribute() {

        return ucwords($this->name . ' ' . $this->last_name);
    }

    /**
     * Get the user that owns the Admins
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposals(): BelongsTo
    {
        return $this->belongsTo(Proposals::class, 'id', 'user_id');
    }

    /**
     * Get all of the comments for the Admins
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proposalsMany(): HasMany
    {
        return $this->hasMany(Proposals::class, 'user_id', 'id');
    }

    public function proposals2()
    {
        return $this->hasManyThrough(Proposals::class, Task::class, 'created_by', 'task_id', 'id', 'id');
    }


}
