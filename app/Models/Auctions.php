<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auctions extends Model
{
    use HasFactory;
    protected $table = 'auctions';
    protected $fillable = [
        'Region',
        'Title',
        'type',
        'image',
        'ShowInfath',
        'PlatformName',
        'PlatformImage',
        'description',
        'dateOfStarting',
        'timeOfStarting',
        'link',
        'onsiteLink',
      //  'timeOfEnding',
        'dateOfEnding',
        'nowdate',
        'slug',
        
    ];
    public function acution_item()
    {
        return $this->hasMany(AcutionItems::class,'Acution_id','id');

        
    }

    public function reminders()
    {
        return $this->hasMany(reminder::class,'Acution_id','id');

        
    }
    public function AuctionUserLogs()
    {
        return $this->hasMany(userLog::class,'Acution_id','id');

        
    }

}
