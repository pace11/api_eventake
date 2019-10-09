<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use softDeletes;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $casts = ['id' => 'string'];
    protected $guarded = ['created_at', 'updated_at'];
    protected $fillable = 
    ['id', 'first_name', 'last_name','date_of_birth', 'email', 'password', 'address', 'gender', 'phone'];
    public $dates = ['deleted_at'];
    public $timestamps = true;
}
