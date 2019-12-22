<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected  $primaryKey = 'bid';

    protected $guarded = [
        'bid', 'aid','updated_at','created_at',
    ];
}
