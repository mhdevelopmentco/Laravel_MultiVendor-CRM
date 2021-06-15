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
use App\Blog;
use App\Dashboard;
use App\Admodel;
use App\Deals;
use App\Auction;
use App\Customer;
use App\Transactions;
use App\Merchantadminlogin;
use App\Merchantproducts;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class MerchantloginController extends Controller
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
    
    public function merchant_login()
    {
       return view('sitemerchant.merchant_login');
    }
    
    public function merchant_login_check()
    {
        $inputs = Input::all();
        
        $username = Input::get('mer_user');
        $pwd      = Input::get('mer_pwd');
        
        $logincheck = Merchantadminlogin::checkmerchantlogin($username, $pwd);
        if ($logincheck == 1) {
            
            return Redirect::to('sitemerchant_dashboard')->with('success', 'Login Success');
        } else if ($logincheck == 0) {
            
            return Redirect::to('sitemerchant')->with('error', 'Invalid Username and Password');
        }
        
    }
    
    
    
    public function merchant_logout()
    {
        
        Session::forget('merchantid');
        Session::forget('merchantname');
        Session::flush();
        return Redirect::to('sitemerchant')->with('login_success', 'Logout Success');
    }
    
    public function merchant_forgot_check()
    {
        $inputs         = Input::all();
        $merchant_email = Input::get('merchant_email');
        
        $encode_email = base64_encode(base64_encode(base64_encode(($merchant_email))));
        
        $check_valid_email = Merchantadminlogin::checkvalidemail($merchant_email);
        
        if ($check_valid_email) {
            $forgot_check = Merchantadminlogin::forgot_check_details_merchant($merchant_email);
            
            $name = 'merchant';
          
            $send_mail_data = array(
                'name' => $forgot_check[0]->mer_fname,
                'encodeemail' => $encode_email
            );
            # It will show these lines as error but no issue it will work fine Line no 119 - 122
            Mail::send('emails.merchant_passwordrecoverymail', $send_mail_data, function($message)
            {
                $message->to(Input::get('merchant_email'), 'Merchant')->subject('Password Recovery Details');
            });
            return Redirect::to('sitemerchant')->with('login_success', 'Mail Send Successfully');
        } else {
            return Redirect::to('sitemerchant')->with('forgot_error', 'Invalid Email');
            
        }
     
    }
    
    public function forgot_pwd_email($email)
    {
        $merchat_decode_email = base64_decode(base64_decode(base64_decode($email)));
        
        $merchantdetails = Merchantadminlogin::get_merchant_details($merchat_decode_email);
        
        return view('sitemerchant.forgot_pwd_mail')->with('merchantdetails', $merchantdetails);
        
    }
    
    public function forgot_pwd_email_submit()
    {
        $inputs      = Input::all();
        $merchant_id = Input::get('merchant_id');
        $pwd         = Input::get('pwd');
        $confirmpwd  = Input::get('confirmpwd');
        
        Merchantadminlogin::update_newpwd($merchant_id, $confirmpwd);
        
        return Redirect::to('sitemerchant')->with('login_success', 'Password Changed Successfully');
        
    }
}
