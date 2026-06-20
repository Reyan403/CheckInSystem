<?php 

use DAO\CheckInDAO;
use DAO\UserDAO;

include_once '../includes/process_sidebar.php';
include_once '../../src/Model/Action.php';
include_once '../../src/Model/CheckIn.php';
include_once '../../src/DAO/CheckInDAO.php';

if (!isset($user)) {
    header('Location: /php/CheckInSystem/public/index.php');
    exit; 
} else if ($user->getRole()->getName() != 'manager') {
    header('Location: /php/CheckInSystem/public/CheckIn/checkin.php');
    exit; 
}

$checkInDAO = new CheckInDAO($connexion);

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;
$totalEntries = $checkInDAO->countAll();
$totalPages = ceil($totalEntries / $limit);

$checkIn = $checkInDAO->getAll($limit, $offset);

$userDAO = new UserDAO($connexion);
$allUsers = $userDAO->getAll();
