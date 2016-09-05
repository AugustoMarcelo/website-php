<?php
    //Start Session
    session_start();

    //Include config
    require('config.php');
    
    require('classes/Messages.php');
    require('classes/Bootstrap.php');
    require('classes/Controller.php');
    require('classes/Model.php');

    require('controllers/Home.php');
    require('controllers/Users.php');
    require('controllers/Shares.php');

    require('models/home.php');
    require('models/user.php');
    require('models/share.php');

    $bootstrap = new Bootstrap($_GET);
    $controller = $bootstrap->createController();
    if($controller) {
        $controller->executeAction();
    }
?>