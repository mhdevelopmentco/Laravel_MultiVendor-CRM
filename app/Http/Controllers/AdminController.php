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
use App\Merchantadminlogin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller {

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

	public function chart()
	{
	   $result = AdminModel::get_chart_details();
	   return view('siteadmin.chart_view');
	}

	public function admin_settings()
	{
           if(Session::has('userid'))
	   {
	   $adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	   $adminfooter = view('siteadmin.includes.admin_footer');
	   $admin_setting_details = AdminModel::get_admin_details();
	   $country_return = Merchant::get_country_detail();
	   return view('siteadmin.admin_settings')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('admin_setting_details' , $admin_setting_details)->with('country_details',$country_return);
	   }
	   else
           {
           return Redirect::to('siteadmin');
           }
	}
	
	public function admin_profile()
	{
	  if(Session::has('userid'))
	  {
	  $adminheader = view('siteadmin.includes.admin_header')->with("routemenu","null");	
	  $adminfooter = view('siteadmin.includes.admin_footer');
	  $admin_setting_details = AdminModel::get_admin_profile_details();
	  return view('siteadmin.admin_profile')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('admin_setting_details' , $admin_setting_details);
	  }
	  else
          {
          return Redirect::to('siteadmin');
          }
	}

	public function admin_settings_submit()
	{
	  $data = Input::except(array('_token')) ;
          $rule = array(
          'first_name' => 'required|alpha_dash',
	  'last_name' => 'required|alpha_dash',
	  'old_password' => 'required',
          'email' => 'required|email',
	  'phone' => 'required|numeric',
	  'address_one' => 'required',
	  'address_two' => 'required',
          'country' => 'required',
	  'city' => 'required'					
           );
          $validator = Validator::make($data,$rule);			
           if ($validator->fails())
           {
	   return Redirect::to('admin_settings')->withErrors($validator->messages())->withInput();
           }
           else
           {
	    if(Input::get('new_password') == ""){ $password = Input::get('old_password'); } else { $password = Input::get('new_password'); }
	    $entry  =  array(
            'adm_fname' => Input::get('first_name'),
	    'adm_lname' => Input::get('last_name'),
	    'adm_password' =>  $password,
	    'adm_email'	=> Input::get('email'),
	    'adm_phone' => Input::get('phone'),
	    'adm_address1' => Input::get('address_one'),
	    'adm_address2' => Input::get('address_two'),
	    'adm_ci_id' => Input::get('city'),
	    'adm_co_id' => Input::get('country'),					
            );
	    $country_return = AdminModel::update_admin_details($entry);
	    return Redirect::to('admin_settings')->with('success', 'Record Updated Successfully');
	   }
	}

	public function siteadmin()
	{
          if(Session::has('userid'))
	  {
	  return Redirect::to('siteadmin_dashboard')->with('login_success','Login Success');
	  }
	  else
	  {
	  return view('siteadmin.admin_login');	
	  }
	}
	
	public function login_check()
	{
          $inputs = Input::all();
	  $uname = Input::get('admin_name');
	  $password = Input::get('admin_pass');		
	  $check = Merchantadminlogin::login_check($uname,$password);
	  if($check > 0)
	  {
  	  return Redirect::to('siteadmin_dashboard')->with('login_success','Login Success');
	  }
	  else 
	  {
	  return Redirect::to('siteadmin')->with('login_error','Invalid Username and Password');
	  }
	}

	public function forgot_check()
	{
	  $inputs = Input::all();
	  $email = Input::get('admin_email');
          $check = Merchantadminlogin::forgot_check($email);
	  if($check > 0)
	  {
	  $forgot_check = Merchantadminlogin::forgot_check_details($email);
	  $email = $forgot_check[0]->adm_email;
	  $name = 'admin';
	  $send_mail_data = array('name' => $forgot_check[0]->adm_fname, 'password' =>$forgot_check[0]->adm_password);			  
	  Mail::send('emails.admin_passwordrecoverymail', $send_mail_data, function($message) use ($email)
          {
          $message->to($email,'Admin')->subject('Password Recovery Details');
       	  });
  	  return Redirect::to('siteadmin')->with('forgot_success','Mail Send Successfully');
	  }
	  else 
	  {
	  return Redirect::to('siteadmin')->with('forgot_error','Invalid Email');
	  }
	}

	public function admin_logout()
	{
          Session::forget('userid');
	  Session::forget('username');
	  Session::flush();
	  return Redirect::to('siteadmin')->with('login_success','Logout Success');
	}	
	
  }
