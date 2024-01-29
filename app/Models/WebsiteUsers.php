<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class WebsiteUsers extends Authenticatable{

    use HasApiTokens, HasFactory, Notifiable;
   
    protected $guard = 'webuser';

    protected $fillable = [
        'Firstname',
        'lastname',
        'identity',
        'Location',
        'Region',
        'email',
        'join_date',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* public function WebUserLogs()
    {
        return $this->hasMany(userLog::class,'Webuser_id','id');

        
    } */


}
