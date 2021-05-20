<?php

use Rediite\Model\Factory\dbFactory;
use Rediite\Model\Hydrator\UserHydrator;
use Rediite\Model\Repository\UserRepository;

include_once '../src/utils/autoloader.php';
include_once '../src/View/template.php';

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])
&& isset($_POST['password_verify']) && ($_POST['password']==$_POST['password_verify'])) {
    $dbfactory = new dbFactory();
    $dbAdapter = $dbfactory->createService();    
    $data = ['email' => strtolower($_POST['email']),
    'nom' => strtoupper($_POST['nom']),
    'prenom' => ucwords($_POST['prenom']), 
    'password' => password_hash($_POST['password'],PASSWORD_BCRYPT) ];
    $userHudrator = new UserHydrator();
    $userRepository = new UserRepository($dbAdapter, $userHudrator);
    $userRepository->insert($data['nom'],$data['prenom'],$data['email'],$data['password']);
    $userFind = $userRepository->findOneByEmail($data['email']);

    if (isset($userFind)) {
        header('Location: /~bilel.chater/public/login.php');
    }else{
        loadView('signup', []);
    };
}
else 
{
    loadView('signup', []);
}
?>