<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\FormationController;
use App\Http\Controllers\Admin\ChapitreController;
use App\Http\Controllers\Admin\SousChapitreController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\OllamaController;
use App\Http\Controllers\ApprenantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ResultatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('formations', FormationController::class);
    Route::resource('formations.chapitres', ChapitreController::class);
    Route::resource('chapitres.sous-chapitres', SousChapitreController::class);
    Route::resource('quiz', QuizController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('notes', NoteController::class);
    Route::get('ollama/generate', [OllamaController::class, 'form'])->name('ollama.form');
    Route::post('ollama/generate', [OllamaController::class, 'generate'])->name('ollama.generate');
    Route::get('resultats', [ResultatController::class, 'index'])->name('resultats.index');
    Route::post('formations/{formation}/ajouter', [FormationController::class, 'ajouterApprenant'])->name('formations.ajouter');
    Route::delete('formations/{formation}/retirer/{user}', [FormationController::class, 'retirerApprenant'])->name('formations.retirer');
});

Route::middleware('auth')->group(function () {
    Route::get('/mes-formations', [ApprenantController::class, 'formations'])->name('apprenant.formations');
    Route::get('/quiz/{quiz}', [QuizController::class, 'showQuiz'])->name('quiz.show');
    Route::post('/quiz/{quiz}/soumettre', [QuizController::class, 'soumettre'])->name('quiz.soumettre');
    Route::get('/mes-notes', [ApprenantController::class, 'notes'])->name('apprenant.notes');
});

require __DIR__.'/auth.php';