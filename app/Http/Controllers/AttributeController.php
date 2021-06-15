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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller {

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

     public function add_size()
     {  		
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	return view('siteadmin.attributes_addsize')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }
	
     public function addsizesubmit()
     {
	if(Session::has('userid'))
	{
	$data = Input::except(array('_token')) ;
	$rule = array(
	'file_size' => 'required'
	);
	$validator = Validator::make($data,$rule);			
	if ($validator->fails())
	{
	return Redirect::to('add_size')->withErrors($validator->messages())->withInput();
	}
	else
	{
	$inputs = Input::all();
	$sizes = array(
	'si_name' => Input::get('file_size')  
	);
	$checkname = Input::get('file_size');
	$checkname_exist = Attributes::check_size($checkname);
	if($checkname_exist)
        { 
        return Redirect::to('add_size')->with('exist_result','Size Name Exist')->withInput(); 
        } 
	else 
        {
	$return = Attributes::save_size($sizes);
	return Redirect::to('manage_size')->with('insert_result','Record Inserted');
	}	
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }
	
     public function manage_size()
     {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$get_size = Attributes::get_size();
	return view('siteadmin.attributes_manage_sizes')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('size_result', $get_size);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }
	
     public function delete_size($id)
     {
	if(Session::has('userid'))
	{
	$return = Attributes::delete_size($id);
	return Redirect::to('manage_size')->with('delete_result','Record Deleted');	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }
	
     public function edit_size($id)
     {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$edit = Attributes::edit_size($id);
	return view('siteadmin.attributes_editsize')->with('editdates',$edit)->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }
	
     public function editsize_submit()
     {
	if(Session::has('userid'))
	{
	$id = Input::get('file_id');
	$data = Input::except(array('_token')) ;
	$rule = array(
	'file_size' => 'required'
	);
	$validator = Validator::make($data,$rule);			
	if($validator->fails())
	{
	return Redirect::to('edit_size/'.$id)->withErrors($validator->messages())->withInput();
	}
	else
	{
	$inputs = Input::all();
	$id = Input::get('file_id');
	$updates = array(
	'si_name' => Input::get('file_size'),                
	);
	$checkname = Input::get('file_size');
	$checkname_exist = Attributes::check_size($checkname);
	if($checkname_exist)
        { 
        return Redirect::to('edit_size/'.$id)->with('exist_result','Size Name Exist')->withInput(); 
        } 
	else 
        {
	$return = Attributes::update_size($id,$updates);
	return Redirect::to('manage_size')->with('update_result','Record Updated');	
	}
        }
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }
	
     public function add_color()
     {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$color_list = Attributes::color_list();
	return view('siteadmin.attributes_addcolor')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('color_list',$color_list);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }
	
     public function manage_color()
     {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$color_added_list = Attributes::color_added_list();
	return view('siteadmin.attributes_manage_color')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('color_added_list',$color_added_list);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }

     public function add_color_submit()
     {
	if(Session::has('userid'))
	{
	$data = Input::except(array('_token')) ;
	$rule = array(
	'color' => 'required',
	'color_name' => 'required',
	);
	$validator = Validator::make($data,$rule);			
	if($validator->fails())
	{
	return Redirect::to('add_color')->withErrors($validator->messages())->withInput();
	}
	else
	{
	$colors  =  array(
	'co_name' => Input::get('color_name'),
	'co_code' => Input::get('color'),
	);
	$return = Attributes::add_color($colors);
	return Redirect::to('manage_color')->with('success','Record Inserted successfully'); 
	}
	}
 	else
	{
	return Redirect::to('siteadmin');
	}	
     }

     public function edit_color($id)
     {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$edit = Attributes::edit_color($id);
	$color_added_list = Attributes::color_list();
	return view('siteadmin.attributes_editcolor')->with('edit_color',$edit)->with('color_added_list',$color_added_list)->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }

     public function editcolor_submit()
     {
	if(Session::has('userid'))
	{
	$id = Input::get('color_id');
	$data = Input::except(array('_token')) ;
	$rule = array(
	'color' => 'required',
	'color_name' => 'required',
	);
	$validator = Validator::make($data,$rule);			
	if ($validator->fails())
	{
	return Redirect::to('edit_color/'.$id)->withErrors($validator->messages())->withInput();
	}
	else
	{
	$inputs = Input::all();
	$id = Input::get('color_id');
	$updates = array(
	'co_name' => Input::get('color_name'),
	'co_code' => Input::get('color'),
	);
	$return = Attributes::update_color($id,$updates);
	return Redirect::to('manage_color')->with('success','Record Updated');	
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }

     public function deletecolor_submit($id)
     {
	if(Session::has('userid'))
	{
	$return = Attributes::deletecolor_submit($id);
	return Redirect::to('manage_color')->with('success','Record Deleted');	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }
	
     public function attribute_select_color()
     {
	if(Session::has('userid'))
	{
	$id = '#'.$_GET['color_id'];
	$color_list = Attributes::selected_color_list($id);
	if($color_list)
	{
	echo $color_list[0]->cf_name;
	}
	else
	{
	echo "No Color Found";
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }
	
}
