<?php

namespace Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'external_id',
    ];

    protected $casts = [
        'external_id' => 'string',
    ];

    public function clips()
    {
        return $this->hasMany(Clip::class);
    }

    protected static function newFactory()
    {
        return \Domains\Factories\AuthorFactory::new();
    }
}