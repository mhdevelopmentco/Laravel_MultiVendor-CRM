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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class DealsController extends Controller
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

    public function deals_dashboard()
    {
        if (Session::has('userid')) {
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "deals");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $deal_count     = Deals::get_chart_details();
            $archievd_cnt   = Deals::get_archievd_deals();
            $active_cnt     = Deals::get_active_details();
            return view('siteadmin.deals_dashboard')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_cnt', $deal_count)->with('archievd_count', $archievd_cnt)->with('active_count', $active_cnt);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function add_deals()
    {
        if (Session::has('userid')) {
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", "deals");
            $adminleftmenus   = view('siteadmin.includes.admin_left_menu_deals');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $category         = Deals::get_category();
            $merchant_details = Deals::get_merchant_details();
            return view('siteadmin.add_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('action', 'save')->with('category', $category)->with('merchant_details', $merchant_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_deals_submit()
    {
        if (Session::has('userid')) {
            $count            = Input::get('count');
            $filename_new_get = "";
            for ($i = 0; $i < $count; $i++) {
                $file_more          = Input::file('file_more' . $i);
                $file_more_name     = $file_more->getClientOriginalName();
                $move_more_img      = explode('.', $file_more_name);
                $filename_new       = $move_more_img[0] . str_random(8) . "." . $move_more_img[1];
                $newdestinationPath = './assets/deals/';
                $uploadSuccess_new  = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                $filename_new_get .= $filename_new . "/**/";
            }
            $filename_new_get;
            $now                      = date('Y-m-d H:i:s');
            $inputs                   = Input::all();
            $file                     = Input::file('file');
            $filename                 = $file->getClientOriginalName();
            $move_img                 = explode('.', $filename);
            $filename                 = $move_img[0] . str_random(8) . "." . $move_img[1];
            $destinationPath          = './assets/deals/';
            $uploadSuccess            = Input::file('file')->move($destinationPath, $filename);
            $file_name_insert         = $filename . "/**/" . $filename_new_get;
            $deal_saving_price        = Input::get('originalprice') - Input::get('discountprice');
            $deal_discount_percentage = round(($deal_saving_price / Input::get('originalprice')) * 100, 2);
            $date                     = date('m/d/Y');
            
            
            $deal_title  = Input::get('title');
            $Select_Shop = Input::get('shop');
            $check_store = Deals::check_store($deal_title, $Select_Shop);
            
            if ($check_store) {
                return Redirect::to('add_deals')->with('success', 'The Product Already exist in the Store');
            } else {
                
                $entry  = array(
                    'deal_title' => Input::get('title'),
                    'deal_category' => Input::get('category'),
                    'deal_main_category' => Input::get('maincategory'),
                    'deal_sub_category' => Input::get('subcategory'),
                    'deal_second_sub_category' => Input::get('secondsubcategory'),
                    'deal_original_price' => Input::get('originalprice'),
                    'deal_discount_price' => Input::get('discountprice'),
                    'deal_discount_percentage' => $deal_discount_percentage,
                    'deal_saving_price' => $deal_saving_price,
                    'deal_start_date' => Input::get('startdate'),
                    'deal_end_date' => Input::get('enddate'),
                    'deal_expiry_date' => Input::get('expirydate'),
                    'deal_description' => Input::get('description'),
                    'deal_merchant_id' => Input::get('merchant'),
                    'deal_shop_id' => Input::get('shop'),
                    'deal_meta_keyword' => Input::get('metakeyword'),
                    'deal_meta_description' => Input::get('metadescription'),
                    'deal_min_limit' => Input::get('minlimt'),
                    'deal_max_limit' => Input::get('maxlimit'),
                    
                    'deal_image_count' => Input::get('count'),
                    'deal_image' => $file_name_insert,
                    'deal_posted_date' => $now,
                    'created_date' => $date
                );
                $return = Deals::save_deal($entry);
                return Redirect::to('manage_deals')->with('block_message', 'Deal Inserted Successfully');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_deals($id)
    {
        if (Session::has('userid')) {
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", "deals");
            $adminleftmenus   = view('siteadmin.includes.admin_left_menu_deals');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $category         = Deals::get_category();
            $merchant_details = Deals::get_merchant_details();
            $deal_list        = Deals::get_deals($id);
            return view('siteadmin.edit_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('action', 'update')->with('category', $category)->with('deal_list', $deal_list)->with('merchant_details', $merchant_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_deals_submit()
    {
        if (Session::has('userid')) {
            $now    = date('Y-m-d H:i:s');
            $inputs = Input::all();
            
            $count            = Input::get('count');
            $filename_new_get = "";
            for ($i = 0; $i < $count; $i++) {
                $file_more = Input::file('file_more' . $i);
                if ($file_more == "") {
                    $dile_name_new_get = Input::get('file_more_new' . $i);
                    $filename_new_get .= $dile_name_new_get . "/**/";
                } else {
                    $file_more_name     = $file_more->getClientOriginalName();
                    $move_more_img      = explode('.', $file_more_name);
                    $filename_new       = $move_more_img[0] . str_random(8) . "." . $move_more_img[1];
                    $newdestinationPath = './assets/deals/';
                    $uploadSuccess_new  = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                    $filename_new_get .= $filename_new . "/**/";
                }
                
            }
            
            $file = Input::file('file');
            if ($file == "") {
                $filename = Input::get('file_new');
            } else {
                $filename        = $file->getClientOriginalName();
                $move_img        = explode('.', $filename);
                $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
                $destinationPath = './assets/deals/';
                $uploadSuccess   = Input::file('file')->move($destinationPath, $filename);
            }
            
            $file_name_insert         = $filename . "/**/" . $filename_new_get;
            $id                       = Input::get('deal_edit_id');
            $deal_saving_price        = Input::get('originalprice') - Input::get('discountprice');
            $deal_discount_percentage = round(($deal_saving_price / Input::get('originalprice')) * 100, 2);
            $entry                    = array(
                'deal_title' => Input::get('title'),
                'deal_category' => Input::get('category'),
                'deal_main_category' => Input::get('maincategory'),
                'deal_sub_category' => Input::get('subcategory'),
                'deal_second_sub_category' => Input::get('secondsubcategory'),
                'deal_original_price' => Input::get('originalprice'),
                'deal_discount_price' => Input::get('discountprice'),
                'deal_discount_percentage' => $deal_discount_percentage,
                'deal_saving_price' => $deal_saving_price,
                'deal_start_date' => Input::get('startdate'),
                'deal_end_date' => Input::get('enddate'),
                'deal_expiry_date' => Input::get('expirydate'),
                'deal_description' => Input::get('description'),
                'deal_merchant_id' => Input::get('merchant'),
                'deal_shop_id' => Input::get('shop'),
                'deal_meta_keyword' => Input::get('metakeyword'),
                'deal_meta_description' => Input::get('metadescription'),
                'deal_min_limit' => Input::get('minlimt'),
                'deal_max_limit' => Input::get('maxlimit'),
                
                'deal_image_count' => Input::get('count'),
                'deal_image' => $file_name_insert,
                'deal_posted_date' => $now
            );
            $return                   = Deals::edit_deal($entry, $id);
            return Redirect::to('manage_deals')->with('block_message', 'Deal Updated Successfully');
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function deals_select_main_cat()
    {
        $id       = $_GET['id'];
        $main_cat = Deals::get_main_category_ajax($id);
        if ($main_cat) {
            $return = "";
            $return = "<option value='0'> -- Select -- </option>";
            foreach ($main_cat as $main_cat_ajax) {
                $return .= "<option value='" . $main_cat_ajax->smc_id . "'> " . $main_cat_ajax->smc_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value='0'> No datas found </option>";
        }
    }
    
    public function deals_select_sub_cat()
    {
        $id       = $_GET['id'];
        $main_cat = Deals::get_sub_category_ajax($id);
        if ($main_cat) {
            $return = "";
            $return = "<option value='0'> -- Select -- </option>";
            foreach ($main_cat as $main_cat_ajax) {
                $return .= "<option value='" . $main_cat_ajax->sb_id . "'> " . $main_cat_ajax->sb_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value='0'> No datas found </option>";
        }
    }
    
    public function deals_select_second_sub_cat()
    {
        $id       = $_GET['id'];
        $main_cat = Deals::get_second_sub_category_ajax($id);
        if ($main_cat) {
            $return = "";
            $return = "<option value='0'> -- Select -- </option>";
            foreach ($main_cat as $main_cat_ajax) {
                $return .= "<option value='" . $main_cat_ajax->ssb_id . "'> " . $main_cat_ajax->ssb_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value='0'> No datas found </option>";
        }
    }
    
    public function deals_edit_select_main_cat()
    {
        $id       = $_GET['edit_id'];
        $main_cat = Deals::get_main_category_ajax_edit($id);
        if ($main_cat) {
            $return = "";
            foreach ($main_cat as $main_cat_ajax) {
                $return = "<option value='" . $main_cat_ajax->smc_id . "' selected> " . $main_cat_ajax->smc_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value='0'> No datas found </option>";
        }
    }
    
    public function deals_edit_select_sub_cat()
    {
        $id       = $_GET['edit_sub_id'];
        $main_cat = Deals::get_sub_category_ajax_edit($id);
        if ($main_cat) {
            $return = "";
            foreach ($main_cat as $main_cat_ajax) {
                $return = "<option value='" . $main_cat_ajax->sb_id . "' selected> " . $main_cat_ajax->sb_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value='0'> No datas found </option>";
        }
    }
    
    public function deals_edit_second_sub_cat()
    {
        $id       = $_GET['edit_secnd_sub_id'];
        $main_cat = Deals::get_second_sub_category_ajax_edit($id);
        if ($main_cat) {
            $return = "";
            foreach ($main_cat as $main_cat_ajax) {
                $return = "<option value='" . $main_cat_ajax->ssb_id . "' selected> " . $main_cat_ajax->ssb_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value='0'> No datas found </option>";
        }
    }
    
    public function check_title_exist()
    {
        $id          = $_GET['title'];
        $exist_title = Deals::check_title_exist_ajax($id);
        if ($exist_title) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    public function check_title_exist_edit()
    {
        $title       = $_GET['title'];
        $id          = $_GET['dealid'];
        $exist_title = Deals::check_title_exist_ajax_edit($id, $title);
        if ($exist_title) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    public function manage_deals()
    {
        if (Session::has('userid')) {
            $date      = date('Y-m-d H:i:s');
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $dealrep   = Deals::get_dealreports($from_date, $to_date);
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "deals");
            $delete_deals 	= Deals::get_order_deals_details();
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $return         = Deals::get_deal_details($date);
            return view('siteadmin.manage_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_details', $return)->with('dealrep', $dealrep)->with('delete_deals', $delete_deals);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function expired_deals()
    {
        if (Session::has('userid')) {
            
            $date        = date('Y-m-d H:i:s');
            $from_date   = Input::get('from_date');
            $to_date     = Input::get('to_date');
            $exdeals_rep = Deals::exdeals_rep($from_date, $to_date, $date);
                  
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "deals");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $return         = Deals::get_expired_deals($date);
            return view('siteadmin.expired_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_details', $return)->with('exdeals_rep', $exdeals_rep);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function block_deals($id, $status)
    {
        if (Session::has('userid')) {
            $entry = array(
                'deal_status' => $status
            );
            Deals::block_deal_status($id, $entry);
            if ($status == 1) {
                return Redirect::to('manage_deals')->with('block_message', 'Deal Activated');
            } else if ($status == 0) {
                return Redirect::to('manage_deals')->with('block_message', 'Deal Blocked');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
   public function deal_details($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "deals");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $return         = Deals::get_deals_view($id);
            return view('siteadmin.deal_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_list', $return);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function validate_coupon_code()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "deals");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            return view('siteadmin.validate_coupon')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function redeem_coupon_list()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "deals");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            
            return view('siteadmin.redeem_coupon')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
        } else {
            return Redirect::to('siteadmin');
        }
    }
	
	public function delete_deals($id)
	{
			
		if(Session::has('userid'))
		{
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","settings");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');

		 $del_deals = Deals::delete_deals($id);
			
		return Redirect::to('manage_deals')->with('Deal Deleted','Deal Deleted Successfully');	
		}
		else
        {
        return Redirect::to('siteadmin');
        }	
	}

    //Manage deal review
     public function manage_deal_review()
    {
        if (Session::has('userid')) {
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "deals");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
            
            $adminfooter = view('siteadmin.includes.admin_footer');

            $get_deal_review = Deals::get_deal_review();

             return view('siteadmin.manage_deal_review')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('get_deal_review', $get_deal_review);
        }
        else{
            return Redirect::to('siteadmin');
        }
    }

     public function edit_deal_review($id)
    {
        
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_deals');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $result = Deals::edit_deal_review($id);
     
            return view('siteadmin.edit_deal_review')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result',$result);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }

    public function edit_deal_review_submit()
    {
        if (Session::has('userid')) {
            $now = date('Y-m-d H:i:s');
            
            $inputs = Input::all();
            $review_id = Input::get('comment_id');
            $review_title = Input::get('review_title');
            $review_comment = Input::get('review_comment');

            $entry = array(
                
                'title' => $review_title,
                
                'comments' => $review_comment,
             
            );
            $return = Deals::update_deal_review($entry, $review_id);
            return Redirect::to('manage_deal_review');
        }
        else{
            return Redirect::to('siteadmin');
        }
    }
    public function delete_deal_review($id)
    {
        if(Session::has('userid'))
        {
         $adminheader       = view('siteadmin.includes.admin_header')->with("routemenu","settings");  
         $adminleftmenus    = view('siteadmin.includes.admin_left_menu_deals');
         $adminfooter       = view('siteadmin.includes.admin_footer');
         $del_review = Deals::delete_deal_review($id);
         return Redirect::to('manage_deal_review')->with('product Deleted','Review Deleted Successfully'); 
        }
        else
        {
         return Redirect::to('siteadmin');
        }
    }
        public function block_deal_review($id, $status)
    {
        
        if (Session::has('userid')) {
            
            $entry = array(
                
                'status' => $status
                
            );
            
            Deals::block_deal_review_status($id, $entry);
            
            if ($status == 0) {
                
                return Redirect::to('manage_deal_review')->with('block_message', 'Product unblocked');
                
            }
            
            else if ($status == 1) {
                
                return Redirect::to('manage_deal_review')->with('block_message', 'Product Blocked');
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
}
