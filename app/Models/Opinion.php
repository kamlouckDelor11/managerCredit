<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opinion extends Model
{
    use HasFactory;
    protected $primaryKey = 'token';
    public $incrementing =false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'token_user', 'token');
    }
}
