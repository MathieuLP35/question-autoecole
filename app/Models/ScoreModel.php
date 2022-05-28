<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreModel extends Model
{
    use HasFactory;

	protected $fillable = [
        'moy_user',
        'user_id',
		'created_at',
        'updated_at',
    ];
	
    protected $casts = [
		'moy' => 'float',/* moy ou moy_user ?(voir table euristique) */
        'user_id' => 'integer',
		'created_at' => 'date',
		'updated_at' => 'date',
    ];

    protected $table = 'scores';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

	public function user(){
        return $this->belongsTo(User::class);
    }
}
