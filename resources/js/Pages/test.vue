<template>
    <AuthenticatedLayout>
      <div class="container mx-auto p-6">
        <!-- Titre de la formation -->
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">
          📘 {{ formation?.titre || 'Chargement...' }}
        </h1>
  
        <!-- Informations de la formation -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-lg mb-6">
          <p><strong>💰 Prix :</strong> {{ formation?.prix }} €</p>
          <p><strong>🎓 Certification :</strong> {{ formation?.estcertifiante ? 'Oui' : 'Non' }}</p>
        </div>
  
        <!-- Image -->
        <div v-if="formation?.image_formation" class="text-center mb-6">
          <img :src="`/storage/${formation.image_formation}`" alt="Image de la formation" 
               class="w-64 h-64 object-cover mx-auto rounded-lg shadow-lg">
        </div>
  
        <!-- Modules -->
        <h2 class="text-2xl font-semibold text-gray-700 mt-8">📚 Modules</h2>
        <ul v-if="formation?.modules?.length">
          <li v-for="module in formation.modules" :key="module.id" class="mt-4 p-4 bg-gray-100 rounded-lg">
            <h3 class="text-lg font-bold text-blue-600">📖 {{ module.titre }}</h3>
            <p v-if="module.description" class="text-gray-600">{{ module.description }}</p>
            <p><strong>🔢 Ordre :</strong> {{ module.ordre }}</p>
            <p><strong>⏳ Durée estimée :</strong> {{ module.duree_estimee }} heures</p>
  
            <!-- Leçons -->
            <h4 class="text-md font-semibold text-gray-700 mt-4">📜 Leçons</h4>
            <ul v-if="module.lecons?.length" class="mt-2 pl-4 list-disc">
              <li v-for="lecon in module.lecons" :key="lecon.id">
                <strong class="text-lg">📌 {{ lecon.titre }}</strong> 
                <p class="text-gray-700">{{ lecon.contenu }}</p>
  
                <!-- Vidéos -->
                <div v-if="lecon.videos?.length" class="mt-4">
                  <h4 class="text-md font-semibold text-blue-500">🎥 Vidéos :</h4>
                  <ul class="mt-2 pl-4">
                    <li v-for="video in lecon.videos" :key="video.id">
                      <div class="mt-2">
                            <h5 class="text-blue-600 font-semibold">{{ video.titre || 'Vidéo' }}</h5>
                            <video controls class="w-full rounded-lg shadow-md">
                              <source :src="video.url" type="video/mp4">
                              Votre navigateur ne supporte pas la lecture de vidéos.
                            </video>
                          </div>
                    </li>
                  </ul>
                </div>
  
                <!-- Documents -->
                <div v-if="lecon.documents?.length" class="mt-4">
                  <h4 class="text-md font-semibold text-green-500">📄 Documents :</h4>
                  <ul class="mt-2 pl-4">
                    <li v-for="document in lecon.documents" :key="document.id" class="mb-4">
                      <h5 class="text-green-600 font-semibold">{{ document.titre || 'Document' }}</h5>
                      <div class="mt-2">
                        <div class="resize-y overflow-auto border rounded-lg" style="width: 100%; height: 400px;">
                          <embed
                            :src="document.url"
                            class="w-full h-full"
                            type="application/pdf"
                          />
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
  
                <!-- Quiz -->
                <div v-if="lecon.quiz" class="mt-4">
                  <h4 class="text-md font-semibold text-purple-500">📝 Quiz : {{ lecon.quiz.titre }}</h4>
                  <p><strong>⏳ Durée maximale :</strong> {{ lecon.quiz.dureeMaximale }} minutes</p>
                  <p><strong>📊 Note finale :</strong> {{ lecon.quiz.noteFinale }}</p>
  
                 <!-- Questions -->
                 <div v-if="lecon.quiz.questions?.length" class="mt-4">
                    <h5 class="text-md font-semibold text-gray-700">❓ Questions :</h5>
                    <ul class="mt-2 pl-4 list-disc">
                      <li v-for="(question, questionIndex) in lecon.quiz.questions" :key="question.id">
                        <p class="text-gray-800 font-medium">{{ question.contenu }}</p>
  
                        <!-- Réponses -->
                        <ul class="mt-2 pl-4 list-disc">
                          <li v-for="(reponse, reponseIndex) in question.reponses" :key="reponse.id">
                            <label>
                              <input
                                type="radio"
                                :name="`question-${question.id}`"
                                :value="reponse.id"
                                v-model="userAnswers[question.id]"
                              />
                              {{ reponse.contenu }}
                            </label>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </li>
        </ul>
  
        <p v-else class="text-gray-500 mt-4">Aucun module disponible.</p>
      </div>
   <!-- Bouton pour soumettre les réponses -->
   <div v-if="formation?.modules?.length" class="text-center mt-6">
          <button
            @click="submitAnswers"
            class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200"
          >
            Soumettre les réponses
          </button>
        </div>
      <!-- Boutons Modifier et Supprimer -->
      <div v-if="formation?.id" class="text-center mt-6">
        <Link :href="`/formations/${formation.id}/edit`" 
              class="px-6 py-2 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition duration-200 mr-2">
          ✏️ Modifier
        </Link>
  
        <button @click="deleteFormation"
          class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-200">
          🗑️ Supprimer
        </button>
      </div>
    </AuthenticatedLayout>
  </template>
  
  
  <script setup lang="ts">
  import { defineProps, reactive } from "vue";
  import { router } from "@inertiajs/vue3";
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Link } from '@inertiajs/vue3';
  import axios from 'axios';
  
  // Définition des types
  interface Reponse {
    id: number;
    contenu: string;
    est_correcte: boolean;
  }
  
  interface Question {
    id: number;
    contenu: string;
    reponses?: Reponse[];
  }
  
  interface Quiz {
    id: number;
    titre: string;
    noteFinale: number;
    dureeMaximale: number;
    questions?: Question[];
  }
  
  interface Video {
    id: number;
    titre: string;
    url: string;
  }
  
  interface Document {
    id: number;
    titre: string;
    url: string;
  }
  
  interface Lecon {
    id: number;
    titre: string;
    contenu: string;
    videos?: Video[];
    documents?: Document[];
    quiz?: Quiz;
  }
  
  interface Module {
    id: number;
    titre: string;
    description?: string;
    ordre: number;
    duree_estimee: number;
    lecons?: Lecon[];
  }
  
  interface Formation {
    id: number;
    titre: string;
    prix: number;
    estcertifiante: boolean;
    image_formation: string | null;
    modules?: Module[];
  }
  
  // Propriétés reçues depuis Laravel (Inertia.js)
  const props = defineProps<{ formation?: Formation }>();
  // Réponses de l'utilisateur
  const userAnswers = reactive<Record<number, number>>({});
    const score = reactive({ value: 0 });
  // Fonction pour soumettre les réponses
  const submitAnswers = async () => {
    score.value = 0;
  
    // Préparer les données pour tous les quiz
    const quizzes = props.formation?.modules?.flatMap(module =>
      module.lecons?.flatMap(lecon => {
        if (lecon.quiz) {
          let quizScore = 0;
          let totalQuestions = 0;
  
          // Calculer le score pour ce quiz
          lecon.quiz.questions?.forEach(question => {
            totalQuestions++;
            const userAnswerId = userAnswers[question.id];
            const correctAnswer = question.reponses?.find(reponse => reponse.est_correcte);
            const isCorrect = correctAnswer?.id === userAnswerId;
  
            if (isCorrect) {
              quizScore += 1;
            }
          });
  
          return {
            quiz_id: lecon.quiz.id,
            score: quizScore,
          };
        }
        return null;
      })
    ).filter(Boolean); // Supprimer les valeurs nulles
  
    if (!quizzes || quizzes.length === 0) {
      alert("Aucun quiz trouvé pour cette formation.");
      return;
    }
  
    try {
      // Envoyer les données au backend
      const response = await axios.post('/gamification/submit', {
        user_id: 1, // Remplacez par l'ID de l'utilisateur connecté
        quizzes, // Envoyer tous les quiz avec leurs scores
      });
  
      alert("Scores enregistrés avec succès !");
      console.log(response.data);
    } catch (error) {
      console.error('Erreur lors de la soumission des scores :', error);
      alert('Une erreur est survenue lors de la soumission.');
    }
  };
  // Fonction pour supprimer la formation
  const deleteFormation = () => {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette formation ? Cette action est irréversible.")) {
      router.delete(`/formations/${props.formation?.id}`, {
        onSuccess: () => alert("Formation supprimée avec succès !")
      });
    }
  };
  </script>