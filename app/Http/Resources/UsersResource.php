<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'dateOfBirth' => $this->date_of_birth,
            'email' => $this->email,
            'emailVerifiedAt' => $this->email_verified_at,
            'address' => $this->address,
            'gender' => $this->gender,
            'phone' => $this->phone
        ];
    }
}
