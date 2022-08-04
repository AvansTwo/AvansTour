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

    protected $table="tour";

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'location',
        'category_id',
        'active',
        'user_id'
    ];

    public function team(): HasMany
    {
        return $this->hasMany(Team::class, 'tour_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tourQuestion(): HasMany
    {
        return $this->hasMany(TourQuestion::class, 'tour_id');
    }
}
