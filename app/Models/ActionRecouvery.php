<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionRecouvery extends Model
{
    use HasFactory;

    protected $primaryKey = 'token';
    public $incrementing =false;
}
