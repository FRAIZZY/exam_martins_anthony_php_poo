<?php
    require('includes.php');

    session_start();
    $userController = new UserController();
    $teamController = new TeamController();

    if(!isset($_GET['controller']) || !isset($_GET['action'])) {
        header('Location: index.php?controller=user&action=login');
    } else if($_GET['controller'] == 'user' && $_GET['action'] =='login') {
        $userController->login();
    } else if($_GET['controller'] == 'user' && $_GET['action'] =='submitLogin') {
        $userController->submitLogin();
    } else if($_GET['controller'] == 'home' && $_GET['action'] == 'display') {
        $teamController->display();
    } else if($_GET['controller'] == 'user' && $_GET['action'] =='register') {
        $userController->displayRegister();
    } else if($_GET['controller'] == 'user' && $_GET['action'] =='registerSubmit') {
        $userController->register();
    } else if($_GET['controller'] == 'team' && $_GET['action'] == 'addTeam' && isset($_SESSION['username'])) {
        $teamController->displayFormTeam();
    } else if($_GET['controller'] == 'team' && $_GET['action'] == 'submitFormNewTeam' && isset($_SESSION['username'])) {
        $teamController->submitFormNewTeam();
    } else if($_GET['controller'] == 'team' && $_GET['action'] == 'deleteTeam' && !empty($_GET['id']) && isset($_SESSION['username'])) {
        $teamController->deleteTeam($_GET['id']);
    } else if($_GET['controller'] == 'team' && $_GET['action'] == 'updateTeam' && !empty($_GET['id']) && isset($_SESSION['username'])) {
        $teamController->updateTeam($_GET['id']);
    } else if($_GET['controller'] == 'team' && $_GET['action'] == 'submitFormUpdateTeam' && !empty($_GET['id']) && isset($_SESSION['username'])) {
        $teamController->submitFormUpdateTeam($_GET['id']);
    } else if($_GET['controller'] == 'user' && $_GET['action'] == 'logout') {
        session_destroy();
        header('Location: index.php?controller=user&action=login');
    } else {
        require('views/404.php');
    }
?>