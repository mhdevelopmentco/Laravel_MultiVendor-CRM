<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Merchant extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_merchant';
    
    public static function get_country_detail()
    {
        return DB::table('nm_country')->where('co_status', '=', 0)->get();
    }

    public static function get_city_detail()
    {
        return DB::table('nm_city')->where('ci_status', '=', 1)->get();
        
    }

    public static function get_merchant_profile_details($merid)
    {
        return DB::table('nm_merchant')->where('mer_id', '=', $merid)->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_merchant.mer_ci_id')->LeftJoin('nm_country', 'nm_country.co_id', '=', 'nm_merchant.mer_co_id')->get();
    }

    public static function get_city_detail_ajax($id)
    {
        return DB::table('nm_city')->where('ci_con_id', '=', $id)->where('ci_status', '=', 1)->get();
    }

    public static function get_city_detail_ajax_shipping($id)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->get();
    }
        
    public static function get_city_detail_ajax_edit($id)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->get();
    }
    
    public static function randomPassword()
    {
        $alphabet    = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass        = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n      = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
    public static function insert_merchant($entry)
    {
        $check_insert = DB::table('nm_merchant')->insert($entry);
        if ($check_insert) {
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
    }
    
    public static function insert_store($entry)
    {
        return DB::table('nm_store')->insert($entry);
    }
    
    public static function edit_merchant($entry, $id)
    {
        return DB::table('nm_merchant')->where('mer_id', '=', $id)->update($entry);
    }
    
    public static function check_merchant_email($email)
    {
        return DB::table('nm_merchant')->where('mer_email', '=', $email)->get();
    }
    
    public static function check_merchant_email_edit($email, $id)
    {
        return DB::table('nm_merchant')->where('mer_email', '=', $email)->where('mer_id', '!=', $id)->get();
    }
    
    public static function get_induvidual_merchant_detail($id)
    {
        return DB::table('nm_merchant')->where('mer_id', '=', $id)->get();
    }
    
    public static function view_merchant_details()
    {
        return DB::table('nm_merchant')->join('nm_store', 'nm_store.stor_merchant_id', '=', 'nm_merchant.mer_id')->join('nm_city', 'nm_city.ci_id', '=', 'nm_merchant.mer_ci_id')->groupBy('nm_merchant.mer_id')->get();
    }
    
    public static function get_store_count($merchant_return)
    {
        foreach ($merchant_return as $store_cnt) {
            $catg_result = DB::table('nm_store')->where('stor_merchant_id', '=', $store_cnt->mer_id)->get();
            if ($catg_result) {
                $result[$store_cnt->mer_id] = count($catg_result);
            } else {
                $result[$store_cnt->mer_id] = 0;
            }
        }
        return $result;
    }
    
    public static function block_merchant_status($id, $entry)
    {
        return DB::table('nm_merchant')->where('mer_id', '=', $id)->update($entry);
    }
    
    public static function view_store_details($id)
    {
        return DB::table('nm_store')->join('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->where('nm_store.stor_merchant_id', '=', $id)->get();
    }

    public static function view_merchant_store_details($id)
    {
        return DB::table('nm_store')->join('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->where('nm_store.stor_merchant_id', '=', $id)->get();
    }
    
    public static function get_induvidual_store_detail($id)
    {
        return DB::table('nm_store')->where('stor_id', '=', $id)->get();
    }

    public static function get_induvidual_store_detail_merchant($id, $merid)
    {
        return DB::table('nm_store')->where('stor_merchant_id', '=', $merid)->where('stor_id', '=', $id)->get();
    }
    
    public static function edit_store($id, $entry)
    {
        return DB::table('nm_store')->where('stor_id', '=', $id)->update($entry);
    }
    
    public static function block_store_status($id, $entry)
    {
        return DB::table('nm_store')->where('stor_id', '=', $id)->update($entry);
    }

    public static function get_merchant_count()
    {
        return DB::table('nm_merchant')->where('mer_staus', '=', 1)->count();
    }

    public static function get_store_cnt()
    {
        return DB::table('nm_store')->where('stor_status', '=', 1)->count();
    }

    public static function get_admin_stores()
    {
        return DB::table('nm_store')->where('stor_addedby', '=', 1)->where('stor_status', '=', 1)->count();
    }

    public static function get_merchant_stores()
    {
        return DB::table('nm_store')->where('stor_addedby', '=', 2)->where('stor_status', '=', 1)->count();
    }

    public static function getauctionidlist($merid)
    {
        return DB::select(DB::raw("SELECT auc_merchant_id, GROUP_CONCAT(auc_id SEPARATOR ', ') as proid FROM nm_auction GROUP BY 	auc_merchant_id having 	auc_merchant_id=$merid"));
    }
    
    public static function get_auction_winners($getauctionidlist)
    {
        return DB::table('nm_order_auction')->LeftJoin('nm_auction', 'nm_auction.auc_id', '=', 'nm_order_auction.oa_pro_id')->where('oa_bid_winner', '=', 1)->whereIn('nm_order_auction.oa_pro_id', array(
            $getauctionidlist
        ))->get();
    }

    public static function get_auction_cod($getauctionidlist)
    {
        return DB::table('nm_order_auction')->LeftJoin('nm_auction', 'nm_auction.auc_id', '=', 'nm_order_auction.oa_pro_id')->where('oa_bid_winner', '=', 1)->where('oa_bid_item_status', '=', 1)->whereIn('nm_order_auction.oa_pro_id', array(
            $getauctionidlist
        ))->get();
    }
    
    public static function store_is_or_not_in_deals($query)
    {
		
        foreach ($query as $store) {
            $check = DB::table('nm_deals')->where('deal_shop_id', '=', $store->stor_id)->count();
            $result[$store->stor_id] = $check;
			return $result;
        }
        return 0;
    }

    public static function store_is_or_not_in_product($query)
    {
        foreach ($query as $store) {
            $check  = DB::table('nm_product')->where('pro_sh_id', '=', $store->stor_id)->count();
            $result[$store->stor_id] = $check;
        return $result;
        }
        return 0;
    }

    public static function store_is_or_not_in_auction($query)
    {
        foreach ($query as $store) {
            $check                   = DB::table('nm_auction')->where('auc_shop_id', '=', $store->stor_id)->count();
            $result[$store->stor_id] = $check;
        return $result;
        }
        return 0;
    }
    
    public static function merchant_is_or_not_in_deals($query)
    {
        foreach ($query as $store) {
            $check                  = DB::table('nm_deals')->where('deal_merchant_id', '=', $store->mer_id)->count();
            $result[$store->mer_id] = $check;
        return $result;
        }
        return 0;
    }

    public static function merchant_is_or_not_in_product($query)
    {
        foreach ($query as $store) {
            $check                  = DB::table('nm_product')->where('pro_mr_id', '=', $store->mer_id)->count();
            $result[$store->mer_id] = $check;
        return $result;
        }
        return 0;
    }

    public static function merchant_is_or_not_in_auction($query)
    {
        foreach ($query as $store) {
            $check                  = DB::table('nm_auction')->where('auc_merchant_id', '=', $store->mer_id)->count();
            $result[$store->mer_id] = $check;
        return $result;
        }
        return 0;
    }

    public static function view_enquiry_details()
    {
        return DB::table('nm_enquiry')->get();
    }

    public static function get_enquiry_count($enquiry_return)
    {
        foreach ($enquiry_return as $enquiry_cnt) {
            $catg_result = DB::table('nm_enquiry')->where('id', '=', $enquiry_cnt->id)->get();
            if ($catg_result) {
                $result[$enquiry_cnt->id] = count($catg_result);
            } else {
                $result[$enquiry_cnt->id] = 0;
            }
        }
        return $result;
    }

    public static function get_merchantreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            return DB::table('nm_merchant')->join('nm_store', 'nm_store.stor_merchant_id', '=', 'nm_merchant.mer_id')->join('nm_city', 'nm_city.ci_id', '=', 'nm_merchant.mer_ci_id')->where('nm_merchant.created_date', $from_date)->where('nm_merchant.mer_staus', '=', 1)->orderBy('nm_merchant.mer_id', 'DESC')->groupBy('nm_merchant.mer_id')->get();
  
        }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_merchant')->join('nm_store', 'nm_store.stor_merchant_id', '=', 'nm_merchant.mer_id')->join('nm_city', 'nm_city.ci_id', '=', 'nm_merchant.mer_ci_id')->whereBetween('nm_merchant.created_date', array(
                $from_date,
                $to_date
            ))->where('nm_merchant.mer_staus', '=', 1)->orderBy('nm_merchant.mer_id', 'DESC')->groupBy('nm_merchant.mer_id')->get();
        } else {
            
        }
        
    }
    
    
    public static function get_shopreports($from_date, $to_date, $id)
    {
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_store')->join('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->where('nm_store.stor_merchant_id', '=', $id)->where('nm_store.created_date', $from_date)->orderBy('nm_store.stor_id', 'DESC')->get();
      
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_store')->join('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->where('nm_store.stor_merchant_id', '=', $id)->whereBetween('nm_store.created_date', array(
                $from_date,
                $to_date
            ))->orderBy('nm_store.stor_id', 'DESC')->get();
        } else {
            
        }
        
    }
}

?>
