<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{   
    use SoftDeletes;
    protected $table = 'event';
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string'
    ];
    protected $guarded = [
        'created_at', 'updated_at',
    ];
    public $dates = ['deleted_at'];
    public $timestamps = true;
    
    public function categories()
    {
        return $this->belongsTo('App\Categories', 'categories_id', 'id');
    }
}
 