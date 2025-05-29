<?php

include __DIR__ . "/controller/auth_controller.php";

include __DIR__ . "/controller/project_controller.php";

include __DIR__ . "/controller/default_controller.php";

$uri = $_SERVER["REQUEST_URI"];

switch($uri){
    case '/':
        (new userController()) -> login();
        break;

    case '/user/login.tpl.php':
        (new userController()) -> login();
        break;
        
    case "/user/update.tpl.php":
        (new userController()) -> update();
        break;

    case "/user/register.tpl.php":
        (new userController()) -> register();
        break;

    case "/project/home.tpl.php":
        (new projectController() -> home());
        break;
    
    case "/project/edition.tpl.php":
        (new projectController()) -> edition();
        break;

    default:
        http_response_code(404);
        (new Default_controller()) -> default();
        break;
}

