<?php

namespace Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Domain\Enums\ClipStateEnum;

class Clip extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'external_game_id',
        'creator_id',
        'url',
        'title',
        'views',
        'duration',
        'state',
        'published_at',
    ];

    protected $casts = [
        'external_id' => 'string',
        'external_game_id' => 'string',
        'state' => ClipStateEnum::class,
        'views' => 'integer',
        'duration' => 'integer',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'external_game_id', 'external_id');
    }

    protected static function newFactory()
    {
        return \Domains\Factories\ClipFactory::new();
    }
}