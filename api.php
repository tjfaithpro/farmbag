<?php

header('Access-Control-Allow-Origin: ' .$_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header("Content-Type:application/json, Access-Control-Allow-Origin:*");

include_once __DIR__."\database.php";
include_once __DIR__."\controller\queryController.php";
include __DIR__."\mail.php";

$controllerQuery = new productController();


// QUERY REQUEST STARTS ===================
$result = array('error'=>false);
$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

if($action == 'products'){
    return json_encode($controllerQuery->products());
}

if($action == 'product_category'){
   return json_encode($controllerQuery->product_category());
}

if($action == 'users'){
    return json_encode($controllerQuery->users());
 }

 if($action == 'checkUsername'){
    $query = json_decode(file_get_contents("php://input"),true);
    $controllerQuery->checkUsername($query);
 }

 if($action == 'checkEmail'){
    $query = json_decode(file_get_contents("php://input"),true);
    $controllerQuery->checkEmail($query);
 } 

 if($action =='signUp'){
    $query = json_decode(file_get_contents("php://input"),true);
    $controllerQuery->signUp($query);
 }

if($action == 'sendMail'){
   $query = json_decode(file_get_contents("php://input"),true);
   $email = new email();
   $email->email();
}

if ($action == 'login'){
   $query = json_decode(file_get_contents("php://input"),true);
   $controllerQuery ->login($query);
}

// echo json_encode($result);


// QUERY REQUEST ENDS ===========================







?>