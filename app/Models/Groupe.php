<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'texte',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'texte' => 'string',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    protected $table = 'groupes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    public function groupe()
    {
        return $this->hasMany(User::class);
    }
    
}

