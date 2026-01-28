<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'content',
        'id_recipe',
        'id_user'
    ];

    public function user()
    {
        return $this->BelongsTo(User::class, 'id_user');
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'id_recipe');
    }

}
