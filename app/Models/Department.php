<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $guarded = ['id'];
    protected $fillable = [
        'name','status'
    ];
    protected $fakeColumns = [];
    public $timestamps = false;
}
