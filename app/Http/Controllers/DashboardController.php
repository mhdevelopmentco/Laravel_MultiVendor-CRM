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
use App\Merchantproducts;
use App\MerchantTransactions;
use App\Merchantdeals;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
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
    
    public function siteadmin_dashboard()
    {
        if (Session::has('userid')) {
            
            $blogcmtcount = Blog::get_msgcount();
            Session::put('blogcmtcount', $blogcmtcount);
            $newsubscriberscount = Dashboard::get_subscriberscount();
            Session::put('subscriberscount', $newsubscriberscount);
            $inquiriescnt = Dashboard::get_inquiriescnt();
            Session::put('inquiriescnt', $inquiriescnt);
            $adrequestcnt = Admodel::get_msgcount();
            Session::put('adrequestcnt', $adrequestcnt);
            $adminheader         = view('siteadmin.includes.admin_header')->with("routemenu", "dashboard")->with("blogcmtcount", "blogcmtcount")->with("newsubscriberscount", "newsubscriberscount")->with("inquiriescnt", "inquiriescnt")->with("adrequestcnt", "adrequestcnt");
           
            $adminfooter         = view('siteadmin.includes.admin_footer');
            $activeproductscnt   = Dashboard::get_active_products();
            $soldproductscnt     = Dashboard::get_sold_products();
            $merchantscnt        = Dashboard::get_merchants();
            $customers           = Dashboard::get_customers();
            $activedealscnt      = Dashboard::get_active_deals();
            $archievddealcnt     = Deals::get_archievd_deals();
            $auctioncnt          = Dashboard::get_active_auction();
            $archievdauction_cnt = Auction::get_archievd_auction();
            $actionwinnerscnt    = Dashboard::get_auction_winners();
            $subscriberscnt      = Dashboard::get_subscribers();
            $storescnt           = Dashboard::get_stores();
            
            /*for chart*/
            $customercnt        = Dashboard::get_customer_list();
            $cus_count          = Dashboard::get_chart_details();
            $get_chart6_details = Dashboard::get_chart6_details();
            $transaction_chart  = Dashboard::get_charttransaction_details();
            
            
            return view('siteadmin.admin_dashboard')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('activeproductscnt', $activeproductscnt)->with('soldproductscnt', $soldproductscnt)->with('merchantscnt', $merchantscnt)->with('customers', $customers)->with('activedealscnt', $activedealscnt)->with('archievddealcnt', $archievddealcnt)->with('auctioncnt', $auctioncnt)->with('archievdauction_cnt', $archievdauction_cnt)->with('actionwinnerscnt', $actionwinnerscnt)->with('subscriberscnt', $subscriberscnt)->with('storescnt', $storescnt)->with('customercnt', $customercnt)->with('cus_count', $cus_count)->with('get_chart6_details', $get_chart6_details)->with('transaction_chart', $transaction_chart);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function sitemerchant_dashboard()
    {
        if (Session::has('merchantid')) {
            $date                = date('Y-m-d H:i:s');
            $mer_id              = Session::has('merchantid');
            $activeproductscnt   = Dashboard::get_mer_active_products($mer_id);
            $soldproductscnt     = Dashboard::get_mer_sold_products($mer_id);
            $merchantscnt        = Dashboard::get_merchants();
            $customers           = Dashboard::get_customers();
            $activedealscnt      = Dashboard::get_mer_active_deals($mer_id, $date);
            $archievddealcnt     = Dashboard::get_mer_archievd_deals($mer_id);
            $auctioncnt          = Dashboard::get_mer_active_auction($mer_id);
            $archievdauction_cnt = Dashboard::get_mer_archievd_auction($mer_id);
            $actionwinnerscnt    = Dashboard::get_mer_auction_winners($mer_id);
            $subscriberscnt      = Dashboard::get_subscribers();
            $storescnt           = Dashboard::get_mer_stores($mer_id);
            
            
            $merid            = Session::get('merchantid');
            $getproductidlist = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
            } else {
                $productlist = '';
            }
            $getauctionidlistrs = Merchant::getauctionidlist($merid);
            if ($getauctionidlistrs) {
                $getauctionidlist    = $getauctionidlistrs[0]->proid;
                $auctionchartdetails = MerchantTransactions::get_chart_auction_details($getauctionidlist);
            } else {
                $auctionchartdetails = '';
            }
            if ($getproductidlist) {
                $productchartdetails = MerchantTransactions::get_chart_product_details($productlist);
                $dealchartdetails    = MerchantTransactions::get_chart_deals_details($productlist);
            } else {
                $productchartdetails = '';
                $dealchartdetails    = '';
            }
            
            
            /*for chart*/
            $customercnt        = Dashboard::get_customer_list();
            $cus_count          = Dashboard::get_chart_details();
            $get_chart6_details = Dashboard::get_chart6_details();
            $transaction_chart  = Dashboard::get_charttransaction_details();
            $merchantheader     = view('sitemerchant.includes.merchant_header')->with("routemenu", "dashboard");
            $merchantfooter     = view('sitemerchant.includes.merchant_footer');
            $active_deals_count = Dashboard::get_active_deals();
            return view('sitemerchant.merchant_dashboard')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('activeproductscnt', $activeproductscnt)->with('soldproductscnt', $soldproductscnt)->with('merchantscnt', $merchantscnt)->with('customers', $customers)->with('activedealscnt', $activedealscnt)->with('archievddealcnt', $archievddealcnt)->with('auctioncnt', $auctioncnt)->with('archievdauction_cnt', $archievdauction_cnt)->with('actionwinnerscnt', $actionwinnerscnt)->with('subscriberscnt', $subscriberscnt)->with('storescnt', $storescnt)->with('customercnt', $customercnt)->with('cus_count', $cus_count)->with('get_chart6_details', $get_chart6_details)->with('transaction_chart', $transaction_chart)->with('productchartdetails', $productchartdetails)->with('dealchartdetails', $dealchartdetails)->with('auctionchartdetails', $auctionchartdetails);
            ;
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    
    
}
