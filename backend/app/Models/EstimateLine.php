<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'estimate_id',
        'type', 
        'time',
    ];

    public function estimate()
    {
        return $this->belongsTo(Estimate::class);
    }
}
