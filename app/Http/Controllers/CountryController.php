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
use App\Country;
use App\Customer;
use App\Attributes;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
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

    public function add_country()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            return view('siteadmin.add_countries')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_country()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $countryresult = Country::view_country_detail();
            
            return view('siteadmin.manage_countries')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('countryresult', $countryresult);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_country($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $countryresult = Country::showindividual_country_detail($id);
            
            return view('siteadmin.edit_countries')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('countryresult', $countryresult)->with('id', $id);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function delete_country($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $affected      = Country::delete_country_detail($id);
            $countryresult = Country::view_country_detail();
            
            /* return view('siteadmin.manage_countries')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult',$countryresult);*/
            
            return Redirect::to('manage_country')->with('updated_result', 'Country Deleted Successfully');
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function update_status_country($id, $status)
    {
        if (Session::has('userid')) {
            $return = Country::update_status_country($id, $status);
            return Redirect::to('manage_country')->with('updated_result', 'Record Updated Successfully');
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function add_country_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'cname' => 'required',
                'ccode' => 'required',
                'cursymbol' => 'required',
                'curcode' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_country')->withErrors($validator->messages())->withInput();
                
            } else {
                $countryname    = Input::get('cname');
                $countrycode    = Input::get('ccode');
                $currencysymbol = Input::get('cursymbol');
                $currencycode   = Input::get('curcode');
                
                
                $check_exist_country_name = Country::check_exist_country_name($countryname);
                $check_exist_country_code = Country::check_exist_country_code($countrycode);
                
                
                if ($check_exist_country_name) {
                    return Redirect::to('add_country')->withMessage("Country Already Exists")->withInput();
                } else if ($check_exist_country_code) {
                    return Redirect::to('add_country')->withMessage("Country Code  Already Exists")->withInput();
                } else {
                    
                    $entry = array(
                        'co_code' => Input::get('ccode'),
                        'co_name' => Input::get('cname'),
                        'co_cursymbol' => Input::get('cursymbol'),
                        'co_curcode' => Input::get('curcode')
                    );
                    
                    $return = Country::save_country_detail($entry);
                    return Redirect::to('manage_country')->with('insert_result', 'Record Inserted');
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function update_country_submit()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            //$inputs = Input::all();
            $data = Input::except(array(
                '_token'
            ));
            $id   = Input::get('id');
            $rule = array(
                'ceditname' => 'required',
                'ceditcode' => 'required',
                'cureditsymbol' => 'required',
                'cureditcode' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                
                return Redirect::to('edit_country/' . $id)->withErrors($validator->messages())->withInput();
                
            }
            
            else {
                
                if ($id != "") {
                    $entry = array(
                        'co_code' => Input::get('ceditcode'),
                        'co_name' => Input::get('ceditname'),
                        'co_cursymbol' => Input::get('cureditsymbol'),
                        'co_curcode' => Input::get('cureditcode')
                    );
                    
                    $countryname    = Input::get('cname');
                    $countrycode    = Input::get('ccode');
                    $currencysymbol = Input::get('cursymbol');
                    $currencycode   = Input::get('curcode');
                    $check_exist_country_name = Country::check_exist_country_name_update($countryname, $id);
                    $check_exist_country_code = Country::check_exist_country_code_update($countrycode, $id);
                                     
                    if ($check_exist_country_name) {
                        return Redirect::to('edit_country/' . $id)->withMessage("Country Already Exists")->withInput();
                    } else if ($check_exist_country_code) {
                        return Redirect::to('edit_country/' . $id)->withMessage("Country Code  Already Exists")->withInput();
                    } else {
                        $affected = Country::update_country_detail($id, $entry);
                        return Redirect::to('manage_country')->with('updated_result', 'Record Updated');
                        
                    }
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
}
