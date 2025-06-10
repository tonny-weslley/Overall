<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

// relational model for player groups
use App\Models\Player;
use App\Models\Group;

class PlayerGroup extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerGroupFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'player_id',
        'group_id',
        'is_admin',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
