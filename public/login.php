<?php

use Rediite\Model\Factory\dbFactory;
use Rediite\Model\Hydrator\UserHydrator;
use Rediite\Model\Repository\UserRepository;

session_start();

include_once '../src/utils/autoloader.php';
include_once '../src/View/template.php';


if (isset($_POST['email']) && isset($_POST['password']))  {
    
    $dbfactory = new dbFactory();
    $dbAdapter = $dbfactory->createService();    
    $userHudrator = new UserHydrator();
    $userRepository = new UserRepository($dbAdapter, $userHudrator);

    $userFind = $userRepository->findOneByEmail($_POST['email']);

    if (isset($userFind) && password_verify($_POST['password'],$userFind->getPassword())) {
        $_SESSION['user'] = $userFind;
        $_SESSION['user_email'] = $userFind->getEmail();
        $_SESSION['user_id'] = $userFind->getId();
        $_SESSION['user_prenom'] = $userFind->getPrenom();

        header('Location: /~bilel.chater/public/index.php');
    }else{
        loadView('login', ['failedAuthent' => 'ERREUR de connexion : Identifiant ou mot de passe invalide']);
    }

}else{
    loadView('login', []);
}


?>