<?php
// session
session_start();
require("config.php");
require("./Classes/Messages.php");
require("./Classes/Bootstrap.php");
require("./Classes/Controller.php");
require("./Classes/Model.php");

// getting the controllers
require('./Controllers/home.php');
require('./Controllers/Shares.php');
require('./Controllers/Users.php');

// getting the class models
require("./Models/shares.php");
require("./Models/home.php");
require("./Models/Users.php");

$Bootstrap = new Bootstrap($_GET);
$controller = $Bootstrap->createController();
if($controller){
    $controller->executeAction();
}