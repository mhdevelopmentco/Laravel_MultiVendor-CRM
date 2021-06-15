<?php
namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use App\Merchant;
use App\Userlogin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class UserloginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function siteadmin()
    {
        return Redirect::to('siteadmin');
    }
    
    public function user_login_submit()
    {
        $logemail  = $_POST['email'];
        $logpwd    = $_POST['pwd'];
        $logmd5pwd = md5($logpwd);
        $logcheck  = Userlogin::check_user($logmd5pwd, $logemail);
        if ($logcheck) {
            Session::put('customerid', $logcheck[0]->cus_id);
            Session::put('username', $logcheck[0]->cus_name);
            $entry = array(
                'cus_id' => $logcheck[0]->cus_id
            );
            
            Userlogin::save_log($entry);
            echo "success";
            
        } else {
            echo "fail";
        }
        
    }

    public function password_emailcheck()
    {
        $user_email = $_GET['pwdemail'];
        $encode_email = base64_encode(base64_encode(base64_encode(($user_email))));
        $check_valid_email = Userlogin::checkvalidemail($user_email);
        if ($check_valid_email) {
            $forgot_check   = Userlogin::forgot_check_details_user($user_email);
            $send_mail_data = array(
                'name' => $forgot_check[0]->cus_name,
                'encodeemail' => $encode_email,
                'site_name' => 'Laravel Ecommerce'       
            );
          
            Mail::send('emails.user_passwordrecoverymail', $send_mail_data, function($message)
            {
                $message->to($_GET['pwdemail'], 'Merchant')->subject('Password Recovery Details');
            });
            echo "success";
        }
             
        else {
            echo "fail";
           
        }
   
    }

    public function user_reset_password_submit()
    {
        
        $new_pwd = md5($_GET['newpwd']);
        $user_id = $_GET['userid'];
        $check   = Userlogin::update_newpwd($user_id, $new_pwd);
       
        if ($check) {
            Session::remove('reset_userid');
            echo "success";
        }
      
        else {
            echo "fail";
            
        }
        
    }

    public function user_forgot_pwd_email($email)
    {
        $customer_decode_email = base64_decode(base64_decode(base64_decode($email)));
        $customerdetails = Userlogin::get_customer_details($customer_decode_email);
        Session::put('reset_userid', $customerdetails[0]->cus_id);
        return Redirect::to('index');
    }

    public function index()
    {
        $navbar          = view('includes.navbar');
        $header          = view('includes.header');
        $footer          = view('includes.footer');
        $haeder_category = Home::get_header_category();
        $product_details = Home::get_product_details();
        $abc             = Home::get_header_category_array();
        $get_pro         = trim($abc, ",");
        $r               = Home::get_header_prio($get_pro);
        return view('index')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('haeder_category', $haeder_category)->with('product_details', $product_details);
    }
   
}
