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
    <body class="font-sans antialiased">
@include('layouts.navigationAdmin')
    <div class="container mt-4">
        <!-- User Management Section -->
        <div class="titre d-flex justify-content-between align-items-center mb-1">
            <h2>Gestion des comptes</h2>
            <a href="{{ route('utilisateur.create') }}" class="btn mt-4 ml-4"
               style="background-color: #268EE6; color: white; border: none; cursor: pointer;">+ Nouveau</a>
        </div>
        <div id="user-table-container">
            <table class="table table-secondary-emphasis table-striped mt-3">
                <thead class="custom-thead">
                    <tr>
                        <th>Client</th>
                        <th>Mail</th>
                        <th>Abonnement</th>
                        <th>Téléphone</th>
                        <th>Mot de passe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->abonnement }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>**********</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn"
                                   style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Voir</a>
                            </td>
                        </tr> @endforeach
                </tbody>
            </table>
        </div>
        <div id="mobile-user-view-container">
    </div>

    <!-- Campaign Management Section -->
    <div class="titre d-flex justify-content-between align-items-center mt-3 mb-2">
        <h2>Gestion des compagnes</h2>
        <a href="" class="btn mt-4 ml-4"
            style="background-color: #268EE6; color: white; border: none; cursor: pointer;">+ Nouveau</a>
    </div>
    <div id="campaign-table-container">
        <table class="table table-secondary-emphasis table-striped mt-3">
            <thead class="custom-thead">
                <tr>
                    <th>Vendeur</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Objectif</th>
                    <th>Réseaux</th>
                    <th>Détails</th>
                    {{-- <th>Photo</th> --}}
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compagnes as $compagne)
                    <tr>
                        <td>{{ $compagne->User->name }}</td>
                        <td>{{ $compagne->date_debut }}</td>
                        <td>{{ $compagne->date_fin }}</td>
                        <td>{{ $compagne->objectif }}</td>
                        <td>{{ $compagne->reseaux }}</td>
                        <td>{{ $compagne->details }}</td>
                        {{-- <td>
                                @if ($compagne->images->isNotEmpty())
                                    @foreach ($compagne->images as $image)
                                        <img src="{{ Storage::url($image->filename) }}" alt="Photo de campagne"
                                             style="width: 50px; height: 50px;">
                                    @endforeach
                                @else
                                    Aucune photo disponible
                                @endif
                            </td> --}}
                        <td>{{ $compagne->status }}</td>
                        <td>
                            <a href="{{ route('edit-compagne', $compagne->id) }}" class="btn "
                                style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Éditer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="mobile-campaign-view-container"></div>
    </div>
    </body>

</html>

<script>
    window.onload = function() {
        function adjustVisibility(tableId, mobileId) {
            var tableContainer = document.getElementById(tableId);
            var mobileContainer = document.getElementById(mobileId);

            if (window.innerWidth <= 768) {
                tableContainer.style.display = 'none';
                mobileContainer.style.display = 'block';
                createMobileView(mobileId);
            } else {
                tableContainer.style.display = 'block';
                mobileContainer.style.display = 'none';
            }
        }

        function createMobileView(containerId) {
            var container = document.getElementById(containerId);
            var data = containerId.includes('user') ? @json($users) : @json($compagnes);
            container.innerHTML = '';

            if (data.length > 0) {
                data.forEach(function(item) {
                    var card = document.createElement('div');
                    card.className = 'article-card';
                    card.innerHTML = generateCardHTML(item, containerId.includes('user'));
                    container.appendChild(card);
                });
            } else {
                var noDataMessage = document.createElement('div');
                noDataMessage.innerText = 'Aucune donnée trouvée.';
                container.appendChild(noDataMessage);
            }
        }

        function generateCardHTML(item, isUser) {
            if (isUser) {
                return `
                        <div class="user-details">
                            <div>${item.name}</div>
                            
                            
                            
                            
                        </div>
                        <div class="user-actions">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn" style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Voir</a>
                        </div>
                    `;
            } else {
                return `
                        <div class="campaign-details">
                            <div> ${item.user.name}</div>
                            
                            <div>${item.date_debut}</div>
                            
                        </div>
                        <div class="campaign-actions">
                            <a href="/compagnes/edit/${item.id}" class="btn" style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Éditer</a>
                        </div>
                    `;
            }
        }

        // Initial visibility adjustment
        adjustVisibility('user-table-container', 'mobile-user-view-container');
        adjustVisibility('campaign-table-container', 'mobile-campaign-view-container');

        // Reapply visibility adjustment on window resize
        window.onresize = function() {
            adjustVisibility('user-table-container', 'mobile-user-view-container');
            adjustVisibility('campaign-table-container', 'mobile-campaign-view-container');
        };
    };
</script>
