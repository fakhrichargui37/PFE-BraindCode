<template>
  <AuthenticatedLayout>
<<<<<<< HEAD
    <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-black dark:text-gray-200"
            >
            📘 {{ formation?.titre || 'Chargement...' }}
            </h2>
        </template>
    <div class="container mx-auto p-6">
      <!-- Informations de la formation -->
      <div class="bg-gray-100 p-6 rounded-lg shadow-lg mb-6">
        <p><strong>💰 Prix :</strong> {{ formation?.prix }} €</p>
        <p><strong>🎓 Certification :</strong> {{ formation?.estcertifiante ? 'Oui' : 'Non' }}</p>
        <p><strong>🏷️ Catégorie :</strong> {{ formation?.category?.name || 'Non spécifiée' }}</p>
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
                    <a :href="`/storage/videos/${video.file}`" target="_blank" class="text-blue-600 hover:underline">
                      {{ video.titre || 'Vidéo' }}
                    </a>
                  </li>
                </ul>
=======
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-10">
      <div class="container mx-auto p-6 max-w-5xl">
        <!-- En-tête de formation -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-10">
          <!-- Image de bannière -->
          <div v-if="formation?.image_formation" class="h-64 bg-gradient-to-r from-blue-500 to-indigo-600 relative overflow-hidden">
            <img :src="`/storage/${formation.image_formation}`" alt="Image de la formation" 
                 class="w-full h-full object-cover opacity-80 mix-blend-overlay">
            <div class="absolute inset-0 flex items-center justify-center">
              <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 text-center drop-shadow-lg px-4">
                📘 {{ formation?.titre || 'Chargement...' }}
              </h1>
            </div>
          </div>
          
          <!-- Titre sans image -->
          <div v-else class="bg-gradient-to-r from-blue-500 to-indigo-600 py-12 px-6">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 text-center drop-shadow-lg">
              📘 {{ formation?.titre || 'Chargement...' }}
            </h1>
          </div>
          
          <!-- Informations de la formation -->
          <div class="p-8 flex flex-wrap justify-between items-center">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
              <div class="bg-blue-100 rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <p class="text-sm text-gray-500">Prix</p>
                <p class="text-lg font-bold text-gray-800">{{ formation?.prix }} €</p>
              </div>
            </div>
            
            <div class="flex items-center space-x-4">
              <div class="bg-purple-100 rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
              </div>
              <div>
                <p class="text-sm text-gray-500">Certification</p>
                <span class="px-3 py-1 text-sm rounded-full font-medium" 
                     :class="formation?.estcertifiante ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700'">
                  {{ formation?.estcertifiante ? 'Certifiante' : 'Non certifiante' }}
                </span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Module actuel -->
        <div v-if="currentModule" class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8 transform transition-all duration-200 hover:shadow-2xl">
          <div class="bg-gradient-to-r from-indigo-500 to-purple-600 py-4 px-6">
            <h2 class="text-2xl font-bold text-white">
              Module {{ currentModuleIndex.value + 1 }} : {{ currentModule.titre }}
            </h2>
            <div class="flex items-center mt-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="ml-2 text-indigo-100">{{ currentModule.duree_estimee || 0 }} minutes</span>
            </div>
          </div>
          
          <div class="p-6">
            <p class="text-gray-700 mb-4">{{ currentModule.description }}</p>
            
            <!-- Leçon actuelle -->
            <div v-if="currentLecon" class="border border-gray-200 rounded-xl p-6 mt-6 bg-gray-50">
              <div class="flex items-center mb-4">
                <div class="bg-blue-600 h-8 w-8 rounded-full flex items-center justify-center mr-3">
                  <span class="text-white font-bold">{{ currentLeconIndex.value + 1 }}</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800">{{ currentLecon.titre }}</h3>
              </div>
              
              <div class="prose max-w-none mb-8">
                <p>{{ currentLecon.contenu }}</p>
              </div>
              
              <!-- Vidéos -->
              <div v-if="currentLecon?.videos?.length" class="mb-8">
                <h4 class="flex items-center text-lg font-bold text-gray-800 mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                  </svg>
                  Vidéos
                </h4>
                
                <div class="grid gap-6">
                  <div v-for="video in currentLecon?.videos" :key="video.id"
                       class="bg-white rounded-xl overflow-hidden shadow-lg border border-gray-100">
                    <div class="p-4 border-b border-gray-100">
                      <h5 class="font-semibold text-gray-800">{{ video.titre || 'Vidéo' }}</h5>
                    </div>
                    <video controls class="w-full">
                      <source :src="video.url" type="video/mp4">
                      Votre navigateur ne supporte pas la lecture de vidéos.
                    </video>
                  </div>
                </div>
