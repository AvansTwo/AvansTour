<?php

namespace App\Models;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $table = "question";

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'video_url',
        'gps_location',
        'points',
        'type',
        'tour_id'
    ];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(tour::class);
    }
    public function answer(): hasMany
    {
        return $this->hasMany(answer::class, 'question_id');
    }
    public function teamProgress(): HasMany
    {
        return $this->hasMany(teamProgress::class, 'question_id');
    }
}
