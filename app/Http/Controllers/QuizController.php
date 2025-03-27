<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Lecon;

class QuizController extends Controller
{
    public function store(Request $request)
{
    try {
        // Validation des données
        $validated = $request->validate([
           // 'lecon_id' => 'required|exists:lecons,id',
            'titre' => 'required|string|max:255',
            'noteFinale' => 'required|integer',
            'dureeMaximale' => 'required|integer'
        ]);

        // Création du quiz
        $quiz = Quiz::create($validated);

        return response()->json(['message' => 'Quiz créé avec succès', 'quiz' => $quiz], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function getByLecon($lecon_id)
{
    // Vérifier si la leçon existe
    $lecon = Lecon::find($lecon_id);
    
    if (!$lecon) {
        return response()->json(['error' => 'Leçon non trouvée.'], 404);
    }

    // Récupérer les quiz liés à cette leçon
    $quizzes = Quiz::where('lecon_id', $lecon_id)->get();

    // Vérifier s'il y a des quiz associés
    if ($quizzes->isEmpty()) {
        return response()->json(['message' => 'Aucun quiz trouvé pour cette leçon.'], 200);
    }

    return response()->json($quizzes, 200);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
