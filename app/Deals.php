<?php
namespace App;
use DB;
use File;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Deals extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_cms_pages';
    
    public static function save_deal($entry)
    {
        return DB::table('nm_deals')->insert($entry);
        
    }
    
    public static function get_category()
    {
        return DB::table('nm_maincategory')->where('mc_status', '=', 1)->get();
    }
    
    public static function get_merchant_details()
    {
        return DB::table('nm_merchant')->where('mer_staus', '=', 1)->get();
    }

    public static function get_main_category_ajax($id)
    {
        return DB::table('nm_secmaincategory')->where('smc_mc_id', '=', $id)->where('smc_status', '=', 1)->get();
    }
    
    public static function get_sub_category_ajax($id)
    {
        return DB::table('nm_subcategory')->where('sb_smc_id', '=', $id)->where('sb_status', '=', 1)->get();
    }
    
    public static function get_second_sub_category_ajax($id)
    {
        return DB::table('nm_secsubcategory')->where('ssb_sb_id', '=', $id)->where('ssb_status', '=', 1)->get();
    }
    
    public static function get_deals($id)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->get();
    }
    
    public static function get_main_category_ajax_edit($id)
    {
        return DB::table('nm_secmaincategory')->where('smc_id', '=', $id)->get();
    }
    
    public static function get_sub_category_ajax_edit($id)
    {
        return DB::table('nm_subcategory')->where('sb_id', '=', $id)->get();
    }
    
    public static function check_title_exist_ajax($title)
    {
        return DB::table('nm_deals')->where('deal_title', '=', $title)->get();
    }
    
    public static function check_title_exist_ajax_edit($id, $title)
    {
        return DB::table('nm_deals')->where('deal_title', '=', $title)->where('deal_id', '!=', $id)->get();
    }
    
    public static function get_second_sub_category_ajax_edit($id)
    {
        return DB::table('nm_secsubcategory')->where('ssb_id', '=', $id)->get();
    }

    public static function edit_deal($entry, $id)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->update($entry);
    }
    
    public static function get_deal_details($date)
    {
        return DB::table('nm_deals')->where('deal_end_date', '>', $date)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
    }
    
    public static function block_deal_status($id, $status)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->update($status);
    }
    
    public static function get_expired_deals($date)
    {
        return DB::table('nm_deals')->where('deal_end_date', '<', $date)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
    }
    
    public static function get_deals_view($id)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_deals.deal_category', '=', 'nm_maincategory.mc_id')->LeftJoin('nm_secmaincategory', 'nm_deals.deal_main_category', '=', 'nm_secmaincategory.smc_id')->LeftJoin('nm_subcategory', 'nm_deals.deal_sub_category', '=', 'nm_subcategory.sb_id')->LeftJoin('nm_secsubcategory', 'nm_deals.deal_second_sub_category', '=', 'nm_secsubcategory.ssb_id')->LeftJoin('nm_merchant', 'nm_deals.deal_merchant_id', '=', 'nm_merchant.mer_id')->LeftJoin('nm_store', 'nm_deals.deal_shop_id', '=', 'nm_store.stor_id')->get();
    }
    
    public static function get_chart_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_deals WHERE MONTH( `deal_posted_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_archievd_deals()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_expiry_date', '<', $date)->count();
    }
    
    public static function get_active_details()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_expiry_date', '>', $date)->count();
    }
    
    public static function get_dealreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            return DB::table('nm_deals')->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->where('nm_deals.created_date', $from_date)->get();
            
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_deals')->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->whereBetween('nm_deals.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    public static function exdeals_rep($from_date, $to_date, $date)
    {
        
        if($from_date != '' && $to_date == '') {
           return DB::table('nm_deals')->where('deal_expiry_date', '<', $date)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->where('nm_deals.created_date', $from_date)->get();
            
        }
        
        elseif($from_date != '' && $to_date != '') {
            
            
            return DB::table('nm_deals')->where('deal_expiry_date', '<', $date)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->whereBetween('nm_deals.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function check_store($deal_title, $Select_Shop)
    {
       return DB::table('nm_deals')->where('deal_title', '=', $deal_title)->where('deal_shop_id', '=', $Select_Shop)->get();
    }
	
	// public static function delete_deals($id)
	// {
	//    return DB::table('nm_deals')->where('deal_id', '=', $id)->delete();
	// }

     public static function delete_deals($id)
    {
        
        // To start Image delete from folder 09/11/ 
        $filename = DB::table('nm_deals')->where('deal_id', '=', $id)->first();
        $getimagename= $filename->deal_image;
        $getextension=explode("/**/",$getimagename);
        foreach($getextension as $imgremove)
        {
            File::delete(base_path('assets/deals/').$imgremove);
        } 
        // To End 
        return DB::table('nm_deals')->where('deal_id', '=', $id)->delete();
        
    }
	
	public static function get_order_deals_details()
	{
	   return DB::table('nm_order')->where('order_type', '=', 2)->get();
	}

    //Deal Review manage
     public static function get_deal_review()
    {
        return DB::table('nm_review')->Leftjoin('nm_deals','nm_deals.deal_id','=','nm_review.deal_id')->Leftjoin('nm_customer','nm_review.customer_id','=','nm_customer.cus_id')->where('nm_review.deal_id','!=','NULL')->get();
    }
    public static function edit_deal_review($id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->get();
    }
    public static function update_deal_review($entry, $id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->update($entry);
    }
    public static function delete_deal_review($id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->delete();
    }
    public static function block_deal_review_status($id, $status)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->update($status);
    }
    
}

?>
