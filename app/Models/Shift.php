<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shift extends Model
{
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
