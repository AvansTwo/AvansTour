<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'user_id'
    ];

    public function team(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function question(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
