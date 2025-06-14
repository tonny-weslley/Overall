<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'favorite_number',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
