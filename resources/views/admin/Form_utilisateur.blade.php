


<!DOCTYPE html>
<html lang="fr">

<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>L'assistant Digital</title>
    

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/js/style.js') }}"></script>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/min/dropzone.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/min/dropzone.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
 
</head>

<body>
    @include('layouts.navigationAdmin')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="form-wrapper py-5">
                    <h2 class="titre text-center mb-4">Modifier l'Utilisateur</h2>
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label fw-bold">Client</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label fw-bold">Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telephone" class="col-md-3 col-form-label fw-bold">Téléphone</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $user->telephone }}">
                            </div>
                        </div>
    
                        <h3 class="titre mt-4 mb-3">Informations Entreprise</h3>
                        <div class="form-group row">
                            <label for="entreprise" class="col-md-3 col-form-label fw-bold">Entreprise</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="entreprise" name="entreprise" value="{{ $user->entreprise }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adresse" class="col-md-3 col-form-label fw-bold">Adresse</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $user->adresse }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telephoneE" class="col-md-3 col-form-label fw-bold">Téléphone Entreprise</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="telephoneE" name="telephoneE" value="{{ $user->telephoneE }}">
                            </div>
                        </div>
    
                        <h3 class="titre mt-4 mb-3">Réseaux</h3>
                        <div class="form-group row">
                            <label for="UrlFacebook" class="col-md-3 col-form-label fw-bold">URL Facebook</label>
                            <div class="col-md-9">
                                <input type="url" class="form-control" id="UrlFacebook" name="UrlFacebook" value="{{ $user->UrlFacebook }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="UrlInstagram" class="col-md-3 col-form-label fw-bold">URL Instagram</label>
                            <div class="col-md-9">
                                <input type="url" class="form-control" id="UrlInstagram" name="UrlInstagram" value="{{ $user->UrlInstagram }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="UrlGoogle" class="col-md-3 col-form-label fw-bold">URL Google</label>
                            <div class="col-md-9">
                                <input type="url" class="form-control" id="UrlGoogle" name="UrlGoogle" value="{{ $user->UrlGoogle }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="UrlSite" class="col-md-3 col-form-label fw-bold">URL Site</label>
                            <div class="col-md-9">
                                <input type="url" class="form-control" id="UrlSite" name="UrlSite" value="{{ $user->UrlSite }}">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="abonnement" class="col-md-3 col-form-label fw-bold">Abonnement</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="abonnement" name="abonnement" value="{{ $user->abonnement }}">
                            </div>
                        </div>
                        
                        <!-- Ajout de la sélection de statut -->
                        <div class="form-group row">
                            <label for="status" class="col-md-3 col-form-label fw-bold">Demandes</label>
                            <div class="col-md-9">
                                <select id="status" name="status" class="form-control">
                                    <option value="pendant" {{ $user->status == 'pendant' ? 'selected' : '' }}>pendant</option>
                                    <option value="vérifié" {{ $user->status == 'vérifié' ? 'selected' : '' }}>Vérifié</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary" style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
</body>

</html>

