<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Merchantdeals extends Model
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
    
    public static function get_deal_details($date, $mer_id)
    {
        return DB::table('nm_deals')->where('deal_end_date', '>', $date)->where('deal_merchant_id', '=', $mer_id)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
    }
    
    public static function block_deal_status($id, $status)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->update($status);
    }
    
    public static function get_expired_deals($date, $mer_id)
    {
       return DB::table('nm_deals')->where('deal_expiry_date', '<', $date)->where('deal_merchant_id', '=', $mer_id)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
    }
    
    public static function get_deals_view($id)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_deals.deal_category', '=', 'nm_maincategory.mc_id')->LeftJoin('nm_secmaincategory', 'nm_deals.deal_main_category', '=', 'nm_secmaincategory.smc_id')->LeftJoin('nm_subcategory', 'nm_deals.deal_sub_category', '=', 'nm_subcategory.sb_id')->LeftJoin('nm_secsubcategory', 'nm_deals.deal_second_sub_category', '=', 'nm_secsubcategory.ssb_id')->LeftJoin('nm_merchant', 'nm_deals.deal_merchant_id', '=', 'nm_merchant.mer_id')->LeftJoin('nm_store', 'nm_deals.deal_shop_id', '=', 'nm_store.stor_id')->get();
    }

    public static function merchant_dealrep($from_date, $to_date, $mer_id)
    {
        if ($from_date != '' & $to_date == '') {
            return DB::table('nm_deals')->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->where('nm_deals.created_date', $from_date)->where('nm_deals.deal_merchant_id', $mer_id)->get();
        }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_deals')->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->whereBetween('nm_deals.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {

        }
        
    }
    
    public static function merchantexp_dealrep($from_date, $to_date, $mer_id, $date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_deals')->where('nm_deals.deal_expiry_date', '<', $date)->where('nm_deals.deal_merchant_id', '=', $mer_id)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->where('nm_deals.created_date', $from_date)->get();
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_deals')->where('nm_deals.deal_expiry_date', '<', $date)->where('nm_deals.deal_merchant_id', '=', $mer_id)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->whereBetween('nm_deals.created_date', array(
                $from_date,
                $to_date
            ))->get();
                   
            
        } else {

        }
        
    }
	public static function delete_deals($id)
	{
			 
	    return DB::table('nm_deals')->where('deal_id', '=', $id)->delete();
						
	}
	
	public static function get_order_deals_details()
	{
		return DB::table('nm_order')->where('order_type', '=', 2)->get();
	}
    
}

?>
