<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
    // Passez 'entreprise' directement ou envoyez l'objet 'user' qui contient 'entreprise'
    return view('profile.edit', [
        'user' => $user,
        'entreprise' => $user->entreprise  // Assurez-vous que l'attribut 'entreprise' existe dans le modèle User
    ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    $data = $request->validated();

    // Ajoutez les nouveaux champs à mettre à jour dans $data
    $data['telephone'] = $request->input('telephone');
    $data['entreprise'] = $request->input('entreprise');
    $data['adresse'] = $request->input('adresse');
    $data['telephoneE'] = $request->input('telephoneE');
    $data['UrlFacebook'] = $request->input('UrlFacebook');
    $data['UrlInstagram'] = $request->input('UrlInstagram');
    $data['UrlGoogle'] = $request->input('UrlGoogle');
    $data['UrlSite'] = $request->input('UrlSite');

    // Mettre à jour les attributs du modèle utilisateur
    $user->fill($data);

    // Réinitialiser email_verified_at si l'email a été modifié
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // Enregistrer les modifications
    $user->save();

    return redirect()->route('profile.edit')->with([
        'status' => 'Profile updated successfully.',
        'entreprise' => $user->entreprise
    ]);
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
