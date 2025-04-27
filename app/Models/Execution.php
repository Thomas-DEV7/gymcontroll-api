<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Execution extends Model
{
    use HasFactory;

    protected $table = 'executions';

    protected $fillable = [
        'uuid',
        'exercise_id',
        'weight',
        'amount'
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
