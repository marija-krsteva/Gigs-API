<?php

namespace App\Http\Resources;

use App\Http\Requests\CompanyRequest;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array[]
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'name' => $this->name,
                'description' => $this->description,
                'address' => $this->address,
                'posted_gigs' => $this->gigs()->posted()->count(),
                'started_gigs' => $this->gigs()->posted()->started()->count(),
//                'started_gigs' => $this->gigs->started()->count(),
//                'gigs' => $this->gigs,
            ]
        ];
    }
}
