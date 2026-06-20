<?php
include_once '../includes/process_sidebar.php';
include_once '../../src/Model/Action.php';
include_once '../../src/Model/CheckIn.php';
include_once '../../src/DAO/CheckInDAO.php';

$success = '';

if (isset($_POST['type']) && isset($user)) {

    $checkInDAO = new DAO\CheckInDAO($connexion);

    // On récupère l'action depuis la BDD par son nom ('arrivee' ou 'depart')
    $action = $checkInDAO->getActionByName($_POST['type']);

    if ($action !== null) {
        $checkInDAO->insert($user->getId(), $action->getId());

        if ($_POST['type'] === 'arrivee') {
            $success = "Arrivée enregistrée";
        } else {
            $success = "Départ enregistré";
        }
    }
} else if (!isset($user)) {
    header('Location: /php/CheckInSystem/public/index.php');
    exit;
}
