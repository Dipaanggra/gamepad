<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    protected $fillable = [
        'game_version_id',
        'user_id',
        'score',
    ];
    /** @use HasFactory<\Database\Factories\ScoreFactory> */
    use HasFactory;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }


}