>>>>>>> a81829e (nfadelkouch ya fakhrouch)
              </div>
              
              <!-- Documents -->
<<<<<<< HEAD
              <div v-if="lecon.documents?.length" class="mt-4">
                <h4 class="text-md font-semibold text-green-500">📄 Documents :</h4>
                <ul class="mt-2 pl-4">
                  <li v-for="document in lecon.documents" :key="document.id">
                    <a :href="`/storage/documents/${document.file}`" target="_blank" class="text-green-600 hover:underline">
                      {{ document.titre || 'Document' }}
                    </a>
                  </li>
                </ul>
=======
              <div v-if="currentLecon?.documents?.length" class="mb-8">
                <h4 class="flex items-center text-lg font-bold text-gray-800 mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  Documents
                </h4>
                
                <div class="grid gap-6">
                  <div v-for="document in currentLecon.documents" :key="document.id"
                       class="bg-white rounded-xl overflow-hidden shadow-lg border border-gray-100">
                    <div class="p-4 border-b border-gray-100">
                      <h5 class="font-semibold text-gray-800">{{ document.titre || 'Document' }}</h5>
                    </div>
                    <div class="h-[400px] resize-y overflow-auto">
                      <embed :src="document.url" class="w-full h-full" type="application/pdf" />
                    </div>
                  </div>
                </div>
