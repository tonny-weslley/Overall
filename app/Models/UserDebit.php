<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDebit extends Model
{
    /** @use HasFactory<\Database\Factories\UserDebitFactory> */
    use HasFactory, HasUuids, SoftDeletes;
    protected $fillable = [
        'user_id',
        'debit_id',
        'status_id',
    ];
}
