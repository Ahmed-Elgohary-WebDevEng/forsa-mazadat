<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agents extends Model
{
    use HasFactory;
    protected $table = 'agents';
    protected $fillable = [
        'name',
        'link',
        'logo',
    ];
    
}
