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
use App\Products;
use App\Auction;
use App\Customer;
use App\Transactions;
use App\Merchantadminlogin;
use App\Merchantproducts;
use App\Merchantsettings;
use App\MerchantTransactions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class MerchantshopController extends Controller
{
    
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
     
    
    public function manage_shop($id)
    {
        $merchantid = Session::get('merchantid');
                
        $merchantheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "shop");
        $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_Shop');
        $merchantfooter    = view('sitemerchant.includes.merchant_footer');
        $store_return      = Merchant::view_merchant_store_details($id, $merchantid);
        
        $store_is_or_not_in_deals   = Merchant::store_is_or_not_in_deals($store_return);
        $store_is_or_not_in_product = Merchant::store_is_or_not_in_product($store_return);
        $store_is_or_not_in_auction = Merchant::store_is_or_not_in_auction($store_return);
        
        return view('sitemerchant.manage_shop')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter)->with('store_return', $store_return)->with('store_is_or_not_in_deals', $store_is_or_not_in_deals)->with('store_is_or_not_in_product', $store_is_or_not_in_product)->with('store_is_or_not_in_auction', $store_is_or_not_in_auction);
           
    }
    
    
    public function add_shop($id)
    {
        if (Session::has('merchantid')) {
            $merchantid = Session::get('merchantid');
        }
         
        if ($id == $merchantid) {
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "shop");
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_Shop');
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $country_return    = Merchant::get_country_detail();
            return view('sitemerchant.add_shop')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter)->with('country_details', $country_return)->with('id', $id);
            
        } else {
            return Redirect::to('sitemerchant');
            
        }
    }

    public function edit_shop($id, $mer_id)
    {
        $merchantheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "shop");
        $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_Shop');
        $merchantfooter    = view('sitemerchant.includes.merchant_footer');
        $country_return    = Merchant::get_country_detail();
        $store_return      = Merchant::get_induvidual_store_detail_merchant($id, $mer_id);
        
        if ($store_return) {
            return view('sitemerchant.edit_shop')->with('merchantheader', $merchantheader)->with('merchantleftmenus', $merchantleftmenus)->with('merchantfooter', $merchantfooter)->with('country_details', $country_return)->with('id', $id)->with('store_return', $store_return)->with('mer_id', $mer_id);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }

    public function add_shop_submit()
    {
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
            'website' => 'required|url',
            'latitude' => 'required',
            'longtitude' => 'required',
            'file' => 'image'
       );
        
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return Redirect::to('merchant_add_shop/' . $merchant_id)->withErrors($validator->messages())->withInput();
        } else {
            $mer_email       = Input::get('email_id');
            $file            = Input::file('file');
            $filename        = $file->getClientOriginalName();
            $move_img        = explode('.', $filename);
            $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
            $destinationPath = './assets/storeimage/';
            //$destinationPath = __DIR__.'/image/uploads';		
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
                'stor_img' => $filename,
                'stor_addedby' => 2
            );
            
            Merchant::insert_store($store_entry);
            return Redirect::to('merchant_manage_shop/' . $merchant_id)->with('result', 'Record Inserted Successfully');
        }
    }
    
    public function edit_shop_submit()
    {
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
            'website' => 'required|url',
            'latitude' => 'required',
            'longtitude' => 'required'
        );
        
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return Redirect::to('merchant_edit_shop/' . $store_id)->withErrors($validator->messages())->withInput();
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
            return Redirect::to('merchant_manage_shop/' . $merchant_id)->with('result', 'Record Updated Successfully');
        }
    }
    
    public function block_shop($id, $status, $mer_id)
    {
        $entry = array(
            'stor_status' => $status
        );
        Merchant::block_store_status($id, $entry);
        if ($status == 1) {
            return Redirect::to('merchant_manage_shop/' . $mer_id)->with('result', 'Store Activated Successfully');
        } else {
            return Redirect::to('merchant_manage_shop/' . $mer_id)->with('result', 'Store Blocked Successfully');
        }
    }
    
    
}

?>
