<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'reserva' => $this->id,
            'servicio' => $this->whenLoaded('servicio', $this->servicio),
            'salon' => $this->whenLoaded('salones', $this->salones)
        ];
    }
}
