<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ApprenantController extends Controller
{
    public function formations() {
        $formations = auth()->user()->formations()->with('chapitres.sousChapitres.quiz')->get();
        return view('apprenant.formations', compact('formations'));
    }
    public function notes() {
        $notes = auth()->user()->notes()->with('formation')->get();
        return view('apprenant.notes', compact('notes'));
    }
}