>>>>>>> a81829e (nfadelkouch ya fakhrouch)
              </div>
              
              <!-- Quiz Section -->
              <div v-if="currentLecon?.quiz" class="bg-white rounded-xl shadow-lg border border-purple-100 overflow-hidden mt-8">
                <!-- Quiz Header -->
                <div class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-4">
                  <h4 class="text-lg font-bold text-white flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Quiz : {{ currentLecon.quiz.titre }}
                  </h4>
                </div>
                
                <!-- Quiz validation status -->
                <div class="p-4 border-b border-gray-100" 
                     :class="quizValidationStatus[currentLecon.quiz.id] === true 
                            ? 'bg-green-50'
                            : quizValidationStatus[currentLecon.quiz.id] === false
                              ? 'bg-red-50'
                              : 'bg-blue-50'">
                  <div class="flex items-center">
                    <svg v-if="quizValidationStatus[currentLecon.quiz.id] === true" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <svg v-else-if="quizValidationStatus[currentLecon.quiz.id] === false" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium" :class="{
                      'text-green-700': quizValidationStatus[currentLecon.quiz.id] === true,
                      'text-red-700': quizValidationStatus[currentLecon.quiz.id] === false,
                      'text-blue-700': quizValidationStatus[currentLecon.quiz.id] === undefined
                    }">
                      {{ getQuizStatusMessage(currentLecon.quiz.id) }}
                    </span>
                  </div>
                </div>
                
                <!-- Quiz Questions -->
                <div class="p-6">
                  <div v-if="currentLecon.quiz.questions?.length" class="space-y-8">
                    <div v-for="(question, questionIndex) in currentLecon.quiz.questions" :key="question.id"
                         class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                      <p class="text-gray-800 font-medium mb-4 flex">
                        <span class="bg-purple-600 text-white h-6 w-6 rounded-full flex items-center justify-center mr-3 shrink-0">
                          {{ questionIndex + 1 }}
                        </span>
                        {{ question.contenu }}
                      </p>
                      
                      <div class="ml-9 space-y-3">
                        <div v-for="reponse in question.reponses" :key="reponse.id"
                             class="flex items-start">
                          <div class="flex h-5 items-center">
                            <input type="radio"
                                   :id="`reponse-${reponse.id}`"
                                   :name="`question-${question.id}`"
                                   :value="reponse.id"
                                   v-model="userAnswers[question.id]"
                                   class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          </div>
                          <label :for="`reponse-${reponse.id}`" class="ml-3 block text-sm font-medium leading-6 text-gray-700">
                            {{ reponse.contenu }}
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Quiz Submit Button -->
                  <div class="mt-6">
                    <button v-if="quizValidationStatus[currentLecon.quiz.id] !== true"
                            @click="submitAnswers"
                            class="w-full py-3 px-5 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold rounded-lg hover:from-purple-600 hover:to-pink-600 shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      Soumettre les réponses
                    </button>
                    
                    <div v-else class="w-full py-3 px-5 bg-green-100 text-green-700 font-semibold rounded-lg shadow-md flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      Quiz validé ! Vous pouvez passer à la suite
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Navigation Controls -->
        <div class="mt-8 space-y-4">
          <!-- Message d'avertissement si quiz non validé -->
          <div v-if="currentLecon?.quiz && !canNavigateToNextLecon && currentLeconIndex.value < totalLecons - 1" 
               class="p-3 text-sm text-center text-amber-700 bg-amber-100 rounded-lg border border-amber-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            Vous devez valider ce quiz pour continuer à la leçon suivante
          </div>
          
          <!-- Navigation des leçons -->
          <div class="flex justify-between">
            <button
              @click="prevLecon"
              :disabled="currentLeconIndex.value === 0"
              class="flex items-center px-4 py-2 bg-white text-gray-700 font-medium rounded-lg shadow-md disabled:opacity-50 disabled:cursor-not-allowed hover:bg-gray-50 transition-all"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
              Leçon précédente
            </button>
            <button
              @click="nextLecon"
              :disabled="!canNavigateToNextLecon || currentLeconIndex.value >= totalLecons - 1"
              class="flex items-center px-4 py-2 bg-white text-gray-700 font-medium rounded-lg shadow-md disabled:opacity-50 disabled:cursor-not-allowed hover:bg-gray-50 transition-all"
            >
              Leçon suivante
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
          
          <!-- Navigation des modules -->
          <div class="flex justify-between">
            <button
              @click="prevModule"
              :disabled="currentModuleIndex.value === 0"
              class="flex items-center px-4 py-2 bg-white text-gray-700 font-medium rounded-lg shadow-md disabled:opacity-50 disabled:cursor-not-allowed hover:bg-gray-50 transition-all"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
              Module précédent
            </button>
            <button
              @click="nextModule"
              :disabled="currentModuleIndex.value >= totalModules - 1"
              class="flex items-center px-4 py-2 bg-white text-gray-700 font-medium rounded-lg shadow-md disabled:opacity-50 disabled:cursor-not-allowed hover:bg-gray-50 transition-all"
            >
              Module suivant
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
        </div>
        
        <!-- Admin Actions -->
        <div v-if="formation?.id" class="mt-8">
          <div class="grid grid-cols-2 gap-4">
            <Link :href="`/formations/${formation.id}/edit`" 
                  class="py-3 px-5 bg-gradient-to-r from-amber-400 to-amber-500 text-white font-semibold rounded-lg hover:from-amber-500 hover:to-amber-600 shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
              Modifier
            </Link>
      
            <button 
              @click="deleteFormation"
              class="py-3 px-5 bg-gradient-to-r from-red-500 to-rose-500 text-white font-semibold rounded-lg hover:from-red-600 hover:to-rose-600 shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              Supprimer
            </button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal d'affichage du badge -->
    <div v-if="showBadgeModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg p-8 max-w-md w-full text-center transform transition-all animate-fadeIn">
        <h2 class="text-2xl font-bold text-purple-800 mb-4">🎉 Félicitations ! 🎉</h2>
        <p class="text-lg mb-6">Vous avez obtenu un nouveau badge !</p>
        
        <div class="flex justify-center mb-6">
          <img :src="badgeImage" alt="Badge obtenu" class="h-40 w-40 object-contain animate-bounce">
        </div>
        
        <p class="text-gray-700 mb-6">Continuez à apprendre pour débloquer plus de badges !</p>
        
        <button @click="showBadgeModal = false" 
                class="px-6 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold rounded-lg">
          Super !
        </button>
      </div>
    </div>
    
  </AuthenticatedLayout>
