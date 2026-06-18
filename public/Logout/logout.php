<?php

    session_start();

    session_unset();
    session_destroy();

    header('Location: /php/CheckInSystem/public/Login/login.php');
?>