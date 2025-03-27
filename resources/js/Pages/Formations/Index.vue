
<template>
<<<<<<< HEAD
    <Head title="Afficher toutes les formations" />
    <AuthenticatedLayout>
      <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-black dark:text-gray-200"
            >
            🌟 Liste des Formations
            </h2>
        </template>
      <div class="container mx-auto p-6">
        <!-- Button to add a new formation -->
        <div class="text-center mb-6">
=======
  <Head title="Découvrir nos formations" />
  <AuthenticatedLayout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-10">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- En-tête avec animation -->
        <div class="text-center mb-12">
          <h1 class="text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 mb-4">
            Découvrez nos formations
          </h1>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Développez vos compétences et perfectionnez votre expertise avec notre sélection de formations de qualité.
          </p>
        </div>

        <!-- Barre de recherche -->
        <div class="mb-10 max-w-md mx-auto">
          <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden border border-gray-200 shadow-sm">
            <div class="grid place-items-center h-full w-12 text-gray-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <input
              class="peer h-full w-full outline-none text-sm text-gray-700 pr-2 border-0 focus:ring-0"
              type="text"
              placeholder="Rechercher une formation..."
            />
          </div>
        </div>

        <!-- Ajouter une formation (Admin) -->
        <div v-if="role !== 'user' && role !== 'startup'" class="mb-10 text-center">
>>>>>>> a81829e (nfadelkouch ya fakhrouch)
          <Link href="/formations/create" 
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold rounded-lg shadow-md hover:from-blue-700 hover:to-indigo-800 transition duration-300 transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Ajouter une formation
          </Link>
        </div>

        <!-- Grille des formations -->
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">
          <div v-for="formation in formations" :key="formation.id" 
              class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 transform hover:shadow-xl hover:-translate-y-2 flex flex-col h-full">
            
            <!-- Image avec overlay -->
            <div class="relative overflow-hidden h-48 md:h-56 lg:h-64">
              <img v-if="formation.image_formation" 
                  :src="`/storage/${formation.image_formation}`" 
                  alt="Image formation" 
                  class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
              <div v-else class="w-full h-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
              </div>
              
              <!-- Badge prix/statut (optionnel) -->
              <div class="absolute top-3 right-3 bg-white bg-opacity-90 rounded-full py-1 px-3 text-sm font-semibold text-indigo-600 shadow-sm">
                Populaire
              </div>
            </div>
            
            <div class="flex-1 p-6 flex flex-col">
              <!-- Titre et infos -->
              <Link :href="`/formations/${formation.id}`" class="block">
                <h2 class="text-xl font-bold text-gray-900 hover:text-blue-600 transition-all mb-2 line-clamp-2">
                  {{ formation.titre }}
                </h2>
              </Link>
              
              <!-- Description tronquée (si disponible) -->
              <p class="text-gray-600 text-sm mb-4 flex-1 line-clamp-3">
                {{ formation.description || "Découvrez cette formation et développez vos compétences professionnelles." }}
              </p>
              
              <!-- Métadonnées -->
              <div class="flex items-center text-sm text-gray-500 mb-4">
                <div class="flex items-center mr-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span>{{ formation.duree || "À votre rythme" }}</span>
                </div>
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                  </svg>
                  <span>{{ formation.modules?.length || "0" }} modules</span>
                </div>
              </div>
              
              <!-- Bouton d'action -->
              <Link :href="`/formations/${formation.id}`"
                    class="text-center py-2 px-4 bg-indigo-50 text-indigo-600 font-medium rounded-lg hover:bg-indigo-100 transition duration-300 mt-auto">
                Découvrir la formation
              </Link>
            </div>
          </div>
        </div>
        
        <!-- Pas de formations disponibles -->
        <div v-if="formations.length === 0" class="text-center py-12">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
          <h3 class="text-xl font-semibold text-gray-700 mb-2">Aucune formation disponible</h3>
          <p class="text-gray-500">Revenez plus tard pour découvrir nos nouvelles formations.</p>
        </div>
        
        <!-- Pagination (si nécessaire) -->
        <div class="mt-12 flex justify-center">
          <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
              <span class="sr-only">Précédent</span>
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </a>
            <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
              1
            </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
              2
            </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
              3
            </a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
              <span class="sr-only">Suivant</span>
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
  
<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { computed } from 'vue';

// Définir le type User
interface User {
  id: number;
  name: string;
  email: string;
  role: string;
}

// Définir les propriétés de la page
interface PageProps {
  auth: {
    user: User | null;
  };
  [key: string]: unknown;
}

// Définir le type Formation
interface Formation {
  id: number;
  titre: string;
  description?: string;
  image_formation: string | null;
  duree?: string;
  modules?: any[];
}

defineProps<{
  formations: Formation[];
}>();

// Accéder à l'objet route() d'Inertia
const page = usePage<PageProps>();

// Récupérer le rôle de l'utilisateur
const role = computed(() => page.props.auth.user?.role || 'user');
</script>

<style>
/* Effet de dégradé pour le texte du titre */
.bg-clip-text {
  -webkit-background-clip: text;
  background-clip: text;
}

/* Pour limiter le nombre de lignes (description) */
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>