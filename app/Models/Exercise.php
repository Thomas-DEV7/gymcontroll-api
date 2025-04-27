<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Exercise extends Model
{
    protected $fillable = ['uuid', 'name', 'training_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    // Relacionamentos
    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
