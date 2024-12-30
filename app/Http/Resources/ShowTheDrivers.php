<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowTheDrivers extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Name'=>$this->Name,
            'Family'=>$this->Family,
            'Code_meli'=>$this->Code_meli,
            'Number_p'=>$this->Number_p,
            'Image'=>$this->Image,
            'phone'=>$this->phone,
        ];
    }
}
