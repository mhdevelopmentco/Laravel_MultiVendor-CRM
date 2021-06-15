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
use App\Fund;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class FundController extends Controller
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
    
    public function fund_request()
    {
        $merchant_id    = Session::get('merchantid');
        $adminheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "funds");
        $adminfooter    = view('sitemerchant.includes.merchant_footer');
        $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_fund');
        
        $fundtransactiondetails = Fund::get_fund_transaction_details($merchant_id);
        
        return view('sitemerchant.fund_request')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with('fundtransactiondetails', $fundtransactiondetails);
    }
    
    public function with_fund_request()
    {
        $merchnat_id         = Session::get('merchantid');
        $adminheader         = view('sitemerchant.includes.merchant_header')->with("routemenu", "funds");
        $adminfooter         = view('sitemerchant.includes.merchant_footer');
        $adminleftmenus      = view('sitemerchant.includes.merchant_left_menu_fund');
        $deal_count          = Fund::deal_no_count($merchnat_id);
        $deal_discount_count = Fund::deal_discount_count($merchnat_id);
        
        $product_no_count       = Fund::product_no_count($merchnat_id);
        $product_discount_count = Fund::product_discount_count($merchnat_id);
        $commison_amt           = Fund::commison_amt($merchnat_id);
        $paidamounttomerchantrs = Fund::paid_amt($merchnat_id);
        $paidamounttomerchant   = $paidamounttomerchantrs[0]->paid_amt;
        return view('sitemerchant.with_fund_request')->with('adminheader', $adminheader)->with('adminfooter', $adminfooter)->with('adminleftmenus', $adminleftmenus)->with('deal_count', $deal_count)->with('deal_discount_count', $deal_discount_count)->with('product_no_count', $product_no_count)->with('product_discount_count', $product_discount_count)->with('commison_amt', $commison_amt)->with('paidamounttomerchant', $paidamounttomerchant);
    }
    
    public function withdraw_submit()
    {
        $id        = Input::get('mer_id');
        $amount    = Input::get('pay');
        $total_amt = Input::get('total_withdraw');
        $entry     = array(
            'wd_mer_id' => $id,
            'wd_total_wd_amt' => $total_amt,
            'wd_submited_wd_amt' => $amount
        );
        $check     = Fund::check_withdraw($id);
        if ($check) {
            foreach ($check as $result) {
            }
            $amt   = $amount + $result->wd_submited_wd_amt;
            $entry = array(
                'wd_mer_id' => $id,
                'wd_total_wd_amt' => $total_amt,
                'wd_submited_wd_amt' => $amt
            );
            Fund::update_withdraw($entry, $id);
            return Redirect::to('with_fund_request')->with('success', 'Record Updated Successfully');
        } else {
            Fund::save_withdraw($entry);
            return Redirect::to('with_fund_request')->with('success', 'Record Updated Successfully');
        }
    }
    
    
}
