<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLog extends Model
{
    use HasFactory;

    protected $table = 'user_logs';
    protected $fillable = [
        'slug',
        'auction_id',
        'first_name',
        'last_name',
        'identity',
        'phone'
    ];

    public function acution(): BelongsTo
    {
        return $this->belongsTo(Auctions::class);
    }
}
