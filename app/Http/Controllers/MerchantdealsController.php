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
use App\Merchantsettings;
use App\Merchantdeals;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class MerchantdealsController extends Controller
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
    
    public function add_deals()
    {
        $adminheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "deals");
        $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_deals');
        $adminfooter    = view('sitemerchant.includes.merchant_footer');
        $category       = Merchantdeals::get_category();
        
        return view('sitemerchant.add_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('action', 'save')->with('category', $category);
    }
    
    public function add_deals_submit()
    {
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
        $date1                    = date('m/d/Y');
        
        
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
            'created_date' => $date1
        );
        $return = Merchantdeals::save_deal($entry);
        return Redirect::to('mer_manage_deals')->with('block_message', 'Deal Inserted Successfully');
    }
    
    public function edit_deals($id)
    {
        $adminheader      = view('sitemerchant.includes.merchant_header')->with('routemenu', "deals");
        $adminleftmenus   = view('sitemerchant.includes.merchant_left_menu_deals');
        $adminfooter      = view('sitemerchant.includes.merchant_footer');
        $category         = Merchantdeals::get_category();
        $merchant_details = Merchantdeals::get_merchant_details();
        $deal_list        = Merchantdeals::get_deals($id);
        return view('sitemerchant.edit_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('action', 'update')->with('category', $category)->with('deal_list', $deal_list)->with('merchant_details', $merchant_details);
    }
    
    public function edit_deals_submit()
    {
        
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
        $return                   = Merchantdeals::edit_deal($entry, $id);
        return Redirect::to('mer_manage_deals')->with('block_message', 'Deal Updated Successfully');
    }
    
    public function deals_select_main_cat()
    {
        $id       = $_GET['id'];
        $main_cat = Merchantdeals::get_main_category_ajax($id);
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
        $main_cat = Merchantdeals::get_sub_category_ajax($id);
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
        $main_cat = Merchantdeals::get_second_sub_category_ajax($id);
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
        $main_cat = Merchantdeals::get_main_category_ajax_edit($id);
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
        $main_cat = Merchantdeals::get_sub_category_ajax_edit($id);
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
        $main_cat = Merchantdeals::get_second_sub_category_ajax_edit($id);
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
        $exist_title = Merchantdeals::check_title_exist_ajax($id);
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
        $exist_title = Merchantdeals::check_title_exist_ajax_edit($id, $title);
        if ($exist_title) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    
    
    public function manage_deals()
    {
        $date   = date('Y-m-d H:i:s');
        $mer_id = Session::get('merchantid');
        
        $from_date        = Input::get('from_date');
        $to_date          = Input::get('to_date');
        $merchant_dealrep = Merchantdeals::merchant_dealrep($from_date, $to_date, $mer_id);
        $delete_deals 	  = Merchantdeals::get_order_deals_details();
        $adminheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "deals");
        $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_deals');
        $adminfooter    = view('sitemerchant.includes.merchant_footer');
        $return         = Merchantdeals::get_deal_details($date, $mer_id);
        return view('sitemerchant.manage_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_details', $return)->with('merchant_dealrep', $merchant_dealrep)->with('delete_deals', $delete_deals);
    }
    
    public function expired_deals()
    {
        $date   = date('Y-m-d');
        $mer_id = Session::get('merchantid');
        
        $from_date           = Input::get('from_date');
        $to_date             = Input::get('to_date');
        $merchantexp_dealrep = Merchantdeals::merchantexp_dealrep($from_date, $to_date, $mer_id, $date);
        
        $adminheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "deals");
        $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_deals');
        $adminfooter    = view('sitemerchant.includes.merchant_footer');
        $return         = Merchantdeals::get_expired_deals($date, $mer_id);
        return view('sitemerchant.expired_deals')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_details', $return)->with('merchantexp_dealrep', $merchantexp_dealrep);
    }
    
    public function block_deals($id, $status)
    {
        $entry = array(
            'deal_status' => $status
        );
        Merchantdeals::block_deal_status($id, $entry);
        if ($status == 1) {
            return Redirect::to('mer_manage_deals')->with('block_message', 'Deal Activated');
        } else if ($status == 0) {
            return Redirect::to('mer_manage_deals')->with('block_message', 'Deal Blocked');
        }
    }
 
       
    public function deal_details($id)
    {
        $adminheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "deals");
        $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_deals');
        $adminfooter    = view('sitemerchant.includes.merchant_footer');
        $return         = Merchantdeals::get_deals_view($id);
        return view('sitemerchant.deal_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('deal_list', $return);
    }
    
    public function validate_coupon_code()
    {
        $adminheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "deals");
        $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_deals');
        $adminfooter    = view('sitemerchant.includes.merchant_footer');
        
        return view('sitemerchant.validate_coupon')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
    }
    
    public function redeem_coupon_list()
    {
        $adminheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "deals");
        $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_deals');
        $adminfooter    = view('sitemerchant.includes.merchant_footer');
        
        return view('sitemerchant.redeem_coupon')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
    }
	
	public function delete_deals($id)
	{
		if(Session::has('merchantid'))
		{
	     $adminheader 		= view('sitemerchant.includes.merchant_header')->with('routemenu',"deals");	
		 $adminleftmenus	= view('sitemerchant.includes.merchant_left_menu_deals');
		 $adminfooter 		= view('sitemerchant.includes.merchant_footer');
		 $del_deals = Merchantdeals::delete_deals($id);
			
		return Redirect::to('manage_deals')->with('Deal Deleted','Deal Deleted Successfully');	
		}
		else
        {
        return Redirect::to('sitemerchant');
        }	
     }
    
}
