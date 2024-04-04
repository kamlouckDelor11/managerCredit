<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Credit extends Model
{
    use HasFactory;
    protected $primaryKey = 'token';
    public $incrementing =false;


    /**
     * Get the branch that owns the credit.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'token_branch', 'token');
    }

    /**
     * Get the user that owns the credit.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'token_user', 'token');
    }

    /**
     * Get the upaid
     */
    public function upaid(): HasMany
    {
        return $this->hasMany(Upaid::class, 'token_credit', 'token');
    }
}
