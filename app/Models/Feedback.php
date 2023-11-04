<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = [
        'title',
        'description',
        'category',
        'status',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
