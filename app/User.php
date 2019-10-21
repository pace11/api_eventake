<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, Notifiable;
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','first_name', 'last_name', 'date_of_birth', 'email', 'password', 'address', 'gender', 'phone'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $guarded = [
        'created_at', 'updated_at',
    ];
    public $dates = [ 'deleted_at' ];
    public $timestamps = true;
    
    public function registration()
    {
        return $this->hasMany('App\registration');
    }
}
