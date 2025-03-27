<template>
  <Head title="Créer une formation" />
  <AuthenticatedLayout>
<<<<<<< HEAD:resources/js/Pages/Formations/Create.vue
    <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-black dark:text-gray-200"
            >
            ✏️ Créer une nouvelle formation
            </h2>
        </template>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mt-6 p-8 bg-white rounded-xl shadow-lg">
          <!-- Form Start -->
          <form @submit.prevent="submitForm">
=======
    <div class="py-12 bg-gray-50">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- En-tête de page -->
        <div class="text-center mb-8">
          <h1 class="text-3xl font-bold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
            Créer une nouvelle formation
          </h1>
          <p class="mt-2 text-gray-600">Remplissez les informations ci-dessous pour créer votre formation</p>
        </div>
>>>>>>> a81829e (nfadelkouch ya fakhrouch):resources/js/Pages/Create.vue

        <!-- Formulaire principal avec étapes visuelles -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
          <!-- Barre de progression -->
          <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-2"></div>

<<<<<<< HEAD:resources/js/Pages/Formations/Create.vue
            <!-- Formation Price -->
            <div class="mb-4">
              <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
              <input type="number" v-model="prix" id="prix" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required />
            </div>

            <!-- Certification Checkbox -->
            <div class="mb-4 flex items-center">
              <label for="estcertifiante" class="mr-2 text-sm font-medium text-gray-700">Formation certifiante</label>
              <input type="checkbox" v-model="estcertifiante" id="estcertifiante" />
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
              <label for="image_formation" class="block text-sm font-medium text-gray-700">Image de la formation</label>
              <input type="file" @change="handleImageUpload" id="image_formation" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
            </div>
             <!-- Category Selection -->
             <div class="mb-4">
              <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
              <select v-model="selectedCategory" id="category_id" class="form-control w-full p-2 border border-gray-300 rounded-md">
                <option disabled value="">Sélectionnez une catégorie</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">
                  {{ category.name }}
                </option>
              </select>
            </div>
            <!-- Modules Section -->
            <div class="mb-4">
              <h3 class="text-xl font-semibold">Modules de la formation</h3>
=======
          <form @submit.prevent="submitForm" class="p-8">
            <!-- Section 1: Informations générales -->
            <div class="mb-10">
              <h2 class="text-2xl font-semibold text-gray-800 flex items-center mb-6">
                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 mr-3 font-bold">1</span>
                Informations générales
              </h2>
