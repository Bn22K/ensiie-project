<?php
session_start();
use Rediite\Model\Hydrator\EventsHydrator;
use Rediite\Model\Repository\EventsRepository;
use Rediite\Date\Month;
require '../src/Date/Month.php';

include_once '../src/utils/autoloader.php';

$dbfactory = new \Rediite\Model\Factory\dbFactory();
$dbAdapter = $dbfactory->createService();

$data = [];

include_once '../src/View/template.php';
if (isset($_SESSION['user'])) {
    $eventsHydrator = new EventsHydrator();
    $eventsRepository = new EventsRepository($dbAdapter, $eventsHydrator);

    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        if (isset($_POST['libelle']) && isset($_POST['desc']) && isset($_POST['start']) && isset($_POST['userid'])) {
            $eventsRepository->insert($_POST['libelle'], $_POST['desc'], new \DateTime($_POST['start']), intval($_POST['userid']));
        }
    }
    $data['month'] = new Month($_GET['month'] ?? null, $_GET['year'] ?? null);
    $data['events'] = $eventsRepository;
    $data['user_id'] = $_SESSION['user_id'];

    loadView('home', $data);
} else {
    loadView('login', $data);
}

?>
