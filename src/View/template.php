<?php

function loadView($view, $data) {
    $dbfactory = new \Rediite\Model\Factory\dbFactory();
    $dbAdapter = $dbfactory->createService();
    ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Agendix</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,300&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="assets/css/agenda.css">
    </head>
    <body>
    <?php include_once '../src/View/layout/header.php' ?>
    <div class="main-container">
        <?php include_once '../src/View/'.$view.'.php' ?>
    </div>
    
    <?php include_once '../src/View/layout/footer.php' ?>
    </body>
    </html>
<?php
}
?>
