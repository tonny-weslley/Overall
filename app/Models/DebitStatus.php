<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class DebitStatus extends Model
{
    /** @use HasFactory<\Database\Factories\DebitStatusFactory> */
    use HasFactory, HasUuids, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'color',
        'step',
    ];
}
