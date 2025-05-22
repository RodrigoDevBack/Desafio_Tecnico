<?php

$uri = $_SERVER["REQUEST_URI"];
//Get_One
include_once "front_end/services/requests/project/get_one_project.php";

//Get_all
include_once "front_end/services/requests/project/get_all_project.php";

//Edit_Project
include_once "front_end/services/requests/project/update_project.php";

include_once "front_end/services/requests/project/delete_project.php";

include_once "front_end/services/transform_data/trans_get_one.php";

//home
include_once "front_end/services/transform_data/trans_get_all.php";

include_once "front_end/services/requests/project/create_project.php";

//login
include_once "front_end/services/requests/user/login_user.php";

include "services/requests/user/register_user.php";

include "services/requests/user/update_user.php";

if($uri === '/' || $uri === '/index.php'){
    include_once 'front_end/login/login.php';
} else {
    return false;
}