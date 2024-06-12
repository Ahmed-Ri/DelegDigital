<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\User;
class UserControllerTest extends TestCase
{
    public function Ajout_utilisateur()
    {
        // Simuler les données du formulaire
        $donneesFormulaire = [
            'name' => 'haddad',
            'email' => 'tejj@gmail.com',
            'password' => '12345sd§!', 
            'password_confirmation' => '12345sd§!'
        ];
        // Envoyer une requête POST à la route prévue
        $reponse = $this->post('/register', $donneesFormulaire);

        // Vérifier si l'utilisateur a été créé
        $this->assertDatabaseHas('users', [
            'email' => $donneesFormulaire['email']
        ]);

        // Vérifier le statut de la réponse
        $reponse->assertStatus(302); 
        $reponse->assertRedirect('/dashboard'); 
    }
}
