<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reminder extends Model
{
    use HasFactory;
    protected $table = 'reminders';
    protected $fillable = [
        'Acution_id',
        'Fullname',
        'mobile_no',
        'timezoneoffset',
        'message',
        'slug',
        'is_sent'

    ];
    public function Acutionreminder()
    {
        return $this->belongsTo(Auctions::class,'Acution_id','id');
    }
}
