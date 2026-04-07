<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz'; 
    protected $fillable = ['titre', 'sous_chapitre_id'];

    public function sousChapitre() { return $this->belongsTo(SousChapitre::class); }
    public function questions() { return $this->hasMany(Question::class); }
    public function resultats() { return $this->hasMany(Resultat::class); }
}
