<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Teacher extends Model
{
    use HasFactory;

        protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'address',
        'experience',
        'degree',
        'knowledge',
        'education',
        'bio',
        'salary',
        'image_path',
    ];

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
