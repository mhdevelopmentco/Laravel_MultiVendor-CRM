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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ImagesettingsController extends Controller
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

    public function add_logo()
    {
        if (Session::has('userid')) {
            
            $adminheader    = view('siteadmin.includes.admin_header')->with('routemenu', "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $logodetails    = Settings::get_logo_details();
            return view('siteadmin.logosettings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('logodetails', $logodetails);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function add_logo_submit()
    {
        if (Session::has('userid')) {
            $data   = Input::except(array(
                '_token'
            ));
            $inputs = Input::all();
            $file   = Input::file('logofile');
            if ($file != '') {
                $filename        = $file->getClientOriginalName();
                $move_img        = explode('.', $filename);
                $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
                $destinationPath = './assets/logo/';
                $uploadSuccess   = Input::file('logofile')->move($destinationPath, $filename);
              
                $checklogorecord = Settings::get_logo_details();
                if ($checklogorecord) {
                    Settings::update_logo($filename);
                } else {
                    
                    $entry = array(
                        'imgs_name' => $filename,
                        'imgs_type' => 1
                    );
                    
                    Settings::insert_logo($entry);
                }
              
                return Redirect::to('add_logo')->withMessage("Logo Updated")->withInput();
            }
           
            else {
                return Redirect::to('add_logo')->withMessage("Image field required")->withInput();
            }
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function add_favicon()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with('routemenu', "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $favicondetails = Settings::get_favicon_details();
            return view('siteadmin.faviconsettings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('favicondetails', $favicondetails);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function add_favicon_submit()
    {
        if (Session::has('userid')) {
            
            $data   = Input::except(array(
                '_token'
            ));
            $inputs = Input::all();
            $file   = Input::file('favfile');
            if ($file != '') {
                $filename        = $file->getClientOriginalName();
                $move_img        = explode('.', $filename);
                $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
                $destinationPath = './assets/favicon/';
                $uploadSuccess   = Input::file('favfile')->move($destinationPath, $filename);
                
                $favicondetails = Settings::get_favicon_details();
                if ($favicondetails) {
                    Settings::update_favicon($filename);
                } else {
                    $entry = array(
                        'imgs_name' => $filename,
                        'imgs_type' => 2
                    );
                    
                    Settings::insert_favicon($entry);
                }
              
                return Redirect::to('add_favicon')->withMessage("Favicon Updated")->withInput();
            } else {
                return Redirect::to('add_favicon')->withMessage("Image field required")->withInput();
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function add_noimage()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with('routemenu', "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $noimagedetails = Settings::get_noimage_details();
            return view('siteadmin.noimagesettings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('noimagedetails', $noimagedetails);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function add_noimage_submit()
    {
        if (Session::has('userid')) {
            $data   = Input::except(array(
                '_token'
            ));
            $inputs = Input::all();
            $file   = Input::file('noimgfile');
            if ($file != '') {
                $filename        = $file->getClientOriginalName();
                $move_img        = explode('.', $filename);
                $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
                $destinationPath = './assets/noimage/';
                $uploadSuccess   = Input::file('noimgfile')->move($destinationPath, $filename);
                
                
                $noimagedetails = Settings::get_noimage_details();
                if ($noimagedetails) {
                    Settings::update_noimage($filename);
                } else {
                    $entry = array(
                        'imgs_name' => $filename,
                        'imgs_type' => 3
                    );
                    
                    Settings::insert_noimage($entry);
                }
               return Redirect::to('add_noimage')->withMessage("Noimage Updated")->withInput();
            } else {
                return Redirect::to('add_noimage')->withMessage("Image field required")->withInput();
            }
            
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    
}
