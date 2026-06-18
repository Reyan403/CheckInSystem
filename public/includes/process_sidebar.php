<?php

session_start();

include_once __DIR__ . '/../../src/Model/db.php';
include_once __DIR__ . '/../../src/Model/Role.php';
include_once __DIR__ . '/../../src/Model/User.php';
include_once __DIR__ . '/../../src/DAO/UserDAO.php';

if (isset($_SESSION['user_id'])) {
    $userDAO = new DAO\UserDAO($connexion);
    $user    = $userDAO->getUserById($_SESSION['user_id']);

    if ($user === null) {
        session_destroy();
    }
}
