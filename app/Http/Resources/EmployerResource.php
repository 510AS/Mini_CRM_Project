<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployerResource extends JsonResource
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
            'First Name' => $this->first_name,
            'last Name' => $this->last_name,
            'Email' => $this->email,
            'phone' => $this->phone,
            'Company' => $this->Company->name,
            'linkedin_url' => $this->linkedin_url,
            
        ];
    }
}
