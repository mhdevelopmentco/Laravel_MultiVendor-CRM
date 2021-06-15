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
use MyPayPal;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
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

    public function siteadmin()
    {
        return Redirect::to('siteadmin');
    }

    public function index()
    {
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $women_product                = Home::get_women_product();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
        $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        // $laravel = app();
        // echo "Laravel Version : ".$laravel::VERSION;
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('index')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('auction_details', $auction_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('metadetails', $getmetadetails)->with('women_product', $women_product)->with('get_contact_det', $get_contact_det)->with('general', $general);
      
    }

    public function merchant_signup()
    {
        
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
        $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        
        $header         = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer         = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $country_return = Merchant::get_country_detail();
        return view('merchant_signup')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('country_details', $country_return)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }
    
    public function merchant_signup_submit()
    {
               $data = Input::except(array(
            '_token'
        ));
        $rule = array(
            'first_name' => 'required|alpha_dash',
            'last_name' => 'required|alpha_dash',
            'email_id' => 'required|email',
            'select_mer_country' => 'required',
            'select_mer_city' => 'required',
            'phone_no' => 'required|numeric',
            'addreess_one' => 'required',
            'address_two' => 'required',
            'store_name' => 'required',
            'store_pho' => 'required|numeric',
            'store_add_one' => 'required',
            'store_add_two' => 'required',
            'select_country' => 'required',
            'select_city' => 'required',
            'zip_code' => 'required|numeric',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'website' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required',
            'commission' => 'required|numeric',
            'file' => 'image'
        );
        
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return Redirect::to('merchant_signup')->withErrors($validator->messages())->withInput();
        } else {
            $mer_email         = Input::get('email_id');
            $check_merchant_id = Merchant::check_merchant_email($mer_email);
            if ($check_merchant_id) {
                return Redirect::to('merchant_signup')->with('mail_exist', 'Merchant Email Exist')->withInput();
            } else {
                $file             = Input::file('file');
                $filename         = $file->getClientOriginalName();
                $move_img         = explode('.', $filename);
                $filename         = $move_img[0] . str_random(8) . "." . $move_img[1];
                $destinationPath  = './assets/storeimage/';
                	
                $uploadSuccess    = Input::file('file')->move($destinationPath, $filename);
                $get_new_password = Merchant::randomPassword();
                $merchant_entry   = array(
                    'mer_fname' => Input::get('first_name'),
                    'mer_lname' => Input::get('last_name'),
                    'mer_password' => $get_new_password,
                    'mer_email' => Input::get('email_id'),
                    'mer_phone' => Input::get('phone_no'),
                    'mer_address1' => Input::get('addreess_one'),
                    'mer_address2' => Input::get('address_two'),
                    'mer_co_id' => Input::get('select_mer_country'),
                    'mer_ci_id' => Input::get('select_mer_city'),
                    'mer_payment' => Input::get('payment_account'),
                    'mer_commission' => Input::get('commission')
                    
                );
                
                
                $inserted_merchant_id = Merchant::insert_merchant($merchant_entry);
                
                
                
                $store_entry = array(
                    'stor_name' => Input::get('store_name'),
                    'stor_merchant_id' => $inserted_merchant_id,
                    'stor_phone' => Input::get('store_pho'),
                    'stor_address1' => Input::get('store_add_one'),
                    'stor_address2' => Input::get('store_add_two'),
                    'stor_country' => Input::get('select_country'),
                    'stor_city' => Input::get('select_city'),
                    'stor_zipcode' => Input::get('zip_code'),
                    'stor_metakeywords' => Input::get('meta_keyword'),
                    'stor_metadesc' => Input::get('meta_description'),
                    'stor_website' => Input::get('website'),
                    'stor_latitude' => Input::get('latitude'),
                    'stor_longitude' => Input::get('longtitude'),
                    'stor_img' => $filename
                );
                
                Merchant::insert_store($store_entry);
              
                Mail::send('emails.merchantmail', array(
                    'first_name' => Input::get('first_name'),
                    'password' => $get_new_password
                ), function($message)
                {
                    $message->to(Input::get('email_id'))->subject('Merchant Account Created Successfully');
                });
                
            }
            
            
            
            return Redirect::to('submission_merchant');
        }
        
        
    }
    
    
    public function submission_merchant()
    {
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
        $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        
        $header         = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer         = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $country_return = Merchant::get_country_detail();
        return view('submission')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('country_details', $country_return)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }
    
    
    
    public function nearmemap()
    {
        
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_all_deals_details();
        $auction_details              = Home::get_all_action_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        
        $get_store_details            = Home::get_store_list();
        $get_store_deal_count         = Home::get_store_deal_count($get_store_details);
        $get_store_auction_count      = Home::get_store_auction_count($get_store_details);
        $get_store_product_count      = Home::get_store_product_count($get_store_details);
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_storeall                 = Home::get_store_all();
        $get_store_main               = Home::get_store_setting();
        $get_store_all                = Home::get_store_all();
        $get_default_city             = Home::get_default_city();
        
        $get_contact_det = Footer::get_contact_details();
        $getanl          = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('nearmemap')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('auction_details', $auction_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_store_details', $get_store_details)->with('get_store_deal_count', $get_store_deal_count)->with('get_store_auction_count', $get_store_auction_count)->with('get_store_product_count', $get_store_product_count)->with('metadetails', $getmetadetails)->with('get_storeall', $get_storeall)->with('get_store_main', $get_store_main)->with('get_store_all', $get_store_all)->with('get_contact_det', $get_contact_det)->with('get_default_city', $get_default_city)->with('general', $general);
    }
    
    
    public function products()
    {
        
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $deal_details                 = array();
        $auction_details              = array();
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();

        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('products')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deal_details', $deal_details)->with('auction_details', $auction_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    
    
    public function category_product_list($name, $id)
    {
        $product_id      = base64_decode($id);
        $id              = base64_decode(base64_decode(base64_decode($id)));
        
        $city_details    = Register::get_city_details();
        $header_category = Home::get_header_category();
        		
        $country_details = Register::get_country_details();
        if ($name == "viewcategorylist") {
            $get_cat_name_listby = Home::get_catname_listby($product_id);
           
            $product_details     = Home::get_category_product_details_listby($product_id);
           	
            $deal_details        = Home::get_category_deal_details_listby($product_id);
            $auction_details     = Home::get_category_auction_details_listby($product_id);
            $get_listby_id       = explode(",", $product_id);
            
            foreach ($get_cat_name_listby as $get_cat_name_listby_single) {
            }
            
            if ($get_listby_id[0] == 1) {
                $product_name_single = $get_cat_name_listby_single->mc_name;
                
            } else if ($get_listby_id[0] == 2) {
                $product_name_single = $get_cat_name_listby_single->smc_name;
            } else if ($get_listby_id[0] == 3) {
                $product_name_single = $get_cat_name_listby_single->sb_name;
            } else if ($get_listby_id[0] == 4) {
                $product_name_single = $get_cat_name_listby_single->ssb_name;
            }
            
        } else {
            $product_details     = Home::get_category_product_details($id);
            $product_name_single = "";
        }
        
        
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
       
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('products')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deal_details', $deal_details)->with('auction_details', $auction_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_name_single', $product_name_single)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    
    public function productview($mcid, $scid, $sbid, $ssbid, $id)
    {
       
        $sid = base64_decode($id);
        
        $breadcrumb                   = Home::get_breadcrumb_category($sid);
        $product_id                   = base64_decode($id);
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_product_details_by_id($product_id);
        $product_color_details        = Home::get_selected_product_color_details($product_details_by_id);
        $product_size_details         = Home::get_selected_product_size_details($product_details_by_id);
        $product_spec_details         = Home::get_selected_product_spec_details($product_details_by_id);
        $country_details              = Register::get_country_details();
        $get_related_product          = Home::get_related_product($product_id);
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_countone($product_id);
        $two_count                    = Home::get_counttwo($product_id);
        $three_count                  = Home::get_countthree($product_id);
        $four_count                   = Home::get_countfour($product_id);
        $five_count                   = Home::get_countfive($product_id);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $get_store                    = Home::get_prd_deatils($product_id);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('productview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('product_color_details', $product_color_details)->with('product_size_details', $product_size_details)->with('product_spec_details', $product_spec_details)->with('metadetails', $getmetadetails)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('breadcrumb', $breadcrumb)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    public function productview1($mcid, $scid, $sbid, $id)
    {
        
        $sid = base64_decode($id);
        
        $product_id                   = base64_decode($id);
        $breadcrumb                   = Home::get_breadcrumb_category($sid);
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details1();
       
        $product_details_by_id        = Home::get_product_details_by_id($product_id);
        
        $product_color_details        = Home::get_selected_product_color_details($product_details_by_id);
        $product_size_details         = Home::get_selected_product_size_details($product_details_by_id);
        $product_spec_details         = Home::get_selected_product_spec_details($product_details_by_id);
        $country_details              = Register::get_country_details();
        $get_related_product          = Home::get_related_product($sid);
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_countone($product_id);
        $two_count                    = Home::get_counttwo($product_id);
        $three_count                  = Home::get_countthree($product_id);
        $four_count                   = Home::get_countfour($product_id);
        $five_count                   = Home::get_countfive($product_id);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $get_store                    = Home::get_prd_deatils($product_id);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('productview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('product_color_details', $product_color_details)->with('product_size_details', $product_size_details)->with('product_spec_details', $product_spec_details)->with('metadetails', $getmetadetails)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('breadcrumb', $breadcrumb)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    
    public function productview2($mcid, $scid, $id)
    {
         
        $sid                          = base64_decode($id);
        $product_id                   = base64_decode($id);
        $breadcrumb                   = Home::get_breadcrumb_category($sid);
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details2();
       
        $product_details_by_id        = Home::get_product_details_by_id($product_id);
       
        $product_color_details        = Home::get_selected_product_color_details($product_details_by_id);
        $product_size_details         = Home::get_selected_product_size_details($product_details_by_id);
        $product_spec_details         = Home::get_selected_product_spec_details($product_details_by_id);
        $country_details              = Register::get_country_details();
        $get_related_product          = Home::get_related_product($sid);
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('productview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('product_color_details', $product_color_details)->with('product_size_details', $product_size_details)->with('product_spec_details', $product_spec_details)->with('metadetails', $getmetadetails)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('breadcrumb', $breadcrumb)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    
    public function deals()
    {
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_all_deals_details();
        $country_details              = Register::get_country_details();
        $most_visited_product         = Home::get_deals_details();
        $get_special_product          = Home::get_left_side_special_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();

        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('deals')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('metadetails', $getmetadetails)->with('get_special_product', $get_special_product)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }
    
    public function category_deal_list($name, $id)
    {
        $product_id          = base64_decode($id);
       
        $getmetadetails      = Home::getmetadetails();
        $city_details        = Register::get_city_details();
        $header_category     = Home::get_header_category();
        $get_special_product = Home::get_left_side_special_product();
        $country_details     = Register::get_country_details();
        if ($name == "viewcategorylist") {
            $get_cat_name_listby = Home::get_catname_listby($product_id);
            $product_details     = Home::get_category_deal_details_listby($product_id);
           
            $get_listby_id       = explode(",", $product_id);
            foreach ($get_cat_name_listby as $get_cat_name_listby_single) {
            }
            if ($get_listby_id[0] == 1) {
                $product_name_single = $get_cat_name_listby_single->mc_name;
            } else if ($get_listby_id[0] == 2) {
                $product_name_single = $get_cat_name_listby_single->smc_name;
            } else if ($get_listby_id[0] == 3) {
                $product_name_single = $get_cat_name_listby_single->sb_name;
            } else if ($get_listby_id[0] == 4) {
                $product_name_single = $get_cat_name_listby_single->ssb_name;
            }
            
        } else {
            $product_details     = Home::get_all_deals_details($id);
            $product_name_single = "";
        }
        
        
        $most_visited_product         = Home::get_deals_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('deals')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('metadetails', $getmetadetails)->with('get_special_product', $get_special_product)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }
    
    public function dealview($mcid, $scid, $sbid, $ssbid, $id)
    {
        $sid                          = base64_decode($id);
        $city_details                 = Register::get_city_details();
        $breadcrumb                   = Home::get_breadcrumb_deal($sid);
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_deals_details_by_id($sid);
      
        $get_related_product          = Home::get_related_deals($sid);
        $country_details              = Register::get_country_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_dealcountone($sid);
        $two_count                    = Home::get_dealcounttwo($sid);
        $three_count                  = Home::get_dealcountthree($sid);
        $four_count                   = Home::get_dealcountfour($sid);
        $five_count                   = Home::get_dealcountfive($sid);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $get_store                    = Home::get_deal_deatils($sid);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        
        return view('dealview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('metadetails', $getmetadetails)->with('breadcrumb', $breadcrumb)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    
    public function dealview1($mcid, $scid, $sbid, $id)
    {
        $sid                          = base64_decode($id);
        $city_details                 = Register::get_city_details();
        $breadcrumb                   = Home::get_breadcrumb_deal($sid);
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_deals_details_by_id($sid);
        
        $get_related_product          = Home::get_related_deals($sid);
        $country_details              = Register::get_country_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_dealcountone($sid);
        $two_count                    = Home::get_dealcounttwo($sid);
        $three_count                  = Home::get_dealcountthree($sid);
        $four_count                   = Home::get_dealcountfour($sid);
        $five_count                   = Home::get_dealcountfive($sid);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $get_store                    = Home::get_deal_deatils($sid);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        
        return view('dealview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('metadetails', $getmetadetails)->with('breadcrumb', $breadcrumb)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    
    public function dealview2($mcid, $scid, $id)
    {
        $sid                          = base64_decode($id);
        $city_details                 = Register::get_city_details();
        $breadcrumb                   = Home::get_breadcrumb_deal($sid);
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_deals_details_by_id($sid);
        
        $get_related_product          = Home::get_related_deals($sid);
        $country_details              = Register::get_country_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $one_count                    = Home::get_dealcountone($sid);
        $two_count                    = Home::get_dealcounttwo($sid);
        $three_count                  = Home::get_dealcountthree($sid);
        $four_count                   = Home::get_dealcountfour($sid);
        $five_count                   = Home::get_dealcountfive($sid);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $get_store                    = Home::get_deal_deatils($sid);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        
        return view('dealview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('metadetails', $getmetadetails)->with('breadcrumb', $breadcrumb)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    
    public function auction()
    {
      $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_all_action_details();
        $most_visited_product         = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $get_auction_last_bidder      = Home::auction_last_bidder($product_details);
        $get_auction_last_bidder1     = Home::auction_last_bidder($most_visited_product);
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('auction')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_auction_last_bidder', $get_auction_last_bidder)->with('get_auction_last_bidder1', $get_auction_last_bidder1)->with('metadetails', $getmetadetails)->with('general', $general);
        
        
    }
    
    
    public function category_auction_list($name, $id)
    {
        
        $product_id = base64_decode($id);
        $id         = base64_decode(base64_decode(base64_decode($id)));
        
        $city_details    = Register::get_city_details();
        $header_category = Home::get_header_category();
        $country_details = Register::get_country_details();
        if ($name == "viewcategorylist") {
            $get_cat_name_listby = Home::get_catname_listby($product_id);
            $product_details     = Home::get_category_auction_details_listby($product_id);
            
            $get_listby_id = explode(",", $product_id);
            foreach ($get_cat_name_listby as $get_cat_name_listby_single) {
            }
            if ($get_listby_id[0] == 1) {
                $product_name_single = $get_cat_name_listby_single->mc_name;
            } else if ($get_listby_id[0] == 2) {
                $product_name_single = $get_cat_name_listby_single->smc_name;
            } else if ($get_listby_id[0] == 3) {
                $product_name_single = $get_cat_name_listby_single->sb_name;
            } else if ($get_listby_id[0] == 4) {
                $product_name_single = $get_cat_name_listby_single->ssb_name;
            }
            
        } else {
            $product_details     = Home::get_all_action_details($id);
            $product_name_single = "";
        }
        
        $get_auction_last_bidder      = Home::auction_last_bidder($product_details);
        $most_visited_product         = Home::get_auction_details();
        $get_auction_last_bidder1     = Home::auction_last_bidder($most_visited_product);
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('auction')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_auction_last_bidder', $get_auction_last_bidder)->with('metadetails', $getmetadetails)->with('get_auction_last_bidder1', $get_auction_last_bidder1)->with('general', $general);
        
        
    }
    
    
    public function auctionview($id)
    {
        
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $product_details_by_id        = Home::get_action_details_by_id($id);
        $country_details              = Register::get_country_details();
        $get_related_product          = Home::get_related_auction($id);
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $get_max_bid_amt              = Home::max_bid_amt($id);
        $get_bidder_by_id             = Home::get_bidder_by_id($id);
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('auctionview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('product_details_by_id', $product_details_by_id)->with('get_related_product', $get_related_product)->with('get_max_bid_amt', $get_max_bid_amt)->with('get_bidder_by_id', $get_bidder_by_id)->with('metadetails', $getmetadetails)->with('general', $general);
    }
    
    public function stores()
    {
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $most_visited_product         = Home::get_most_visited_product();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        $get_store_details       = Home::get_store_list();
        $get_store_deal_count    = Home::get_store_deal_count($get_store_details);
        $get_store_auction_count = Home::get_store_auction_count($get_store_details);
        $get_store_product_count = Home::get_store_product_count($get_store_details);
        
        return view('stores')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_store_details', $get_store_details)->with('get_store_deal_count', $get_store_deal_count)->with('get_store_auction_count', $get_store_auction_count)->with('get_store_product_count', $get_store_product_count)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }
    
    public function storeview($id)
    {
        
        
        $id                   = base64_decode(base64_decode(base64_decode($id)));
        $city_details         = Register::get_city_details();
        $header_category      = Home::get_header_category();
        $product_name_single  = "";
        $most_visited_product = Home::get_auction_details();
        
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $get_store_by_id              = Home::get_store_by_id($id);
        $get_store_deal_by_id         = Home::get_store_deal_by_id($id);
        $get_store_auction_by_id      = Home::get_store_auction_by_id($id);
        $get_auction_last_bidder      = Home::auction_last_bidder($get_store_auction_by_id);
        $get_store_product_by_id      = Home::get_store_product_by_id($id);
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_storebranch              = Home::get_store_sub_details($id);
        $one_count                    = Home::get_storecountone($id);
        $two_count                    = Home::get_storecounttwo($id);
        $three_count                  = Home::get_storecountthree($id);
        $four_count                   = Home::get_storecountfour($id);
        $five_count                   = Home::get_storecountfive($id);
        $customer_details             = Home::get_customer_details();
        $review_comments              = Home::get_review_details();
        $get_store                    = Home::get_store_deatils($id);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('storeview')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_store_deal_by_id', $get_store_deal_by_id)->with('get_store_auction_by_id', $get_store_auction_by_id)->with('get_store_product_by_id', $get_store_product_by_id)->with('get_store_by_id', $get_store_by_id)->with('metadetails', $getmetadetails)->with('get_auction_last_bidder', $get_auction_last_bidder)->with('get_storebranch', $get_storebranch)->with('one_count', $one_count)->with('two_count', $two_count)->with('three_count', $three_count)->with('four_count', $four_count)->with('five_count', $five_count)->with('customer_details', $customer_details)->with('review_comments', $review_comments)->with('get_store', $get_store)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
        
    }
    
    public function sold()
    {
       $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_name_single          = "";
        $most_visited_product         = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $get_store_deal_by_id         = Home::get_sold_deal_by_id();
       
        $get_store_auction_by_id      = Home::get_sold_auction_by_id();
        $get_store_product_by_id      = Home::get_sold_product_by_id();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('sold')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_store_deal_by_id', $get_store_deal_by_id)->with('get_store_auction_by_id', $get_store_auction_by_id)->with('get_store_product_by_id', $get_store_product_by_id)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
        
    }
    
    public function category_list($id)
    {
        $id                   = base64_decode($id);
        $city_details         = Register::get_city_details();
        $header_category      = Home::get_header_category();
        $product_details      = Home::get_product_details_use_catid($id);
        $most_visited_product = Home::get_most_visited_product();
        $deals_details        = Home::get_deals_details_use_catid($id);
        
        $auction_details              = Home::get_auction_details_use_catid($id);
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $get_auction_last_bidder      = Home::auction_last_bidder($auction_details);
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
       
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('category_list')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('auction_details', $auction_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_auction_last_bidder', $get_auction_last_bidder)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }
    
    
    public function facebooklogin()
    {
        
        $fb_id = Input::get('fid');
       
        $data  = array(
            'cus_name' => Input::get('name'),
            'cus_email' => Input::get('email'),
            'facebook_id' => Input::get('fid'),
            'cus_logintype' => 3
        );
        return Home::facebook_login_check($fb_id, $data);
    }
    
    public function autosearch()
    {
        
        $q = $_GET['searchword'];
        if ($q != "") {
            $header_category              = Home::get_autosearch_category($q);
            $header_category_get          = Home::get_header_category();
            $category_count               = Home::get_category_count($header_category_get);
            $get_product_details_typeahed = Home::get_product_details_autosearch($q);
            $get_cat_out                  = "";
            $general                      = Home::get_general_settings();
            foreach ($header_category as $header_categ) {
                $count = $category_count[$header_categ->mc_id];
                $get_cat_out .= '<a href="' . url('category_list/' . base64_encode($header_categ->mc_id)) . '" style="cursor:pointer;" >' . $header_categ->mc_name . '</a>' . '(' . $count . ')' . '<br/>';
            }
            $final_typeahed_result_one = $get_cat_out;
            
            if ($get_product_details_typeahed) {
                $final_typeahed_result_three = '=== Special Products ===';
            } else {
                $final_typeahed_result_three = '';
            }
            $get_product_out = "";
            
            foreach ($get_product_details_typeahed as $product_typeahed) {
                if ($product_typeahed->pro_no_of_purchase < $product_typeahed->pro_qty) {
                    $pro_type_img = explode('/**/', $product_typeahed->pro_Img);
                    $href         = url('productview/' . $product_typeahed->pro_id);
                    $get_product_out .= '<div class="display_box" align="left"><table><tr><td><img src="' . url('') . '/assets/product/' . $pro_type_img[0] . '" alt="" height="100" width="70" ></td><td width="5"> </td><td><table><tr> <td>' . substr($product_typeahed->pro_title, 0, 25) . '...<br> $' . $product_typeahed->pro_disprice . '<br><a href="' . $href . '" class="btn align_brn icon_me" style="width:60px; height:50px;" href="">Add To Cart</a> </td> </tr> </table> </td></tr></table> </div>.............................................';
                }
            }
            
            $final_typeahed_result_two = $get_product_out;
            $final_result              = $final_typeahed_result_one . $final_typeahed_result_three . $final_typeahed_result_two;
            if ($final_result == "") {
                echo $final_typeahed_result = '<div class="display_box" align="left"> No Result Found.. </div>';
            } else {
                echo $final_typeahed_result = '<b><div class="display_box"  align="left">' . $final_typeahed_result_one . $final_typeahed_result_three . $final_typeahed_result_two . "</div></b>";
            }
        } else {
            echo "";
        }
        
    }

    public function cart()
    {
        $result_cart  = Home::get_add_to_cart_details();
        $size_result  = Home::get_add_to_cart_size();
        $color_result = Home::get_add_to_cart_color();
        if (isset($_SESSION['deal_cart'])) {
            $result_cart_deal = Home::get_add_to_cart_deal_details();
        } else {
            $result_cart_deal = "";
        }
        $country_details              = Register::get_country_details();
        $most_visited_product         = Home::get_most_visited_product();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $session_result               = '';
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails)->with('country_details', $country_details);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        
        return view('cart')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('most_visited_product', $most_visited_product)->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('session_result', $session_result)->with('page', "")->with('result_cart_deal', $result_cart_deal)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }

    public function add_to_cart()
    {
        
        $cart_id    = Input::get('addtocart_pro_id');
        $cart_qty   = Input::get('addtocart_qty');
        $cart_color = Input::get('addtocart_color');
        $cart_size  = Input::get('addtocart_size');
        $cart_type  = Input::get('addtocart_type');
        $return_url = Input::get('return_url');
        if ($cart_id < 1 or $cart_qty < 1)
            return;
        
        if (isset($_SESSION['cart'])) {
            
            $check_product = Home::get_added_product_details($cart_id, $cart_color, $cart_size);
            
            if ($check_product == 0) {
                $max                                 = count($_SESSION['cart']);
                $_SESSION['cart'][$max]['productid'] = $cart_id;
                $_SESSION['cart'][$max]['qty']       = $cart_qty;
                $_SESSION['cart'][$max]['color']     = $cart_color;
                $_SESSION['cart'][$max]['size']      = $cart_size;
                $_SESSION['cart'][$max]['type']      = $cart_type;
                $session_result                      = '';
            } else {
                $session_result = Home::get_already_product_details($cart_id);
            }
            
        } else {
            //session_start();
            $_SESSION['cart']                 = array();
            $_SESSION['cart'][0]['productid'] = $cart_id;
            $_SESSION['cart'][0]['qty']       = $cart_qty;
            $_SESSION['cart'][0]['color']     = $cart_color;
            $_SESSION['cart'][0]['size']      = $cart_size;
            $_SESSION['cart'][0]['type']      = $cart_type;
            $session_result                   = '';
            
        }
        
        
        if (isset($_SESSION['deal_cart'])) {
            $result_cart_deal = Home::get_add_to_cart_deal_details();
        } else {
            $result_cart_deal = "";
        }
        $result_cart = Home::get_add_to_cart_details();
        if ($cart_type == "product") {
            $size_result  = Home::get_add_to_cart_size();
            $color_result = Home::get_add_to_cart_color();
        } else {
            $size_result  = '';
            $color_result = '';
        }
        $country_details              = Register::get_country_details();
        $most_visited_product         = Home::get_most_visited_product();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('cart')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('most_visited_product', $most_visited_product)->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('session_result', $session_result)->with('page', "")->with('result_cart_deal', $result_cart_deal)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }

    public function remove_session_cart_data()
    {
      // session_start();
        $pid = intval($_GET['id']);

        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($pid == $_SESSION['cart'][$i]['productid']) {
                unset($_SESSION['cart'][$i]);
                break;
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    public function set_quantity_session_cart()
    {
        
        $pid = intval($_GET['pid']);
        $qty = intval($_GET['id']);
       // session_start();
        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($pid == $_SESSION['cart'][$i]['productid']) {
                $_SESSION['cart'][$i]['qty'] = $qty;
                break;
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
    
    public function remove_session_dealcart_data()
    {
        
        $pid = intval($_GET['id']);
        $max = count($_SESSION['deal_cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($pid == $_SESSION['deal_cart'][$i]['productid']) {
                unset($_SESSION['deal_cart'][$i]);
                break;
            }
        }
        $_SESSION['deal_cart'] = array_values($_SESSION['deal_cart']);
    }

    public function set_quantity_session_dealcart()
    {
        
        $pid = intval($_GET['pid']);
        $qty = intval($_GET['id']);
        $max = count($_SESSION['deal_cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($pid == $_SESSION['deal_cart'][$i]['productid']) {
                $_SESSION['deal_cart'][$i]['qty'] = $qty;
                break;
            }
        }
        $_SESSION['deal_cart'] = array_values($_SESSION['deal_cart']);
    }
    
    public function deal_cart()
    {
        $result_cart  = Home::get_add_to_cart_details();
        $size_result  = Home::get_add_to_cart_size();
        $color_result = Home::get_add_to_cart_color();
        if (isset($_SESSION['deal_cart'])) {
            $result_cart_deal = Home::get_add_to_cart_deal_details();
        } else {
            $result_cart_deal = "";
        }
        $country_details              = Register::get_country_details();
        $size_result                  = Home::get_add_to_cart_size();
        $color_result                 = Home::get_add_to_cart_color();
        $most_visited_product         = Home::get_most_visited_product();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $session_result               = '';
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        
        return view('cart')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('most_visited_product', $most_visited_product)->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('session_result', $session_result)->with('page', "deals")->with('result_cart_deal', $result_cart_deal)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }

    public function add_to_cart_deal()
    {
               
        $cart_id    = Input::get('addtocart_deal_id');
        $cart_qty   = Input::get('addtocart_qty');
        $cart_type  = Input::get('addtocart_type');
        $return_url = Input::get('return_url');
        if ($cart_id < 1 or $cart_qty < 1)
            return;
        
        if (isset($_SESSION['deal_cart'])) {
            
            $check_product = Home::get_added_deal_details($cart_id);
            
            if ($check_product == 0) {
                $max                                      = count($_SESSION['deal_cart']);
                $_SESSION['deal_cart'][$max]['productid'] = $cart_id;
                $_SESSION['deal_cart'][$max]['qty']       = $cart_qty;
                $_SESSION['deal_cart'][$max]['type']      = $cart_type;
                
                $session_result = '';
            } else {
                $session_result = Home::get_already_deals_details($cart_id);
            }
            
        } else {
            $_SESSION['deal_cart']                 = array();
            $_SESSION['deal_cart'][0]['productid'] = $cart_id;
            $_SESSION['deal_cart'][0]['qty']       = $cart_qty;
            $_SESSION['deal_cart'][0]['type']      = $cart_type;
            $session_result                        = '';
            
        }
        
        
        $result_cart_deal = Home::get_add_to_cart_deal_details();
        if (isset($_SESSION['cart'])) {
            $result_cart = Home::get_add_to_cart_details();
        } else {
            $result_cart = "";
        }
        $country_details              = Register::get_country_details();
        $size_result                  = Home::get_add_to_cart_size();
        $color_result                 = Home::get_add_to_cart_color();
        $most_visited_product         = Home::get_most_visited_product();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('cart')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('most_visited_product', $most_visited_product)->with('result_cart_deal', $result_cart_deal)->with('session_result', $session_result)->with('page', "deals")->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    
    public function checkout_auction()
    {
        $country_details              = Register::get_country_details();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_all_deals_details();
        $auction_details              = Home::get_all_action_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $get_image_favicons_details   = Home::get_image_favicons_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('checkout_auction')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('auction_details', $auction_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }

    public function checkout()
    {
        $country_details              = Register::get_country_details();
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $general                      = Home::get_general_settings();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_all_deals_details();
        $auction_details              = Home::get_all_action_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $get_meta_details             = Home::get_meta_details();
        $get_image_favicons_details   = Home::get_image_favicons_details();
        $get_image_logoicons_details  = Home::get_image_logoicons_details();
        $getlogodetails               = Home::getlogodetails();
        $getmetadetails               = Home::getmetadetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $cust_id                      = Session::get('customerid');
        //session_start();
        if (isset($_SESSION['cart'])) {
            $result_cart = Home::get_add_to_cart_details();
        } else {
            $result_cart = '';
        }
        $size_result           = Home::get_add_to_cart_size();
        $color_result          = Home::get_add_to_cart_color();
        $shipping_addr_details = Home::get_shipping_addr_details($cust_id);
        
        if (isset($_SESSION['deal_cart'])) {
            $result_cart_deal = Home::get_add_to_cart_deal_details();
        } else {
            $result_cart_deal = "";
        }
       
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl)->with('general', $general);
        
        $getmetadetails = Home::getmetadetails();
        return view('checkout')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('auction_details', $auction_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('get_meta_details', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('get_image_logoicons_details', $get_image_logoicons_details)->with('shipping_addr_details', $shipping_addr_details)->with('result_cart', $result_cart)->with('size_result', $size_result)->with('color_result', $color_result)->with('result_cart_deal', $result_cart_deal)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }

    public function check_estimate_zipcode()
    {
        $result = Home::get_estimate_zipcode_range($_GET['estimate_check_val']);
        if ($result) {
            foreach ($result as $estimate_result) {
            }
            echo $estimate_result->ez_code_days;
        } else {
            echo 0;
        }
    }

    public function payment_checkout_process()
    {
       // session_start();
        $cust_id  = Session::get('customerid');
        $pay_type = Input::get('select_payment_type');
        if ($pay_type == 1) {
            $settings = Home::get_settings();
            //print_r($settings);
            foreach ($settings as $s) {
            }
           
            if ($s->ps_paypal_pay_mode == '0') {
                $mode = 'sandbox';
            } elseif ($s->ps_paypal_pay_mode == '1') {
                $mode = 'live';
            }
            
            $PayPalMode         = $mode; // sandbox or live  
            $PayPalApiUsername  = $s->ps_paypalaccount;
            
            $PayPalApiPassword  = $s->ps_paypal_api_pw;
            
            $PayPalApiSignature = $s->ps_paypal_api_signature;

            $PayPalCurrencyCode = $s->ps_curcode;
            $PayPalReturnURL    = url('paypal_checkout_success'); //Point to process.php page
            $PayPalCancelURL    = url('paypal_checkout_cancel'); //Cancel URL if user clicks cancel
            require 'paypal/paypal.class.php';
            
            $paypalmode = ($PayPalMode == $mode) ? '.' . $mode : '';
            if ($_POST) //Post Data received from product list page.
                {
                //Other important variables like tax, shipping cost
                if (isset($_POST['tax_price']) && $_POST['tax_price'] != '') {
                    $TotalTaxAmount = $_POST['tax_price']; //Sum of tax for all items in this order. 
                } else {
                    $TotalTaxAmount = 0;
                }
                $HandalingCost   = 0.00; //Handling cost for this order.
                $InsuranceCost   = 0.00; //shipping insurance cost for this order.
                $ShippinDiscount = 0.00; //Shipping discount for this order. Specify this as negative number.
                if (isset($_POST['shipping_price']) && $_POST['shipping_price'] != '') {
                    $ShippinCost = $_POST['shipping_price']; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
                } else {
                    $ShippinCost = 0;
                }
                //we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
                //Please Note : People can manipulate hidden field amounts in form,
                //In practical world you must fetch actual price from database using item id. 
                //eg : $ItemPrice = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");
                $paypal_data    = '';
                $ItemTotalPrice = 0;
                $now            = date('Y-m-d h:i:sa');
                $insert_id      = '';
                foreach ($_POST['item_name'] as $key => $itmname) {
                    $product_code = filter_var($_POST['item_code'][$key], FILTER_SANITIZE_STRING);
                    
                    $paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $key . '=' . urlencode($_POST['item_name'][$key]);
                    $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $key . '=' . urlencode($_POST['item_code'][$key]);
                    $paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $key . '=' . urlencode($_POST['item_price'][$key]);
                    $paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $key . '=' . urlencode($_POST['item_qty'][$key]);
                    $paypal_data .= '&L_PAYMENTREQUEST_0_DESC' . $key . '=' . urlencode("Color : " . $_POST['item_color_name'][$key] . " - Size : " . $_POST['item_size_name'][$key]);
                    
                    
                    // item price X quantity
                  
                    $subtotal = ($_POST['item_price'][$key] * $_POST['item_qty'][$key]);
                     
                    //total price
                    $ItemTotalPrice = $ItemTotalPrice + $subtotal;
                    
                    //create items for session
                    $paypal_product['items'][] = array(
                        'itm_name' => $_POST['item_name'][$key],
                        'itm_price' => $_POST['item_price'][$key],
                        'itm_code' => $_POST['item_code'][$key],
                        'itm_qty' => $_POST['item_qty'][$key]
                        
                    );
                    $shipaddresscus = Input::get('fname') . ',' . Input::get('addr_line') . ',' . Input::get('addr1_line') . ',' . Input::get('state') . ',' . Input::get('zipcode' ) . ',' . Input::get('phone1_line') . ',' . Input::get('email');

                    // $shipaddresscus            = Input::get('fname' . $key) . ',' . Input::get('addr_line' . $key) . ',' . Input::get('addr1_line' . $key) . ',' . Input::get('state' . $key) . ',' . Input::get('zipcode' . $key) . ',' . Input::get('phone1_line' . $key);
                    //print_r($shipaddresscus);
                    //exit();
                    $data                      = array(
                        'order_cus_id' => Session::get('customerid'),
                        'order_pro_id' => $_POST['item_code'][$key],
                        'order_type' => $_POST['item_type'][$key],
                        'order_qty' => $_POST['item_qty'][$key],
                        'order_amt' => $subtotal,
                        'order_tax' => $_POST['item_tax'][$key],
                        'order_date' => $now,
                        'order_status' => 3,
                        'order_paytype' => 'paypal',
                        'order_pro_color' => $_POST['item_color'][$key],
                        'order_pro_size' => $_POST['item_size'][$key],
                        'order_shipping_add' => $shipaddresscus
                    );
                    
                    if (($_POST['item_type'][$key]) != 2) {
                        Home::purchased_checkout_product_insert($_POST['item_code'][$key]);
                    }
                    Home::paypal_checkout_insert($data);
                    $new_insert = DB::getPdo()->lastInsertId();
                    $insert_id .= DB::getPdo()->lastInsertId() . ',';
                    if (Input::get('load_ship' . $key) != 1) {
                          $data = array(
                            'ship_name' => Input::get('fname'),
                            'ship_address1' => Input::get('addr_line'),
                            'ship_address2' => Input::get('addr1_line'),
                            'ship_state' => Input::get('state'),
                            'ship_postalcode' => Input::get('zipcode'),
                            'ship_phone' => Input::get('phone1_line'),
                            'ship_email' => Input::get('email'),
                            'ship_cus_id' => $cust_id,
                            'ship_order_id' => $new_insert
                        );
                        
                        Home::insert_shipping_addr($data, $cust_id);
                    }
                    
                }
               
                Session::put('last_insert_id', trim($insert_id, ','));
                //Grand total including all tax, insurance, shipping cost and discount
                $GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);
                
                
                $paypal_product['assets'] = array(
                    'tax_total' => $TotalTaxAmount,
                    'handaling_cost' => $HandalingCost,
                    'insurance_cost' => $InsuranceCost,
                    'shippin_discount' => $ShippinDiscount,
                    'shippin_cost' => $ShippinCost,
                    'grand_total' => $GrandTotal
                );
                
                //create session array for later use
                $_SESSION["paypal_products"] = $paypal_product;
                
                
                //Parameters for SetExpressCheckout, which will be sent to PayPal
                $padata = '&METHOD=SetExpressCheckout' . '&RETURNURL=' . urlencode($PayPalReturnURL) . '&CANCELURL=' . urlencode($PayPalCancelURL) . '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") . $paypal_data . '&NOSHIPPING=0' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping
                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) . '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) . '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) . '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($HandalingCost) . '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($ShippinDiscount) . '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($InsuranceCost) . '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) . '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode) . '&LOCALECODE=EN' . //PayPal pages to match the language on your website.
                    
                //'&LOGOIMG=http://www.sanwebe.com/wp-content/themes/sanwebe/img/logo.png'. //site logo
                    '&CARTBORDERCOLOR=FFFFFF' . //border color of cart
                    '&ALLOWNOTE=1';
                
                //We need to execute the "SetExpressCheckOut" method to obtain paypal token
                $paypal               = new MyPayPal();
                $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
                
                //print_r($httpParsedResponseAr["ACK"]); exit();
                //Respond according to message we receive from Paypal
                if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                    //Redirect user to PayPal store with Token received.
                    
                    $paypalurl = 'https://www' . $paypalmode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
                    //header('Location: '.$paypalurl);
                    echo '<script>window.location="' . $paypalurl . '"</script>';
                } else {
                    //Show error message
                    return Redirect::to('index');
                }
            }
        } else {
            $now            = date('Y-m-d h:i:sa');
            $insert_id      = '';
            $ItemTotalPrice = 0;
            $transaction_id = str_random(8);
            $trans_check    = Home::trans_check($transaction_id);
            
            if ($trans_check) {
                $transaction_id = str_random(8);
            }
            foreach ($_POST['item_name'] as $key => $itmname) {
                $product_code = $_POST['item_code'][$key];
                
                $subtotal       = ($_POST['item_price'][$key] * $_POST['item_qty'][$key]);
                //total price
                $ItemTotalPrice = $ItemTotalPrice + $subtotal;
            
                $shipaddresscus = Input::get('fname') . ',' . Input::get('addr_line') . ',' . Input::get('addr1_line') . ',' . Input::get('state') . ',' . Input::get('zipcode' ) . ',' . Input::get('phone1_line') . ',' . Input::get('email');

                $data           = array(
                    'cod_cus_id' => Session::get('customerid'),
                    'cod_order_type' => $_POST['item_type'][$key],
                    'cod_transaction_id' => $transaction_id,
                    'cod_pro_id' => $product_code,
                    'cod_qty' => $_POST['item_qty'][$key],
                    'cod_amt' => $subtotal,
                    'cod_tax' => $_POST['item_tax'][$key],
                    'cod_date' => $now,
                    'cod_status' => 3,
                    'cod_paytype' => 'COD',
                    
                    'cod_pro_color' => $_POST['item_color'][$key],
                    'cod_pro_size' => $_POST['item_size'][$key],
                    'cod_ship_addr' => $shipaddresscus
            );
                
                
                if (($_POST['item_type'][$key]) != 2) {
                    Home::purchased_checkout_product_insert($_POST['item_code'][$key]);
                }
                Home::cod_checkout_insert($data);
                $new_insert = DB::getPdo()->lastInsertId();
                $insert_id .= DB::getPdo()->lastInsertId() . ',';
                if (Input::get('load_ship' . $key) != 1) {
                    $data_ship = array(
                        'ship_name' => Input::get('fname'),
                        'ship_address1' => Input::get('addr_line'),
                        'ship_address2' => Input::get('addr1_line'),
                        'ship_state' => Input::get('state'),
                        'ship_postalcode' => Input::get('zipcode'),
                        'ship_phone' => Input::get('phone1_line'),
                        'ship_cus_id' => $cust_id,
                        'ship_order_id' => $new_insert,
                        'ship_email' => Input::get('email')
                    );
                    
                    Home::insert_shipping_addr($data_ship, $cust_id);
                }
               
                
            }
            Session::put('last_insert_id', trim($insert_id, ','));
            
            unset($_SESSION['cart']);
            unset($_SESSION['deal_cart']);
            Session::flash('payment_success', 'Your Cod Payment is Success');
            include('SMTP/sendmail.php');
            $emailsubject = "Your COD  Successfully Registered.....";
            $subject      = "COD Acknowledgement.....";
            $name         = Session::get('username');
            $transid      = $transaction_id;
            $shipaddress  = $shipaddresscus;
            $address      = "";
            
            $resultmail   = "success";
            ob_start();
            include('Emailsub/paymentcod.php');
            $body = ob_get_contents();
            ob_clean();
            Send_Mail($address, $subject, $body);

            $trans = Session::get('last_insert_id');
            $trans_id = Home::transaction_id($trans);
            $get_subtotal                = Home::get_subtotal($trans_id);
            $get_tax                     = Home::get_tax($trans_id);
            $get_shipping_amount         = Home::get_shipping_amount($trans_id);
            
            $currenttransactionorderid   = base64_encode($trans_id);

            //$currenttransactionorderid = base64_encode(Session::get('last_insert_id'));
            
           
            $value = DB::table('nm_product')->where('pro_id', '=', $data['cod_pro_id'])->first();
            
            $merchant_details = DB::table('nm_product')->join('nm_merchant', 'nm_product.pro_mr_id', '=', 'nm_merchant.mer_id')->where('pro_id', '=', $data['cod_pro_id'])->first();
            
            //Customer Mail after order complete
            Mail::send('emails.ordermail', array(
                'customer_name' => $name,
                'transaction_id' => $transid,
                'Sub_total' =>  $get_subtotal,
                'Tax' =>  $get_tax,
                'Shipping_amount' =>  $get_shipping_amount,
                'qty' => $data['cod_qty'],
                'item_price' => $subtotal,
                'address1' => $data['cod_ship_addr'],
                'product_name' => $value->pro_title
            ), function($message) use ($data)
            {

                $customer_mail = $data['cod_ship_addr'];
                
                $allpas        = explode(",", $customer_mail);
                $cus_mail      = $allpas[6];
				//echo $allpas[6];
                $message->to($cus_mail)->subject('Your Order Confirmation Details Placed Successfully');
            });
            
            
            
            //Merchant Mail after order complete
            $merchant_trans_id = Home::get_merchant_based_transaction_id($trans_id);
            if(isset($merchant_trans_id) && $merchant_trans_id != "") {
                foreach($merchant_trans_id as $mer=>$m) {
                    $merchant_id = $m->cod_merchant_id;
                    $get_mer_subtotal = Home::get_mer_subtotal($trans_id,$merchant_id);
                    $get_mer_tax = Home::get_mer_tax($trans_id,$merchant_id);
                    $get_mer_shipping_amount = Home::get_mer_shipping_amount($trans_id,$merchant_id);
                    Mail::send('emails.order-merchantmail', array(
                        'transaction_id' => $trans_id,
                        'Sub_total' =>  $get_mer_subtotal,
                        'Tax' =>  $get_mer_tax,
                        'Shipping_amount' =>  $get_mer_shipping_amount,'merchant_id' => $merchant_id), function($message) use ($data)
                    {
                         if (isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])) {
                             $merchant = DB::table('nm_deals')->where('deal_id', '=', $data['cod_pro_id'])->LeftJoin('nm_merchant', 'nm_merchant.mer_id', '=', 'nm_deals.deal_merchant_id')->first();
                            $merchant_mail = $merchant->mer_email;
                         }
                         if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                             $merchant = DB::table('nm_product')->where('pro_id', '=', $data['cod_pro_id'])->LeftJoin('nm_merchant', 'nm_merchant.mer_id', '=', 'nm_product.pro_mr_id')->first();
                            $merchant_mail = $merchant->mer_email;
                            echo $merchant_mail;
                         }
                        
                        $message->to('kailashkumar.r@pofitec.com')->subject('Hi Merchant! Your Product Purchased!!');
                    });
                }
            }
            unset($_SESSION['cart']);
            unset($_SESSION['deal_cart']);
            
            
            return Redirect::to('show_payment_result_cod' . '/' . $currenttransactionorderid)->with('result', $data);
            
        }
    }

    public function paypal_checkout_success()
    {
        $set = Home::get_settings();
        foreach ($set as $se) {
        }
        if ($se->ps_paypal_pay_mode == '0') {
            $mode = 'sandbox';
        } elseif ($se->ps_paypal_pay_mode == '1') {
            $mode = 'live';
        }
        //session_start();
        $PayPalMode         = $mode; // sandbox or live
        $PayPalApiUsername  = $se->ps_paypalaccount;
        
        $PayPalApiPassword  = $se->ps_paypal_api_pw;
        
        $PayPalApiSignature = $se->ps_paypal_api_signature;
       
        $PayPalCurrencyCode = $se->ps_curcode; //Paypal Currency Code
        $PayPalReturnURL    = url('paypal_checkout_success'); //Point to process.php page
        $PayPalCancelURL    = url('paypal_checkout_cancel'); //Cancel URL if user clicks cancel
        require 'paypal/paypal.class.php';
        if (isset($_GET["token"]) && isset($_GET["PayerID"])) {
            //we will be using these two variables to execute the "DoExpressCheckoutPayment"
            //Note: we haven't received any payment yet.
            
            $token    = $_GET["token"];
            $payer_id = $_GET["PayerID"];
            
            //get session variables
            $paypal_product = $_SESSION["paypal_products"];
            $paypal_data    = '';
            $ItemTotalPrice = 0;
            
            foreach ($paypal_product['items'] as $key => $p_item) {
                $paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $key . '=' . urlencode($p_item['itm_qty']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $key . '=' . urlencode($p_item['itm_price']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $key . '=' . urlencode($p_item['itm_name']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $key . '=' . urlencode($p_item['itm_code']);
                
                // item price X quantity
                $subtotal = ($p_item['itm_price'] * $p_item['itm_qty']);
                
                //total price
                $ItemTotalPrice = ($ItemTotalPrice + $subtotal);
            }
            
            $padata = '&TOKEN=' . urlencode($token) . '&PAYERID=' . urlencode($payer_id) . '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") . $paypal_data . '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) . '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($paypal_product['assets']['tax_total']) . '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($paypal_product['assets']['shippin_cost']) . '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($paypal_product['assets']['handaling_cost']) . '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($paypal_product['assets']['shippin_discount']) . '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($paypal_product['assets']['insurance_cost']) . '&PAYMENTREQUEST_0_AMT=' . urlencode($paypal_product['assets']['grand_total']) . '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode);
            
            //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
            $paypal               = new MyPayPal();
            $httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
            
            //Check if everything went ok..
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                
                echo '<h2>Success</h2>';
                echo 'Your Transaction ID : ' . urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
                
                /*
                //Sometimes Payment are kept pending even when transaction is complete. 
                //hence we need to notify user about it and ask him manually approve the transiction
                */
                
                if ('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
                    
                } elseif ('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                   
                }
                
                // we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
                // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
                $padata               = '&TOKEN=' . urlencode($token);
                $paypal               = new MyPayPal();
                $httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
                
                
                if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                    $data = array(
                        'transaction_id' => urldecode($httpParsedResponseAr['PAYMENTREQUEST_0_TRANSACTIONID']),
                        'token_id' => urldecode($httpParsedResponseAr['TOKEN']),
                        'payer_email' => urldecode($httpParsedResponseAr['EMAIL']),
                        'payer_id' => urldecode($httpParsedResponseAr['PAYERID']),
                        'payer_name' => urldecode($httpParsedResponseAr['FIRSTNAME']),
                        'currency_code' => urldecode($httpParsedResponseAr['PAYMENTREQUEST_0_CURRENCYCODE']),
                        'payment_ack' => urldecode($httpParsedResponseAr['ACK']),
                        'payer_status' => urldecode($httpParsedResponseAr['PAYERSTATUS']),
                        'order_status' => 1,
                        'order_paytype' => 1
                    );
                    Home::paypal_checkout_update($data, Session::get('last_insert_id'));
                    unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);
                    Session::flash('payment_success', 'Your Payment Has Been Completed Successfully');
                    include('SMTP/sendmail.php');
                    $emailsubject = "Your Payment Successfully completed.....";
                    $subject      = "Payment Acknowledgement.....";
                    $name         = $data['payer_name'];
                    $transid      = $data['transaction_id'];
                    $payid        = $data['payer_id'];
                    $ack          = $data['payment_ack'];
                    $address      = "yamuna@nexplocindia.com";
                    
                    $resultmail   = "success";
                    ob_start();
                    include('Emailsub/paymentemail.php');
                    $body = ob_get_contents();
                    ob_clean();
                    Send_Mail($address, $subject, $body);
                    $currenttransactionorderid = base64_encode(Session::get('last_insert_id'));
                    return Redirect::to('show_payment_result' . '/' . $currenttransactionorderid)->with('result', $data);
                } else {
                    unset($_SESSION['cart']);
                    unset($_SESSION['deal_cart']);
                    Session::flash('payment_failed', 'Your Payment Has Been Failed');
                    $currenttransactionorderid = base64_encode(0);
                    return Redirect::to('show_payment_result' . '/' . $currenttransactionorderid)->with('fail', "fail");
                    
                }
                
            } else {
                unset($_SESSION['cart']);
                unset($_SESSION['deal_cart']);
                Session::flash('payment_error', 'Some error Occured during Payment');
                return Redirect::to('index');
            }
        }
    }

    public function paypal_checkout_cancel()
    {
        unset($_SESSION['cart']);
        unset($_SESSION['deal_cart']);
        Session::flash('payment_cancel', 'Your Payment Has Been Cancelled');
        return Redirect::to('index');
        
    }
    
    public function bid_payment()
    {
        $bid_price  = Input::get('bid_update_value');
        $bid_auc_id = Input::get('auction_bid_proid_popup');
        $return_url = Input::get('return_url');
        if (Session::get('customerid')) {
            $customerid = Session::get('customerid');
        } else {
            $customerid = 0;
        }
        $customerdetails             = Customerprofile::get_customer_details($customerid);
        $get_social_media_url        = Home::get_social_media_url();
        $cms_page_title              = Home::get_cms_page_title();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_acution_details         = Home::get_action_details_by_id($bid_auc_id);
        $getlogodetails              = Home::getlogodetails();
        $getmetadetails              = Home::getmetadetails();
        $get_contact_det             = Footer::get_contact_details();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $footer                      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('bid_payment')->with('footer', $footer)->with('get_image_logoicons_details', $get_image_logoicons_details)->with('get_acution_details', $get_acution_details)->with('price', $bid_price)->with('customerdetails', $customerdetails)->with('return_url', $return_url)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }

    public function place_bid_payment()
    {
        
        $bid_price        = Input::get('bid_amt');
        $bid_auc_id       = Input::get('auction_bid_proid_popup');
        $bid_auc_shipping = Input::get('bid_shipping');
        $return_url       = Input::get('return_url');
        $entry            = array(
            'oa_pro_id' => Input::get('oa_pro_id'),
            'oa_cus_id' => Input::get('oa_cus_id'),
            'oa_cus_name' => Input::get('oa_cus_name'),
            'oa_cus_email' => Input::get('oa_cus_email'),
            'oa_cus_address' => Input::get('oa_cus_address'),
            'oa_bid_amt' => Input::get('oa_bid_amt'),
            'oa_bid_shipping_amt' => Input::get('bid_shipping'),
            'oa_original_bit_amt' => Input::get('oa_original_bit_amt')
        );
        
        Home::save_bidding_details($entry);
        $get_social_media_url        = Home::get_social_media_url();
        $cms_page_title              = Home::get_cms_page_title();
        $get_image_logoicons_details = Home::get_image_logoicons_details();
        $get_acution_details         = Home::get_action_details_by_id($bid_auc_id);
        $getlogodetails              = Home::getlogodetails();
        $getmetadetails              = Home::getmetadetails();
        $get_contact_det             = Footer::get_contact_details();
        $getanl                      = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        $footer                      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('getanl', $getanl);
        
        return view('place_bid_payment')->with('footer', $footer)->with('get_image_logoicons_details', $get_image_logoicons_details)->with('get_acution_details', $get_acution_details)->with('price', $bid_price)->with('return_url', $return_url)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
        
    }
    
    public function bid_payment_error()
    {
        return Redirect::to('index')->with('error', ' Error!  Already Auction has bid. Try with new amount!');
    }

    public function show_payment_result_cod($orderid)
    {
        $cust_id = Session::get('customerid');
        
        $converorderid = base64_decode($orderid);
        
        $getorderdetails              = Home::getordercoddetails($converorderid);
        $get_subtotal                 = Home::get_subtotal($converorderid);
        $get_tax                      = Home::get_tax($converorderid);
        $get_shipping_amount          = Home::get_shipping_amount($converorderid);
        //common
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
       
        $most_visited_product         = Home::get_most_visited_product();
        	
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
       $general                      = Home::get_general_settings();
        
        $country_details = Register::get_country_details();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
       
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('paymentresultcod')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('metadetails', $getmetadetails)->with('orderdetails', $getorderdetails)->with('get_contact_det', $get_contact_det)->with('get_subtotal', $get_subtotal)->with('get_tax', $get_tax)->with('get_shipping_amount', $get_shipping_amount)->with('general',$general);
    }
    
    public function show_payment_result($orderid)
    {
        $cust_id = Session::get('customerid');
        
        $converorderid = base64_decode($orderid);
        
        $getorderdetails = Home::getorderdetails($converorderid);
        
        //common
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        
        $most_visited_product         = Home::get_most_visited_product();
       	
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
      
        $get_contact_det              = Footer::get_contact_details();
        $country_details              = Register::get_country_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
      
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('paymentresult')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('get_meta_details', $getmetadetails)->with('orderdetails', $getorderdetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }
    
    public function search()
    {
        $q = Input::get('q');
        
        $searchTerms = explode(' ', $q);
        $id          = $q;

        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
        $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $searchTerms                  = Home::get_product_search($id);
        $searchTermss                 = Home::get_deal_search($id);
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
       
        $header = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        
        return view('search')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('product_details', $product_details)->with('deals_details', $deals_details)->with('auction_details', $auction_details)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('addetails', $addetails)->with('noimagedetails', $noimagedetails)->with('bannerimagedetails', $getbannerimagedetails)->with('metadetails', $getmetadetails)->with('searchTerms', $searchTerms)->with('searchTermss', $searchTermss)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }

    public function register()
    {
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
        $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
        
        $header         = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer         = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $country_return = Merchant::get_country_detail();
        return view('register')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('country_details', $country_return)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }

    public function register_submit()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        
        $cemail      = Input::get('email');
        $check_email = Register::check_email_ajax($cemail);
        if ($check_email) {
            return Redirect::to('registers')->with('mail_exist', 'Already Use Email Exist')->withInput();
        } else {
            
            $cname = Input::get('customername');
            
            $cemail = Input::get('email');
            
            $cpwd      = Input::get('pwd');
            $cus_phone = Input::get('mobile');
            $pwd       = md5($cpwd);
            
            $city = Input::get('select_city');
            
            $country = Input::get('select_country');
            
            
            Mail::send('emails.registermail', array(
                'first_name' => Input::get('email'),
                'cus_name' => Input::get('customername'),
                'password' => $cpwd
            ), function($message)
            {
                $message->to(Input::get('email'))->subject('Register Account Created Successfully');
            });
            
            $address = Input::get('email');
            
            
            $entry = array(
                'cus_name' => Input::get('customername'),
                
                'cus_email' => Input::get('email'),
                
                'cus_pwd' => $pwd,
                'cus_phone' => Input::get('mobile'),
                'cus_country' => Input::get('select_country'),
                
                'cus_city' => Input::get('select_city'),
                
                'cus_logintype' => 2
                
            );
            
            $customerid = Register::insert_customer($entry);
            
            
            
            $entry_shipping = array(
                
                'ship_name' => Input::get('customername'),
                
                'ship_ci_id' => Input::get('select_city'),
                
                'ship_country' => Input::get('select_country'),
                
                'ship_cus_id' => $customerid
                
            );
            
            Register::insert_customer_shipping($entry_shipping);
            
        }
      return Redirect::to('registers')->with('success', 'Registered Successfully');
        
    }

    public function newsletter()
    {
        
        $city_details                 = Register::get_city_details();
        $header_category              = Home::get_header_category();
        $product_details              = Home::get_product_details();
        $most_visited_product         = Home::get_most_visited_product();
        $deals_details                = Home::get_deals_details();
        $auction_details              = Home::get_auction_details();
        $get_product_details_by_cat   = Home::get_product_details_by_category($header_category);
        $category_count               = Home::get_category_count($header_category);
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $main_category                = Home::get_header_category();
        $sub_main_category            = Home::get_sub_main_category($main_category);
        $second_main_category         = Home::get_second_main_category($main_category, $sub_main_category);
        $second_sub_main_category     = Home::get_second_sub_main_category();
        $get_social_media_url         = Home::get_social_media_url();
        $cms_page_title               = Home::get_cms_page_title();
        $country_details              = Register::get_country_details();
        $addetails                    = Home::get_ad_details();
        $noimagedetails               = Home::get_noimage_details();
        $getbannerimagedetails        = Home::getbannerimagedetails();
        $getmetadetails               = Home::getmetadetails();
        $getlogodetails               = Home::getlogodetails();
        $get_contact_det              = Footer::get_contact_details();
        $getanl                       = Settings::social_media_settings();
        $general                      = Home::get_general_settings();
        if (Session::has('customerid')) {
            $navbar = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        } else {
            $navbar = view('includes.navbar')->with('country_details', $country_details)->with('metadetails', $getmetadetails)->with('general', $general);
        }
       
        $header         = view('includes.header')->with('header_category', $header_category)->with('logodetails', $getlogodetails);
        $footer         = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
        $country_return = Merchant::get_country_detail();
        return view('newsletter')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('header_category', $header_category)->with('get_product_details_by_cat', $get_product_details_by_cat)->with('most_visited_product', $most_visited_product)->with('category_count', $category_count)->with('get_product_details_typeahed', $get_product_details_typeahed)->with('main_category', $main_category)->with('sub_main_category', $sub_main_category)->with('second_main_category', $second_main_category)->with('second_sub_main_category', $second_sub_main_category)->with('country_details', $country_return)->with('metadetails', $getmetadetails)->with('get_contact_det', $get_contact_det)->with('general', $general);
    }

    public function subscription_submit()
    {
        $data = Input::except(array(
            '_token'
        ));
        
        $email       = Input::get('email');
        $check_email = Register::check_email_ajaxs($email);
        if ($check_email) {
            return Redirect::to('newsletter')->with('Error_letter', 'Already Use Email Exist');
        } else {
            $email = Input::get('email');
            Mail::send('emails.subscription_mail', array(
                'email' => Input::get('email')
            ), function($message)
            {
                $message->to(Input::get('email'))->subject('Email Has Been Subscription Successfully');
            });
            $entry = array(
                
                'email' => Input::get('email')
            );
            $email = Register::insert_email($entry);
        }
        return Redirect::to('newsletter')->with('subscribe', 'Your Email Subscribed Successfully');
    }

    public function compare()
    {
        return view('compare');
    }

    public function addtowish()
    {
        $data = Input::except(array(
            '_token'
        ));
        
        $pro_id                       = Input::get('pro_id');
        $cus_id                       = Input::get('cus_id');
        $get_product_details_typeahed = Home::get_product_details_typeahed();
        $entry                        = array(
            
            'ws_pro_id' => Input::get('pro_id'),
            'ws_cus_id' => Input::get('cus_id')
        );
        $wish                         = Register::insert_wish($entry);
        return Redirect::to('user_profile')->with('wish', 'Product Added in Your Wishlist');
        
    }

    public function productcomments()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        
        $customer_id = Input::get('customer_id');
        
        $product_id = Input::get('product_id');
        $title      = Input::get('title');
        $comments   = Input::get('comments');
        $ratings    = Input::get('ratings');
      
        $entry = array(
         'customer_id' => Input::get('customer_id'),
            
            'product_id' => Input::get('product_id'),
            'title' => Input::get('title'),
            'comments' => Input::get('comments'),
            'ratings' => Input::get('ratings')
        );
        
        $comments = Home::comment_insert($entry);
        
        return Redirect::to('products')->with('success1', 'Your Product Review Post Successfully');
        
    }

    public function dealcomments()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        
        $customer_id = Input::get('customer_id');
        
        $deal_id  = Input::get('deal_id');
        $title    = Input::get('title');
        $comments = Input::get('comments');
        $ratings  = Input::get('ratings');
        
        $entry = array(
          'customer_id' => Input::get('customer_id'),
            
            'deal_id' => Input::get('deal_id'),
            'title' => Input::get('title'),
            'comments' => Input::get('comments'),
            'ratings' => Input::get('ratings')
        );
        
        $comments = Home::comment_insert($entry);
        
        return Redirect::to('deals')->with('success1', 'Your Deal Product Review Post Successfully');
        
    }

    public function storecomments()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        
        $customer_id = Input::get('customer_id');
        
        $store_id = Input::get('store_id');
        $title    = Input::get('title');
        $comments = Input::get('comments');
        $ratings  = Input::get('ratings');
        $entry = array(
        'customer_id' => Input::get('customer_id'),
            
            'store_id' => Input::get('store_id'),
            'title' => Input::get('title'),
            'comments' => Input::get('comments'),
            'ratings' => Input::get('ratings')
        );
        
        $comments = Home::comment_insert($entry);
        
        return Redirect::to('stores')->with('success_store', 'Your Deal Store Review Post Successfully');
        
    }

    public function smtp_mail_settings()
    {
        
        $smtp_mail = Home::get_smtp_mail();
        
        return view('app/config/mail')->with('smtp_mail', $smtp_mail);
    }
    
    
}
