<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }
    
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
