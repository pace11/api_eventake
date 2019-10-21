<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registration';
    protected $casts = [
        'id' => 'string'
    ];

    public function users()
    {
        return $this->belongsTo('App\Users', 'users_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo('App\Payment', 'payment_id', 'id');
    }
}
