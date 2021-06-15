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
use App\Bannerset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class BannerController extends Controller {
       
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
    public function add_banner_image()
    {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	return view('siteadmin.add_banner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

    public function manage_banner_image()
    {
  	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$mnge_banner = Bannerset::view_banner_list();
	return view('siteadmin.manage_banner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('mnge_banner', $mnge_banner);	
        }
	else
	{
	return Redirect::to('siteadmin');
	}	
    }
	
    public function edit_banner_image($id)
    {
	if(Session::has('userid'))
	{
	$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
	$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
	$adminfooter = view('siteadmin.includes.admin_footer');
	$banner_detail = Bannerset::banner_detail($id);
	return view('siteadmin.edit_banner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('banner_detail', $banner_detail);	
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

    public function status_banner_submit($id,$status)
    {
 	if(Session::has('userid'))
	{
	$return = Bannerset::status_banner($id,$status);
	return Redirect::to('manage_banner_image')->with('success','Record Updated Successfully');
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }

    public function delete_banner_submit($id)
    {
  	if(Session::has('userid'))
	{
	$return = Bannerset::delete_banner($id);
	return Redirect::to('manage_banner_image')->with('success','Record Deleted Successfully');
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }

    public function add_banner_submit()
    {
	if(Session::has('userid'))
	{
	$data = Input::except(array('_token')) ;
	$rule = array(
	'bn_title' => 'required' ,
	'bn_redirecturl' => 'required' ,
	);
	$validator = Validator::make($data,$rule);			
	if ($validator->fails())
	{
	return Redirect::to('add_banner_image')->withErrors($validator->messages())->withInput();
	}
	else
	{
	$inputs = Input::all();
	$file = Input::file('file');
	if($file!='')
	{
	$filename = $file->getClientOriginalName();
	$move_img = explode('.',$filename);
	$filename = $move_img[0].str_random(8).".".$move_img[1];
	$destinationPath = './assets/bannerimage/';
	$uploadSuccess = Input::file('file')->move($destinationPath,$filename);
	$bn_type = '1,1,1';
	$entry = array(
	'bn_title' => Input::get('bn_title') ,
	'bn_type' =>  $bn_type,
	'bn_img' => $filename ,
	'bn_redirecturl' => Input::get('bn_redirecturl') ,
	);
	$return = Bannerset::save_banner($entry);
	return Redirect::to('manage_banner_image')->with('success','Record Inserted Successfully');	
	}
	else
	{
	return Redirect::to('add_banner_image')->with('error','Image field required')->withInput();
	}
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
     }

     public function edit_banner_submit()
     {
	if(Session::has('userid'))
	{
	$data = Input::except(array('_token')) ;
	$id = Input::get('bn_id');
	$rule = array(
	'bn_title' => 'required',
	'bn_redirecturl' => 'required',
	);
	$validator = Validator::make($data,$rule);			
	if ($validator->fails())
	{
	return Redirect::to('edit_banner_image/'.$id)->withErrors($validator->messages())->withInput();
	}
	else
	{
	$inputs = Input::all();
	$bn_type = '1,1,1';
	$file = Input::file('file');
	if($file!='')
	{
	$filename = $file->getClientOriginalName();
	$move_img = explode('.',$filename);
	$filename = $move_img[0].str_random(8).".".$move_img[1];
	$destinationPath = './assets/bannerimage/';
	$uploadSuccess = Input::file('file')->move($destinationPath,$filename);
	$entry = array(
	'bn_title' => Input::get('bn_title'),
	'bn_type' =>  $bn_type,
	'bn_img' => $filename ,
	'bn_redirecturl' => Input::get('bn_redirecturl') ,
	);
	}
	else
	{
	$entry = array(
	'bn_title' => Input::get('bn_title'),
	'bn_type' =>  $bn_type,
	'bn_redirecturl' => Input::get('bn_redirecturl') , 
	);
	}
 	$return = Bannerset::update_banner_detail($entry,$id);
 	return Redirect::to('manage_banner_image')->with('success','Record Updated Successfully');	
	}
	}
	else
	{
	return Redirect::to('siteadmin');
	}	
    }
 }
