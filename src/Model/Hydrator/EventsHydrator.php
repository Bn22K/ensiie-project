<?php

namespace Rediite\Model\Hydrator;

use \Rediite\Model\Entity\Events as EventsEntity;

class EventsHydrator {
  public function hydrate($data): EventsEntity
  {
    $topic = new EventsEntity();
    $topic->setId($data['id'])
      ->setLibelle($data['libelle'])
      ->setDetail($data['detail'])
      ->setStart($data['datestart'])
      ->setEnd($data['dateend'])
      ->setIdUser($data['id_user']);
    return $topic;
  }
}