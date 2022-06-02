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

    protected $table = "tour";

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'category_id',
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

    public function question(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
