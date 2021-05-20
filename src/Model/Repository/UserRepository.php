<?php
namespace Rediite\Model\Repository;

use \Rediite\Model\Entity\User as UserEntity;
use \Rediite\Model\Hydrator\UserHydrator;

class UserRepository {

   /**
     * @var \PDO
     */
    private $dbAdapter;

       /**
     * @var UserHydrator
     */
    private $userHydrator;

  
    public function __construct(
      \PDO $dbAdapter,
      UserHydrator $userHydrator

    ) {
      $this->dbAdapter = $dbAdapter;
      $this->userHydrator = $userHydrator;
    }

    public function insert(string $nom,string $prenom,string $email, string $password)
    {
      $stmt = $this->dbAdapter->prepare(
        'insert into users values (DEFAULT, :nom , :prenom , :email , :password )'
      );
      $stmt->bindValue(':nom', $nom, \PDO::PARAM_STR);
      $stmt->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
      $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
      $stmt->bindValue(':password', $password, \PDO::PARAM_STR);
      $stmt->execute();
    }

    public function findOneByEmail($email): ?UserEntity
    {
      $stmt = $this->dbAdapter->prepare(
        'Select * from USERS WHERE email = :email'
      );
      $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
      $stmt->execute();
      $rawUser = $stmt->fetch();
      return $rawUser ? $this->userHydrator->hydrate($rawUser) : null;
    }

    public function findOneById ($userId)
    {
      $stmt = $this->dbAdapter->prepare(
        'Select * from "user" where id = :id'
      );
      $stmt->bindValue(':id', $userId, \PDO::PARAM_INT);
      $stmt->execute();
      $rawUser = $stmt->fetch();
      return $rawUser ? $this->userHydrator->hydrate($rawUser) : null;
    }

}
