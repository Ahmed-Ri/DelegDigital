


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
       

            <div class="container">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary mb-2">Retour</a>
                <table class="table table-secondary">
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
                                    @if ($compagne->photo)
                                        <img src="{{ asset($compagne->photo) }}"
                                            alt="Photo"style="width: 50px; height: 50px;">
                                    @else
                                        Aucune photo disponible
                                    @endif
                                </td>
                                <td>{{ $compagne->status }}</td>
                                <td>
                                    <a href="{{ route('edit-compagne', $compagne->id) }}" class="btn" style="background-color: #268EE6; color: white; border: none;  cursor: pointer;">Éditer</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
        
     