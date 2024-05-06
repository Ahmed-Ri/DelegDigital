<x-app-layout>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="form-wrapper py-5">
                    <!-- form starts -->
                    <form action="{{ route('sauvegarder_donnees') }}" name="demoform" id="demoform" method="POST"
                        class="dropzone" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row justify-content-end">
                            <label for="date_debut" class="col-sm-4 col-form-label fw-bold text-end">Date de
                                début:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <label for="date_fin" class="col-sm-4 col-form-label fw-bold text-end">Date de fin:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <label for="status" class="col-sm-4 col-form-label fw-bold text-end">Status:</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="status" name="status">
                                    <option value="EnCours">En cours</option>
                                    <option value="Publier">Publier</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <label for="objectif" class="col-sm-4 col-form-label fw-bold text-end">Objectif:</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="objectif" name="objectif">
                                    <option value="fidelisation">Fidélisation</option>
                                    <option value="visibilite">Visibilité</option>
                                    <option value="notoriete">Notoriété</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <label for="reseaux" class="col-sm-4 col-form-label fw-bold text-end">Réseaux
                                sociaux:</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="reseaux" name="reseaux">
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="google">Google</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <label for="details" class="col-sm-4 col-form-label fw-bold text-end">Détails:</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group " style="display: flex; ">
                            <label for="details" class="col-sm-4 col-form-label fw-bold text-end">Photo:</label>
                            
                          <div>
                            <div class="dropzone-previews ml-3"></div>
                            <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
                                <h1 class="btn btn-outline-primary text-center ml-4">Telecharger</h1>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
	        				<button type="submit" class="btn btn-md btn-primary" id="submit-all"style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Enregistrer</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Annuler</a>

	        			</div>
                       
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>


    <script>
        Dropzone.autoDiscover = false; // Essential to prevent automatic instantiation.

        // Initialisation de Dropzone
        var myDropzone = new Dropzone("#demoform", {
            url: "{{ route('sauvegarder_donnees') }}",
            autoProcessQueue: false,
            previewsContainer:'div.dropzone-previews',
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 10,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            paramName: "files", // The name that will be used to transfer the file
            init: function() {
                var submitButton = document.getElementById("submit-all");
                var form = document.getElementById("demoform");

                submitButton.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    if (this.getQueuedFiles().length > 0) {
                        this.processQueue(); // Process the files queued for upload
                    } else {
                        form.submit(); // Submit form directly if no files are queued for upload
                    }
                }.bind(this)); // Bind this Dropzone instance to function

                this.on("queuecomplete", function() {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        form.submit(); // submit form when all files are uploaded
                    }
                });

                this.on("sending", function(file, xhr, formData) {
                    formData.append("_token", document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'));
                });

                this.on("successmultiple", function(files, response) {
                    console.log("Success!", response);
                });

                this.on("errormultiple", function(files, response) {
                    console.log("Error!", response);
                });
            }
        });
    </script>




</x-app-layout>
