<?php


namespace UnivLeMans\TP\Entity;


/**
 * Class User
 * @package App\Entity
 */
class User
{
    /**
     * @var int|null
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $login;

    /**
     * @var string|null
     */
    protected $password;

    /**
     * @var string|null
     */
    protected  $nom;

    /**
     * @var string|null
     */
    protected  $td;

    /**
     * @param null|string $td
     */
    public function setTd(?string $td): void
    {
        $this->td = $td;
    }

    /**
     * @return null|string
     */
    public function getTd(): ?string
    {
        return $this->td;
    }

    /**
     * @param null|string $nom
     */
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param null|string $prenom
     */
    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return null|string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @return null|string
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @var string|null
     */
    protected  $prenom;


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param null|string $login
     */
    public function setLogin(?string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return null|string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param null|string $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }
}