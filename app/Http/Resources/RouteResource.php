<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
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
            'id' => $this->id,
            'driverId' => $this->driverId,
            'date' => $this->date,
            'notes' => $this->notes,
            'driver_info' => $this->driverData(),
            'orders' => $this->orders(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
