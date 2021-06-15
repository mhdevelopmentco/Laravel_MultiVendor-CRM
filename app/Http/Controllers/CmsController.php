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
use App\Category;
use App\Cms;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class CmsController extends Controller
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
    
    public function add_cms_page()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            return view('siteadmin.cms_add_page')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    
    public function cms_add_page_submit()
    {
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'page_title' => 'required',
                'page_description' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_cms_page')->withErrors($validator->messages())->withInput();
            } else {
                $now               = date('Y-m-d H:i:s');
                $entry             = array(
                    'cp_title' => Input::get('page_title'),
                    'cp_description' => Input::get('page_description'),
                    'cp_created_date' => $now
                );
                $check_title       = Input::get('page_title');
                $check_title_exist = Cms::check_cms_page($check_title);
                if ($check_title_exist) {
                    return Redirect::to('add_cms_page')->with('error_message', 'Title Already Exist')->withInput();
                } else {
                    $return = Cms::add_cms_page($entry);
                    return Redirect::to('manage_cms_page')->with('insert_result', 'Record Inserted');
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function manage_cms_page()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $reurn          = Cms::get_cms_page();
            return view('siteadmin.manage_cms_page')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result', $reurn);
            
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_cms_page($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $reurn          = Cms::getsingle_cms_page($id);
            return view('siteadmin.cms_edit_page')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result', $reurn);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_cms_page_submit()
    {
        if (Session::has('userid')) {
            $id   = Input::get('cms_id');
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'page_title' => 'required',
                'page_description' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_cms_page/' . $id)->withErrors($validator->messages())->withInput();
            } else {
                
                $now               = date('Y-m-d H:i:s');
                $entry             = array(
                    'cp_title' => Input::get('page_title'),
                    'cp_description' => Input::get('page_description'),
                    'cp_created_date' => $now
                );
                $check_title       = Input::get('page_title');
                $check_title_exist = Cms::check_cms_page_update($id, $check_title);
                if ($check_title_exist) {
                    return Redirect::to('edit_cms_page/' . $id)->with('error_message', 'Title Already Exist')->withInput();
                } else {
                    $reurn = Cms::update_cms_page($id, $entry);
                    return Redirect::to('manage_cms_page')->with('updated_result', 'Record Updated');
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function block_cms_page($id, $status)
    {
        if (Session::has('userid')) {
            $entry = array(
                'cp_status' => $status
            );
            Cms::block_cms_page($id, $entry);
            if ($status == 1) {
                return Redirect::to('manage_cms_page')->with('block_result', 'Page Activated');
            } else {
                return Redirect::to('manage_cms_page')->with('block_result', 'Page Blocked');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function delete_cms_page($id)
    {
        if (Session::has('userid')) {
            Cms::delete_cms_page($id);
            return Redirect::to('manage_cms_page')->with('delete_result', 'Record Deleted');
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function aboutus_page()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $reurn          = Cms::get_aboutus_page();
            return view('siteadmin.aboutus_page')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result', $reurn);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function terms()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $reurn          = Cms::get_terms_page();
            
            return view('siteadmin.terms')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result', $reurn);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function terms_update()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $rule      = array(
                'aboutus_data' => 'required'
                
            );
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('aboutus_page')->withErrors($validator->messages())->withInput();
            } else {
                $entry = array(
                    'tr_description' => Input::get('aboutus_data')
                );
                Cms::update_terms_page($entry);
                return Redirect::to('terms')->with('update_result', 'Record Updated');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function aboutus_page_update()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $rule      = array(
                'aboutus_data' => 'required'
                
            );
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('aboutus_page')->withErrors($validator->messages())->withInput();
            } else {
                $entry = array(
                    'ap_description' => Input::get('aboutus_data')
                );
                Cms::update_aboutus_page($entry);
                return Redirect::to('aboutus_page')->with('update_result', 'Record Updated');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
}
