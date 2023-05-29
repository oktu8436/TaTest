<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'total_questions',
        'correct_answers',
        'incorrect_answers',
        'percentage'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
