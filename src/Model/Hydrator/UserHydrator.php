<?php

namespace Rediite\Model\Hydrator;

use \Rediite\Model\Entity\User as UserEntity;

class UserHydrator {
  public function hydrate($data): UserEntity
  {
    $topic = new UserEntity();
    $topic->setId($data['id'])
      ->setNom($data['nom'])
      ->setPrenom($data['prenom'])
      ->setEmail($data['email'])
      ->setPassword($data['passwd']);
    return $topic;
  }
}