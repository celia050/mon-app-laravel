<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Resultat;

class ResultatController extends Controller
{
    public function index() {
        $resultats = Resultat::with(['user', 'quiz'])->orderBy('created_at', 'desc')->get();
        return view('admin.resultats.index', compact('resultats'));
    }
}