<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasPermissionsTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userInfo(){
        return $this->hasOne(UserInfo::class);
    }

    public function posts(){
        return $this->hasMany(Post::class,'user_created_id','id');

    }

    public function roles() {

        return $this->belongsToMany(Role::class,'users_roles');

    }
    public function permissions() {

        return $this->belongsToMany(Permission::class,'users_permissions');

    }

    protected function hasPermission($permission) {

        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    public function hasPermissionTo($permission) {

        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission) {

        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function brands(){
        return $this->hasMany(Brand::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}

