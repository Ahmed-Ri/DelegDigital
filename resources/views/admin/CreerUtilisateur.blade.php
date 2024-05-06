<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.bunny.net">
<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/js/style.js') }}"></script>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;

            margin: 0;
            background-color: #f5f5f5;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type=text],
        input[type=email],
        input[type=password],
        input[type=url],
        input[type=file] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    
    <form class="mt-2" action="{{ route('utilisateur.store') }}" method="POST" enctype="multipart/form-data">

        @csrf <!-- Token CSRF pour la sécurité -->
        <h2 class=" titre ">Ajouter utilisateur</h2>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" required>

        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>

        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>

        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone">

        <input type="text" class="form-control" id="entreprise" name="entreprise" placeholder="Entreprise">

        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">

        <input type="text" class="form-control" id="telephoneE" name="telephoneE" placeholder="Téléphone Entreprise">

        <input type="url" class="form-control" id="UrlFacebook" name="UrlFacebook" placeholder="URL Facebook">

        <input type="url" class="form-control" id="UrlInstagram" name="UrlInstagram" placeholder="URL Instagram">

        <input type="url" class="form-control" id="UrlGoogle" name="UrlGoogle" placeholder="URL Google">
        <input type="url" class="form-control" id="UrlSite" name="UrlSite" placeholder="URL Site">

        <input type="text" class="form-control" id="abonnement" name="abonnement" placeholder="Abonnement">
        <label for="imageFacebook">
            <h3>Facebook</h3>
        </label>
        <input type="file" class="form-control" id="imageFacebook" name="imageFacebook" placeholder="Image Facebook">
        <label for="imageInstagram">
            <h3>Instagram</h3>
        </label>

        <input type="file" class="form-control" id="imageInstagram" name="imageInstagram"
            placeholder="Image Instagram">
        <label for="imageGoogle">
            <h3>Google</h3>
        </label>

        <input type="file" class="form-control" id="imageGoogle" name="imageGoogle" placeholder="Image Google">
        <label for="imageSite">
            <h3>Site</h3>
        </label>

        <input type="file" class="form-control" id="imageSite" name="imageSite" placeholder="Image Site">

        <button type="submit">Enregistrer</button>
    </form>
</body>

</html>
