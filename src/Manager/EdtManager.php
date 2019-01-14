<?php
/**
 * Created by PhpStorm.
 * User: i181561
 * Date: 03/10/2018
 * Time: 16:28
 */

namespace UnivLeMans\TP\Manager;

use UnivLeMans\TP\Controller\EdtController;
use \PDO;
use \PDOStatement;
use UnivLeMans\TP\Entity\Edt;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

class EdtManager
{
    /**
     * @var PDO
     */
    protected $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $intitule
     * @return int|null
     * Retourne l'id de la matiere par son intitule
     */
    public function findCours($td) {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());
        $td = $session->get('user_td');
        $query =    'select cours.id as id, date, heureDebut, heureFin, matieres.intitule as matiere, salles.intitule as salle, TD.intitule as td, couleur.intitule as couleur
                    from cours
                    inner join matieres on idMatiere = matieres.id
                    inner join salles on idSalle = salles.id
                    inner join TD on idTD = TD.id
                    inner join couleur on matieres.idCouleur = couleur.id
                    where TD.id = :td;';
        $stm = $this->connection->prepare($query);
        $stm->bindValue('td', $td, PDO::PARAM_INT);
        $status = $stm->execute();
        if (!$status) {
            throw new \RuntimeException('Query failed with code ' . $stm->errorCode() . ' : ' . $stm->errorInfo());
        }

        return $this->map($stm);
    }

    protected function map(PDOStatement $statement)
    {
        if ($statement->rowCount() === 0) {
            return null;
        }

        $resultSet = [];
        while (false !== $row = $statement->fetch()) {
            $edt = new Edt();

            $edt->setId($row['id']);
            $edt->setDate($row['date']);
            $edt->setHeureDebut($row['heureDebut']);
            $edt->setHeureFin($row['heureFin']);
            $edt->setMatiere($row['matiere']);
            $edt->setSalle($row['salle']);
            $edt->setTD($row['td']);
            $edt->setCouleur($row['couleur']);

            $resultSet[] = $edt;
        }

        if (count($resultSet) === 1) {
            return $resultSet[0];
        }

        return $resultSet;
    }
}