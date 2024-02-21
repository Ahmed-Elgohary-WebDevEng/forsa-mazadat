<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function auctions(): HasMany
    {
        return $this->hasMany(Auctions::class, 'company_id');
    }
}
