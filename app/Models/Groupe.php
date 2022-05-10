<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'groupname',
        'moy',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'groupname' => 'string',
        'moy' => 'float',
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

	  public function questions() {
        return $this->belongsToMany(Question::class);
    }

}

