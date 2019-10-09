<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
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
            'id' => (string) $this->id,
            'users' => [
                'id' => $this->users['id'],
                'firstName' => $this->users['first_name'],
                'lastName' => $this->users['last_name'],
                'dateOfBirth' => $this->users['date_of_birth'],
                'email' => $this->users['email'],
                'address' => $this->users['address'],
                'gender' => $this->users['gender'],
                'phone' => $this->users['phone'],
            ],
            'event' => [
                'id' => $this->event['id'],
                'name' => $this->event['event_name'],
                'desc' => $this->event['event_desc'],
                'img' => ($this->event_img != null) ? $this->event_img : 'https://img.icons8.com/officel/480/000000/full-image.png',
                'dateStart' => $this->event['event_date_start'],
                'dateEnd' => $this->event['event_date_end'],
                'timeStart' => $this->event['event_time_start'],
                'timeEnd' => $this->event['event_time_end'],
                'timeEnd' => $this->event['event_time_end'],
                'timeEnd' => $this->event['event_time_end'],
                'venue' => $this->event['event_venue'],
                'address' => $this->event['event_address'],
                'latitude' => (float) $this->event['event_latitude'],
                'longitude' => (float) $this->event['event_longitude'],
                'organizer' => $this->event['event_organizer'],
                'registrantQuota' => $this->event['event_registrant_quota'],
                'active' => $this->event['event_active'],
            ],
            'payment' => [
                'id' => $this->payment['id'],
                'name' => $this->payment['payment_name'],
                'desc' => $this->payment['payment_desc'],
                'img' => $this->payment['payment_img'],
            ]
        ];
    }
}
