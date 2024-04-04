<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Branch extends Model
{
    use HasFactory;

    /**
     * Get the user.
     */
    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'token_branch', 'token');
    }
    /**
     * Get the credit
     */
    public function credit(): HasMany
    {
        return $this->hasMany(Credit::class, 'token_branch', 'token');
    }
}
