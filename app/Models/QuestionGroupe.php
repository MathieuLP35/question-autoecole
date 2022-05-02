<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionGroupe extends Model
{
    use HasFactory;

    protected $table = 'question_groupes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

}
