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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class MerchantController extends Controller
{
    
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    
    public function merchant_dashboard()
    {
        if (Session::has('userid')) {
            $adminheader         = view('siteadmin.includes.admin_header')->with("routemenu", "merchant");
            $adminleftmenus      = view('siteadmin.includes.admin_left_menu_merchant');
            $adminfooter         = view('siteadmin.includes.admin_footer');
            $merchant_count      = Merchant::get_merchant_count();
            $store_cnt           = Merchant::get_store_cnt();
            $admin_stores_cnt    = Merchant::get_admin_stores();
            $merchant_stores_cnt = Merchant::get_merchant_stores();
            return view('siteadmin.merchant_dashboard')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('merchant_count', $merchant_count)->with('store_cnt', $store_cnt)->with('admin_stores_cnt', $admin_stores_cnt)->with('merchant_stores_cnt', $merchant_stores_cnt);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function add_merchant()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "merchant");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_merchant');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $country_return = Merchant::get_country_detail();
            $city_return    = Merchant::get_city_detail();
            return view('siteadmin.add_merchant')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('country_details', $country_return)->with('city_details', $city_return);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function manage_merchant()
    {
        if (Session::has('userid')) {
            $data      = Input::except(array(
                '_token'
            ));
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantrep = Merchant::get_merchantreports($from_date, $to_date);
            
            $adminheader                   = view('siteadmin.includes.admin_header')->with("routemenu", "merchant");
            $adminleftmenus                = view('siteadmin.includes.admin_left_menu_merchant');
            $adminfooter                   = view('siteadmin.includes.admin_footer');
            $merchant_return               = Merchant::view_merchant_details();
            $store_count                   = Merchant::get_store_count($merchant_return);
            $merchant_is_or_not_in_deals   = Merchant::merchant_is_or_not_in_deals($merchant_return);
            $merchant_is_or_not_in_product = Merchant::merchant_is_or_not_in_product($merchant_return);
            $merchant_is_or_not_in_auction = Merchant::merchant_is_or_not_in_auction($merchant_return);
            return view('siteadmin.manage_merchant')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('merchant_return', $merchant_return)->with('store_count', $store_count)->with('merchant_is_or_not_in_deals', $merchant_is_or_not_in_deals)->with('merchant_is_or_not_in_product', $merchant_is_or_not_in_product)->with('merchant_is_or_not_in_auction', $merchant_is_or_not_in_auction)->with('merchantrep', $merchantrep);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function ajax_select_city()
    {
        $cityid    = $_GET['city_id'];
        $city_ajax = Merchant::get_city_detail_ajax($cityid);
        if ($city_ajax) {
            $return = "";
            $return = "<option value='0'> -- Select -- </option>";
            foreach ($city_ajax as $fetch_city_ajax) {
                $return .= "<option value='" . $fetch_city_ajax->ci_id . "'> " . $fetch_city_ajax->ci_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value=''> No datas found </option>";
        }
    }
    
    public function add_merchant_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $date = date('m/d/Y');
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
                return Redirect::to('add_merchant')->withErrors($validator->messages())->withInput();
            } else {
                $mer_email         = Input::get('email_id');
                $check_merchant_id = Merchant::check_merchant_email($mer_email);
                if ($check_merchant_id) {
                    return Redirect::to('add_merchant')->with('mail_exist', 'Merchant Email Exist')->withInput();
                } else {
                    $file             = Input::file('file');
                    $filename         = $file->getClientOriginalName();
                    $move_img         = explode('.', $filename);
                    $filename         = $move_img[0] . str_random(8) . "." . $move_img[1];
                    $destinationPath  = './assets/storeimage/';
                    	
                    $uploadSuccess    = Input::file('file')->move($destinationPath, $filename);
                    $get_new_password = Merchant::randomPassword();
                    $merchantid       = Session::get('merchantid');
                    $admin            = '0';
                    if ($merchantid) {
                        $merchant_entry = array(
                            'addedby' => $merchantid,
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
                            'mer_commission' => Input::get('commission'),
                            'created_date' => $date
                        );
                    } else {
                        $merchant_entry = array(
                            'addedby' => $admin,
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
                            'mer_commission' => Input::get('commission'),
                            'created_date' => $date
                        );
                    }
                    
                    $inserted_merchant_id = Merchant::insert_merchant($merchant_entry);
                    $store_entry          = array(
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
                        'stor_img' => $filename,
                        'created_date' => $date
                    );
                    
                    Merchant::insert_store($store_entry);
                    $send_mail_data = array(
                        'first_name' => Input::get('email_id'),
                        'password' => $get_new_password
                    );
                    # It will show these lines as error but no issue it will work fine Line no 119 - 122
                    Mail::send('emails.merchantmail', $send_mail_data, function($message)
                    {
                        $message->to(Input::get('email_id'), Input::get('first_name'))->subject('Merchant Account Created Successfully');
                    });
                    
                    return Redirect::to('manage_merchant')->with('result', 'Record Inserted Successfully');
                    
                }
            }
        } else {
            return Redirect::to('siteadmin');
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_merchant_submit()
    {
        if (Session::has('userid')) {
            $mer_id = Input::get('mer_id');
            $data   = Input::except(array(
                '_token'
            ));
            $rule   = array(
                'first_name' => 'required|alpha_dash',
                'last_name' => 'required|alpha_dash',
                'email_id' => 'required|email',
                'select_mer_country' => 'required',
                'select_mer_city' => 'required',
                'phone_no' => 'required|numeric',
                'addreess_one' => 'required',
                'address_two' => 'required',
                'commission' => 'required|numeric'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_merchant/' . $mer_id)->withErrors($validator->messages())->withInput();
            } else {
                $mer_email         = Input::get('email_id');
                $check_merchant_id = Merchant::check_merchant_email_edit($mer_email, $mer_id);
                if ($check_merchant_id) {
                    return Redirect::to('edit_merchant/' . $mer_id)->with('mail_exist', 'Merchant Email Exist')->withInput();
                } else {
                    
                    $merchant_entry       = array(
                        'mer_fname' => Input::get('first_name'),
                        'mer_lname' => Input::get('last_name'),
                        'mer_email' => Input::get('email_id'),
                        'mer_phone' => Input::get('phone_no'),
                        'mer_address1' => Input::get('addreess_one'),
                        'mer_address2' => Input::get('address_two'),
                        'mer_co_id' => Input::get('select_mer_country'),
                        'mer_ci_id' => Input::get('select_mer_city'),
                        'mer_payment' => Input::get('payment_account'),
                        'mer_commission' => Input::get('commission')
                    );
                    $inserted_merchant_id = Merchant::edit_merchant($merchant_entry, $mer_id);
                    return Redirect::to('manage_merchant')->with('result', 'Record Updated Successfully');
                    
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_merchant($id)
    {
        if (Session::has('userid')) {
            $adminheader     = view('siteadmin.includes.admin_header')->with("routemenu", "merchant");
            $adminleftmenus  = view('siteadmin.includes.admin_left_menu_merchant');
            $adminfooter     = view('siteadmin.includes.admin_footer');
            $country_return  = Merchant::get_country_detail();
            $merchant_return = Merchant::get_induvidual_merchant_detail($id);
            return view('siteadmin.edit_merchant')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('country_details', $country_return)->with('merchant_details', $merchant_return);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function ajax_select_city_edit()
    {
        $cityid    = $_GET['city_id_ajax'];
        $city_ajax = Merchant::get_city_detail_ajax_edit($cityid);
        if ($city_ajax) {
            $return = "";
            foreach ($city_ajax as $fetch_city_ajax) {
                $return .= "<option value='" . $fetch_city_ajax->ci_id . "' selected > " . $fetch_city_ajax->ci_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value=''> No datas found </option>";
        }
    }
    
    
    public function block_merchant($id, $status)
    {
        if (Session::has('userid')) {
            $entry = array(
                'mer_staus' => $status
            );
            Merchant::block_merchant_status($id, $entry);
            if ($status == 1) {
                return Redirect::to('manage_merchant')->with('result', 'Merchant Activated Successfully');
            } else {
                return Redirect::to('manage_merchant')->with('result', 'Merchant Blocked Successfully');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function manage_store($id)
    {
        if (Session::has('userid')) {
            $adminheader                = view('siteadmin.includes.admin_header')->with("routemenu", "merchant");
            $adminleftmenus             = view('siteadmin.includes.admin_left_menu_merchant');
            $adminfooter                = view('siteadmin.includes.admin_footer');
            $store_return               = Merchant::view_store_details($id);
			//print_r($store_return); exit;
            $store_is_or_not_in_deals   = Merchant::store_is_or_not_in_deals($store_return);
            $store_is_or_not_in_product = Merchant::store_is_or_not_in_product($store_return);
            $store_is_or_not_in_auction = Merchant::store_is_or_not_in_auction($store_return);
           return view('siteadmin.manage_store')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('store_return', $store_return)->with('store_is_or_not_in_deals', $store_is_or_not_in_deals)->with('store_is_or_not_in_product', $store_is_or_not_in_product)->with('store_is_or_not_in_auction', $store_is_or_not_in_auction);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_store($id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "merchant");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_merchant');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $country_return = Merchant::get_country_detail();
            return view('siteadmin.add_store')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('country_details', $country_return)->with('id', $id);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function add_store_submit()
    {
        if (Session::has('userid')) {
            $merchant_id = Input::get('store_merchant_id');
            $data        = Input::except(array(
                '_token'
            ));
            $rule        = array(
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
                'file' => 'image'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('add_store/' . $merchant_id)->withErrors($validator->messages())->withInput();
            } else {
                $mer_email       = Input::get('email_id');
                $file            = Input::file('file');
                $filename        = $file->getClientOriginalName();
                $move_img        = explode('.', $filename);
                $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
                $destinationPath = './assets/storeimage/';
               	
                $uploadSuccess   = Input::file('file')->move($destinationPath, $filename);
                
                $store_entry = array(
                    'stor_name' => Input::get('store_name'),
                    'stor_merchant_id' => $merchant_id,
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
                return Redirect::to('manage_store/' . $merchant_id)->with('result', 'Record Inserted Successfully');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_store($id, $mer_id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "merchant");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_merchant');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $country_return = Merchant::get_country_detail();
            $store_return   = Merchant::get_induvidual_store_detail($id);
            return view('siteadmin.edit_store')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('country_details', $country_return)->with('id', $id)->with('store_return', $store_return)->with('mer_id', $mer_id);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_store_submit()
    {
        if (Session::has('userid')) {
            $merchant_id = Input::get('mer_id');
            $store_id    = Input::get('store_id');
            $data        = Input::except(array(
                '_token'
            ));
            $rule        = array(
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
                'longtitude' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('edit_store/' . $store_id)->withErrors($validator->messages())->withInput();
            } else {
                
                $file = Input::file('file');
                if ($file == '') {
                    $filename = Input::get('file_new');
                } else {
                    $filename        = $file->getClientOriginalName();
                    $move_img        = explode('.', $filename);
                    $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
                    $destinationPath = './assets/storeimage/';
                    $uploadSuccess   = Input::file('file')->move($destinationPath, $filename);
                }
                $store_entry = array(
                    'stor_name' => Input::get('store_name'),
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
                
                Merchant::edit_store($store_id, $store_entry);
                return Redirect::to('manage_store/' . $merchant_id)->with('result', 'Record Updated Successfully');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function block_store($id, $status, $mer_id)
    {
        if (Session::has('userid')) {
            $entry = array(
                'stor_status' => $status
            );
            Merchant::block_store_status($id, $entry);
            if ($status == 1) {
                return Redirect::to('manage_store/' . $mer_id)->with('result', 'Store Activated Successfully');
            } else {
                return Redirect::to('manage_store/' . $mer_id)->with('result', 'Store Blocked Successfully');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function manage_enquiry()
    {
        if (Session::has('userid')) {
            $adminheader                   = view('siteadmin.includes.admin_header')->with("routemenu", "merchant");
            $adminleftmenus                = view('siteadmin.includes.admin_left_menu_merchant');
            $adminfooter                   = view('siteadmin.includes.admin_footer');
            $merchant_return               = Merchant::view_merchant_details();
            $store_count                   = Merchant::get_store_count($merchant_return);
            $merchant_is_or_not_in_deals   = Merchant::merchant_is_or_not_in_deals($merchant_return);
            $merchant_is_or_not_in_product = Merchant::merchant_is_or_not_in_product($merchant_return);
            $merchant_is_or_not_in_auction = Merchant::merchant_is_or_not_in_auction($merchant_return);
            $enquiry_return                = Merchant::view_enquiry_details();
            $enquiry_count                 = Merchant::get_enquiry_count($enquiry_return);
            return view('siteadmin.manage_enquiry')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('merchant_return', $merchant_return)->with('store_count', $store_count)->with('merchant_is_or_not_in_deals', $merchant_is_or_not_in_deals)->with('merchant_is_or_not_in_product', $merchant_is_or_not_in_product)->with('merchant_is_or_not_in_auction', $merchant_is_or_not_in_auction)->with('enquiry_return', $enquiry_return)->with('enquiry_count', $enquiry_count);
        } else {
            return Redirect::to('siteadmin');
        }
    }
}
