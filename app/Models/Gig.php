<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'dt_start',
        'dt_end',
        'positions',
        'pay_per_hour',
        'status',
        'company_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'dt_start' => 'datetime',
        'dt_end' => 'datetime',
    ];

    /**
     * Fields allowed to search by
     */
    const SEARCH_FIELDS = [
        'company_id',
        'name',
        'description',
        'progress',
        'status',
    ];

    /**
     * Filter gigs based on user input
     *
     * @param $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function filter($request) {
        $where = [];
        foreach ($request->all() as $search_param => $value) {
            if(in_array($search_param, self::SEARCH_FIELDS)) {
                if($search_param === 'name' || $search_param === 'description') {
                    $where[] = [$search_param, 'like', '%'. $value .'%'];
                } elseif ($search_param === 'progress') {
                    switch ($value) {
                        case 'Not started':
                            $where[] = ['dt_start', '>', Carbon::now()];
                            break;
                        case 'Started':
                            $where[] = ['dt_start', '<', Carbon::now()];
                            break;
                        case 'Finished':
                            $where[] = ['dt_end', '<', Carbon::now()];
                            break;
                    }
                } else {
                    $where[] = [$search_param, $value];
                }
            }
        }

        return Gig::query()->where($where)->paginate();
    }

    /**
     * Scope a query to only include posted gigs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePosted($query)
    {
        return $query->where('status',1);
    }

    /**
     * Scope a query to only include not posted gigs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotPosted($query)
    {
        return $query->where('status',0);
    }

    /**
     * Scope a query to only include not started gigs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotStarted($query)
    {
        return $query->where('dt_start', '>', Carbon::now());
    }

    /**
     * Scope a query to only include gigs with started.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStarted($query)
    {
        return $query->where('dt_start', '<', Carbon::now());
    }

    /**
     * Scope a query to only include finished gigs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFinished($query)
    {
        return $query->where('dt_end', '<', Carbon::now());
    }

    /**
     * Get the Company the Gig belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
