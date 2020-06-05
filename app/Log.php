<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    const UPDATED_AT = 'updated_at';
    protected $fillable = ["status"];
}