>>>>>>> a81829e (nfadelkouch ya fakhrouch):resources/js/Pages/Create.vue
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Titre de la formation -->
                <div class="col-span-2">
                  <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre de la formation</label>
                  <input 
                    type="text" 
                    v-model="titre" 
                    id="titre" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" 
                    placeholder="Ex: Développement Web Fullstack" 
                    required 
                  />
                </div>

                <!-- Prix -->
                <div>
                  <label for="prix" class="block text-sm font-medium text-gray-700 mb-1">Prix (€)</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <span class="text-gray-500">€</span>
                    </div>
                    <input 
                      type="number" 
                      v-model="prix" 
                      id="prix" 
                      class="w-full pl-8 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" 
                      placeholder="0.00" 
                      required 
                    />
                  </div>
                </div>

                <!-- Certification -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Type de formation</label>
                  <div class="flex items-center space-x-4 p-3 border border-gray-300 rounded-lg bg-white">
                    <div @click="estcertifiante = true" :class="{'bg-blue-100 text-blue-700 border-blue-300': estcertifiante, 'bg-gray-100 hover:bg-gray-200': !estcertifiante}" class="flex-1 cursor-pointer p-2 rounded transition-all text-center border">
                      <span class="font-medium">Certifiante</span>
                    </div>
                    <div @click="estcertifiante = false" :class="{'bg-blue-100 text-blue-700 border-blue-300': !estcertifiante, 'bg-gray-100 hover:bg-gray-200': estcertifiante}" class="flex-1 cursor-pointer p-2 rounded transition-all text-center border">
                      <span class="font-medium">Non certifiante</span>
                    </div>
                  </div>
                </div>

                <!-- Image de formation -->
                <div class="col-span-2">
                  <label for="image_formation" class="block text-sm font-medium text-gray-700 mb-1">Image de couverture</label>
                  <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-all">
                    <input type="file" @change="handleImageUpload" id="image_formation" class="hidden" accept="image/*" />
                    <div v-if="image_formation" class="mb-3">
                      <img :src="imagePreviewUrl" alt="Aperçu" class="mx-auto h-40 object-cover rounded" />
                    </div>
                    <label for="image_formation" class="cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <p class="mt-1 text-sm text-gray-600">
                        Cliquez pour sélectionner une image<br>
                        <span class="text-xs text-gray-500">(JPG, PNG, max 5MB)</span>
                      </p>
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Section 2: Modules et Leçons -->
            <div>
              <h2 class="text-2xl font-semibold text-gray-800 flex items-center mb-6">
                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 mr-3 font-bold">2</span>
                Modules et contenu
              </h2>

              <!-- Liste des modules -->
              <div v-for="(module, index) in modules" :key="index" class="mb-8 border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm transition-all hover:shadow-md">
                <!-- En-tête du module -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 border-b border-gray-200">
                  <div class="flex flex-wrap items-center justify-between">
                    <div class="flex items-center">
                      <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white mr-3 font-bold">
                        {{ index + 1 }}
                      </span>
                      <input 
                        type="text" 
                        v-model="module.titre" 
                        :placeholder="`Module ${index + 1}`"
                        class="text-lg font-semibold bg-transparent border-b-2 border-transparent focus:border-blue-500 focus:outline-none transition-all" 
                        required 
                      />
                    </div>
                    <button 
                      type="button" 
                      @click="removeModule(index)" 
                      class="text-red-500 hover:text-red-700 transition-colors"
                      title="Supprimer ce module"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                  </div>
                </div>

                <!-- Contenu du module -->
                <div class="p-4">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <!-- Description -->
                    <div>
                      <label :for="'module_description_' + index" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                      <textarea 
                        v-model="module.description" 
                        :id="'module_description_' + index" 
                        rows="3"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" 
                        placeholder="Description du module..."
                      ></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                      <!-- Ordre -->
                      <div>
                        <label :for="'module_ordre_' + index" class="block text-sm font-medium text-gray-700 mb-1">Ordre</label>
                        <input 
                          type="number" 
                          v-model="module.ordre" 
                          :id="'module_ordre_' + index" 
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" 
                          placeholder="1"
                          required 
                        />
                      </div>

                      <!-- Durée -->
                      <div>
                        <label :for="'module_duree_' + index" class="block text-sm font-medium text-gray-700 mb-1">Durée (minutes)</label>
                        <input 
                          type="number" 
                          v-model="module.duree_estimee" 
                          :id="'module_duree_' + index" 
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" 
                          placeholder="60"
                          required 
                        />
                      </div>
                    </div>
                  </div>

                  <!-- Leçons -->
                  <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                      </svg>
                      Leçons
                    </h3>

                    <!-- Liste des leçons -->
                    <div v-for="(lecon, leconIndex) in module.lecons" :key="leconIndex" class="mb-4 bg-gray-50 rounded-lg p-4 border border-gray-200">
                      <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center">
                          <span class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-100 text-indigo-600 mr-2 text-sm font-bold">
                            {{ leconIndex + 1 }}
                          </span>
                          <input 
                            type="text" 
                            v-model="lecon.titre" 
                            :placeholder="`Leçon ${leconIndex + 1}`"
                            class="text-md font-medium bg-transparent border-b-2 border-transparent focus:border-indigo-500 focus:outline-none transition-all" 
                            required 
                          />
                        </div>
                        <button 
                          type="button" 
                          @click="removeLecon(index, leconIndex)" 
                          class="text-red-500 hover:text-red-700 transition-colors"
                          title="Supprimer cette leçon"
                        >
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </button>
                      </div>

                      <!-- Tabs pour les différents types de contenu -->
                      <div class="mt-4">
                        <div class="border-b border-gray-200">
                          <nav class="-mb-px flex space-x-4">
                            <a href="#" @click.prevent="lecon.activeTab = 'contenu'" :class="[lecon.activeTab === 'contenu' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'whitespace-nowrap pb-2 px-1 border-b-2 font-medium text-sm']">
                              Contenu
                            </a>
                            <a href="#" @click.prevent="lecon.activeTab = 'medias'" :class="[lecon.activeTab === 'medias' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'whitespace-nowrap pb-2 px-1 border-b-2 font-medium text-sm']">
                              Vidéos & Docs
                            </a>
                            <a href="#" @click.prevent="lecon.activeTab = 'quiz'" :class="[lecon.activeTab === 'quiz' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'whitespace-nowrap pb-2 px-1 border-b-2 font-medium text-sm']">
                              Quiz
                            </a>
                          </nav>
                        </div>

                        <!-- Tab: Contenu -->
                        <div v-show="lecon.activeTab === 'contenu'" class="mt-4">
                          <label :for="'lecon_contenu_' + index + '_' + leconIndex" class="block text-sm font-medium text-gray-700 mb-1">Contenu de la leçon</label>
                          <textarea 
                            v-model="lecon.contenu" 
                            :id="'lecon_contenu_' + index + '_' + leconIndex" 
                            rows="5"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" 
                            placeholder="Contenu détaillé de la leçon..."
                          ></textarea>
                        </div>

                        <!-- Tab: Médias -->
                        <div v-show="lecon.activeTab === 'medias'" class="mt-4">
                          <!-- Vidéos -->
                          <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                              </svg>
                              Vidéos
                            </h4>
                            <div class="p-3 border border-gray-200 rounded-lg bg-white">
                              <input 
                                type="file" 
                                multiple 
                                @change="handleMultipleFiles($event, index, leconIndex, 'videos')" 
                                class="block w-full text-sm text-gray-500 
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100"
                                accept="video/*"
                              />

                              <ul v-if="lecon.videos.length" class="mt-3 space-y-2">
                                <li v-for="(video, vIndex) in lecon.videos" :key="vIndex" class="flex items-center p-2 bg-gray-50 rounded">
                                  <span class="flex-1 truncate">{{ video.file.name }}</span>
                                  <input 
                                    type="text" 
                                    v-model="video.titre" 
                                    placeholder="Titre de la vidéo" 
                                    class="mx-2 p-1 border border-gray-300 rounded text-sm" 
                                  />
                                  <button type="button" @click="removeFile(index, leconIndex, vIndex, 'videos')" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                  </button>
                                </li>
                              </ul>
                            </div>
                          </div>

                          <!-- Documents -->
                          <div>
                            <h4 class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                              </svg>
                              Documents
                            </h4>
                            <div class="p-3 border border-gray-200 rounded-lg bg-white">
                              <input 
                                type="file" 
                                multiple 
                                @change="handleMultipleFiles($event, index, leconIndex, 'documents')" 
                                class="block w-full text-sm text-gray-500 
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-green-50 file:text-green-700
                                  hover:file:bg-green-100"
                                accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx"
                              />

                              <ul v-if="lecon.documents.length" class="mt-3 space-y-2">
                                <li v-for="(doc, dIndex) in lecon.documents" :key="dIndex" class="flex items-center p-2 bg-gray-50 rounded">
                                  <span class="flex-1 truncate">{{ doc.file.name }}</span>
                                  <input 
                                    type="text" 
                                    v-model="doc.titre" 
                                    placeholder="Titre du document" 
                                    class="mx-2 p-1 border border-gray-300 rounded text-sm" 
                                  />
                                  <button type="button" @click="removeFile(index, leconIndex, dIndex, 'documents')" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                  </button>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <!-- Tab: Quiz -->
                        <div v-show="lecon.activeTab === 'quiz'" class="mt-4">
                          <div v-if="!lecon.quiz">
                            <button
                              type="button"
                              @click="addQuiz(index, leconIndex)"
                              class="w-full py-3 px-4 border-2 border-dashed border-indigo-300 rounded-lg text-indigo-600 font-medium hover:bg-indigo-50 transition-colors flex items-center justify-center"
                            >
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                              </svg>
                              Ajouter un quiz
                            </button>
                          </div>
                          
                          <div v-else class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 bg-white rounded-lg border border-indigo-100">
                              <!-- Quiz Title -->
                              <div class="md:col-span-3">
                                <label :for="'quiz_titre_' + index + '_' + leconIndex" class="block text-sm font-medium text-gray-700 mb-1">Titre du quiz</label>
                                <input 
                                  type="text" 
                                  v-model="lecon.quiz.titre" 
                                  :id="'quiz_titre_' + index + '_' + leconIndex" 
                                  class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" 
                                  placeholder="Ex: Quiz de validation"
                                  required
                                />
                              </div>
                              
                              <!-- Quiz Score -->
                              <div>
                                <label :for="'quiz_noteFinale_' + index + '_' + leconIndex" class="block text-sm font-medium text-gray-700 mb-1">Note Finale</label>
                                <input 
                                  type="number" 
                                  v-model="lecon.quiz.noteFinale" 
                                  :id="'quiz_noteFinale_' + index + '_' + leconIndex" 
                                  class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" 
                                  placeholder="20"
                                  required
                                />
                              </div>
                              
                              <!-- Quiz Duration -->
                              <div>
                                <label :for="'quiz_dureeMaximale_' + index + '_' + leconIndex" class="block text-sm font-medium text-gray-700 mb-1">Durée (minutes)</label>
                                <input 
                                  type="number" 
                                  v-model="lecon.quiz.dureeMaximale" 
                                  :id="'quiz_dureeMaximale_' + index + '_' + leconIndex" 
                                  class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" 
                                  placeholder="30"
                                  required
                                />
                              </div>
                              
                              <!-- Quiz Action Button -->
                              <div>
                                <label class="invisible block text-sm font-medium text-gray-700 mb-1">Action</label>
                                <button 
                                  type="button" 
                                  @click="lecon.quiz = null" 
                                  class="w-full p-3 text-red-500 border border-red-200 rounded-lg hover:bg-red-50 transition-colors"
                                >
                                  Supprimer le quiz
                                </button>
                              </div>
                            </div>
                            
                            <!-- Questions -->
                            <div v-if="lecon.quiz">
                              <h4 class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-purple-500" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                                Questions
                              </h4>
                              
                              <div class="space-y-4 mt-3">
                                <!-- Question List -->
                                <div v-for="(question, qIndex) in lecon.quiz.questions" :key="qIndex" class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                                  <div class="flex items-center justify-between mb-3">
                                    <span class="font-medium text-indigo-700 flex items-center">
                                      <span class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-200 text-indigo-700 mr-2 text-sm font-bold">
                                        {{ qIndex + 1 }}
                                      </span>
                                      Question
                                    </span>
                                    <button type="button" @click="removeQuestion(index, leconIndex, qIndex)" class="text-red-500 hover:text-red-700">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                      </svg>
                                    </button>
                                  </div>
                                  
                                  <!-- Question Content -->
                                  <input 
                                    type="text" 
                                    v-model="question.contenu" 
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all mb-4" 
                                    placeholder="Texte de la question"
                                    required
                                  />
                                  
                                  <!-- Answers -->
                                  <div class="ml-4 space-y-2">
                                    <div v-for="(reponse, rIndex) in question.reponses" :key="rIndex" class="flex items-center bg-white p-2 rounded-lg border border-gray-200">
                                      <input 
                                        type="checkbox" 
                                        v-model="reponse.correct" 
                                        :id="`reponse-${index}-${leconIndex}-${qIndex}-${rIndex}`" 
                                        class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500" 
                                      />
                                      <input 
                                        type="text" 
                                        v-model="reponse.contenu" 
                                        placeholder="Texte de la réponse" 
                                        class="ml-2 flex-1 p-2 border-0 focus:ring-0" 
                                        required
                                      />
                                      <button type="button" @click="question.reponses.splice(rIndex, 1)" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                      </button>
                                    </div>
                                    
                                    <!-- Add Answer Button -->
                                    <button 
                                      type="button" 
                                      @click="addReponse(index, leconIndex, qIndex)" 
                                      class="mt-2 py-2 px-3 w-full flex items-center justify-center text-sm font-medium text-indigo-600 bg-white border border-dashed border-indigo-300 rounded hover:bg-indigo-50 transition-colors"
                                    >
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                      </svg>
                                      Ajouter une réponse
                                    </button>
                                  </div>
                                </div>
                                
                                <!-- Add Question Button -->
                                <button 
                                  type="button" 
                                  @click="addQuestion(index, leconIndex)" 
                                  class="w-full py-3 px-4 border border-dashed border-purple-300 rounded-lg text-purple-600 font-medium hover:bg-purple-50 transition-colors flex items-center justify-center"
                                >
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                  </svg>
                                  Ajouter une question
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Ajouter une leçon -->
                    <button 
                      type="button" 
                      @click="addLecon(index)" 
                      class="w-full py-3 px-4 border-2 border-dashed border-gray-300 rounded-lg text-gray-600 font-medium hover:bg-gray-50 transition-colors flex items-center justify-center mt-4"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                      </svg>
                      Ajouter une leçon
                    </button>
                  </div>
                </div>
              </div>

              <!-- Ajouter un module -->
              <button 
                type="button" 
                @click="addModule" 
                class="w-full py-4 px-6 border-2 border-dashed border-blue-300 rounded-xl text-blue-600 font-medium hover:bg-blue-50 transition-colors flex items-center justify-center"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Ajouter un module
              </button>
            </div>

            <!-- Submit Button -->
            <div class="mt-12">
              <button 
                type="submit" 
                class="w-full py-4 px-6 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all transform hover:scale-[1.01]"
              >
                Créer la formation
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
<<<<<<< HEAD:resources/js/Pages/Formations/Create.vue
import { ref, onMounted } from 'vue';
=======
import { ref, computed, onBeforeUnmount } from 'vue';
>>>>>>> a81829e (nfadelkouch ya fakhrouch):resources/js/Pages/Create.vue
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

