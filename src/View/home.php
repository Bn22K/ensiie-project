<?php

$month = $data['month'];

//Récupérer le premier jour de ce mois
$firstDay = $month->getFirstDay();
$firstDay = $firstDay->format('N') === '1' ? $firstDay : $month->getFirstDay()->modify('last monday');

//Récupérer le nombre de semaine durant ce mois
$weeks = $month->getWeeks();

//Récupérer le dernier jour de ce mois
$lastDay = (clone $firstDay)->modify('+'. (6+7 * ($weeks-1)) .' days'); 

//Récupérer les événements par jour
$eventsRepository = $data['events'];
$events = $eventsRepository->findEventsByDay($firstDay, $lastDay, $data['user_id']);
//Récupérer tous les événements de l'utilisateur
$eventsUser = $eventsRepository->findEventsUsers($data['user_id']);

?>

<div class="container-agenda">
    <div class="view-agenda">
        <div class="header-agenda">
            <h1><?php echo $month->toString(); ?></h1>
            
            <div class="month-button">
                
            <a
                    class="previousButton"
                    href="?month=
			<?= $month->previousMonth()->getMonth(); ?>&year=
			<?= $month->previousMonth()->getYear(); ?>"
                >
                    <button>&lt;</button>
                </a>
                
                <a
                    class="nextButton"
                    href="?month=
			<?= $month->nextMonth()->getMonth(); ?>&year=
			<?= $month->nextMonth()->getYear(); ?>"
                >
                    <button>&gt;</button>
                </a>
            </div>
        </div>
        
        <table class="agenda">
            <?php for ($i=0; $i < $month->getWeeks(); $i++) { ?>
            <tr>
                <?php foreach ($month->days as $k => $day) { $date = (clone $firstDay)->modify("+" . ($k + $i * 7 )." days"); $eventsForDay = $events[$date->format('Y-m-d')] ?? []; ?>
                <td class="<?= $month->withinmonth($date) ? '' : 'othermonth'; ?>">
                    <?php if ($i === 0) { ?>
                    <div class="day">
                        <?= $day; ?>
                    </div>
                    <?php } ?>
                    <div class="numday"><?= $date->format('d'); ?></div>
                    <?php 
                    foreach ($eventsForDay as $event) { ?>
                    <div class="event">
                        <div class="id<?= $event->getId(); ?>">
                        <?= (new DateTime($event->getStart()))->format('H:i'); ?> -
                        <?= $event->getLibelle(); ?>
                        </div>
                    </div>
                    <?php } ?>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="add-event">
        <div class="wrapper">
        <div class="form-header">

        <h1>Ajouter un événement :</h1>
        </div>

        <form action="" method="POST">
            <div class="form-grp">
                <input type="text" name="action" value="add" hidden /><br />
                <input
                    type="text"
                    name="userid"
                    value="
			<?= $data['user_id']; ?>"
                    hidden
                />
            </div>
            <div class="form-grp">
                <label for="name">Libellé : </label><br />
                <input type="text" name="libelle" required />
            </div>
            <div class="form-grp">
                <label for="name">Description : </label><br />
                <input type="text" name="desc" required />
            </div>
            <div class="form-grp">
                <label for="name">Date : </label><br />
                <input type="datetime-local" name="start" id="start" min="1914-06-07T00:00" max="2077-06-14T00:00" placeholder="YYYY-MM-DD  HH-II-SS" /><br />
            </div>
            <br />
                <input id="add-button" type="submit" value="Ajouter"></input>
        </form>
        </div>
    </div>
    <div class="list-events">
        <h1>Liste des événements :</h1>
        <table class="list">
            <?php foreach ($eventsUser as $event) {?>
            <tr>
                <td><?= $event->getId(); ?></td>
                <td><?= $event->getLibelle(); ?></td>
                <td><?= $event->getDetail(); ?></td>
                <td><?= $event->getStart(); ?></td>
                <td><button class="remove">Supprimer</button></td>
            </tr>
            <?php  } ?>
        </table>
    </div>
</div>





<script src="assets/js/remove.js"></script>
<script src="assets/js/verifDate.js"></script>