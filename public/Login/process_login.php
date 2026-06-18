<?php 

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code_saisie = trim($_POST['code'] ?? '');

    $userDAO = new DAO\UserDAO($connexion);
    $user    = $userDAO->getUserByPinAndByRole($code_saisie);

    if ($user !== null) {
        // PIN correct : on stocke l'utilisateur en session et on redirige
        session_start();
        $_SESSION['user_id']        = $user->getId();
        $_SESSION['user_firstname'] = $user->getFirstname();
        $_SESSION['user_lastname']  = $user->getLastname();
        $_SESSION['user_role']      = $user->getRole()->getName();

        header('Location: ../CheckIn/checkin.php');
        exit;
    } else {
        $erreur = 'Code PIN incorrect. Veuillez réessayer.';
    }
}