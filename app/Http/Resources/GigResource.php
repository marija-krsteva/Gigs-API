<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GigResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'name' => $this->name,
                'description' => $this->description,
                'dt_start' => $this->dt_start,
                'dt_end' => $this->dt_end,
                'positions' => $this->positions,
                'pay_per_hour' => $this->pay_per_hour,
                'status' => $this->status,
//            'company' => $this->company,
            ],
        ];
    }
}
