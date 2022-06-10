<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    use HasFactory;
    protected $fillable = [
      "text",
      "user_id",
      "recipe_id"
    ];

    public function recipe()
    {
        $this->belongsTo(Recipe::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
