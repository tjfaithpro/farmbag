<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

header('Access-Control-Allow-Origin: ' .$_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
// header("Content-Type:application/json, Access-Control-Allow-Origin:*");
header("Content-Type:multipart/form-data, Access-Control-Allow-Origin:*");


include_once "database.php";
include_once "controller/queryController.php";
include "mail.php";

$controllerQuery = new productController();


// QUERY REQUEST STARTS ===================
$result = array('error'=>false);
$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

if($action == 'products'){
   $query = json_decode(file_get_contents("php://input"),true);
    return json_encode($controllerQuery->products($query));
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

if($action == 'count'){
   $query = json_decode(file_get_contents("php://input"),true);
   $controllerQuery->count($query);
}

if($action=='graphData'){
   $query = json_decode(file_get_contents("php://input"),true);
   $controllerQuery->graphData($query);
}

if($action == 'inidvidual_products'){
   $query = json_decode(file_get_contents("php://input"),true);
   $controllerQuery->inidvidual_products($query);
}

if($action == 'generateId'){
   $query = json_decode(file_get_contents("php://input"),true);
   $controllerQuery->get_id($query);
}

if($action == 'new_Product_Uplaod'){
   $query = json_decode(file_get_contents("php://input"),true);
   $controllerQuery->new_Product_Uplaod($query);
}
//    header('Access-Control-Allow-Origin: *'); 
//     // Count total files
//  $countfiles = count($_FILES['files']['name']);
 
//  // Looping all files
//  for($i=0;$i<$countfiles;$i++){
//    $filename = $_FILES['files']['name'][$i];
   
//    // Upload file
//    move_uploaded_file($_FILES['files']['tmp_name'][$i],'uploads/'.$filename);
    
//  }
  


   // looping all files
  
   //  if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/".$_FILES['file']['name'])) {

   //      echo json_encode("done");

   //      exit;

   //  }


   //  echo json_encode("failed");
   // Count total files

      //   return response(['fileextension'=>extension()]);   
 
    // Looping all files
   //  for($i=0;$i<$countfiles;$i++){
   //  $filename = $_FILES['pic']['name'][$i];
    
   //  Upload file
   //  move_uploaded_file($_FILES['pic']['tmp_name'][$i],'uploads/'.$filename);
        
    



   // $formData = $query->pic;
   // echo (['fileextension'=>$formData->extension()]);
   // $controllerQuery->new_Product_Uplaod($query);
// echo json_encode($result);


// QUERY REQUEST ENDS ===========================



// // File name
// $filename = $_FILES['file']['name'];

// // Valid file extensions
// $valid_extensions = array("jpg","jpeg","png","pdf");

// // File extension
// $extension = pathinfo($filename, PATHINFO_EXTENSION);

// // Check extension
// if(in_array(strtolower($extension),$valid_extensions) ) {

//    // Upload file
//    if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$filename)){
//       echo 1;
//    }else{
//       echo 0;
//    }
// }else{
//    echo 0;
// }

// FIREBASE GET ALL IMAGES

//   // Since you mentioned your images are in a folder,
//     // we'll create a Reference to that folder:
//     var storageRef = firebase.storage().ref("your_folder");


//     // Now we get the references of these images
//     storageRef.listAll().then(function(result) {
//       result.items.forEach(function(imageRef) {
//         // And finally display them
//         displayImage(imageRef);
//       });
//     }).catch(function(error) {
//       // Handle any errors
//     });

//     function displayImage(imageRef) {
//       imageRef.getDownloadURL().then(function(url) {
//         // TODO: Display the image on the UI
//       }).catch(function(error) {
//         // Handle any errors
//       });
//     }
?>