<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamProgress extends Model
{
    use HasFactory;

    protected $table = "team_progress";

    protected $fillable = [
        'team_id',
        'question_id',
        'team_answer_id',
        'created_at',
        'points',
        'status'
    ];

    public function team(): BelongsTo
    {
        return $this->BelongsTo(Team::class);
    }
    public function question(): BelongsTo
    {
        return $this->BelongsTo(Team::class);
    }
    public function teamAnswer(): BelongsTo
    {
        return $this->BelongsTo(teamAnswer::class);
    }
}
