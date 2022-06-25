<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'questions',
        'user_id',
        'groupe_id',
        'result',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'questions' => 'json',
        'user_id' => 'integer',
        'groupe_id' => 'integer',
        'result' => 'integer',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    protected $table = 'questionnaire';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

}
