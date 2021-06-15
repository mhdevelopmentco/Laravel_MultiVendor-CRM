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
use App\Attributes;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class MerchantattributeController extends Controller
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

    public function mer_add_size()
    {
        if (Session::has('merchantid')) {
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "settings");
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_settings');
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            return view('sitemerchant.attributes_addsize')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter);
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    
    public function mer_addsizesubmit()
    {
        if (Session::has('merchantid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'file_size' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('mer_add_size')->withErrors($validator->messages())->withInput();
            } else {
                $inputs          = Input::all();
                $sizes           = array(
                    'si_name' => Input::get('file_size')
                );
                $checkname       = Input::get('file_size');
                $checkname_exist = Attributes::check_size($checkname);
                if ($checkname_exist) {
                    return Redirect::to('mer_add_size')->with('exist_result', 'Size Name Exist')->withInput();
                } else {
                    $return = Attributes::save_size($sizes);
                    return Redirect::to('mer_manage_size')->with('insert_result', 'Record Inserted');
                }
                
            }
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    
    public function mer_manage_size()
    {
        if (Session::has('merchantid')) {
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "settings");
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_settings');
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $get_size          = Attributes::get_size();
            return view('sitemerchant.attributes_manage_sizes')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter)->with('size_result', $get_size);
        } else {
            return Redirect::to('sitemerchant');
        }
    }

    public function mer_delete_size($id)
    {
        if (Session::has('merchantid')) {
            $return = Attributes::delete_size($id);
            return Redirect::to('mer_manage_size')->with('delete_result', 'Record Deleted');
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    
    public function mer_edit_size($id)
    {
        if (Session::has('merchantid')) {
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "settings");
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_settings');
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $edit              = Attributes::edit_size($id);
            return view('sitemerchant.attributes_editsize')->with('editdates', $edit)->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter);
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    
    public function mer_editsize_submit()
    {
        if (Session::has('merchantid')) {
            $id   = Input::get('file_id');
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'file_size' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('mer_edit_size/' . $id)->withErrors($validator->messages())->withInput();
            } else {
                $inputs          = Input::all();
                $id              = Input::get('file_id');
                $updates         = array(
                    'si_name' => Input::get('file_size')
                );
                $checkname       = Input::get('file_size');
                $checkname_exist = Attributes::check_size($checkname);
                if ($checkname_exist) {
                    return Redirect::to('mer_edit_size/' . $id)->with('exist_result', 'Size Name Exist')->withInput();
                } else {
                    $return = Attributes::update_size($id, $updates);
                    return Redirect::to('mer_manage_size')->with('update_result', 'Record Updated');
                }
            }
            
        } else {
            return Redirect::to('sitemerchant');
        }
    }

    public function mer_add_color()
    {
        if (Session::has('merchantid')) {
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "settings");
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_settings');
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $color_list        = Attributes::color_list();
            return view('sitemerchant.attributes_addcolor')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter)->with('color_list', $color_list);
            
        } else {
            return Redirect::to('sitemerchant');
        }
    }

    public function mer_manage_color()
    {
        if (Session::has('merchantid')) {
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "settings");
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_settings');
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $color_added_list  = Attributes::color_added_list();
            return view('sitemerchant.attributes_manage_color')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter)->with('color_added_list', $color_added_list);
        } else {
            return Redirect::to('sitemerchant');
        }
    }

    public function mer_add_color_submit()
    {
        if (Session::has('merchantid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'color' => 'required',
                'color_name' => 'required'
                
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('mer_add_color')->withErrors($validator->messages())->withInput();
            } else {
                $colors = array(
                    'co_name' => Input::get('color_name'),
                    'co_code' => Input::get('color')
                );
                $return = Attributes::add_color($colors);
                return Redirect::to('mer_manage_color')->with('success', 'Record Inserted successfully');
            }
        } else {
            return Redirect::to('sitemerchant');
        }
    }

    public function mer_edit_color($id)
    {
        if (Session::has('merchantid')) {
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "settings");
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_settings');
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $edit              = Attributes::edit_color($id);
            $color_added_list  = Attributes::color_list();
            return view('sitemerchant.attributes_editcolor')->with('edit_color', $edit)->with('color_added_list', $color_added_list)->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter);
            
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }

    public function mer_editcolor_submit()
    {
        if (Session::has('merchantid')) {
            $id   = Input::get('color_id');
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'color' => 'required',
                'color_name' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('mer_edit_color/' . $id)->withErrors($validator->messages())->withInput();
            } else {
                $inputs  = Input::all();
                $id      = Input::get('color_id');
                $updates = array(
                    'co_name' => Input::get('color_name'),
                    'co_code' => Input::get('color')
                    
                );
                $return  = Attributes::update_color($id, $updates);
                return Redirect::to('mer_manage_color')->with('success', 'Record Updated');
                
            }
        } else {
            return Redirect::to('sitemerchant');
        }
    }

    public function mer_deletecolor_submit($id)
    {
        if (Session::has('merchantid')) {
            $return = Attributes::deletecolor_submit($id);
            return Redirect::to('mer_manage_color')->with('success', 'Record Deleted');
            
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    public function mer_attribute_select_color()
    {
        if (Session::has('merchantid')) {
            $id = '#' . $_GET['color_id'];
            
            $color_list = Attributes::selected_color_list($id);
            if ($color_list) {
                echo $color_list[0]->cf_name;
            } else {
                echo "no color found";
            }
            
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    
}
