<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'university_id','notation_criterion_id', 'note'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function university():BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public  function notation_criterion():BelongsTo
    {
        return $this->belongsTo(NotationCriterion::class);
    }

}
