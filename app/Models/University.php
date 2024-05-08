<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'location', 'website', 'founded_date',
    ];

    public function notations():HasMany
    {
        return $this->hasMany(Notation::class);
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
