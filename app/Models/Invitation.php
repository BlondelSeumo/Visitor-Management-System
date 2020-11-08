<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Shipu\Watchable\Traits\HasAuditColumn;

class Invitation extends Model
{
    use HasAuditColumn;

    protected $table = 'invitations';
    protected $guarded = ['id'];
    protected $auditColumn = false;

    protected $fakeColumns = [];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class,'visitor_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
