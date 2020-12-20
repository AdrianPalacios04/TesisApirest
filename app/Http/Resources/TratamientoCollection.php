<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TratamientoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return [
                'id' => $item->id,
                '' => $item->tp_tratamiento,
                'price_tratamiento' => $item->tp_tratamiento,
                'created_at' => $item->created_at->format('d-m-Y'),
            ];
        });
    }
}
