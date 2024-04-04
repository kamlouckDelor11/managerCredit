<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Upaid extends Model
{
    use HasFactory;

    protected $primaryKey = 'token';
    public $incrementing =false;

    /**
     * Get the user that owns the credit.
     */
    public function credit(): BelongsTo
    {
        return $this->belongsTo(Credit::class, 'token_credit', 'token');
    }
}
