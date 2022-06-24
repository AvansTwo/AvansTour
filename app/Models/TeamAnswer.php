<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TeamAnswer extends Model
{
    use HasFactory;
    protected $table = "team_answer";

    protected $fillable = [
        'answer',
    ];

    public function teamProgress(): BelongsTo
    {
        return $this->belongsTo(teamProgress::class, "team_answer_id");
    }
    public function progress(): BelongsTo
    {
        return $this->belongsTo(teamProgress::class);
    }
}
