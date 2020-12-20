<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TratamientoResource extends JsonResource
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
            'id' => $this->id,
            'tp_tratamiento' => $this->title,
            'price_tratamiento' => $this->description
        ];
    }
}
