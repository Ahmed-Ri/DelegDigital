<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.bunny.net">
<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/js/style.js') }}"></script>

<div class="container">
    <h2 class="titre" >Éditer Compagne</h2>
    <form action="{{ route('update-compagne', $compagne->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="date_debut">Date Début</label>
            <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ $compagne->date_debut }}" required>
        </div>

        <div class="form-group">
            <label for="date_fin">Date Fin</label>
            <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $compagne->date_fin }}" required>
        </div>
        <div class="form-group ">
            <label for="status" >Status:</label>
            <div class="col-sm-8">
                <select class="form-control" id="status" name="status">
                    <option value="EnCours" {{ $compagne->status == 'EnCours' ? 'selected' : '' }}>En cours</option>
                    <option value="publier" {{ $compagne->status == 'publier' ? 'selected' : '' }}>Publier</option>
                   
                </select>
                
            </div>
        </div>
        <div class="form-group ">
            <label for="objectif" >Objectif:</label>
            <div class="col-sm-8">
                <select class="form-control" id="objectif" name="objectif">
                    <option value="fidelisation" {{ $compagne->objectif == 'fidelisation' ? 'selected' : '' }}>Fidélisation</option>
                    <option value="visibilite" {{ $compagne->objectif == 'visibilite' ? 'selected' : '' }}>Visibilité</option>
                    <option value="notoriete" {{ $compagne->objectif == 'notoriete' ? 'selected' : '' }}>Notoriété</option>
                </select>
            </div>
        </div>

        <div class="form-group ">
            <label for="reseaux" >Réseaux sociaux:</label>
            <div class="col-sm-8">
                <select class="form-control" id="reseaux" name="reseaux">
                    <option value="facebook" {{ $compagne->reseaux == 'facebook' ? 'selected' : '' }}>Facebook</option>
                    <option value="instagram" {{ $compagne->reseaux == 'instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="google" {{ $compagne->reseaux == 'google' ? 'selected' : '' }}>Google</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="details">Détails</label>
            <textarea class="form-control" id="details" name="details" rows="3" >{{ $compagne->details }}</textarea>
        </div>

        <div class="form-group mt-2">
            <label for="photo"></label>
            @if ($compagne->photo)
                <img src="{{ asset($compagne->photo) }}" alt="Photo de la compagne" style="width: 100px; height: 100px;">
            @endif
            <input type="file" class="form-control-file" id="photo" name="photo">
        </div>
<div class="mt-2">
    
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Annuler</a>
</div>
    </form>
</div>