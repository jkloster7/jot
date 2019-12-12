<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class Contact extends JsonResource
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
            'contact_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'company' => $this->company,
            'birthday' => $this->birthday->format('m/d/Y'),
            'last_updated' => $this->updated_at->diffForHumans(),
        ];
    }
}
