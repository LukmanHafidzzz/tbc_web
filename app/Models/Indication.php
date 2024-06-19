<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indication extends Model
{
    use HasFactory;

    protected $fillable = [
        'indication_code',
        'indication_name',
        'md_score',
    ];

    protected $primaryKey = 'indication_code';
    public $incrementing = false;
    protected $keyType = 'string';
}
