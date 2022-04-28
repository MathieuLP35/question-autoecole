<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionGroupeModel extends Model
{
	use HasFactory;
	protected $fillable = [
        'id_question',
        'id_groupe',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'id_question' => 'BigInteger',
        'id_groupe' => 'BigInteger',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    protected $table = 'question_groupe';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

}
