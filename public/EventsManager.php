<?php

use Rediite\Model\Hydrator\EventsHydrator;
use Rediite\Model\Repository\EventsRepository;

include_once '../src/utils/autoloader.php';

// create the database connection
$dbfactory = new \Rediite\Model\Factory\dbFactory();
$dbAdapter = $dbfactory->createService();

$eventsHydrator = new EventsHydrator();
$eventsRepository = new EventsRepository($dbAdapter, $eventsHydrator);

if (isset($_GET['id'])) {
    $eventsRepository->delete($_GET['id']);
} else {
    echo 'ok';
}

?>
