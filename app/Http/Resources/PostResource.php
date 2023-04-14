<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [                        //parent::toArray($request); ovo nece trebati, 
                                        //otvaramo niz samo za ono sto cemo ispisati a ne sve podatke
            'id' => $this->id,
            'name' => $this->name,
            'is_complited' => (bool) $this->is_completed
        ];                                       
    }
}
