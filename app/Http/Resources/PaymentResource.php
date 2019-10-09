<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'paymentName' => $this->payment_name,
            'paymentDesc' => $this->payment_desc,
            'paymentImg' => $this->payment_img
        ];
    }
}
