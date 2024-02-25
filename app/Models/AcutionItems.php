<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcutionItems extends Model
{
    use HasFactory;

    protected $table = 'acution_items';
    protected $fillable = [
        'Acution_id',
        'location',
        'name',
        'descripton',
        'space',
        'maxPrice',
        'lowPrice',
        'width',
        'length',
        'slug',
        'item_image',
        'number'
    ];

    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auctions::class, 'Acution_id', 'id');
    }
}
