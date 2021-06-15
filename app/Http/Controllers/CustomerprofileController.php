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
use App\Userlogin;
use App\Customerprofile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class CustomerprofileController extends Controller
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
    
    public function get_userprofile()
    {
        if (Session::has('customerid')) {
            
            $customerid          = Session::get('customerid');
			$facebook_id          = Session::get('facebook_id');
            $get_category_header = Home::get_category_header();
            $product_details     = Home::get_product_details();
            $customerdetails     = Customerprofile::get_customer_details($customerid);
            
            $general = Customerprofile::get_general_settings();
            $wishlistdetails = Customerprofile::get_wishlistdetails($customerid);
            $wishlistcnt     = Customerprofile::get_wishlistdetailscnt($customerid);
            $bidhistory      = Customerprofile::get_bidhistory($customerid);
            $bidhistorycnt   = Customerprofile::get_bidhistorycnt($customerid);
            
            $checkcustomership = Customerprofile::get_customer_shipping_details($customerid,$facebook_id);
            
            $city_details                = Register::get_city_details();
            $header_category             = Home::get_header_category();
            $country_details             = Register::get_country_details();
            
            $getproductordersdetails     = Customerprofile::getproductordersdetails($customerid);
            $getproductordersdetailss    = Customerprofile::getproductordersdetailss($customerid);
            $cms_page_title              = Home::get_cms_page_title();
            $get_social_media_url        = Footer::get_social_media_url();
            $get_meta_details            = Home::get_meta_details();
            $navbar                      = view('includes.loginnavbar')->with('country_details', $country_details)->with('metadetails', $get_meta_details)->with('general', $general);
            $get_image_favicons_details  = Home::get_image_favicons_details();
            $get_image_logoicons_details = Home::get_image_logoicons_details();
            $getlogodetails              = Home::getlogodetails();
            $get_contact_det             = Footer::get_contact_details();
            $getanl                      = Settings::social_media_settings();

            $header                      = view('includes.header')->with('header_category', $header_category)->with('product_name', '')->with('get_image_logoicons_details', $get_image_logoicons_details)->with('logodetails', $getlogodetails);
            $footer                      = view('includes.footer')->with('cms_page_title', $cms_page_title)->with('get_social_media_url', $get_social_media_url)->with('get_contact_det', $get_contact_det)->with('getanl', $getanl);
            $shippingdetails             = Customerprofile::get_shipping_details($customerid);
            if ($checkcustomership) {
                
                    
                return view('customer_profile')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('customerdetails', $customerdetails)->with('city_details', $city_details)->with('country_details', $country_details)->with('shippingdetails', $shippingdetails)->with('hasship', 1)->with('getproductordersdetails', $getproductordersdetails)->with('getproductordersdetailss', $getproductordersdetailss)->with('metadetails', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('wishlistdetails', $wishlistdetails)->with('wishlistcnt', $wishlistcnt)->with('bidhistory', $bidhistory)->with('bidhistorycnt', $bidhistorycnt)->with('product_details', $product_details)->with('get_contact_det', $get_contact_det)->with('general', $general);
            } else {
                
                return view('customer_profile')->with('navbar', $navbar)->with('header', $header)->with('footer', $footer)->with('customerdetails', $customerdetails)->with('country_details', $country_details)->with('shippingdetails', $shippingdetails)->with('hasship', 0)->with('getproductordersdetails', $getproductordersdetails)->with('metadetails', $get_meta_details)->with('get_image_favicons_details', $get_image_favicons_details)->with('wishlistdetails', $wishlistdetails)->with('wishlistcnt', $wishlistcnt)->with('bidhistory', $bidhistory)->with('bidhistorycnt', $bidhistorycnt)->with('product_details', $product_details)->with('get_contact_det', $get_contact_det)->with('general', $general);
            }
        }
        
        else {
            return Redirect::to('/');
        }
        
    }
        
    public function update_username_ajax()
    {
        $customerid  = Session::get('customerid');
        $cname       = $_GET['cname'];
        $checkinsert = Customerprofile::update_customer_name($cname, $customerid);
        if ($checkinsert) {
            echo "success," . $cname;
        } else {
            echo "fail,";
        }
    }

    public function update_phonenumber_ajax()
    {
        $customerid  = Session::get('customerid');
        $phonenum    = $_GET['phonenum'];
        $checkupdate = Customerprofile::update_phonenumber($phonenum, $customerid);
        if ($checkupdate) {
            echo "success," . $phonenum;
        } else {
            echo "fail,";
        }
    }

    public function update_city_ajax()
    {
        $customerid = Session::get('customerid');
        $cityid     = $_GET['cityid'];
        $countryid  = $_GET['countryid'];
        
        $citynameres    = Customerprofile::getcityname($cityid);
        $cityname       = $citynameres[0]->ci_name;
        $countrynameres = Customerprofile::getcountryname($countryid);
        $countryname    = $countrynameres[0]->co_name;
        $checkupdate    = Customerprofile::update_city($cityid, $countryid, $customerid);
        if ($checkupdate) {
            echo "success," . $countryname . "," . $cityname;
        } else {
            echo "fail,";
        }
    }
    
    public function update_shipping_ajax()
    {
        
        $customerid    = Session::get('customerid');
        $shipcus       = $_GET['shipcus'];
        $shipaddr1     = $_GET['shipaddr1'];
        $shipaddr2     = $_GET['shipaddr2'];
        $shipcusmobile = $_GET['shipcusmobile'];
        $shipcusemail  = $_GET['shipcusemail'];
        $shippingstate = $_GET['shippingstate'];
        $zipcode       = $_GET['zipcode'];
        $cityid        = $_GET['shippingcity'];
        $countryid     = $_GET['shippingcountry'];
        $entry         = array(
            'ship_name' => $shipcus,
            'ship_address1' => $shipaddr1,
            'ship_address2' => $shipaddr2,
            'ship_ci_id' => $cityid,
            'ship_state' => $shippingstate,
            'ship_country' => $countryid,
            'ship_postalcode' => $zipcode,
            'ship_ phone' => $shipcusmobile,
            'ship_email' => $shipcusemail,
            'ship_order_id' => 0,
            'ship_cus_id' => $customerid
        );
        
        $checkcustomerid = Customerprofile::get_customer_shipping_details($customerid);
        
        if ($checkcustomerid) {
            
            $return = Customerprofile::update_shipping($shipcus, $shipaddr1, $shipaddr2, $shipcusmobile, $shipcusemail, $shippingstate, $zipcode, $cityid, $countryid, $customerid);
            
                   
            if ($return) {
                
                echo "success";
            } else {
                echo "fail";
            }
        } else {
            
            $return = Customerprofile::insert_shipping($shipcus, $shipaddr1, $shipaddr2, $shipcusmobile, $shipcusemail, $shippingstate, $zipcode, $cityid, $countryid, $customerid);
            
            if ($return) {
                echo "success";
            } else {
                echo "fail";
            }
            
            
            
        }
        
    }
    
    public function register_getcity_shipping()
    {
        $cityid    = $_GET['id'];
        $city_ajax = Merchant::get_city_detail_ajax_shipping($cityid);
        if ($city_ajax) {
            $return = "";
            
            foreach ($city_ajax as $fetch_city_ajax) {
                $return .= "<option value='" . $fetch_city_ajax->ci_id . "'> " . $fetch_city_ajax->ci_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value=''> No datas found </option>";
        }
       
    }
    
    public function update_address_ajax()
    {
        $customerid = Session::get('customerid');
        $addr1      = $_GET['addr1'];
        $addr2      = $_GET['addr2'];
        if ($_GET['addr1'] != "" && $_GET['addr2'] != "") {
            $addr1            = $_GET['addr1'];
            $checkupdateaddr1 = Customerprofile::update_address1($addr1, $customerid);
            $checkupdateaddr2 = Customerprofile::update_address2($addr2, $customerid);
            echo "success," . $addr1 . "," . $addr2;
            
        } else if ($_GET['addr1'] != "") {
            $addr2            = $_GET['addr1'];
            $checkupdateaddr1 = Customerprofile::update_address2($addr1, $customerid);
            echo "success," . $addr1 . "," . $addr2;
        } else if ($_GET['addr2'] != "") {
            $addr2            = $_GET['addr2'];
            $checkupdateaddr2 = Customerprofile::update_address2($addr2, $customerid);
            echo "success," . $addr1 . "," . $addr2;
        }
        
    }

    public function update_password_ajax()
    {
        $customerid    = Session::get('customerid');
        $oldpwd        = $_POST['oldpwd'];
        $md5oldpwd     = md5($oldpwd);
        $newpwd        = $_POST['newpwd'];
        $confirmpwd    = $_POST['confirmpwd'];
        $md5confirmpwd = md5($confirmpwd);
        $oldpwdcheck   = Customerprofile::check_oldpwd($customerid, $md5oldpwd);
        
        if ($newpwd != $confirmpwd) {
            echo "fail1,";
        } else {
            if ($oldpwdcheck) {
                $updatecheck = Customerprofile::update_newpwd($customerid, $md5confirmpwd);
                if ($updatecheck) {
                    echo "success,";
                } else {
                    
                    echo "fail2,";
                    
                }
                
            }
            
        }
        
        
    }

    public function profile_image_submit()
    {
        
        $customerid = Session::get('customerid');
        $inputs   = Input::all();
        $file     = Input::file('imgfile');
        $filename = $file->getClientOriginalName();
        $move_img = explode('.', $filename);
        $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
        $destinationPath = './assets/profileimage/';
        $uploadSuccess   = Input::file('imgfile')->move($destinationPath, $filename);
        $updateimage     = Customerprofile::update_profileimage($customerid, $filename);
        if ($updateimage) {
            return Redirect::to('user_profile');
        }
    }
    
    public function user_logout()
    {
        Session::forget('customerid');
        Session::forget('username');
        Session::flush();
        return Redirect::to('/');
    }
    public function facebook_logout()
    {
        //Session::forget('customerid');
        //Session::forget('username');
        Session::flush();
        return Redirect::to('/');
    }

   
}
