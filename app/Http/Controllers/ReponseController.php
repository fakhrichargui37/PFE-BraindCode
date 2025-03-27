<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reponse;
class ReponseController extends Controller
{
    public function storeMultiple(Request $request)
{
    // Valider les données envoyées
    $validated = $request->validate([
        'question_id' => 'required|exists:questions,id',
        'reponses' => 'required|array', // Assurer que 'reponses' est un tableau
        'reponses.*.contenu' => 'required|string', // Chaque réponse doit avoir un contenu
        'reponses.*.est_correcte' => 'required|boolean', // Chaque réponse doit spécifier si elle est correcte ou non
    ]);

    // Vérifier s'il y a une réponse correcte dans les nouvelles réponses
    $hasCorrectAnswer = collect($validated['reponses'])->contains('est_correcte', true);

    if ($hasCorrectAnswer) {
        // Désactiver l'ancienne réponse correcte s'il y en avait une
        Reponse::where('question_id', $validated['question_id'])
               ->where('est_correcte', true)
               ->update(['est_correcte' => false]);
    }

    // Insérer plusieurs réponses
    $newReponses = [];
    foreach ($validated['reponses'] as $reponse) {
        $newReponses[] = Reponse::create([
            'question_id' => $validated['question_id'],
            'contenu' => $reponse['contenu'],
            'est_correcte' => $reponse['est_correcte'],
        ]);
    }

    // Retourner la liste des réponses ajoutées
    return response()->json([
        'message' => 'Réponses ajoutées avec succès',
        'reponses' => $newReponses,
    ], 201);
}


  /*  public function showResponses(Request $request)
{
    // Valider que le corps de la requête contient l'ID de la question
    $validated = $request->validate([
        'question_id' => 'required|exists:questions,id', // Vérifier que l'ID de la question existe dans la table questions
    ]);

    // Récupérer toutes les réponses associées à la question spécifiée
    $reponses = Reponse::where('question_id', $validated['question_id'])->get();

    // Vérifier si des réponses existent
    if ($reponses->isEmpty()) {
        return response()->json([
            'message' => 'Aucune réponse trouvée pour cette question.'
        ], 404); // Retourner un message 404 si aucune réponse n'est trouvée
    }

    // Retourner les réponses trouvées
    return response()->json([
        'message' => 'Réponses récupérées avec succès.',
        'reponses' => $reponses
    ], 200); // Code 200 pour indiquer la récupération réussie
}*/

    
}
