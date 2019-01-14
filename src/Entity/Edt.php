<?php
/**
 * Created by PhpStorm.
 * User: i181561
 * Date: 04/10/2018
 * Time: 09:02
 */

namespace UnivLeMans\TP\Entity;


class Edt
{
    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $heureDebut;

    /**
     * @var string
     */
    private $heureFin;

    /**
     * @var string
     */
    private $couleur;
    /**
     * @var string
     */
    private $matiere;

    /**
     * @var string
     */
    private $salle;

    /**
     * @var string
     */
    private $td;

    /**
     * @var int
     */
    private $id;

    /**
     * @param int $id
     */

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string $heureDebut
     */
    public function setHeureDebut(string $heureDebut): void
    {
        $this->heureDebut = $heureDebut;
    }

    /**
     * @param string $heureFin
     */
    public function setHeureFin(string $heureFin): void
    {
        $this->heureFin = $heureFin;
    }

    /**
     * @param string $couleur
     */
    public function setCouleur(string $couleur): void
    {
        $this->couleur = $couleur;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getHeureDebut(): string
    {
        return $this->heureDebut;
    }

    /**
     * @return string
     */
    public function getHeureFin(): string
    {
        return $this->heureFin;
    }

    /**
     * @return string
     */
    public function getCouleur(): string
    {
        return $this->couleur;
    }


    /**
     * @param string $matiere
     */

    public function setMatiere(string $matiere): void
    {
        $this->matiere = $matiere;
    }

    /**
     * @param string $salle
     */
    public function setSalle(string $salle): void
    {
        $this->salle = $salle;
    }

    /**
     * @param string $td
     */
    public function setTd(string $td): void
    {
        $this->td = $td;
    }

    /**
     * @return string
     */
    public function getMatiere(): string
    {
        return $this->matiere;
    }

    /**
     * @return string
     */
    public function getSalle(): string
    {
        return $this->salle;
    }

    /**
     * @return string
     */
    public function getTd(): string
    {
        return $this->td;
    }


}