<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $incrementing = false;
    protected $primaryKey = ['bid', 'uid'];
    protected $guarded = [];
    public $timestamps = false;
}
