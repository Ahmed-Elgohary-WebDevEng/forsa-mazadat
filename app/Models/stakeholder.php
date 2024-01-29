<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stakeholder extends Model
{
    use HasFactory;
    protected $table = 'stakeholders';
    protected $fillable = [
        'name',
        'link',
        'logo',
    ];
    
}
