<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($game) {
            $game->slug = str()->slug($game->title);
        });

        static::updating(function ($game) {
            $game->slug = str()->slug($game->title);
        });
    }

    public function versions(): HasMany {
        return $this->hasMany(GameVersion::class);
    }
    public function version()
    {
        return $this->hasOne(GameVersion::class)->latestOfMany();
    }
}
