<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\GamificationController;
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/DashboardFormateur', function () {
    return Inertia::render('DashboardFormateur');  // Assurez-vous que le fichier Vue est bien ici
})->middleware(['auth'])->name('DashboardFormateur');  // Corrigé ici : 'DashboardFormateur' au lieu de 'dashboardFormateur'

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboardAdmin', function () {
    return Inertia::render('DashboardAdmin');
})->middleware(['auth'])->name('dashboardAdmin');

require __DIR__.'/auth.php';

Route::get('/auth/facebook', [FacebookController::class, 'facebookpage'])->name('auth.facebook');
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::get('/Slideshow', function () {
    return Inertia::render('Slideshow');
})->name('Slideshow');

Route::get('/formateurs-en-attente', [AdminController::class, 'getFormateursEnAttente'])
    ->name('formateur.en.attente');
    //Route::get('/formateurs/en-attente', [AdminController::class, 'getFormateursEnAttente']);
     // Valider un formateur
Route::post('/formateurs/{id}/valider', [AdminController::class, 'validerFormateur'])->name('formateurs.valider');
Route::post('/formateurs/{id}/rejeter', [AdminController::class, 'rejeterFormateur'])->name('formateurs.rejeter');
Route::post('/upload-video', [VideoController::class, 'upload']);
//video
Route::get('/videos', [VideoController::class, 'getVideos']);
Route::get('/upload-videos', function () {
    return Inertia::render('upload_videos');
})->name('upload.videos');
Route::get('/afficher-videos', function () {
    return Inertia::render('afficher_videos');
})->name('afficher.videos');
// Route pour stocker un document
Route::post('/document/store', [DocumentController::class, 'store'])->name('document.store');

//********************************************************************************************** */
Route::get('/document-upload', function () {
    return Inertia::render('UploadDocument');
})->name('document-upload');
// Route pour afficher la liste des documents, avec les données envoyées par le contrôleur
Route::get('/document-list', [DocumentController::class, 'index'])->name('document-list');

// Route pour récupérer les documents via le contrôleur
Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');


//************************************************************************************************* */
Route::get('/DashboardAdmin', function () {
    return Inertia::render('DashboardAdmin');
})->name('DashboardAdmin');
Route::get('/DashboardFormateur', function () {
    return Inertia::render('DashboardFormateur');
})->name('DashboardFormateur');

// Afficher toutes les formations (index)
Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');

// Afficher le formulaire de création d'une formation
Route::get('/formations/create', function () {
    return Inertia::render('Create');
})->name('formations.create');

// Créer une nouvelle formation (POST)
Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');
Route::get('/formations/index', [FormationController::class, 'index'])->name('formations.index');
Route::get('/formations/{id}', [FormationController::class, 'show'])->name('formations.show');
Route::delete('/formations/{id}', [FormationController::class, 'destroy'])->name('formations.destroy');
Route::get('/formations/{id}/edit', [FormationController::class, 'edit'])->name('formations.edit');
Route::put('/formations/{id}', [FormationController::class, 'update'])->name('formations.update');


// Afficher le formulaire de modification d'une formateurs
Route::get('/formateurs', [AdminController::class, 'Listeformateur'])->name('formateur.list');
Route::delete('/formateurs/{id}', [AdminController::class, 'deleteFormateur'])->name('formateur.delete');

// Creer un quizz
//************************************************************** */
Route::post('/quizzes/store', [QuizController::class, 'store']);
Route::get('/quizzes/lecon/{lecon_id}', [QuizController::class, 'getByLecon']);

/****************************************************************** */

// Creer une Question
//************************************************************** */
Route::post('/questions', [QuestionController::class, 'store']);
/****************************************************************** */
// Creer des Reponses
//************************************************************** */
Route::post('/reponses', [ReponseController::class, 'storeMultiple']);
//Route::post('/reponses', [ReponseController::class, 'showResponses']);
/****************************************************************** */
// Afficher le formulaire de création d'un quizz
Route::get('/quizManager', function () {
    return Inertia::render('QuizManager');
})->name('quizManager');
//************************************************************************************************* */
//Partie Gamification
Route::post('/gamification/submit', [GamificationController::class, 'store'])->name('gamification.store');
