<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $table="answer";

    protected $fillable = [
        'answer',
        'correct_answer',
        'question_id',
        'created_at',
        'updated_at'
    ];

    public function question(): BelongsTo
    {
        return $this->BelongsTo(question::class);
    }
    public function teamProgress(): HasMany
    {
        return $this->hasMany(teamProgress::class, 'answer_id');
    }
}
