<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamAnswer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "team_answer";

    protected $fillable = [
        'answer',
    ];

    public function teamProgress(): BelongsTo
    {
        return $this->belongsTo(teamProgress::class, "team_answer_id");
    }
}
