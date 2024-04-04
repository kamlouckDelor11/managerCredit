<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'token',
        'function',
        'path',
        'civility',
        'firstname',
        'authorization',
        'token_branch'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

        /**
     * Get the branch that owns the urser.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'token_branch', 'token');
    }
    /**
     * Get the occupation that owns the urser.
     */
    public function occupation(): BelongsTo
    {
        return $this->belongsTo(Occupation::class, 'function', 'token');
    }

    public function Comments(): HasOne
    {
        return $this->hasOne(Comment::class, 'token_user', 'token');
    } 
    public function Opinions(): HasOne
    {
        return $this->hasOne(Opinion::class, 'token_user', 'token');
    } 
}
