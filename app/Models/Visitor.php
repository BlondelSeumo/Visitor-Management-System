<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Shipu\Watchable\Traits\HasAuditColumn;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;


class Visitor extends Model implements  HasMedia
{
    use HasMediaTrait;
    use HasRoles;

    protected $table = 'visitors';
    protected $guarded = ['id'];

    protected $fakeColumns = [];

    public function invitation()
    {
        return $this->hasOne(Invitation::class);
    }
}