</template>

<script setup lang="ts">
import { defineProps, reactive, computed, ref } from "vue";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';

import { Link } from '@inertiajs/vue3';
import { router, usePage } from "@inertiajs/vue3";

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
  category?: Category;
}
interface Category {
  id: number;
  name: string;
}
// Définition du type pour les propriétés de page
interface User {
  id: number;
  name: string;
  email: string;
}

interface PageProps {
  auth: {
    user: User | null;
  };
  [key: string]: any;
}

// Récupération de l'utilisateur connecté
const page = usePage<PageProps>();
const userId = computed(() => page.props.auth.user?.id);

// Propriétés reçues depuis Laravel (Inertia.js)
const props = defineProps<{ formation?: Formation }>();

// État de validation des quiz
const quizValidationStatus = reactive<Record<number, boolean>>({});
const lastSubmittedResults = ref<any>(null);

// Indices réactifs pour la navigation
const currentModuleIndex = reactive({ value: 0 });
const currentLeconIndex = reactive({ value: 0 });
const currentQuestionIndex = reactive({ value: 0 });

// Réponses utilisateur pour les questions
const userAnswers = reactive<Record<number, number | null>>({});

// Score utilisateur pour les quiz
const score = reactive({ value: 0 });

// État pour le modal de badge
const showBadgeModal = ref(false);
const badgeImage = ref('');

// Modules, leçons et questions actuels
const currentModule = computed(() => props.formation?.modules?.[currentModuleIndex.value]);
const currentLecon = computed(() => currentModule.value?.lecons?.[currentLeconIndex.value]);
const currentQuestion = computed(() => currentLecon.value?.quiz?.questions?.[currentQuestionIndex.value]);

// Totaux
const totalModules = computed(() => props.formation?.modules?.length || 0);
const totalLecons = computed(() => currentModule.value?.lecons?.length || 0);
const totalQuestions = computed(() => currentLecon.value?.quiz?.questions?.length || 0);

// Vérification si on peut naviguer à la leçon suivante
const canNavigateToNextLecon = computed(() => {
  // Si pas de quiz dans la leçon actuelle, on peut passer
  if (!currentLecon.value?.quiz) return true;
  
  // Si le quiz est validé, on peut passer
  return quizValidationStatus[currentLecon.value.quiz.id] === true;
});

// Message de statut pour le quiz
const getQuizStatusMessage = (quizId: number) => {
  if (quizValidationStatus[quizId] === true) {
    return "Quiz validé ! Vous pouvez passer à la suite.";
  } else if (quizValidationStatus[quizId] === false) {
    return "Quiz non validé. Essayez à nouveau ou revoyez le contenu du cours.";
  } else {
    return "Complétez ce quiz pour passer à la leçon suivante.";
  }
};

// Navigation entre les modules
const nextModule = () => {
  if (currentModuleIndex.value < totalModules.value - 1) {
    currentModuleIndex.value++;
    currentLeconIndex.value = 0; // Réinitialiser l'index des leçons
  }
};

const prevModule = () => {
  if (currentModuleIndex.value > 0) {
    currentModuleIndex.value--;
    currentLeconIndex.value = 0; // Réinitialiser l'index des leçons
  }
};

// Navigation entre les leçons
const nextLecon = () => {
  if (currentLeconIndex.value < totalLecons.value - 1 && canNavigateToNextLecon.value) {
    currentLeconIndex.value++;
    currentQuestionIndex.value = 0; // Réinitialiser l'index des questions
  }
};

const prevLecon = () => {
  if (currentLeconIndex.value > 0) {
    currentLeconIndex.value--;
    currentQuestionIndex.value = 0; // Réinitialiser l'index des questions
  }
};

// Navigation entre les questions
const nextQuestion = () => {
  if (currentQuestionIndex.value < totalQuestions.value - 1) {
    currentQuestionIndex.value++;
  }
};

const prevQuestion = () => {
  if (currentQuestionIndex.value > 0) {
    currentQuestionIndex.value--;
  }
};

