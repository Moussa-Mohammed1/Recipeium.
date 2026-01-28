<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $table = 'steps';
    protected $fillable = [
        'content',
        'id_recipe'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'id_recipe');
    }
}