// Form data references
const titre = ref('');
const prix = ref('');
const estcertifiante = ref(false);
const image_formation = ref(null);
const selectedCategory = ref('');
const categories = ref([]);
const modules = ref([]);

<<<<<<< HEAD:resources/js/Pages/Formations/Create.vue

// Fetch categories on component mount
onMounted(async () => {
  try {
    const response = await axios.get('/categories'); // Assurez-vous que cet endpoint est correct
    categories.value = response.data;
  } catch (error) {
    console.error('Erreur lors du chargement des catégories', error);
  }
});
=======
// URL de prévisualisation pour l'image
const imagePreviewUrl = computed(() => {
  if (image_formation.value && typeof window !== 'undefined') {
    return URL.createObjectURL(image_formation.value);
  }
  return '';
});

// Nettoyer les URLs d'objets pour éviter les fuites de mémoire
onBeforeUnmount(() => {
  if (imagePreviewUrl.value) {
    URL.revokeObjectURL(imagePreviewUrl.value);
  }
});

>>>>>>> a81829e (nfadelkouch ya fakhrouch):resources/js/Pages/Create.vue
// Methods for module and lesson management
const addModule = () => {
  modules.value.push({
    titre: '',
    description: '',
    ordre: modules.value.length + 1, // Définir l'ordre automatiquement
    duree_estimee: '',
    lecons: [],
  });
};

