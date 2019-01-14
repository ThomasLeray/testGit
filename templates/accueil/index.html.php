<?php
    if($userid == null){
        echo "<script>document.location.replace('/')</script>";
    }?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ferme là Boulard</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/assets/css/accueil.css" type="text/css" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body>
<header>
    <label class="croix">
        <input type="checkbox" id="btnMenu" />
        <div></div>
    </label>
    <h1>Accueil</h1>
    <div id="logo"><a href="#"><img src="/assets/images/logo_fond.svg" alt="Logo" /></a></div>
    <h2 id="bonjour">Bonjour <?= $userprenom; ?></h2>
    <div id="icones_nav">
        <a href="#"><img src="/assets/images/EspacePedago.svg" alt="Espace pédagogique" /></a>
        <a href="/agenda"><img src="/assets/images/Agenda.svg" alt="Emploi du temps" /></a>
        <a href="#"><img src="/assets/images/Drive.svg" alt="Mon Drive" /></a>
        <a href="#"><img src="/assets/images/WebMail.svg" alt="Boite mail" /></a>
        <a href="#"><img src="/assets/images/Profil.svg" alt="Mon Profil" /></a>
    </div>
</header>
<nav id="burger_toggle">
    <div id="haut_menu">
        <a href="/logout">
            <h5>se déconnecter</h5><img src="/assets/images/connexion.svg" alt="Connexion" />
        </a>
        <div>
            <h2><?= $userprenom; ?></h2>
            <h4><?= $usernom; ?></h4>
        </div>
    </div>
    <label class="croix">
        <input type="checkbox" id="btnMenu2" />
        <div></div>
    </label>
    <div id="bas_menu">
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Webmail</a></li>
            <li><a href="#">Emploi du temps</a></li>
            <li><a href="#">Mon drive</a></li>
            <li><a href="#">Mon profil</a></li>
            <li><a href="#">Espace pédagogique</a></li>
        </ul>
    </div>
</nav>
<div id="burger-overlay"></div>
<main>
    <section>
        <div class="boite haut">
            <h3>Boite mail</h3>
            <div class="notif-mail">!4 messages non lus</div>
            <div id="derniers-mails">
                <div class="mail">
                    <p class="auteur-mail">Service Communication</p>
                    <p class="date-mail">à 16h44</p>
                    <p class="objet-mail">[u-etu] La Nuit Européenne des...</p>
                </div>
                <div class="mail">
                    <p class="auteur-mail">Lucas Cécile</p>
                    <p class="date-mail">à 16h00</p>
                    <p class="objet-mail">[etu] Rendez-vous ce soir à...</p>
                </div>
                <div class="mail">
                    <p class="auteur-mail">Marchand Nathalie</p>
                    <p class="date-mail">Hier</p>
                    <p class="objet-mail">[ETU-LPDIWA] EMPLOIS DU TEMPS...</p>
                </div>
            </div>
        </div>
        <div class="boite haut">
            <div class="box-header">
                <h3>Note personnelle</h3>
                <div id="modifier-note">
                    <img src="/assets/images/couleur-note.svg" alt="Couleur" />
                    <img src="/assets/images/poids-note.svg" alt="Couleur" />
                    <img src="/assets/images/italique-note.svg" alt="Couleur" />
                    <img src="/assets/images/souligner-note.svg" alt="Couleur" />
                </div>
            </div>
            <div class="content">
                <p class="date-note">Mardi 14 septembre</p>
                <p class="note-perso">Amener le certificat médical au secrétariat</p>
                <p class="date-note">Mercredi 15 septembre</p>
                <p class="note-perso">Dossier d'ergonomie</p>
            </div>
        </div>
        <div class="boite haut">
            <div class="box-header">
                <h3>Vos prochains cours</h3>
                <p class="date-courante">Mardi 14 septembre</p>
            </div>

            <div class="content">
                <div class="cours">
                    <p class="horaire">13h30-16h30</p>
                    <div class="info">
                        Mathématiques
                        <p class="salle">/ Tango</p>
                    </div>
                </div>
                <div class="cours">
                    <p class="horaire">16h30-18h00</p>
                    <div class="info">
                        Anglais
                        <p class="salle">/ Tango</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="boite bas">
            <div class="box-header">
                <h3>Ajout récent dans l'espace fichier</h3>
            </div>
            <div class="content">
                <div id="espace-fichiers">
                    <div class="fichiers-recents">
                        <img src="/assets/images/Fichier.svg" alt="Fichier" />
                        Exercice 3 - Js
                    </div>
                    <div class="fichiers-recents">
                        <img src="/assets/images/Dossier.svg" alt="Fichier" />
                        Stage
                    </div>
                </div>
            </div>

        </div>
        <div class="boite bas">
            <div class="box-header">
                <h3>Dernières notes</h3>
            </div>
            <div class="content">
                <p class="matiere">Mathématiques</p>
                <p class="note-examen">14,5/20</p>
            </div>

        </div>
        <div class="boite bas">
            <div class="box-header">
                <h3>News</h3>
            </div>
            <div class="content">
                <div class="dernieres-news">
                    <div class="nouvelle">
                        <p class="date-news">25/09</p>
                        <p class="news">Campus en Fête</p>
                    </div>
                    <div class="nouvelle">
                        <p class="date-news">14/09</p>
                        <p class="news">Une nouvelle bibliothèque</p>
                    </div>
                    <div class="nouvelle">
                        <p class="date-news">10/09</p>
                        <p class="news">C'est la rentrée !</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <a href="#"><img id="corbeille" src="/assets/images/poubelle.svg" alt="Corbeille" /></a>
    <div id="ajElem"><a href="#"><img src="/assets/images/plus.svg" alt="+" />Ajouter un élément</a></div>
</footer>
<!--    <script type="text/javascript" src="./ressources/https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
<script src="/assets/js/accueil.js"></script>
</body>

</html>