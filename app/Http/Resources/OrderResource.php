<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'status' => $this->status,
            'tracking_code' => $this->tracking_code,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'contact_number' => $this->contact_number,
            'address' => $this->address
        ];
    }
}