const removeModule = (index) => {
  modules.value.splice(index, 1);
};

const addLecon = (moduleIndex) => {
  modules.value[moduleIndex].lecons.push({
    titre: '',
    contenu: '',
    videos: [],
    documents: [],
    quiz: null,
    activeTab: 'contenu', // Tab actif par défaut
  });
};

const removeLecon = (moduleIndex, leconIndex) => {
  modules.value[moduleIndex].lecons.splice(leconIndex, 1);
};

const addQuiz = (moduleIndex, leconIndex) => {
  modules.value[moduleIndex].lecons[leconIndex].quiz = {
    titre: '',
    noteFinale: 10, // Valeur par défaut
    dureeMaximale: 30, // Valeur par défaut
    questions: [],
  };
  
  // Ajouter une première question par défaut
  addQuestion(moduleIndex, leconIndex);
};

// Ajouter une question à un quiz
const addQuestion = (moduleIndex, leconIndex) => {
  modules.value[moduleIndex].lecons[leconIndex].quiz.questions.push({
    contenu: '',
    reponses: [],
  });
  
  // Ajouter deux réponses par défaut
  const qIndex = modules.value[moduleIndex].lecons[leconIndex].quiz.questions.length - 1;
  addReponse(moduleIndex, leconIndex, qIndex);
  addReponse(moduleIndex, leconIndex, qIndex);
};

