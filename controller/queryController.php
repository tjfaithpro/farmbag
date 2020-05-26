<?php 

// exit();

use Illuminate\Http\Request;
use Models\Product_category;
use Models\Product;
use Models\User;
// include_once "../database.php";

// include './autoloader/inc.php';
class productController
{
    
    public $c_url;
    private function generateId(){
        // CODE TO GENERATE ID
        $token = 'qwertzuiopasdfghjklyxcvbnmABCDEFGHIJKLMNOPQRSTUVWXYZ123456789abcdefghijklmnopqrstuvwxyz';
        $token = str_shuffle($token);
        $token = substr($token,  0,  2);
        $current_date = date('Ymd');
        return $token = $token.$current_date;
    }
    
    
    public function custom_url($custom_url){
        echo $this->c_url=$custom_url;
    }
    public function products($data){
        // echo ($data['category_id']);
        if($data['category_id']==0 || $data['category_id']=="")
           echo Product::latest()->get();
        else
           echo Product::latest()->where('category_id',$data['category_id'])->get();
    }

    public function product_category(){
        echo Product_category::orderBy('category_name','asc')->get();
    }
    // public $data2;
    public function users(){
         // print_r(Product::all());
       echo User::all();
    }
  
    public function checkUsername($data){
     $username = User::select('username')->where('username', $data['username'])->get();
    if ( !$username ->count() ){
        echo 1;
     }else{
        echo 10;
     }
    }
    public function checkEmail($data){
     $email = User::select('email')->where('email', $data['email'])->get();
     if (!$email ->count() ){
        echo 2;
     }else{
        echo 20;
     }

   
    }

    public function signUp($data){
        // User::insert([
        //     'user_id' =>$userID,
        //     'username'=>$data['username'],
        //     'password'=>$data['password'],
        //     'email'=>$data['email']
        // ])->save();
        
        // hash key
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
        $userID = $this->generateId();    
        $newUser = new User;
        $newUser->user_id = $userID;
        $newUser->username = $data['username'];
        $newUser->password = $hashed_password;
        $newUser->email = $data['email'];
        $saved = $newUser->save();


        if(!$saved){
            App::abort(500, 'Error');
        }else{
            echo json_encode('saved');
        }
       

    }

    public function login($data){
        // $pass;
        // Check password
        // Query the database for username and password
        $aut = User::where('username', $data['username'])->orWhere('email',$data['username'])->get();
        if (!count($aut)) {
            // $html_doc->title = "testtitle";
            echo json_encode((object)['non_data'=>'Incorrect Username']);
        }else{
            foreach ($aut as $key => $value) {
                $hashed_password = $value['password'];            

                if(password_verify($data['password'], $hashed_password)) {
                    // echo json_encode((object)['correct'=>'correct password']);
                  echo $aut;
                } else{
                    echo json_encode((object)['incorrect_password'=>'Incorrect Password']);
                }
            }
        }
      

      
    }

}




// Check password
// Query the database for username and password
// ...

// if(password_verify($password, $hashed_password)) {
//     // If the password inputs matched the hashed password in the database
//     // Do something, you know... log them in.
// } 

// Else, Redirect them back to the login page.





?>



