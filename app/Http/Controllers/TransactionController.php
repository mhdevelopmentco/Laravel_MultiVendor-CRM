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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class TransactionController extends Controller
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
    
    public function show_transactions()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
          
            $producttransactioncnt = Transactions::get_producttransaction();
            $dealtransactioncnt    = Transactions::get_dealstransaction();
            $auctiontransactioncnt = Transactions::get_auctiontransaction();
           
            $producttoday  = Transactions::get_producttoday_order();
            $produst7days  = Transactions::get_product7days_order();
            $product30days = Transactions::get_product30days_order();
            
            $dealstoday  = Transactions::get_dealstoday_order();
            $deals7days  = Transactions::get_deals7days_order();
            $deals30days = Transactions::get_deals30days_order();
            
            $auctiontoday  = Transactions::get_auctiontoday_order();
            $auction7days  = Transactions::get_auction7days_order();
            $auction30days = Transactions::get_auction30days_order();
            
            
            $productchartdetails = Transactions::get_chart_product_details();
            $dealchartdetails    = Transactions::get_chart_deals_details();
            $auctionchartdetails = Transactions::get_chart_auction_details();
            
            
            return view('siteadmin.transactiondashboard')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with('producttoday', $producttoday)->with('produst7days', $produst7days)->with('product30days', $product30days)->with('dealstoday', $dealstoday)->with('deals7days', $deals7days)->with('deals30days', $deals30days)->with('auctiontoday', $auctiontoday)->with('auction7days', $auction7days)->with('auction30days', $auction30days)->with('producttransactioncnt', $producttransactioncnt)->with('dealtransactioncnt', $dealtransactioncnt)->with('auctiontransactioncnt', $auctiontransactioncnt)->with('productchartdetails', $productchartdetails)->with('dealchartdetails', $dealchartdetails)->with('auctionchartdetails', $auctionchartdetails);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function manage_auction_bidder()
    {
        if (Session::has('userid')) {
            $adminheader           = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminleftmenus        = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter           = view('siteadmin.includes.admin_footer');
            $manage_auction_bidder = Transactions::manage_auction_bidder();
            return view('siteadmin.manage_auction_bidder')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('manage_auction_bidder', $manage_auction_bidder);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function auction_by_bidder()
    {
        if (Session::has('userid')) {
            $adminheader                 = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminleftmenus              = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter                 = view('siteadmin.includes.admin_footer');
            $manage_auction_bidder       = Transactions::auction_by_bidder();
            $manage_auction_bidd_cnt     = Transactions::auction_by_bidder_count();
            $auction_by_bidder_amt_count = Transactions::auction_by_bidder_amt_count();
            
            return view('siteadmin.auction_by_bidder')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('manage_auction_bidder', $manage_auction_bidder)->with('manage_auction_bidd_cnt', $manage_auction_bidd_cnt)->with('auction_by_bidder_amt_count', $auction_by_bidder_amt_count);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function list_auction_bidders($id)
    {
        if (Session::has('userid')) {
            $adminheader           = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminleftmenus        = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter           = view('siteadmin.includes.admin_footer');
            $manage_auction_bidder = Transactions::list_auction_bidders($id);
            return view('siteadmin.list_auction_bidders')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('manage_auction_bidder', $manage_auction_bidder);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function auction_winner($id, $pageid)
    {
        if (Session::has('userid')) {
            $check_winner = count(Transactions::auction_winner($pageid));
            if ($check_winner == 0) {
                $entry = array(
                    'oa_bid_winner' => 1
                );
                
                Transactions::select_auction_winner($entry, $id);
                return Redirect::to('list_auction_bidders/' . $pageid)->with('result', 'Record Updated Successfully');
            } else {
                return Redirect::to('list_auction_bidders/' . $pageid)->with('resulterror', 'You already choosen winner for this auction');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function send_auction_to_winner($id, $auc_id)
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $check_status   = Transactions::check_delivery_status($id);
            foreach ($check_status as $staus) {
            }
            
            return view('siteadmin.send_auction_to_winner')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('order_id', $id)->with('auc_id', $auc_id)->with('status', $staus->oa_bid_item_status);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function send_auction_to_winner_submit()
    {
        if (Session::has('userid')) {
            $auc_id   = Input::get('auc_id');
            $order_id = Input::get('order_id');
            $date     = Input::get('date');
            $status   = Input::get('status');
            
            $entry = array(
                'oa_delivery_date' => $date,
                'oa_bid_item_status' => $status
            );
            Transactions::update_auction_status($entry, $order_id);
            return Redirect::to('list_auction_bidders/' . $auc_id)->with('result', 'Record Updated Successfully');
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function product_all_orders()
    {
        if (Session::has('userid')) {
            
            $from_date     = Input::get('from_date');
            $to_date       = Input::get('to_date');
            $allproductrep = Transactions::getall_reports($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_all_orders();
            return view('siteadmin.product_allorders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("allproductrep", $allproductrep);
        }
        
        else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function product_success_orders()
    {
        if (Session::has('userid')) {
            
            $from_date          = Input::get('from_date');
            $to_date            = Input::get('to_date');
            $product_successrep = Transactions::product_successrep($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_success_orders();
            return view('siteadmin.product_success_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("successorders", $orderdetails)->with("product_successrep", $product_successrep);
        }
        
        else {
            return Redirect::to('siteadmin');
        }
    }
    
    
    public function product_completed_orders()
    {
        if (Session::has('userid')) {
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_completed_orders();
            return view('siteadmin.product_completed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("completedorders", $orderdetails);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function product_failed_orders()
    {
        if (Session::has('userid')) {
            $from_date         = Input::get('from_date');
            $to_date           = Input::get('to_date');
            $product_failedrep = Transactions::product_failedrep($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_failed_orders();
            return view('siteadmin.product_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("product_failedrep", $product_failedrep);
        }
        
    }
    
    public function product_hold_orders()
    {
        if (Session::has('userid')) {
            
            $from_date       = Input::get('from_date');
            $to_date         = Input::get('to_date');
            $product_holdrep = Transactions::product_holdrep($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getproduct_hold_orders();
            return view('siteadmin.product_hold_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("holdorders", $orderdetails)->with("product_holdrep", $product_holdrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function cod_all_orders()
    {
        if (Session::has('userid')) {
            $from_date      = Input::get('from_date');
            $to_date        = Input::get('to_date');
            $product_codrep = Transactions::product_codrep($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getcod_all_orders();
            return view('siteadmin.productcod_all_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("product_codrep", $product_codrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function cod_completed_orders()
    {
        if (Session::has('userid')) {
            
            $from_date            = Input::get('from_date');
            $to_date              = Input::get('to_date');
            $product_completedrep = Transactions::product_completedrep($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getcod_completed_orders();
            return view('siteadmin.productcod_completed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("completedorders", $orderdetails)->with("product_completedrep", $product_completedrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function cod_failed_orders()
    {
        if (Session::has('userid')) {
            $from_date            = Input::get('from_date');
            $to_date              = Input::get('to_date');
            $productcod_failedrep = Transactions::productcod_failedrep($from_date, $to_date);
      
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getcod_failed_orders();
            
            return view('siteadmin.productcod_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("productcod_failedrep", $productcod_failedrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function cod_hold_orders()
    {
        if (Session::has('userid')) {
            
            $from_date          = Input::get('from_date');
            $to_date            = Input::get('to_date');
            $productcod_holdrep = Transactions::productcod_holdrep($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getcod_hold_orders();
            return view('siteadmin.productcod_hold_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("holdorders", $orderdetails)->with("productcod_holdrep", $productcod_holdrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function deals_all_orders()
    {
        if (Session::has('userid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $dealrep   = Transactions::getall_dealreports($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_all_orders();
            return view('siteadmin.deals_allorders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("dealrep", $dealrep);
        } else {
            return Redirect::to('siteadmin');
        }
     
    }

    public function deals_success_orders()
    {
        if (Session::has('userid')) {
            $from_date  = Input::get('from_date');
            $to_date    = Input::get('to_date');
            $successrep = Transactions::get_successreports($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_success_orders();
            return view('siteadmin.deals_success_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("successorders", $orderdetails)->with("successrep", $successrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function deals_completed_orders()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_completed_orders();
            return view('siteadmin.deals_completed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("completedorders", $orderdetails);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function deals_failed_orders()
    {
        if (Session::has('userid')) {
           
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $failedrep = Transactions::get_failedreports($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_failed_orders();
            return view('siteadmin.deals_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("failedrep", $failedrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function deals_hold_orders()
    {
        if (Session::has('userid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $holdrep   = Transactions::get_holdreports($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdeals_hold_orders();
            return view('siteadmin.deals_hold_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("holdorders", $orderdetails)->with("holdrep", $holdrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function dealscod_all_orders()
    {
        if (Session::has('userid')) {
            
            $from_date      = Input::get('from_date');
            $to_date        = Input::get('to_date');
            $codrep         = Transactions::get_codreports($from_date, $to_date);
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdealscod_all_orders();
            return view('siteadmin.dealscod_allorders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("allorders", $orderdetails)->with("codrep", $codrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function dealscod_completed_orders()
    {
        if (Session::has('userid')) {
            
            $from_date    = Input::get('from_date');
            $to_date      = Input::get('to_date');
            $completedrep = Transactions::get_completedreports($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdealscod_completed_orders();
            return view('siteadmin.dealscod_completed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("completedorders", $orderdetails)->with("completedrep", $completedrep);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function dealscod_failed_orders()
    {
        if (Session::has('userid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $failedrep = Transactions::getcod_failedreports($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdealscod_failed_orders();
            
            return view('siteadmin.dealscod_failed_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("failedorders", $orderdetails)->with("failedrep", $failedrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }

    public function dealscod_hold_orders()
    {
        if (Session::has('userid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $holdrep   = Transactions::getcod_holdreports($from_date, $to_date);
            
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $orderdetails   = Transactions::getdealscod_hold_orders();
            return view('siteadmin.dealscod_hold_orders')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with("holdorders", $orderdetails)->with("holdrep", $holdrep);
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function all_fund_request()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $get_funds      = Transactions::get_funds();
            return view('siteadmin.all_fund_request')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('get_funds', $get_funds);
        } else {
            return Redirect::to('siteadmin');
        }
    }
        
    public function success_fund_request()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $get_funds      = Transactions::success_fund_request();
            return view('siteadmin.success_fund_request')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('get_funds', $get_funds);
        } else {
            return Redirect::to('siteadmin');
        }
    }
        
    public function pending_fund_request()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $get_funds      = Transactions::pending_fund_request();
            return view('siteadmin.pending_fund_request')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('get_funds', $get_funds);
        } else {
            return Redirect::to('siteadmin');
        }
    }
        
    public function failed_fund_request()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "transaction");
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_transaction');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $get_funds      = Transactions::failed_fund_request();
            return view('siteadmin.failed_fund_request')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('get_funds', $get_funds);
        } else {
            return Redirect::to('siteadmin');
        }
    }
        
    public function fund_paypal($data)
    {
        $result = explode('/**/', base64_decode($data));
        
        $id      = $result[0];
        $name    = $result[1];
        $paymail = $result[2];
        $amt     = $result[3];
        require 'paypal_new/paypal.class.php';
        $p             = new paypal_class; // initiate an instance of the class
        $p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; // testing paypal url
       
        
        // setup a variable for this script (ie: 'http://www.micahcarrick.com/paypal.php')
        $this_script = url();
        
        // if there is not action variable, set the default action of 'process'
     
        $product_amount = $amt;
        $item_name      = "Paying fund to" . $name;
        $custom         = $name;
        $item_number    = $id;
     
        $payment_email    = $paymail;
        $product_quantity = 1;
        
        $p->add_field('business', $payment_email);
        $p->add_field('return', $this_script . '/paypal_success');
        $p->add_field('cancel_return', $this_script . '/paypal_cancel');
        $p->add_field('notify_url', $this_script . '/paypal_ipn');
        $p->add_field('item_name', $item_name);
        $p->add_field('amount', $product_amount);
        $p->add_field('quantity', $product_quantity);
        $p->add_field('custom', $custom);
        $p->add_field('item_number', $item_number);
        $p->add_field('currency_code', 'USD');
        $p->submit_paypal_post();
    }
    
    public function paypal_success()
    {
        $txn_id  = Input::get('txn_id');
        $email   = Input::get('payer_email');
        $name    = Input::get('custom');
        $txn_id  = Input::get('txn_id');
        $paidamt = Input::get('mc_gross');
        $mer_id  = Input::get('item_number');
        $status  = Input::get('payment_status');
        $entry   = array(
            'wr_mer_id' => $mer_id,
            'wr_mer_name' => $name,
            'wr_mer_payment_email' => $email,
            'wr_paid_amount' => $paidamt,
            'wr_txn_id' => $txn_id,
            'wr_status' => $status
        );
        Transactions::insert_funds_paypal($entry);
        return Redirect::to('index')->with('result_success', 'Payment Completed Successfully');
    }
    
    public function paypal_ipn()
    {
        $status = Input::get('payment_status');
        $txn_id = Input::get('txn_id');
        $entry  = array(
            'wr_status' => $status
        );
        Transactions::update_funds_paypal($entry, $txn_id);
    }
    
    public function paypal_cancel()
    {
        return Redirect::to('index')->with('result_cancel', 'Payment Cancelled');
    }
}