// Supprimer une question
const removeQuestion = (moduleIndex, leconIndex, qIndex) => {
  modules.value[moduleIndex].lecons[leconIndex].quiz.questions.splice(qIndex, 1);
};

// Ajouter une réponse à une question
const addReponse = (moduleIndex, leconIndex, qIndex) => {
  modules.value[moduleIndex].lecons[leconIndex].quiz.questions[qIndex].reponses.push({
    contenu: '',
    correct: false,
  });
};

// File handling methods
const handleImageUpload = (e) => { 
  const file = e.target.files[0];
  if (file) {
    image_formation.value = file;
  }
};

const handleMultipleFiles = (e, moduleIndex, leconIndex, fileType) => {
  const files = Array.from(e.target.files);
  files.forEach(file => {
    const newFile = { titre: file.name.split('.')[0], file };
    if (fileType === 'videos') {
      modules.value[moduleIndex].lecons[leconIndex].videos.push(newFile);
    } else if (fileType === 'documents') {
      modules.value[moduleIndex].lecons[leconIndex].documents.push(newFile);
    }
  });
};

const removeFile = (moduleIndex, leconIndex, fileIndex, fileType) => {
  if (fileType === 'videos') {
    modules.value[moduleIndex].lecons[leconIndex].videos.splice(fileIndex, 1);
  } else if (fileType === 'documents') {
    modules.value[moduleIndex].lecons[leconIndex].documents.splice(fileIndex, 1);
  }
};

