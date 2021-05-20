<?php
namespace Rediite\Model\Repository;

use \Rediite\Model\Entity\Events as EventsEntity;
use \Rediite\Model\Hydrator\EventsHydrator;

class EventsRepository {

   /**
     * @var \PDO
     */
    private $dbAdapter;

       /**
     * @var EventsHydrator
     */
    private $EventsHydrator;

  
    public function __construct(
      \PDO $dbAdapter,
      EventsHydrator $EventsHydrator

    ) {
      $this->dbAdapter = $dbAdapter;
      $this->EventsHydrator = $EventsHydrator;
    }

    function insert(string $libelle,string $desc,\DateTime $start, int $userid)
    {
      $stmt = $this->dbAdapter->prepare(
        'INSERT INTO EVENTS VALUES (DEFAULT, :libelle , :desc , :start , :end , :userid );
        '
      );
      $stmt->bindValue(':libelle', $libelle, \PDO::PARAM_STR);
      $stmt->bindValue(':desc', $desc, \PDO::PARAM_STR);
      $stmt->bindValue(':start', $start->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
      $stmt->bindValue(':end', '2777-01-29 23:59:59', \PDO::PARAM_STR);
      $stmt->bindValue(':userid', $userid, \PDO::PARAM_INT);
      $stmt->execute();
    }


    function delete(string $id)
    {
      $stmt = $this->dbAdapter->prepare(
        'DELETE FROM Events WHERE id = :id'
      );
      $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
      $stmt->execute();
    }

    function findEventsBetween(\DateTime $start,\DateTime $end, int $userid ): array
    {
      $stmt = $this->dbAdapter->prepare(
        'SELECT * FROM Events WHERE id_USER = :iduser AND dateStart BETWEEN :start AND :end'
      );
      $stmt->bindValue(':start', $start->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
      $stmt->bindValue(':end', $end->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
      $stmt->bindValue(':iduser', $userid, \PDO::PARAM_INT);
      $stmt->execute();
      $rawEvents = $stmt->fetchAll();
      $Events = [];
      foreach ($rawEvents as $k => $event) {
        $Events[] = $this->EventsHydrator->hydrate($event);
      }

      return $Events;
    }

    function findEventsUsers(int $userid ): array
    {
      $stmt = $this->dbAdapter->prepare(
        'SELECT * FROM Events WHERE id_USER = :iduser'
      );
      $stmt->bindValue(':iduser', $userid, \PDO::PARAM_INT);
      $stmt->execute();
      $rawEvents = $stmt->fetchAll();
      $Events = [];
      foreach ($rawEvents as $k => $event) {
        $Events[] = $this->EventsHydrator->hydrate($event);
      }

      return $Events;
    }

      public function findEventsByDay (\DateTime $start, \DateTime $end, int $userid): array {
          $events = $this->findEventsBetween($start, $end, $userid);
          $days = [];

          foreach ($events as  $event) {
            $date = explode(' ', $event->getStart())[0];

            if (!isset($days[$date])) {
              $days[$date] = [$event];
            }else{
              $days[$date][] = $event;
            }
          }
          return $days;
      }


}
