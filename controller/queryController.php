<?php 

// exit();

use Illuminate\Http\Request;
use Models\Product_category;
use Carbon\Carbon;
use Models\Product;
use Models\User;
use Models\Sold_Product;
use Models\Client;
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

    public function count($data){
        $totalProductUploaded = Product::where('userId',$data['userId'])->get();
        $totalGoodSold = Sold_Product::where('userId',$data['userId'])->get();
        $myClient = Client::where('seller_id',$data['userId'])->get();

        $totalProductUploadedCount=$totalProductUploaded->count();
        $totalGoodSoldCount=$totalGoodSold->count();
        $myClientCount=$myClient->count();

        echo json_encode(
            (object)[
            'totalProductUploaded'=>$totalProductUploadedCount,
            'totalGoodSold'=>$totalGoodSoldCount,
            'myClient'=>$myClientCount
            // 'productData'=>$totalProductUploaded,

            ]);
    }

    public function graphData($data){
        $yearSelected = $data['uploadYear']; 

        $dataDate = Product::select('created_at')->where('userId',$data['userId'])->where('upload_year',$yearSelected)->get();
        $dataSold = Sold_Product::select('created_at')->where('userId',$data['userId'])->where('year_sold',$yearSelected)->get();
   
    //    $dataDate =Product::where('created_at', '>=', Carbon::now()->Month())->get();
       // $year = $dataDate->created_at->year;

        $months=array('JANUARY'=>0,'FEBRUARY'=>0,'MARCH'=>0,'APRIL'=>0,'MAY'=>0,'JUNE'=>0,'JULY'=>0,'AUGUST'=>0,'SEPTEMBER'=>0,'OCTOBER'=>0,'NOVEMBER'=>0,'DECEMBER'=>0);

        $months_sold=array('JANUARY'=>0,'FEBRUARY'=>0,'MARCH'=>0,'APRIL'=>0,'MAY'=>0,'JUNE'=>0,'JULY'=>0,'AUGUST'=>0,'SEPTEMBER'=>0,'OCTOBER'=>0,'NOVEMBER'=>0,'DECEMBER'=>0);
     
            foreach ($dataDate as $month=>$value) {

                $raw_month = Carbon::createFromFormat('Y-m-d H:i:s', $value['created_at'])->month;
            
               
                    
                switch ($raw_month) {
                    case 1:
                        $month ='JANUARY';
                        $months['JANUARY'] =+1;
                        break;
                    
                    case 2:
                        $month ='FEBRUARY';
                        $months['FEBRUARY'] =+1;

                        break;
                        
                    case 3:
                        $month ="MARCH";
                        $months['MARCH'] =+1;
                        
                        break;
                    
                    case 4:
                        $month ="APRIL";
                        $months['APRIL'] +=1;

                        break;
                    
                    case 5:
                        $month ="MAY";
                        $months['MAY'] =+1;

                        break;
                        
                    case 6:
                        $month ="JUNE";
                        $months['JUNE'] =+1;

                        break;
                    
                    case 7:
                        $month ="JULY";
                        $months['JULY'] =+1;

                        break;
                    
                    case 8:
                        $month ="AUGUST";
                        $months['AUGUST'] =+1;

                        break;
                    
                    case 9: 
                        $month ="SEPTEMBER";
                        $months['SEPTEMBER'] =+1;

                        break;
    
                    case 10:
                        $month ="OCTOBER";
                        $months['OCTOBER'] =+1;

                        break;
    
                    case 11: 
                        $month ="NOVEMBER";
                        $months['NOVEMBER'] =+1;

                        break;
    
                    case 12: 
                        $month ="DECEMBER";
                        $months['DECEMBER'] =+1;

                        break;
    
                    default:
                        $month = 0;
                        break;
                }

            }


            foreach ($dataSold as $month_sold=>$value_sold) {

                $raw_month_sold = Carbon::createFromFormat('Y-m-d H:i:s', $value_sold['created_at'])->month;
            
               
                    
                switch ($raw_month_sold) {
                    case 1:
                        $months_sold['JANUARY'] =+1;
                        break;
                    
                    case 2:
                        $months_sold['FEBRUARY'] =+1;

                        break;
                        
                    case 3:
                        $months_sold['MARCH'] =+1;
                        
                        break;
                    
                    case 4:
                        $months_sold['APRIL'] +=1;

                        break;
                    
                    case 5:
                        $months_sold['MAY'] =+1;

                        break;
                        
                    case 6:
                        $month ="JUNE";
                        $months_sold['JUNE'] =+1;

                        break;
                    
                    case 7:
                        $month ="JULY";
                        $months_sold['JULY'] =+1;

                        break;
                    
                    case 8:
                        $months_sold['AUGUST'] =+1;

                        break;
                    
                    case 9: 
                        $months_sold['SEPTEMBER'] =+1;

                        break;
    
                    case 10:
                        $months_sold['OCTOBER'] =+1;

                        break;
    
                    case 11: 
                        $months_sold['NOVEMBER'] =+1;

                        break;
    
                    case 12: 
                        $months_sold['DECEMBER'] =+1;

                        break;
    
                    default:
                        $month = 0;
                        break;
                }

            }


            $monthValue = array(
                $productUpload= array(),
                $productSold=array()
            );
            foreach ($months as $key=>$v){
                array_push($monthValue[0],$v);
            }
            
            foreach($months_sold as $key=>$s_v){
                array_push($monthValue[1],$s_v);
            }
            // echo json_encode(implode(',',$months));
            echo json_encode($monthValue);
           
        }

        public function inidvidual_products($data){
        //   echo json_encode($data['userId']);
            echo json_encode(Product::latest()->where('userId',$data['userId'])->get());
          
        }

}

                // // $timestamp = strtotime($raw_month);
                // $timestamp = $raw_month;
                // $month = date('M',$timestamp);
                // echo json_encode($month);

                    // [ 10, 5, 5, 5,7, 9,10,11,50,7,100,15 ],
                    // [ 300, 50, 20, 29,70, 8,100,11,5,70,1,15 ]

// Check password
// Query the database for username and password
// ...

// if(password_verify($password, $hashed_password)) {
//     // If the password inputs matched the hashed password in the database
//     // Do something, you know... log them in.
// } 
// Else, Redirect them back to the login page.

?>



