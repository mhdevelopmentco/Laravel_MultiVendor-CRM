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
use App\Merchantsettings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class MerchantSettingsController extends Controller
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
    
    public function show_settings()
    {
         if (Session::get('merchantid')) {
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "settings");
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_settings');
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            return view('sitemerchant.merchant_settings')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter);
        } else {
            
            return Redirect::to('sitemerchant');
            
        }
    }

    public function merchant_profile()
    {
        
        if (Session::get('merchantid')) {
            $merchant_id = Session::get('merchantid');
            
            $merchantheader = view('sitemerchant.includes.merchant_header')->with('routemenu', "settings");
            
            $merchantfooter           = view('sitemerchant.includes.merchant_footer');
            $merchant_setting_details = Merchant::get_merchant_profile_details($merchant_id);
            return view('sitemerchant.merchant_profile')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchant_setting_details', $merchant_setting_details);
        } else {
            
            return Redirect::to('sitemerchant');
            
        }
    }

    public function edit_info($id)
    {
        $merchantheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "settings");
        $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_settings');
        $merchantfooter    = view('sitemerchant.includes.merchant_footer');
        
        $country_return  = Merchant::get_country_detail();
        $merchant_return = Merchant::get_induvidual_merchant_detail($id);
        return view('sitemerchant.edit_merchant_account')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter)->with('country_details', $country_return)->with('merchant_details', $merchant_return);
        
    }
    
    public function change_pwd($id)
    {
       $merchantheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "settings");
        $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_settings');
        $merchantfooter    = view('sitemerchant.includes.merchant_footer');
        return view('sitemerchant.merchant_change_password')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter)->with('mer_id', $id);
    }
    
    public function edit_merchant_account_submit()
    {
        $mer_id = Input::get('mer_id');
        $data   = Input::except(array(
            '_token'
        ));
        $rule   = array(
            'first_name' => 'required|alpha_dash',
            'last_name' => 'required|alpha_dash',
            'email_id' => 'required|email',
            'select_mer_country' => 'required',
            'select_mer_city' => 'required',
            'phone_no' => 'required|numeric',
            'addreess_one' => 'required',
            'address_two' => 'required',
            'commission' => 'required|numeric'
        );
        
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return Redirect::to('edit_merchant_info/' . $mer_id)->withErrors($validator->messages())->withInput();
        } else {
            $mer_email         = Input::get('email_id');
            $check_merchant_id = Merchant::check_merchant_email_edit($mer_email, $mer_id);
            if ($check_merchant_id) {
                return Redirect::to('edit_merchant_info/' . $mer_id)->with('mail_exist', 'Merchant Email Exist')->withInput();
            } else {
                
                $merchant_entry       = array(
                    'mer_fname' => Input::get('first_name'),
                    'mer_lname' => Input::get('last_name'),
                    'mer_email' => Input::get('email_id'),
                    'mer_phone' => Input::get('phone_no'),
                    'mer_address1' => Input::get('addreess_one'),
                    'mer_address2' => Input::get('address_two'),
                    'mer_co_id' => Input::get('select_mer_country'),
                    'mer_ci_id' => Input::get('select_mer_city'),
                    'mer_payment' => Input::get('payment_account'),
                    'mer_commission' => Input::get('commission')
                );
                $inserted_merchant_id = Merchant::edit_merchant($merchant_entry, $mer_id);
                return Redirect::to('edit_merchant_info/' . $mer_id)->with('result', 'Record Updated Successfully');
                
            }
        }
    }
       
    public function change_password_submit()
    {
        $inputs      = Input::all();
        $merchant_id = Input::get('merchant_id');
        $oldpwd      = Input::get('oldpwd');
        $pwd         = Input::get('pwd');
        $confirmpwd  = Input::get('confirmpwd');
        $oldpwdcheck = Merchantsettings::check_oldpwd($merchant_id, $oldpwd);
        
        if ($oldpwdcheck) {
            if ($pwd != $confirmpwd) {
                return Redirect::to('change_merchant_password/' . $merchant_id)->with('pwd_error', 'Both Passwords donot match');
            } else {
                Merchantsettings::update_newpwd($merchant_id, $confirmpwd);
                
                return Redirect::to('change_merchant_password/' . $merchant_id)->with('success', 'Password Changed Successfully');
                
            }
        } else {
            return Redirect::to('change_merchant_password/' . $merchant_id)->with('pwd_error', 'Old  Password donot match');
            
        }
    }
}
