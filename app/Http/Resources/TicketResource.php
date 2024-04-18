<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'no_ticket' => $this->no_ticket,
            'name' => $this->name,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'address' => $this->address,
            'date_ticket' => $this->date_ticket
        ];
    }
}
