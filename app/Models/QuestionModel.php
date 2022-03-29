<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'texte',
        'image',
        'propositions',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'texte' => 'string',
        'image' => 'string',
        'propositions' => 'json',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    protected $table = 'questions';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

}
