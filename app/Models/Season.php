<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
