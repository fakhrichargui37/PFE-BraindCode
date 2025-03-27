<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
class QuestionController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données envoyées
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id', // Assurez-vous que le quiz existe
            'contenu' => 'required', // Le texte de la question, aucun besoin de 'string' ici
        ]);
    
        // Créer une nouvelle question
        $question = Question::create([
            'quiz_id' => $validated['quiz_id'],
            'contenu' => $validated['contenu'],
        ]);
    
        // Retourner une réponse ou rediriger l'utilisateur
        return response()->json([
            'message' => 'Question ajoutée avec succès',
            'question' => $question,
        ], 201); // Code 201 pour indiquer la création réussie
    }
    
    
    
}
