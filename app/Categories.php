<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'categories_name', 'categories_desc',
    ];
    protected $guarded = [
        'created_at', 'updated_at',
    ];
    public $dates = ['deleted_at'];
    public $timestamps = true;

    public function event()
    {
        return $this->hasMany('App\Event');
    }
}
