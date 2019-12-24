<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public $incrementing = false;
    protected $primaryKey = ['bid', 'uid'];
    protected $guarded = [];
    public $timestamps = false;
}
