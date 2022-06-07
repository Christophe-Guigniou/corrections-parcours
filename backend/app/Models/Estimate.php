<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'label',
        'additional_time',
        'total_time',
        'design_type',
        'project_type',
    ];

    public function lines()
    {
        return $this->hasMany(EstimateLine::class);
    }
       
}
