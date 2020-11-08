<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Shipu\Watchable\Traits\HasAuditColumn;


class Booking extends Model
{

    protected $table = 'bookings';
    protected $guarded = ['id'];

    protected $fakeColumns = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function invitations()
    {
        return $this->hasMany(Invitation::class,'booking_id');
    }
    public function invitationFirst()
    {
        return $this->hasOne(Invitation::class)->oldest()->with('visitor');
    }

    public function host()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }
}
