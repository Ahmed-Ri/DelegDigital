<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\MultiImageUploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Compagne;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    
    
        return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    $users = User::all(); // Récupérer tous les utilisateurs
    $compagnes = Compagne::orderBy('created_at', 'desc')->get();
    return view('admin.dashboard', compact('users','compagnes'));
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');
// Route::get('/admin/dashboard', [UserController::class, 'showAllUsers'])->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

// Route::get('/historiques', [AdminController::class, 'indexForms'])->name('admin_historique');

Route::get('/formulaire', [UserController::class, 'indexForm'])->name('formulaire');
Route::post('/formulaire', [UserController::class, 'store'])->name('sauvegarder_donnees');
Route::get('/historique', [UserController::class, 'indexHistorique'])->name('historique');
Route::delete('/delete-image/{id}', [UserController::class, 'deleteImage'])->name('delete_image');
// creation et modification compagnes utilisateur
Route::get('/formulaire/edit/{id}', [UserController::class, 'editCompagne'])->name('edit_form');
Route::put('/formulaire/update/{id}', [UserController::class, 'updateCompagne'])->name('update_form');




Route::get('/dashboard', [ChartController::class, 'afficherGraphique'])->name('dashboard')->middleware(['auth', 'verified']);




// creation et modification utilisateur
Route::get('/utilisateur/create', [AdminController::class, 'create'])->name('utilisateur.create');
Route::post('/utilisateur/store', [AdminController::class, 'storeAdmin'])->name('utilisateur.store');

// creation et modification compagnes admin
Route::get('/compagnes/edit/{id}', [AdminController::class, 'editCompagne'])->name('edit-compagne');
Route::post('/compagnes/update/{id}', [AdminController::class, 'updateCompagne'])->name('update-compagne');


Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');





// Route::middleware(['auth', 'admin'])->group(function () {
//     // Routes pour l'espace administrateur
//     Route::get('/admin/users', [UserController::class, 'showAllUsers'])->name('admin.users');
//     Route::get('/admin/formulaire', [UserController::class, 'indexForm'])->name('admin.formulaire');
//     Route::get('/admin/historique', [UserController::class, 'indexHistorique'])->name('admin.historique');
//     Route::post('/admin/formulaire', [UserController::class, 'store'])->name('admin.sauvegarder_donnees');
// });
// Ajoutez cette route dans routes/web.php
// Route::get('/dashboard/{userId}', [UserController::class, 'userHomepage'])->middleware('ensureUserIsAdmin') ->name('user.homepage');
