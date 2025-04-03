<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Training extends Model
{
    protected $fillable = ['uuid', 'name', 'user_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    // Relacionamentos
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
