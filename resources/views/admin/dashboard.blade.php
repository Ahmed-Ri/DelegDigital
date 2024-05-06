<x-app-layout>
    <div class="container mt-4">
        <!-- User Management Section -->
        <div class="titre d-flex justify-content-between align-items-center mb-2">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="mobile-user-view-container"></div>

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
                        <th>Photo</th>
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
                            <td>
                                @if ($compagne->images->isNotEmpty())
                                    @foreach ($compagne->images as $image)
                                        <img src="{{ Storage::url($image->filename) }}" alt="Photo de campagne"
                                             style="width: 50px; height: 50px;">
                                    @endforeach
                                @else
                                    Aucune photo disponible
                                @endif
                            </td>
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
                            <div>Client: ${item.name}</div>
                            <div>Mail: ${item.email}</div>
                            <div>Abonnement: ${item.abonnement}</div>
                            <div>Téléphone: ${item.telephone}</div>
                            <div>Mot de passe: **********</div>
                        </div>
                        <div class="user-actions">
                            <a href="users/edit/${item.id}" class="btn" style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Voir</a>
                        </div>
                    `;
                } else {
                    return `
                        <div class="campaign-details">
                            <div>Date Début: ${item.date_debut}</div>
                            <div>Date Fin: ${item.date_fin}</div>
                            <div>Objectif: ${item.objectif}</div>
                            <div>Réseaux: ${item.reseaux}</div>
                            <div>Détails: ${item.details}</div>
                            <div>Status: ${item.status}</div>
                        </div>
                        <div class="campaign-actions">
                            <a href="edit-compagne/${item.id}" class="btn" style="background-color: #268EE6; color: white; border: none; cursor: pointer;">Éditer</a>
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
</x-app-layout>
