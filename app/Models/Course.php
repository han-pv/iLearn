<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'name',
        'season',
        'start_date',
        'end_date',
        'description',
    ];

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
