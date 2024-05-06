
<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/js/style.js') }}"></script>

<div class="container">
    <h2 class="titre mb-4 ">Modifier l'Utilisateur</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h3>Informations Entreprise</h3>
        <div class="form-group">
            <label for="name">Client</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                required>
        </div>

        <!-- Téléphone -->
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $user->telephone }}">
        </div>
        <h3>Informations Entreprise</h3>
        <!-- Entreprise -->
        <div class="form-group">
            <label for="entreprise">Entreprise</label>
            <input type="text" class="form-control" id="entreprise" name="entreprise"
                value="{{ $user->entreprise }}">
        </div>

        <!-- Adresse -->
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $user->adresse }}">
        </div>

        <!-- Téléphone Entreprise -->
        <div class="form-group">
            <label for="telephoneE">Téléphone Entreprise</label>
            <input type="text" class="form-control" id="telephoneE" name="telephoneE"
                value="{{ $user->telephoneE }}">
        </div>
        <h3>Réseaux</h3>
        <!-- URL Facebook -->
        <div class="form-group">
            <label for="UrlFacebook">URL Facebook</label>
            <input type="url" class="form-control" id="UrlFacebook" name="UrlFacebook"
                value="{{ $user->UrlFacebook }}">
        </div>

        <!-- URL Instagram -->
        <div class="form-group">
            <label for="UrlInstagram">URL Instagram</label>
            <input type="url" class="form-control" id="UrlInstagram" name="UrlInstagram"
                value="{{ $user->UrlInstagram }}">
        </div>

        <!-- URL Google -->
        <div class="form-group">
            <label for="UrlGoogle">URL Google</label>
            <input type="url" class="form-control" id="UrlGoogle" name="UrlGoogle" value="{{ $user->UrlGoogle }}">
        </div>
         <!-- URL Site -->
         <div class="form-group">
            <label for="UrlSite">URL Site</label>
            <input type="url" class="form-control" id="UrlSite" name="UrlSite" value="{{ $user->UrlSite }}">
        </div>
        <div class="form-group">
            <label for="abonnement">abonnement</label>
            <input type="text" class="form-control" id="abonnement" name="abonnement"
                value="{{ $user->abonnement }}">
        </div>
        <div class="form-group row justify-content-end mt-2">
            <label for="imageFacebook" class="col-sm-4 col-form-label fw-bold text-end">Facebook:</label>
            <div class="col-sm-8">
                <label class="btn " style="background-color: #268EE6; color: white; border: none; cursor: pointer;">
                    + Ajout <input type="file" style="display: none;" id="imageFacebook" name="imageFacebook">
                </label>
            </div>
        </div>
        <div class="form-group row justify-content-end">
            <label for="imageInstagram" class="col-sm-4 col-form-label fw-bold text-end">Instagram:</label>
            <div class="col-sm-8">
                <label class="btn" style="background-color: #268EE6; color: white; border: none;  cursor: pointer;">
                    + Ajout <input type="file" style="display: none;" id="imageInstagram" name="imageInstagram">
                </label>
            </div>
        </div>
        <div class="form-group row justify-content-end">
            <label for="imageGoogle" class="col-sm-4 col-form-label fw-bold text-end">Google:</label>
            <div class="col-sm-8">
                <label class="btn " style="background-color: #268EE6; color: white; border: none;  cursor: pointer;">
                    + Ajout <input type="file" style="display: none;" id="imageGoogle" name="imageGoogle">
                </label>
            </div>
        </div>
        <div class="form-group row justify-content-end">
            <label for="imageSite" class="col-sm-4 col-form-label fw-bold text-end">Sit Internet:</label>
            <div class="col-sm-8">
                <label class="btn"style="background-color: #268EE6; color: white; border: none;  cursor: pointer;">
                    + Ajout <input type="file" style="display: none;" id="imageSite" name="imageSite">
                </label>
            </div>
        </div>



        <button type="submit" class="btn mt-2"
            style="background-color: #268EE6; color: white; border: none;cursor: pointer;">Enregistrer</button>
    </form>
</div>
