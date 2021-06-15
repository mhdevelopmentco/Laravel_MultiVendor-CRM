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
use App\City;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class CityController extends Controller
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

    public function add_city()
    {
        if (Session::has('userid')) {
            $adminheader     = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus  = view('siteadmin.includes.admin_left_menus');
            $adminfooter     = view('siteadmin.includes.admin_footer');
            $country_details = City::view_country_details();
            return view('siteadmin.add_city')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('country_details', $country_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_city()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $citydetails = City::view_city_detail();
            
            return view('siteadmin.manage_cities')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('citydetails', $citydetails);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_city($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $country_details = City::view_country_details();
            
            $cityresult = City::show_city_detail($id);
            
            return view('siteadmin.edit_city')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('cityresult', $cityresult)->with('country_details', $country_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function delete_city($id)
    {
        if (Session::has('userid')) {
            $affected = City::delete_city_detail($id);
            return Redirect::to('manage_city')->with('success', 'Cities Deleted successfully');
        } else {
            return Redirect::to('siteadmin');
        }
        
        
    }
    
    public function status_city_submit($id, $status)
    {
        if (Session::has('userid')) {
            $return = City::status_city($id, $status);
            return Redirect::to('manage_city')->with('success', 'Record Updated Successfully');
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function add_city_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'country_name' => 'required',
                'city_name' => 'required',
                'city_lat' => 'required',
                'city_lng' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_city')->withErrors($validator->messages())->withInput();
                
            } else {
                $cityname              = Input::get('city_name');
                $countrycode           = Input::get('country_name');
                $check_exist_city_name = City::check_exist_city_name($cityname, $countrycode);
                
                if ($check_exist_city_name) {
                    return Redirect::to('add_city')->with('error', "City Already Exists")->withInput();
                } else {
                    $entry = array(
                        
                        'ci_name' => Input::get('city_name'),
                        'ci_con_id' => Input::get('country_name'),
                        'ci_lati' => Input::get('city_lat'),
                        'ci_long' => Input::get('city_lng'),
                        'ci_default' => 0,
                        'ci_status' => 1
                    );
                    
                    $return = City::save_City_detail($entry);
                    return Redirect::to('manage_city')->with('success', 'Record Inserted Successfully');
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_city_submit()
    {
        if (Session::has('userid')) {
            
            //$inputs = Input::all();
            $data = Input::except(array(
                '_token'
            ));
            $id   = Input::get('city_id');
            $rule = array(
                'country_name' => 'required',
                'city_name' => 'required',
                'city_lat' => 'required',
                'city_lng' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_city/' . $id)->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry = array(
                    'ci_name' => Input::get('city_name'),
                    'ci_con_id' => Input::get('country_name'),
                    'ci_lati' => Input::get('city_lat'),
                    'ci_long' => Input::get('city_lng')
                );
                
                $affected = City::update_City_detail($id, $entry);
                return Redirect::to('manage_city')->with('success', 'Record Updated Successfully');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function update_default_city_submit()
    {
        if (Session::has('userid')) {
            $id     = Input::get('default_city_id');
            $entry  = array(
                'ci_default' => 0
            );
            $return = City::update_default_city_submit1($entry);
            $entry  = array(
                'ci_default' => 1
            );
            $return = City::update_default_city_submit($id, $entry);
            return Redirect::to('manage_city')->with('success', 'Record Updated Successfully');
        } else {
            return Redirect::to('siteadmin');
        }
    }
   
}
