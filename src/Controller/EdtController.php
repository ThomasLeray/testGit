<?php
/**
 * Created by PhpStorm.
 * User: i181561
 * Date: 03/10/2018
 * Time: 15:59
 */

namespace UnivLeMans\TP\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UnivLeMans\TP\Entity\Edt;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;

class EdtController extends AbstractController
{
    public function index(Request $request) {


        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $userid = $session->get('user_id');
        $usernom = $session->get('user_nom');
        $userprenom = $session->get('user_prenom');
        $usertd = $session->get('user_td');

        $manager = $this->getEdtManager();

        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $td = $session->get('user_td');

        $cours = $manager->findCours($td);
        $this->lireJson();

//        if($cours) {
//            foreach ($cours as $row) {
//                $id = $row->getID();
//                $date = $row->getDate();
//                $heureD = $row->getheureDebut();
//                $heureF = $row->getheureFin();
//                $matiere = $row->getMatiere();
//                $salle =  $row->getSalle();
//                $td = $row->getTd();
//                $couleur = $row->getCouleur();

//                $datas = array(
//                    "id" => $id,
//                    "date" => $date,
//                    "heureDebut" => $heureD,
//                    "heureFin" => $heureF,
//                    "matiere" => $matiere,
//                    "salle" => $salle,
//                    "td" => $td,
//                    "couleur" => $couleur
//                );
//            }
//        }

        $content = $this->render('agenda/index.html.php', ['userid' => $userid, 'usernom' => $usernom, 'userprenom' => $userprenom, 'usertd' => $usertd, "cours" => $cours]);

        $response = new Response($content);

        return $response;
    }

    /**
     * @param $file
     * @return mixed
     * Permet de parser un fichier Json et de le retourner
     */
    public function parseJson($file) {
        $jsonString = file_get_contents($file);
        $responses = json_decode ($jsonString ,true);

        return $responses;
    }

    /**
     * @param $heure
     * @return float|int|string
     */
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

    /**
     * Permet de lire le fichier Json et d'en retirer les données importante pour l'emploi du temps afin de le modéliser
     */
    public function lireJson()
    {
        $responses = $this->parseJson(__DIR__ . "/../files/data.json");


        $count = 0;

        foreach ($responses as $line) {

            $edtLundi = array();
            $edtMardi = array();
            $edtMercredi = array();
            $edtJeudi = array();
            $edtVendredi = array();

            $hd = new DateTime($line["DTSTART"]);
            $hd->modify('+2 hour');
            $timeD = $hd->format('H:i');

            $hf = new DateTime($line["DTEND"]);
            $hf->modify('+2 hour');
            $timeF = $hf->format('H:i');

            $date = $hd->format('Y/m/d');

            $salle = $line["LOCATION"];
            $nom = $line["SUMMARY"];
            $description = $line["DESCRIPTION"];

            $descriptionExplode = $this->changeNom($description);
            $td = $descriptionExplode[2];
            $prof = $descriptionExplode[3];


            //get the day of the week
            $unixTimestamp = strtotime($date);
            $dayOfWeek = date("l", $unixTimestamp);

            $grs = 'grs' . $this->setHourGrid($timeD);
            $gre = 'gre' . $this->setHourGrid($timeF);

            $edt = new Edt;
            $edt->setMatiere($nom);
            $edt->setSalle($salle);
            $edt->setTd($td);

            $statement = '<li class="' . $grs . ' ' . $gre . ' gcs1 gce7 "><p>' . $nom . '</p><p class="bold">' . $td . ' ' . $prof . ' ' . $salle . '</p><p>' . $timeD . ' - ' . $timeF . '</p></li>';

            switch ($dayOfWeek) {
                case "Monday":
                    $edtLundi[] = $statement;
                    $count += 1;
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
    }

    /**
     * @param $nom
     * @return array
     * Permet de modifier les "\r" du fichier en des "|" permettant d'en faire un explode pour retirer les informations importantes
     */
    public function changeNom($nom) {
        $descriptionModif= str_replace('\n','|',$nom);

        $descriptionExplode = explode("|", $descriptionModif);

        return $descriptionExplode;
    }

//    public function test(){
//
//        if($cours) {
//            foreach ($cours as $row) {
//                $id = $row->getID();
//                $date = $row->getDate();
//                $heureD = $row->getheureDebut();
//                $heureF = $row->getheureFin();
//                $matiere = $row->getMatiere();
//                $salle =  $row->getSalle();
//                $td = $row->getTd();
//                $couleur = $row->getCouleur();
//
//                $datas = array(
//                    "id" => $id,
//                    "date" => $date,
//                    "heureDebut" => $heureD,
//                    "heureFin" => $heureF,
//                    "matiere" => $matiere,
//                    "salle" => $salle,
//                    "td" => $td,
//                    "couleur" => $couleur
//                );
//            }
//        }
//
//        $content = $this->render("agenda/index.html.php", ["cours" => $datas]);
//
//        return new Response($content);
//    }
}