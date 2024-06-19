<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'indication_code',
        'knowledge_id',
    ];

    protected $primaryKey = 'id';

    public function indication()
    {
        return $this->belongsTo(Indication::class, 'indication_code', 'indication_code');
    }

    public function knowledgeData()
    {
        return $this->belongsTo(KnowledgeData::class, 'knowledge_id');
    }
}
