<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGamification;
use App\Models\UserGlobalGamification;

class GamificationController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Valider les données reçues
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'quizzes' => 'required|array',
                'quizzes.*.quiz_id' => 'required|exists:quizzes,id',
                'quizzes.*.score' => 'required|integer',
            ]);
    
            $userId = $validated['user_id'];
            $quizzes = $validated['quizzes'];
    
            $responses = [];
    
            foreach ($quizzes as $quizData) {
                // Enregistrer ou mettre à jour les données spécifiques au quiz
                $gamification = UserGamification::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'quiz_id' => $quizData['quiz_id'],
                    ],
                    [
                        'score' => $quizData['score'],
                        'level' => $this->calculateLevel($quizData['score']),
                        'badges' => 0, // Nous n'utilisons pas ce champ comme indiqué
                        'is_valid' => $quizData['score'] >= 2, // Valider si le score est >= 2
                    ]
                );
    
                $responses[] = $gamification;
            }
    
            // Calculer le total des points pour l'utilisateur
            $totalPoints = UserGamification::where('user_id', $userId)->sum('score');
            
            // Récupérer l'enregistrement global actuel de l'utilisateur (s'il existe)
            $existingGamification = UserGlobalGamification::where('user_id', $userId)->first();
            
            // Déterminer le nombre de badges
            $badgeCount = 0;
            $newBadgeEarned = false; // Flag pour indiquer si un nouveau badge a été obtenu
            $badgeImagePath = '/storage/formations/badge.png'; // Chemin vers l'image du badge
            
            if ($existingGamification) {
                // Conserver le nombre actuel de badges
                $badgeCount = $existingGamification->badges;
                
                // Si le total des points est >= 4 et que l'utilisateur n'a pas encore reçu de badge pour cela
                if ($totalPoints >= 4 && $badgeCount == 0) {
                    $badgeCount = 1; // Attribuer un badge
                    $newBadgeEarned = true; // Un nouveau badge a été obtenu
                }
                
                // Vous pouvez ajouter d'autres paliers ici
                // Exemple pour un deuxième badge à 10 points
                if ($totalPoints >= 10 && $badgeCount < 2) {
                    $badgeCount = 2;
                    $newBadgeEarned = true;
                    $badgeImagePath = '/storage/formations/badge_silver.png'; // Vous pouvez utiliser des images différentes pour chaque niveau
                }
                
                // Exemple pour un troisième badge à 20 points
                if ($totalPoints >= 20 && $badgeCount < 3) {
                    $badgeCount = 3;
                    $newBadgeEarned = true;
                    $badgeImagePath = '/storage/formations/badge_gold.png';
                }
            } else if ($totalPoints >= 4) {
                // Nouvel utilisateur avec plus de 4 points reçoit directement un badge
                $badgeCount = 1;
                $newBadgeEarned = true;
            }
    
            // Mettre à jour ou créer les données globales
            $globalGamification = UserGlobalGamification::updateOrCreate(
                ['user_id' => $userId],
                [
                    'total_points' => $totalPoints,
                    'global_level' => $this->calculateGlobalLevel($totalPoints),
                    'badges' => $badgeCount, // Utiliser le compte de badges calculé
                ]
            );
    
            return response()->json([
                'message' => 'Scores enregistrés avec succès.',
                'data' => [
                    'quiz_gamifications' => $responses,
                    'global_gamification' => $globalGamification,
                    'new_badge_earned' => $newBadgeEarned, // Indiquer si un nouveau badge a été obtenu
                    'badge_image' => $newBadgeEarned ? $badgeImagePath : null, // Chemin vers l'image du badge
                ],
            ]);
        } catch (\Exception $e) {
            // Log l'erreur pour plus de détails
            \Log::error('Erreur dans GamificationController@store: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            
            return response()->json([
                'message' => 'Erreur lors de l\'enregistrement des scores.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    // Fonction pour calculer le niveau en fonction du score d'un quiz
    private function calculateLevel($score)
    {
        if ($score >= 1000) {
            return 'Expert';
        } elseif ($score >= 500) {
            return 'Intermédiaire';
        } else {
            return 'Débutant';
        }
    }

    // Fonction pour calculer le niveau global en fonction du total des points
    private function calculateGlobalLevel($totalPoints)
    {
        if ($totalPoints >= 5000) {
            return 'Maître';
        } elseif ($totalPoints >= 2000) {
            return 'Expert';
        } elseif ($totalPoints >= 1000) {
            return 'Intermédiaire';
        } else {
            return 'Débutant';
        }
    }
}