<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Payment extends Model
{
    use SoftDeletes;
    protected $table = 'payment';
    protected $primaryKey = 'id';
    protected $fillable = ['payment_name', 'payment_desc', 'payment_img'];
    protected $guarded = ['created_at', 'updated_at'];
    public $dates = ['deleted_at'];
    public $timestamps = true;

    public function event()
    {
        return $this->hasMany('App\Event');
    }
}
