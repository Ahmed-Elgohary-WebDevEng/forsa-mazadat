<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userLog extends Model
{
    use HasFactory;

    protected $table = 'user_logs';
    protected $fillable = [
        'slug',
        'Acution_id',
       // 'Webuser_id',
        'Firstname',
        'lastname',
        'identity',
        'phone'



    ];

    public function UserLogbelongAuction()
    {
        return $this->belongsTo(Auctions::class,'Acution_id','id');
    }
    /* public function WebUserLogbelongUser()
    {
        return $this->belongsTo(WebsiteUsers::class,'Webuser_id','id');
    } */
}
