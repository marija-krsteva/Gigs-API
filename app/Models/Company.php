<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'user_id',
    ];

    /**
     * Get the user the Company belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *
     * Get the gigs that belong to a company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gigs()
    {
        return $this->hasMany(Gig::class);
    }

}
