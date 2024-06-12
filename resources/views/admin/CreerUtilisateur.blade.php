

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
            <div class="col-12 col-lg-6 offset-lg-3">
                <div class="form-wrapper py-5">
                    <form class="mt-2" action="{{ route('utilisateur.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- CSRF token for security -->
                        
                        <h2 class="titre text-center mb-4">Ajouter utilisateur</h2>
                        
                        
                        <div class="form-group row">
                            <label for="name" class="col-6 col-form-label fw-bold">Nom:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-6 col-form-label fw-bold">Email:</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-6 col-form-label fw-bold">Mot de passe:</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="telephone" class="col-6 col-form-label fw-bold">Téléphone:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="entreprise" class="col-6 col-form-label fw-bold">Entreprise:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="entreprise" name="entreprise" placeholder="Entreprise">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="adresse" class="col-6 col-form-label fw-bold">Adresse:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="telephoneE" class="col-6 col-form-label fw-bold">Téléphone Entreprise:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="telephoneE" name="telephoneE" placeholder="Téléphone Entreprise">
                            </div>
                        </div>
                        
                        <!-- Social Media URLs -->
                        <div class="form-group row">
                            <label for="UrlFacebook" class="col-6 col-form-label fw-bold">URL Facebook:</label>
                            <div class="col-sm-6">
                                <input type="url" class="form-control" id="UrlFacebook" name="UrlFacebook" placeholder="URL Facebook">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="UrlInstagram" class="col-6 col-form-label fw-bold">URL Instagram:</label>
                            <div class="col-sm-6">
                                <input type="url" class="form-control" id="UrlInstagram" name="UrlInstagram" placeholder="URL Instagram">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="UrlGoogle" class="col-6 col-form-label fw-bold">URL Google:</label>
                            <div class="col-sm-6">
                                <input type="url" class="form-control" id="UrlGoogle" name="UrlGoogle" placeholder="URL Google">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="UrlSite" class="col-6 col-form-label fw-bold">URL Site:</label>
                            <div class="col-sm-6">
                                <input type="url" class="form-control" id="UrlSite" name="UrlSite" placeholder="URL Site">
                            </div>
                        </div>
                        
                        <!-- File Inputs for Images -->
                        <div class="form-group row">
                            <label for="imageFacebook" class="col-6 col-form-label fw-bold">Image Facebook:</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="imageFacebook" name="imageFacebook">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="imageInstagram" class="col-6 col-form-label fw-bold">Image Instagram:</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="imageInstagram" name="imageInstagram">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="imageGoogle" class="col-6 col-form-label fw-bold">Image Google:</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="imageGoogle" name="imageGoogle">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="imageSite" class="col-6 col-form-label fw-bold">Image Site:</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="imageSite" name="imageSite">
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-md btn-primary" style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
