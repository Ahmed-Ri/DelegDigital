<?php

namespace App\Http\Controllers;

use App\Models\Compagne;
use App\Models\ImageUpload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
   
    


public function editCompagne($id)
{
    $compagne = Compagne::with('images')->findOrFail($id);
    return view('admin.editCompagne', compact('compagne'));
}


    // public function editForm($id)
    // {
    //     $compagne = Compagne::findOrFail($id);
    //     // Vous pouvez également récupérer d'autres données nécessaires pour le formulaire, si nécessaire.
    //     return view('admin.editCompagne', compact('compagne'));
    // }
   
    

  
    
    public function updateCompagne(Request $request, $id)
    {
        
         // Validation des entrées
    $request->validate([
        'date_debut' => 'required|date',
        'date_fin' => 'required|date',
        'status' => 'required|string',
        'objectif' => 'required|string',
        'reseaux' => 'required|string',
        'details' => 'nullable|string',
        'files.*' => 'sometimes|file|image|max:5000', // Validation pour les fichiers images
    ]);

    // Récupération de la campagne
    $compagne = Compagne::findOrFail($id);

    // Mise à jour des champs de la campagne
    $compagne->date_debut = $request->input('date_debut');
    $compagne->date_fin = $request->input('date_fin');
    $compagne->status = $request->input('status');
    $compagne->objectif = $request->input('objectif');
    $compagne->reseaux = $request->input('reseaux');
    $compagne->details = $request->input('details');
    $compagne->save();

    // Gestion des fichiers images
    if ($request->hasFile('files')) {
        // Ajout des nouveaux fichiers
        foreach ($request->file('files') as $file) {
            $filename = $file->store('images', 'public');
            $image = new ImageUpload();
            $image->filename = $filename;
            $image->compagne_id = $compagne->id;
            $image->save();
        }
    }
    return redirect()->route('admin.dashboard')->with('success', 'Informations de l\'utilisateur mises à jour avec succès.');
}

public function deleteimages($id)
{
    $image = ImageUpload::findOrFail($id);
    Storage::delete($image->filename); // Supprime le fichier
    $image->delete(); // Supprime l'entrée de la base de données

    return response()->json(['success' => true]);
}




    public function create()
    {
       
        $users = User::all(); // Récupère tous les utilisateurs
        return view('admin.CreerUtilisateur', compact('users'));
    }
    public function storeAdmin(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|',
        'password' => 'required|string|min:8',
        'telephone' => 'nullable|string|max:255',
        'entreprise' => 'nullable|string|max:255',
        'adresse' => 'nullable|string|max:255',
        'telephoneE' => 'nullable|string|max:255',
        'UrlFacebook' => 'nullable|url',
        'UrlInstagram' => 'nullable|url',
        'UrlGoogle' => 'nullable|url',
        'abonnement' => 'nullable|string|max:255',
        'imageFacebook' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'imageInstagram' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'imageGoogle' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'imageSite' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Création d'une nouvelle instance d'Utilisateur
    $users = new User([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Hash du mot de passe pour la sécurité
        'telephone' => $request->telephone,
        'entreprise' => $request->entreprise,
        'adresse' => $request->adresse,
        'telephoneE' => $request->telephoneE,
        'UrlFacebook' => $request->UrlFacebook,
        'UrlInstagram' => $request->UrlInstagram,
        'UrlGoogle' => $request->UrlGoogle,
        'abonnement' => $request->abonnement,
    ]);

    $imageFields = ['imageFacebook', 'imageInstagram', 'imageGoogle', 'imageSite'];
    foreach ($imageFields as $imageField) {
        if ($request->hasFile($imageField)) {
            $path = $request->file($imageField)->store('public/images');
            // Convertir le chemin de stockage en URL accessible
            $users->$imageField = Storage::url($path);
        }
    }
    
    // Associer l'user actuel (authentifié) si nécessaire
    //    $users->user_id = auth()->id();
    // Sauvegarde de l'user dans la base de données
    $users->save();

    // Redirection vers une route de votre choix avec un message de succès
    return redirect()->route('admin.dashboard')->with('success', 'Utilisateur ajouté avec succès!');
}
public function edit($userId)
{
    $user = User::findOrFail($userId); // Assurez-vous d'utiliser le modèle User approprié
    return view('admin.Form_utilisateur', compact('user'));
}

public function update(Request $request, $userId)
{
    // Trouver l'utilisateur en utilisant l'ID
    $user = User::findOrFail($userId);

    // Validation des données entrantes
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
        'password' => 'nullable|string|min:8',
        'telephone' => 'nullable|string|max:255',
        'entreprise' => 'nullable|string|max:255',
        'adresse' => 'nullable|string|max:255',
        'telephoneE' => 'nullable|string|max:255',
        'UrlFacebook' => 'nullable|url',
        'UrlInstagram' => 'nullable|url',
        'UrlGoogle' => 'nullable|url',
        'abonnement' => 'nullable|string|max:255',
        'imageFacebook' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'imageInstagram' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'imageGoogle' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'imageSite' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         'status' => 'required|in:pendant,vérifié'
    ]);

    // Mise à jour des champs utilisateur
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }
    $user->telephone = $request->telephone;
    $user->entreprise = $request->entreprise;
    $user->adresse = $request->adresse;
    $user->telephoneE = $request->telephoneE;
    $user->UrlFacebook = $request->UrlFacebook;
    $user->UrlInstagram = $request->UrlInstagram;
    $user->UrlGoogle = $request->UrlGoogle;
    $user->abonnement = $request->abonnement;
    $user->status = $request->status;

    // Gérer les uploads d'images et mettre à jour les champs correspondants
    $imageFields = ['imageFacebook', 'imageInstagram', 'imageGoogle', 'imageSite'];
    foreach ($imageFields as $imageField) {
        if ($request->hasFile($imageField)) {
            // Supprimer l'ancienne image si elle existe
            if ($user->$imageField) {
                Storage::delete($user->$imageField);
            }

            // Sauvegarder la nouvelle image et mettre à jour le champ
            $path = $request->file($imageField)->store('public/images');
            $user->$imageField = Storage::url($path);
        }
    }

    // Sauvegarder les modifications
    $user->save();

    // Redirection vers une route de votre choix avec un message de succès
    return redirect()->route('admin.dashboard', ['user' => $userId])->with('success', 'Informations de l\'utilisateur mises à jour avec succès.');
}



}
