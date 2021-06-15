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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class AdController extends Controller {

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
	public function add_ad()
	{
		if(Session::has('userid'))
		{
		 $adminheader 	= view('siteadmin.includes.admin_header')->with("routemenu","settings");	
		 $adminleftmenus = view('siteadmin.includes.admin_left_menus');
		 $adminfooter 	= view('siteadmin.includes.admin_footer');
		 return view('siteadmin.add_ad')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function manage_ad()
	{
		if(Session::has('userid'))
		{
		Session::put('adrequestcnt',0);
		Admodel::update_ad_msgstatus();
		$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
		$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
		$adminfooter = view('siteadmin.includes.admin_footer');
		$adresult = Admodel::view_ad_list();
		return view('siteadmin.manage_ad')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('adresult', $adresult);	
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function edit_ad($id)
	{
		if(Session::has('userid'))
		{
		$adminheader = view('siteadmin.includes.admin_header')->with("routemenu","settings");	
		$adminleftmenus	= view('siteadmin.includes.admin_left_menus');
		$adminfooter = view('siteadmin.includes.admin_footer');
		$adresult = Admodel::ad_detail($id);
		return view('siteadmin.edit_ad')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('adresult', $adresult)->with('id',$id);
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function status_ad_submit($id,$status)
	{
		if(Session::has('userid'))
		{
		$return = Admodel::status_ad($id,$status);
  		return Redirect::to('manage_ad')->with('updated_result','Record Updated Successfully');
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function delete_ad($id)
	{
		if(Session::has('userid'))
		{
		$return = Admodel::delete_ad($id);
  		return Redirect::to('manage_ad')->with('delete_result','Record Deleted Successfully');
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function add_ad_submit()
	{
		if(Session::has('userid'))
		{
		$data =  Input::except(array('_token')) ;
		$rule  =  array(
		'adtitle' => 'required',
		'adposition' =>  'required',
		'redirecturl' => 'required',
		);
		$adtitle=Input::get('adtitle');
		$adposition=Input::get('adposition');
		$adpage=1;
		$adredirecturl=Input::get('redirecturl');
		$validator = Validator::make($data,$rule);	
		$check_exist_ad_title =Admodel::check_exist_ad_title($adtitle);		
		if ($validator->fails())
		{
		return Redirect::to('add_ad')->withErrors($validator->messages())->withInput();
		}
		else if($check_exist_ad_title)
		{
		return Redirect::to('add_ad')->withMessage("Ad Title Already Exists")->withInput();
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
		$destinationPath = './assets/adimage/';
		$uploadSuccess = Input::file('file')->move($destinationPath,$filename);
		$entry = array(
		'ad_name' => $adtitle,
		'ad_position' => $adposition,
		'ad_pages' => $adpage,
		'ad_redirecturl' =>$adredirecturl,
		'ad_img' =>$filename,
		);
		$return = Admodel::save_ad($entry);
		return Redirect::to('manage_ad')->with('insert_result','Record Inserted Successfully');
		}
		else
		{			
		return Redirect::to('add_ad')->withMessage("Image field required")->withInput();
		}	
		}
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
	}

	public function edit_ad_submit()
	{
        	if(Session::has('userid'))
		{
		$data = Input::except(array('_token')) ;
		$id = Input::get('id');
		$adtitle=Input::get('editadtitle');
		$adposition=Input::get('editadposition');
		$adpage=1;
		$adredirecturl = Input::get('editredirecturl');
		$rule  =  array(
		'editadtitle' => 'required' ,
		'editadposition' =>  'required',
		'editredirecturl' => 'required',
	 	) ;
		$check_exist_ad_title = Admodel::check_exist_ad_title_update($adtitle,$id);		
		$validator = Validator::make($data,$rule);			
		if ($validator->fails())
		{
		return Redirect::to('edit_ad/'.$id)->withErrors($validator->messages())->withInput();
		}
		else if($check_exist_ad_title)
		{		
		return Redirect::to('edit_ad/'.$id)->withMessage("Ad Title Already Exists")->withInput();
		}
		else
		{
		$inputs = Input::all();
		$file = Input::file('file');
		$id = Input::get('id');
		if($file!='')
		{
		$filename = $file->getClientOriginalName();
		$move_img = explode('.',$filename);
		$filename = $move_img[0].str_random(8).".".$move_img[1];
		$destinationPath = './assets/adimage/';
		$uploadSuccess = Input::file('file')->move($destinationPath,$filename);
		$entry = array(
		'ad_name' => $adtitle,
		'ad_position' => $adposition,
		'ad_pages' => $adpage,
		'ad_redirecturl' =>$adredirecturl,
		'ad_img' =>$filename,
		);
		}
		else
		{
		$entry = array(
		'ad_name' => $adtitle,
		'ad_position' => $adposition,
		'ad_pages' => $adpage,
		'ad_redirecturl' =>$adredirecturl,
		);
		}
		$return = Admodel::update_ad_detail($entry,$id);
		return Redirect::to('manage_ad')->with('updated_result','Record Updated Successfully');	
		}
		}
		else
		{
		return Redirect::to('siteadmin');
		}	
		}
	}
