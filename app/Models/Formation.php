<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    public function chapitres() { return $this->hasMany(Chapitre::class); }
    public function apprenants() { return $this->belongsToMany(User::class); }
    public function notes() { return $this->hasMany(Note::class); }
    protected $fillable = ['nom', 'description', 'niveau', 'duree'];
}
