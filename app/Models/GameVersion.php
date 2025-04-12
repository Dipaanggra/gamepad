<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameVersion extends Model
{
    /** @use HasFactory<\Database\Factories\GameVersionFactory> */
    use HasFactory;

    protected $fillable = [
        'version',
        'path',
        'cover',
        'game_id'
    ];
    public function game(): BelongsTo {
        return $this->belongsTo(Game::class);
    }

    public function scores(): HasMany {
        return $this->hasMany(Score::class);
    }
}
