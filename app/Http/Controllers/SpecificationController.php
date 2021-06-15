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
use App\Attributes;
use App\Specification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class SpecificationController extends Controller
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
    public function add_specification()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $groupresult = Specification::get_specification_group();
            
            return view('siteadmin.add_specification')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('groupresult', $groupresult);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_specification()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $specificationresult = Specification::viewjoin_specification_detail();
            
            return view('siteadmin.manage_specification')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult', $specificationresult);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_specification($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $specificationresult = Specification::showindividual_specification_detail($id);
            $groupresult         = Specification::get_specification_group();
            return view('siteadmin.edit_specification')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult', $specificationresult)->with('groupresult', $groupresult)->with('id', $id);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function delete_specification($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $affected            = Specification::delete_specification_detail($id);
            $specificationresult = Specification::view_specification_detail($id);
                     
            return Redirect::to('manage_specification')->with('delete_result', 'Record Deleted');
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function update_specification()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $inputs = Input::all();
            
            $entry = array(
                'sp_name' => Input::get('spedit_name'),
                'sp_spg_id' => Input::get('speditgroup_name'),
                'sp_order' => Input::get('spedit_order')
            );
            
            $id = Input::get('id');
           
            $check_name  = Input::get('spedit_name');
            $groupid     = Input::get('speditgroup_name');
            $check_exist = Specification::check_exist_update($check_name, $groupid, $id);
            
            if ($id != "") {
                if ($check_exist) {
                    return Redirect::to('edit_specification/' . $id)->withMessage('Specification Name Exist')->withInput();
                } else {
                    $check_order = Input::get('spedit_order');
                    $order_exist = Specification::check_exist_individualorder_update($check_order, $groupid, $id);
                    if ($order_exist) {
                        return Redirect::to('edit_specification/' . $id)->withMessage('Sort Order Exist')->withInput();
                    } else {
                        $affected = Specification::update_specification_detail($id, $entry);
                        
                        return Redirect::to('manage_specification')->with('updated_result', 'Record Updated');
                    }
                }
            }
            
            
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    
    public function add_specification_submit()
    {
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'sp_name' => 'required',
                'spgroup_name' => 'required',
                'sortorder' => 'required|numeric'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_specification')->withErrors($validator->messages())->withInput();
                
            } else {
                $entry = array(
                    'sp_name' => Input::get('sp_name'),
                    'sp_spg_id' => Input::get('spgroup_name'),
                    'sp_order' => Input::get('sortorder')
                );
                
                $check_name  = Input::get('sp_name');
                $groupid     = Input::get('spgroup_name');
                $check_exist = Specification::check_exist_individual($check_name, $groupid);
                if ($check_exist) {
                    return Redirect::to('add_specification')->withMessage('Specification Name Exist')->withInput();
                } else {
                    $check_order = Input::get('sort_order');
                    $order_exist = Specification::check_exist_individualorder($check_order, $groupid);
                    if ($order_exist) {
                        return Redirect::to('add_specification')->withMessage('Sort Order Exist')->withInput();
                    } else {
                        $return = Specification::save_specification_detail($entry);
                        return Redirect::to('manage_specification')->with('insert_result', 'Record Inserted');
                    }
                }
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_specification_group()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
           
            return view('siteadmin.add_specification_group')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_specification_group_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'group_name' => 'required',
                'sort_order' => 'required|numeric'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_specification_group')->withErrors($validator->messages())->withInput();
            } else {
                $entry       = array(
                    'spg_name' => Input::get('group_name'),
                    'spg_order' => Input::get('sort_order')
                );
                $check_name  = Input::get('group_name');
                $check_exist = Specification::check_exist_group($check_name);
                if ($check_exist) {
                    return Redirect::to('add_specification_group')->withMessage('Group Name Exist')->withInput();
                } else {
                    $check_order = Input::get('sort_order');
                    $order_exist = Specification::check_exist_order($check_order);
                    if ($order_exist) {
                        return Redirect::to('add_specification_group')->withMessage('Sort Order Exist')->withInput();
                    } else {
                        $return = Specification::save_specification_group($entry);
                        return Redirect::to('manage_specification_group')->with('insert_result', 'Record Inserted');
                    }
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function manage_specification_group()
    {
        if (Session::has('userid')) {
            $adminheader         = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus      = view('siteadmin.includes.admin_left_menus');
            $adminfooter         = view('siteadmin.includes.admin_footer');
            $specificationresult = Specification::get_specification_group();
            return view('siteadmin.manage_specification_group')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult', $specificationresult);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_specification_group($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            $specificationresult = Specification::showindividual_specification_group_detail($id);
            
            return view('siteadmin.edit_specification_group')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('specificationresult', $specificationresult)->with('id', $id);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function edit_specification_group_submit()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $rule      = array(
                'group_name' => 'required',
                'sort_order' => 'required|numeric'
            );
            $id        = Input::get('spg_id');
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_specification_group/' . $id)->withErrors($validator->messages())->withInput();
            } else {
                $entry       = array(
                    'spg_name' => Input::get('group_name'),
                    'spg_order' => Input::get('sort_order')
                );
                $check_name  = Input::get('group_name');
                $check_exist = Specification::check_exist_group_update($check_name, $id);
                if ($check_exist) {
                    return Redirect::to('edit_specification_group/' . $id)->withMessage('Group Name Exist')->withInput();
                } else {
                    $check_order = Input::get('sort_order');
                    $order_exist = Specification::check_exist_order_update($check_order, $id);
                    if ($order_exist) {
                        return Redirect::to('edit_specification_group/' . $id)->withMessage('Sort Order Exist')->withInput();
                    } else {
                        $return = Specification::update_specification_group($id, $entry);
                        return Redirect::to('manage_specification_group')->with('updated_result', 'Record Updated');
                    }
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function delete_specification_group($id)
    {
        if (Session::has('userid')) {
            $affected = Specification::delete_specification_group_detail($id);
            return Redirect::to('manage_specification_group')->with('delete_result', 'Record Deleted');
        } else {
            return Redirect::to('siteadmin');
        }
    }
}
