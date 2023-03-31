<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'model' => $this->brand . ' ' . $this->name . ' (' . $this->year . ')', 
            'color' => $this->color,
            'price_hvat' => $this->price_hvat,
            'price_vat' => $this->price_vat . ' €',

        ];
    }
}
