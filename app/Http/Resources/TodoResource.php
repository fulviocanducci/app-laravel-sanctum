<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'active' => $this->active ? true: false,
            'created_at' => $this->created_at->format('Y-m-d\TH:i:s.u'),
            'updated_at' => $this->updated_at->format('Y-m-d\TH:i:s.u'),
        ];
    }
}
