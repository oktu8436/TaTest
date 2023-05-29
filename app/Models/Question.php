<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'text',
        'type',
        'correct_answer',
    ];

    public function choices() {
        return $this->hasMany(Choice::class, 'question_id', 'id');
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
