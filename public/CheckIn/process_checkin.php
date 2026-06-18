<?php
include_once '../includes/process_sidebar.php';

$success = '';

if (isset($_POST['type']) && isset($user)) {
    
    // 1 si arrivée, 2 si départ
    // $_POST['name'] === 'value'
    $idAction = ($_POST['type'] === 'arrivee') ? 1 : 2;
    
    // Requête SQL directe
    $req = $connexion->prepare("INSERT INTO check_in (id_user, id_action) VALUES (?, ?)");
    $req->execute([$user->getId(), $idAction]);

    if($_POST['type'] === 'arrivee') {
        $success = "Arrivée enregistrée";
    } else {
        $success = "Départ enregistré";
    }
}
