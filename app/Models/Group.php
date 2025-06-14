<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PlayerGroup;


class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory, HasUuids, SoftDeletes;
    protected $fillable = [
        'name',
        'acronym',
        'description',
    ];

    public function playerGroups () {
        return $this->hasMany(PlayerGroup::class);
    }

}
