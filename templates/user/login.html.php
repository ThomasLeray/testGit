<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Connexion</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/assets/css/connexion.css" type="text/css" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<header>
    <div id="univ">
        <img src="/assets/images/logo_detour.svg" alt="Logo" />
        <div>
            <h1>ENT</h1>
            <h2>Le Mans Université</h2>
        </div>
    </div>
</header>
<main>
    <div id="orange">
        <section>
            <form action="/login" method="POST" id="formulaire">
                <h3>Se connecter</h3>
                <input type="text" name="login" placeholder="Identifiant" required/>
                <input type="password" name="password" placeholder="Mot de passe" required/>
                <label class="container">
                    <span>Se souvenir de moi ?</span>
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                </label>
                <input type="submit" value="Valider">
                <a href="#">Mot de passe oublié ?</a>
            </form>
            <div id="informations">Soyons vigilants envers tous les programmes ou pages web qui vous demandent votre nom d'utilisateur et/ou votre mot de passe.<br/><br/>Les pages sécurisées du réseau de Le Mans Université qui proposent l'authentification sont assorties du certificat &#x1F512 Université du Maine (FR) qui garantit que les données peuvent être saisies en toute confiance.<br/><br/>De plus, votre navigateur doit clairement indiquer que vous accédez à une page sécurisée (HTTPS).</div>
        </section>
    </div>
</main>
<footer>
</footer>
</body>

</html>