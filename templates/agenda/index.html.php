<?php
if($userid == null){
    echo "<script>document.location.replace('/')</script>";
}
$edtLundi = array();
$edtMardi = array();
$edtMercredi = array();
$edtJeudi = array();
$edtVendredi = array();

$currentDate = new DateTime();
$day = $currentDate->format('d/m/Y');

foreach($cours as $row){

    $date = new DateTime($row->getDate());
    $dateJour = $date->format('Y/m/d');
    $timeD = $row->getheureDebut();
    $timeF = $row->getheureFin();
    $matiere = $row->getMatiere();
    $salle =  $row->getSalle();
    $td = $row->getTd();
    $color = $row->getCouleur();

    $unixTimestamp = strtotime($dateJour);
    $dayOfWeek = date("l", $unixTimestamp);

    $grs = 'grs' . $this->setHourGrid($timeD);
    $gre = 'gre' . $this->setHourGrid($timeF);
    $statement = '<li class="' . $grs . ' ' . $gre . ' '. $color . ' "><p>' . $matiere . '</p><p class="bold">' . $td . ' ' . $prof . ' ' . $salle . '</p><p>' . $timeD . ' - ' . $timeF . '</p></li>';

    switch ($dayOfWeek) {
        case "Monday":
            $edtLundi[] = $statement;
            $dateJour = $date;
            $monday = $date->format('d/m/Y');
            $date->modify('+4 day');
            $friday = $date->format('d/m/Y');
            $week = $date->format('W');
            break;
        case "Tuesday":
            $edtMardi[] = $statement;
            break;
        case "Wednesday":
            $edtMercredi[] = $statement;
            break;
        case "Thursday":
            $edtJeudi[] = $statement;
            break;
        case "Friday":
            $edtVendredi[] = $statement;
            break;
        default:
            $edtVendredi[] = $statement;
            break;
    }
}

function setHourGrid($heure){

    $time = explode(':', $heure);

    $minutes = $time[1];
    switch($minutes){
        case "15":
            $minutes = "25";
            break;
        case "30":
            $minutes = "50";
            break;
        case "45":
            $minutes = "75";
            break;
    }

    $hours = (int)$time[0] . '.' . $minutes;

    $hours = $hours - 8;
    $hours = $hours/0.25;
    $hours = $hours + 1;
    return $hours;
}

?>
<html lang="fr">

<head>
    <title>Proto calendrier</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/edt.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8" />
</head>

<body>
<header>
    <label class="croix">
        <input type="checkbox" id="btnMenu" />
        <div></div>
    </label>
    <div class="header_container">
        <h1>Emploi du temps</h1>
        <div id="logo"><a href="/accueil"><img src="/assets/images/logo_fond.svg" alt="Logo" /></a></div>
        <h2 id="bonjour">Bonjour <?= $userprenom; ?></h2>
    </div>

    <div id="icones_nav">
        <a href="#"><img src="/assets/images/EspacePedago.svg" alt="Espace pédagogique" /></a>
        <a href="#"><img src="/assets/images/Drive.svg" alt="Mon Drive" /></a>
        <a href="#"><img src="/assets/images/WebMail.svg" alt="Boite mail" /></a>
        <a href="#"><img src="/assets/images/Profil.svg" alt="Mon Profil" /></a>
    </div>
</header>
<nav>
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
<aside>
    <div>
        <input type="search" placeholder="Rechercher" />
    </div>
    <div class="radioDiv">
        <div>
            <input type="radio" name="coursSalle" id="cours" checked />
            <label for="cours">Cours</label>
        </div>
        <div>
            <input type="radio" name="coursSalle" id="salles" />
            <label for="salles">Salles</label>
        </div>
    </div>
    <div>
        <input type="checkbox" id="cacher" />
        <label for="cacher">Cacher les autres établissements</label>
    </div>
    <ul>
        <li>IUT Laval
            <ul>
                <li>GB</li>
                <li>MMI
                    <ul>
                        <li>MMI</li>
                        <li>MMI 2</li>
                        <li>LP DIWA</li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <button>Suggérer un changement</button>
</aside>
<main>
    <div id="wrapper">
        <ul id="jours">
            <li><p>Lundi</p></li>
            <li><p>Mardi</p></li>
            <li><p>Mercredi</p></li>
            <li><p>Jeudi</p></li>
            <li><p>Vendredi</p></li>

        </ul>
        <div id="edt">
            <ul class="col">
                <?php
                for($i = 0; $i < count($edtLundi); $i++){
                    echo $edtLundi[$i];
                }
                ?>
            </ul>
            <ul class="col">
                <?php
                for($i = 0; $i < count($edtMardi); $i++){
                    echo $edtMardi[$i];
                }
                ?>
            </ul>
            <ul class="col">
                <?php
                for($i = 0; $i < count($edtMercredi); $i++){
                    echo $edtMercredi[$i];
                }
                ?>
            </ul>
            <ul class="col">
                <?php
                for($i = 0; $i < count($edtJeudi); $i++){
                    echo $edtJeudi[$i];
                }
                ?>
            </ul>
            <ul class="col">
                <?php
                for($i = 0; $i < count($edtVendredi); $i++){
                    echo $edtVendredi[$i];
                }
                ?>
            </ul>
        </div>
        <ul id="week">
            <li id="previous"></li>
            <li>Semaine <?php echo $week; ?> - du <?php echo $monday; ?> au <?php echo $friday; ?></li>
            <li id="next"></li>
        </ul>
    </div>
</main>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/accueil.js"></script>
</body>

</html>