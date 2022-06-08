<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    protected $table="category";

    public function tour(): HasMany
    {
        return $this->hasMany(tour::class, 'category_id');
    }
}
