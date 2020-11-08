<?php

namespace App;

use App\Models\Employee;
use App\Models\Visitor;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use Notifiable;
    use HasMediaTrait;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function visitors()
    {
        return $this->hasOne(Visitor::class);
    }

    public function pre_registers()
    {
        return $this->hasOneThrough(PreRegister::class, Visitor::class);
    }

    public function blacklist()
    {
        return $this->morphOne(BlackList::class, 'owner');
    }

    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'admin')
            {
                return 'admin';
            }elseif($role->name == 'employee'){
                return 'employee';
            }
        }
        return false;
    }
}
