<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Formation;
use App\Models\Chapitre;
use App\Models\SousChapitre;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Reponse;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@lms.fr',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Apprenant
        $apprenant = User::create([
            'name' => 'Alice',
            'email' => 'alice@lms.fr',
            'password' => bcrypt('password'),
            'role' => 'apprenant'
        ]);

        // Formation
        $formation = Formation::create([
            'nom' => 'Anglais Débutant',
            'description' => 'Bases de l\'anglais',
            'niveau' => 'Débutant'
        ]);

        // Lier l’apprenant à la formation
        $formation->apprenants()->attach($apprenant->id);

        // Chapitre
        $chapitre = Chapitre::create([
            'titre' => 'Les verbes irréguliers',
            'formation_id' => $formation->id
        ]);

        // Sous-chapitre
        $sc = SousChapitre::create([
            'titre' => '10 verbes indispensables',
            'contenu' => '<p>Go, come, be, have...</p>',
            'chapitre_id' => $chapitre->id
        ]);

        // Quiz
        $quiz = Quiz::create([
            'titre' => 'Quiz verbes irréguliers',
            'sous_chapitre_id' => $sc->id
        ]);

        // Question et réponses
        $q = Question::create([
            'question' => 'Quel est le prétérit de go ?',
            'quiz_id' => $quiz->id
        ]);

        Reponse::create(['texte' => 'goed', 'est_correcte' => false, 'question_id' => $q->id]);
        Reponse::create(['texte' => 'went', 'est_correcte' => true, 'question_id' => $q->id]);
        Reponse::create(['texte' => 'gone', 'est_correcte' => false, 'question_id' => $q->id]);
    }
}