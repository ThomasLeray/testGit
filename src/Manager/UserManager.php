<?php


namespace UnivLeMans\TP\Manager;

use \PDO;
use \PDOStatement;
use UnivLeMans\TP\Entity\User;

class UserManager
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
     * @param $id
     * @return User|null
     */
    public function find($id): ?User
    {
        $query = 'SELECT * FROM etudiants WHERE id = :id';
        $stm = $this->connection->prepare($query);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $status = $stm->execute();
        if (!$status) {
            throw new \RuntimeException('Query failed with code ' . $stm->errorCode() . ' : ' . $stm->errorInfo());
        }

        return $this->map($stm);
    }

    /**
     * @param $id
     * @return User|null
     */
    public function findByLogin($login): ?User
    {
        $queryEtu = 'SELECT * FROM etudiants WHERE login = :login';
        $stmEtu = $this->connection->prepare($queryEtu);
        $stmEtu->bindValue(':login', $login, PDO::PARAM_STR);
        $statusEtu = $stmEtu->execute();
        $countEtu = $stmEtu->rowCount();
//        var_dump($queryEtu->queryString);

//        echo $countEtu;
//        echo "test";

        if ($countEtu === 0) {
            $queryProf = 'SELECT * FROM professeurs WHERE login = :login';
            $stmProf = $this->connection->prepare($queryProf);
            $stmProf->bindValue('login', $login, PDO::PARAM_STR);
            $statusProf = $stmProf->execute();
            $countProf = $stmProf->rowCount();
//            echo $countProf;

            if ($countProf === 1) {
                $result = $this->map($stmProf);
//                echo "Professeur";
            }
        } else {
            $result = $this->map($stmEtu);
//            echo "Etudiant";
        }

//        var_dump($query->queryString);
        if (!$statusEtu && !$statusProf) {
            throw new \RuntimeException('Query failed with code ' . $stmProf->errorCode() . ' : ' . $stmProf->errorInfo());
        }

//        var_dump($result);
        return $result;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function insert(User $user): bool
    {
        $query = 'INSERT INTO etudiants (nom, prenom, login, password, idTD) VALUES (:nom, :prenom, :login, :password, :idTD)';
        $stm = $this->connection->prepare($query);
        $stm->bindValue(':login', $user->getLogin(), PDO::PARAM_STR);
        $stm->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $stm->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
        $stm->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
        $stm->bindValue(':idTD', $user->getTd(), PDO::PARAM_INT);
        $status = $stm->execute();
        if (!$status) {
            throw new \RuntimeException('Query failed with code ' . $stm->errorCode() . ' : ' . $stm->errorInfo()[2]);
        }

        $id = $this->connection->lastInsertId();
        $user->setId($id);

        return true;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function update(User $user): bool
    {
        // TODO
    }

    protected function map(PDOStatement $statement)
    {
        if ($statement->rowCount() === 0) {
            return null;
        }

        $resultSet = [];
        while (false !== $row = $statement->fetch()) {
            $user = new User();

            $user->setId($row['id']);
            $user->setLogin($row['login']);
            $user->setPassword($row['password']);
            $user->setNom($row['nom']);
            $user->setPrenom($row['prenom']);
            $user->setTd($row['idTD']);

            $resultSet[] = $user;
        }

        if (count($resultSet) === 1) {
            return $resultSet[0];
        }

        return $resultSet;
    }

    public function hashPassword(string $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function isPasswordValid(User $user, $password)
    {
        return password_verify($password, $user->getPassword());
    }
}