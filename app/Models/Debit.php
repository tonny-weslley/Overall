<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debit extends Model
{
    /** @use HasFactory<\Database\Factories\DebitFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'amount',
        'description',
        'date',
        'group_id',
        'code',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
