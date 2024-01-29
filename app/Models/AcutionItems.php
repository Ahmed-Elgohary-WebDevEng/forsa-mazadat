<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
    public function Acution()
    {
        return $this->belongsTo(Auctions::class,'Acution_id','id');
    }
}