// Form submission method
const submitForm = () => {
  if (!titre.value || !prix.value || !selectedCategory.value) {
    alert("Please fill all required fields.");
    return;
  }
  const formData = new FormData();
  formData.append('titre', titre.value);
  formData.append('prix', prix.value);
  formData.append('estcertifiante', estcertifiante.value ? 1 : 0);
  formData.append('category_id', selectedCategory.value);
  if (image_formation.value) {
    formData.append('image_formation', image_formation.value);
  }

  // Add modules and lessons data to formData
  modules.value.forEach((module, index) => {
    formData.append(`modules[${index}][titre]`, module.titre);
    formData.append(`modules[${index}][description]`, module.description);
    formData.append(`modules[${index}][ordre]`, module.ordre);
    formData.append(`modules[${index}][duree_estimee]`, module.duree_estimee);

    module.lecons.forEach((lecon, leconIndex) => {
      formData.append(`modules[${index}][lecons][${leconIndex}][titre]`, lecon.titre);
      formData.append(`modules[${index}][lecons][${leconIndex}][contenu]`, lecon.contenu);

      // Append quiz data
      if (lecon.quiz) {
        formData.append(`modules[${index}][lecons][${leconIndex}][quiz][titre]`, lecon.quiz.titre);
        formData.append(`modules[${index}][lecons][${leconIndex}][quiz][noteFinale]`, lecon.quiz.noteFinale);
        formData.append(`modules[${index}][lecons][${leconIndex}][quiz][dureeMaximale]`, lecon.quiz.dureeMaximale);

        // Append questions and answers
        lecon.quiz.questions.forEach((question, qIndex) => {
          formData.append(`modules[${index}][lecons][${leconIndex}][quiz][questions][${qIndex}][contenu]`, question.contenu);

          question.reponses.forEach((reponse, rIndex) => {
            formData.append(`modules[${index}][lecons][${leconIndex}][quiz][questions][${qIndex}][reponses][${rIndex}][contenu]`, reponse.contenu);
            formData.append(`modules[${index}][lecons][${leconIndex}][quiz][questions][${qIndex}][reponses][${rIndex}][est_correcte]`, reponse.correct ? 1 : 0);
          });
        });
      }

      // Append videos and documents
      lecon.videos.forEach((video, vidIndex) => {
        formData.append(`modules[${index}][lecons][${leconIndex}][videos][${vidIndex}][titre]`, video.titre);
        formData.append(`modules[${index}][lecons][${leconIndex}][videos][${vidIndex}][file]`, video.file);
      });

      lecon.documents.forEach((doc, docIndex) => {
        formData.append(`modules[${index}][lecons][${leconIndex}][documents][${docIndex}][titre]`, doc.titre);
        formData.append(`modules[${index}][lecons][${leconIndex}][documents][${docIndex}][file]`, doc.file);
      });
    });
  });

  Inertia.post('/formations', formData, {
    headers: { 'Content-Type': 'multipart/form-data' },
    onSuccess: () => {
      alert('Formation créée avec succès !');
      
      // Reset the form fields after submission
      titre.value = '';
      prix.value = '';
      image_formation.value = null;// Reset image
      estcertifiante.value = false;
      image_formation.value = null;
      selectedCategory.value = ''; // Reset category
      modules.value = []; // Reset modules

      // Optionally, fetch categories again to ensure data is fresh
      onMounted(async () => {
        try {
          const response = await axios.get('/categories');
          categories.value = response.data;
        } catch (error) {
          console.error('Erreur lors du chargement des catégories', error);
        }
      });
    },
    onError: (errors) => {
      console.error('Erreurs lors de la soumission:', errors);
      alert('Une erreur est survenue lors de la création de la formation. Veuillez vérifier tous les champs.');
    }
  });
};
</script>