// Fonction pour soumettre les réponses
const submitAnswers = async () => {
  // Vérifier si l'utilisateur est connecté
  if (!userId.value) {
    alert("Vous devez être connecté pour soumettre ce quiz.");
    return;
  }

  // Vérifier que le quiz existe
  if (!currentLecon.value?.quiz?.id) {
    alert("Impossible de soumettre - ID du quiz manquant");
    return;
  }

  score.value = 0;
  
  // Vérifier que les questions existent
  if (!Array.isArray(currentLecon.value.quiz.questions) || currentLecon.value.quiz.questions.length === 0) {
    alert("Ce quiz ne contient pas de questions");
    return;
  }

  // Calculer le score pour ce quiz
  let quizScore = 0;
  let totalQuestions = currentLecon.value.quiz.questions.length;
  let unansweredQuestions = 0;
  
  currentLecon.value.quiz.questions.forEach(question => {
    const userAnswerId = userAnswers[question.id];
    
    // Compter les questions sans réponse
    if (!userAnswerId) {
      unansweredQuestions++;
      return; // Continuer avec la prochaine question
    }
    
    const correctAnswer = question.reponses?.find(reponse => reponse.est_correcte);
    const isCorrect = correctAnswer?.id === userAnswerId;

    if (isCorrect) {
      quizScore += 1;
    }
  });
  
  // Avertir pour les questions sans réponse
  if (unansweredQuestions > 0) {
    const continuer = confirm(`Vous n'avez pas répondu à ${unansweredQuestions} question(s). Voulez-vous continuer?`);
    if (!continuer) return;
  }

  try {
    // Format attendu par le backend
    const payload = {
      user_id: userId.value,
      quizzes: [
        {
          quiz_id: currentLecon.value.quiz.id,
          score: quizScore
        }
      ]
    };
    
    console.log("Données envoyées:", payload);
    
    // Utiliser le format attendu par le backend
    const response = await axios.post('/gamification/submit', payload);

    console.log("Réponse reçue:", response.data);

    // Vérifier si un nouveau badge a été obtenu
    if (response.data.data.new_badge_earned) {
      badgeImage.value = response.data.data.badge_image;
      showBadgeModal.value = true;
    }

    // Mettre à jour le statut de validation du quiz
    if (response.data && response.data.message) {
      const quizResult = response.data.data.quiz_gamifications[0]; // Premier quiz dans le tableau
      quizValidationStatus[currentLecon.value.quiz.id] = quizResult.is_valid;
      
      if (quizResult.is_valid) {
        // Utiliser un setTimeout pour ne pas afficher deux alertes en même temps si un badge est aussi obtenu
        setTimeout(() => {
          if (!showBadgeModal.value) {
            alert(`Félicitations ! Vous avez validé ce quiz avec un score de ${quizScore}/${totalQuestions}.`);
          }
        }, showBadgeModal.value ? 500 : 0);
      } else {
        alert(`Vous avez obtenu ${quizScore}/${totalQuestions}, ce qui n'est pas suffisant pour valider ce quiz. Essayez à nouveau.`);
      }
    }
  } catch (error) {
    console.error('Erreur lors de la soumission des scores :', error);
    
    if (error.response) {
      console.error('Réponse du serveur:', error.response.data);
      console.error('Code de statut:', error.response.status);
      
      // Message d'erreur plus spécifique basé sur la réponse du serveur
      if (error.response.data && error.response.data.message) {
        alert(`Erreur: ${error.response.data.message}`);
      } else if (error.response.status === 500) {
        alert("Erreur serveur: Vérifiez les logs Laravel pour plus de détails.");
      } else {
        alert(`Erreur ${error.response.status}: Une erreur est survenue lors de la soumission.`);
      }
    } else if (error.request) {
      alert('Le serveur ne répond pas. Veuillez réessayer plus tard.');
    } else {
      alert('Erreur de soumission: ' + error.message);
    }
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

<style scoped>
.animate-fadeIn {
  animation: fadeIn 0.5s ease-out;
}

.animate-bounce {
  animation: bounce 1s infinite;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}

@keyframes bounce {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-15px); }
}
</style>