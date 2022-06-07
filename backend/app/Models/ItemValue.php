<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'estimate_setting_id',
        'value',
        'slug',
        'time',
        'startup_time',
        'additional_time',
        'total_percentage',
    ];

    public function item()
    {
        return $this->belongsTo(Items::class);
    }
  
}
