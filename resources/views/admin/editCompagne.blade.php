<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>L'assistant Digital</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
        <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('assets/js/style.js')}}"></script>
    
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
    <body class="font-sans antialiased">
@include('layouts.navigationAdmin')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="form-wrapper py-5">
                    <!-- Form starts -->
                    <form action="{{ route('update-compagne', $compagne->id) }}" name="demoform" id="demoform" method="POST"
                        class="dropzone" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- Date de début -->
                        <div class="form-group row justify-content-end">
                            <label for="date_debut" class="col-sm-4 col-form-label fw-bold text-end">Date de
                                début</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="date_debut" name="date_debut"
                                    value="{{ $compagne->date_debut }}" required>
                            </div>
                        </div>

                        <!-- Date de fin -->
                        <div class="form-group row justify-content-end">
                            <label for="date_fin" class="col-sm-4 col-form-label fw-bold text-end">Date de fin</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="date_fin" name="date_fin"
                                    value="{{ $compagne->date_fin }}" required>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group row justify-content-end">
                            <label for="status" class="col-sm-4 col-form-label fw-bold text-end">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="status" name="status">
                                    <option value="EnCours" @if ($compagne->status == 'EnCours') selected @endif>En cours
                                    </option>
                                    <option value="Publier" @if ($compagne->status == 'Publier') selected @endif>Publier
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Objectif -->
                        <div class="form-group row justify-content-end">
                            <label for="objectif" class="col-sm-4 col-form-label fw-bold text-end">Objectif</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="objectif" name="objectif">
                                    <option value="fidelisation" @if ($compagne->objectif == 'fidelisation') selected @endif>
                                        Fidélisation</option>
                                    <option value="visibilite" @if ($compagne->objectif == 'visibilite') selected @endif>
                                        Visibilité</option>
                                    <option value="notoriete" @if ($compagne->objectif == 'notoriete') selected @endif>
                                        Notoriété</option>
                                </select>
                            </div>
                        </div>

                        <!-- Réseaux sociaux -->
                        <div class="form-group row justify-content-end">
                            <label for="reseaux" class="col-sm-4 col-form-label fw-bold text-end">Réseaux
                                sociaux</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="reseaux" name="reseaux">
                                    <option value="facebook" @if ($compagne->reseaux == 'facebook') selected @endif>Facebook
                                    </option>
                                    <option value="instagram" @if ($compagne->reseaux == 'instagram') selected @endif>
                                        Instagram</option>
                                    <option value="google" @if ($compagne->reseaux == 'google') selected @endif>Google
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Détails -->
                        <div class="form-group row justify-content-end">
                            <label for="details" class="col-sm-4 col-form-label fw-bold text-end">Détails</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="details" name="details" rows="3">{{ $compagne->details }}</textarea>
                            </div>
                        </div>

                        <!-- Dropzone File Upload -->
                        <div class="form-group row images-container">
                            <label for="details" class="col-sm-4 col-form-label fw-bold text-end">Photos</label>
                            <div class="col-sm-8">
                                <div style="border: 2px dotted #ccc; padding: 10px;">
                                    <div class="dropzone-previews ml-3"></div>
                                    <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
                                        <img src="/assets/image/img.png" alt="Ajouter photo" style="width: 40px; height: 40px;"" >
                                    </div>
                                </div>
                                <!-- Existing Images with delete option -->
                                <div class="existing-images mt-4">
                                    <div class="row">
                                        @forelse ($compagne->images as $image)
                                            <div class="col-md-3 text-center mb-3" id="image-container-{{ $image->id }}">
                                                <img src="{{ Storage::url($image->filename) }}" class="img-fluid img-thumbnail" alt="Responsive image">
                                                <button type="button" class="btn btn-outline-danger mt-2 remove-images" data-id="{{ $image->id }}">X</button>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <p>Aucune photo disponible.</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Buttons -->
                         <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary" id="submit-all" style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Enregistrer</button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Annuler</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/style.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false; // Empêcher l'auto-découverte
    
        document.addEventListener("DOMContentLoaded", function () {
            var myDropzone = new Dropzone("#demoform", {
                url: "{{ route('update-compagne', $compagne->id) }}", // Assurez-vous que l'URL est correcte
                autoProcessQueue: false,
                previewsContainer: ".dropzone-previews",
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 10,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                paramName: "files", // Le nom utilisé côté serveur pour récupérer les fichiers
    
                init: function() {
                    this.on("sending", function(file, xhr, formData) {
                        formData.append("_token", "{{ csrf_token() }}"); // CSRF token pour Laravel
                    });
    
                    var submitButton = document.getElementById("submit-all");
                    submitButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (myDropzone.getQueuedFiles().length > 0) {
                            myDropzone.processQueue();
                        } else {
                            document.getElementById("demoform").submit(); // S'assurer que cette ligne est correcte
                        }
                    });
    
                    this.on("queuecomplete", function() {
                        // Votre logique conditionnelle pour déterminer si vous voulez soumettre le formulaire ou non
                        var readyToSubmit = true; // Par défaut, on suppose que le formulaire est prêt à être soumis
                        
                        if (readyToSubmit) {
                            document.getElementById("demoform").submit();
                        }
                    });
                }
            });
    
            // Gestion de la suppression des images avec une requête AJAX
            document.querySelectorAll('.remove-images').forEach(button => {
                button.addEventListener('click', function() {
                    const imageId = this.getAttribute('data-id');
                    if (confirm('Êtes-vous sûr de vouloir supprimer cette image ?')) {
                        fetch(`/delete_images/${imageId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content')
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Supprimez le conteneur de l'image du DOM
                                    const imageElement = document.getElementById(
                                        `image-container-${imageId}`);
                                    if (imageElement) {
                                        imageElement.remove();
                                    }
                                } else {
                                    alert("Erreur lors de la suppression de l'image.");
                                }
                            })
                            .catch(error => {
                                console.error('Erreur:', error);
                                alert("Erreur de communication avec le serveur.");
                            });
                    }
                });
            });
        });
    </script>
    


