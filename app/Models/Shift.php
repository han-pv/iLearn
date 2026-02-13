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

    public function getName()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->name_tm ?: $this->name;
        } else if ($locale == 'ru') {
            return $this->name_ru ?: $this->name;
        }
        return $this->name;
    }
}
