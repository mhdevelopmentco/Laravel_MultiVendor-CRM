<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Home extends Model
{
    public static function get_ad_details()
    {
        return DB::table('nm_add')->where('ad_status', '=', 0)->orderBy(DB::raw('RAND()'))->take(3)->get();
    }
    
    public static function get_noimage_details()
    {
        return DB::table('nm_imagesetting')->where('imgs_type', '=', 3)->get();
    }

    public static function getlogodetails()
    {
        return DB::table('nm_imagesetting')->where('imgs_type', '=', 1)->get();
    }
    
    public static function getbannerimagedetails()
    {
        return DB::table('nm_banner')->where('bn_status', '=', 0)->get();
    }

    public static function getmetadetails()
    {
        return DB::table('nm_generalsetting')->get();
    }
    
    public static function get_header_category()
    {
        return DB::table('nm_maincategory')->where('mc_status', '=', 1)->get();
    }
    
    public static function get_meta_details()
    {
        return DB::table('nm_generalsetting')->get();
    }

    public static function get_image_favicons_details()
    {
        return DB::table('nm_imagesetting')->where('imgs_type', '=', 2)->get();
    }

    public static function get_image_logoicons_details()
    {
        return DB::table('nm_imagesetting')->where('imgs_type', '=', 1)->get();
    }

    public static function get_category_header()
    {
        return DB::table('nm_maincategory')->where('mc_status', '=', 1)->take(6)->get();
    }

    public static function get_banner_img_details()
    {
        return DB::table('nm_banner')->where('bn_status', '=', 0)->get();
    }

    public static function get_sub_main_category($main_category)
    {
        foreach ($main_category as $main_cat) {
            $main_cat_result = DB::table('nm_secmaincategory')->where('smc_status', '=', 1)->where('smc_mc_id', '=', $main_cat->mc_id)->get();
            if ($main_cat_result) {
                $result[$main_cat->mc_id] = $main_cat_result;
            } else {
                $result[$main_cat->mc_id] = Array();
            }
        }
        return $result;
        
    }

    public static function get_shipping_addr_details($cust_id)
    {
        return DB::table('nm_shipping')->where('ship_cus_id', '=', $cust_id)->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_shipping.ship_ci_id')->LeftJoin('nm_country', 'nm_country.co_id', '=', 'nm_shipping.ship_country')->get();
    }

    public static function get_second_main_category($main_category, $sub_main_category)
    {
        foreach ($main_category as $main_cat) {
            foreach ($sub_main_category[$main_cat->mc_id] as $sub_cat) {
                $main_cat_result = DB::table('nm_subcategory')->where('sb_status', '=', 1)->where('sb_smc_id', '=', $sub_cat->smc_id)->get();
                
                if ($main_cat_result) {
                    $result[$sub_cat->smc_id] = $main_cat_result;
                } else {
                    $result[$sub_cat->smc_id] = Array();
                }
            }
        }
        return $result;
    }
    
    public static function get_second_sub_main_category()
    {
        $sub_cat_check = DB::table('nm_subcategory')->where('sb_status', '=', 1)->get();
        foreach ($sub_cat_check as $sec_sub_cat) {
            $main_cat_result = DB::table('nm_secsubcategory')->where('ssb_status', '=', 1)->where('ssb_sb_id', '=', $sec_sub_cat->sb_id)->get();
            if ($main_cat_result) {
                $result[$sec_sub_cat->sb_id] = $main_cat_result;
            } else {
                $result[$sec_sub_cat->sb_id] = Array();
            }
        }
        
        return $result;
    }
    
    public static function get_autosearch_category($like)
    {
        return DB::table('nm_maincategory')->where('mc_status', '=', 1)->where('mc_name', 'like', "%" . $like . "%")->get();
    }

    public static function get_category_count($header_category)
    {
        foreach ($header_category as $store_cnt) {
            $catg_result = DB::table('nm_product')->where('pro_mc_id', '=', $store_cnt->mc_id)->get();
            if ($catg_result) {
                $result[$store_cnt->mc_id] = count($catg_result);
            } else {
                $result[$store_cnt->mc_id] = 0;
            }
        }
        return $result;
    }

    public static function get_product_details()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->take(20)->get();
    }

    public static function get_product_details_cat()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->take(9)->groupBy('nm_product.pro_mc_id')->get();
    }

    public static function get_product_details1()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->take(9)->get();
    }

    public static function get_product_details2()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->take(9)->get();
    }
    
    public static function get_product_details_by_id($id)
    {
       return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
    }
    
    public static function get_catname_listby($id)
    {
        $get_listby_id = explode(",", $id);
        
        if ($get_listby_id[0] == 1) {
           
            return DB::table('nm_maincategory')->where('mc_id', '=', $get_listby_id[1])->get();
        } else if ($get_listby_id[0] == 2) {
            
            return DB::table('nm_secmaincategory')->where('smc_id', '=', $get_listby_id[1])->get();
        } else if ($get_listby_id[0] == 3) {
            return DB::table('nm_subcategory')->where('sb_id', '=', $get_listby_id[1])->get();
        } else if ($get_listby_id[0] == 4) {
            return DB::table('nm_secsubcategory')->where('ssb_id', '=', $get_listby_id[1])->get();
        }
    }
    
    public static function get_category_product_details_listby($id)
    {
        $get_listby_id = explode(",", $id);
        if ($get_listby_id[0] == 1) {
            return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_mc_id', '=', $get_listby_id[1])->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
        } else if ($get_listby_id[0] == 2) {
            return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_smc_id', '=', $get_listby_id[1])->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
        } else if ($get_listby_id[0] == 3) {
            return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_sb_id', '=', $get_listby_id[1])->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
        } else if ($get_listby_id[0] == 4) {
            return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_ssb_id', '=', $get_listby_id[1])->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
        }
        
    }
    
    public static function get_category_deal_details_listby($id)
    {
        $date          = date('Y-m-d H:i:s');
        $get_listby_id = explode(",", $id);
        if ($get_listby_id[0] == 1) {
            return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_category', '=', $get_listby_id[1])->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
            
        } else if ($get_listby_id[0] == 2) {
            return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_main_category', '=', $get_listby_id[1])->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
        } else if ($get_listby_id[0] == 3) {
            return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_sub_category', '=', $get_listby_id[1])->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
        } else if ($get_listby_id[0] == 4) {
            return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_second_sub_category', '=', $get_listby_id[1])->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
        }
        
    }
    
    public static function get_category_auction_details_listby($id)
    {
        $date          = date('Y-m-d H:i:s');
        $get_listby_id = explode(",", $id);
        if ($get_listby_id[0] == 1) {
            return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_category', '=', $get_listby_id[1])->where('auc_end_date', '>', $date)->get();
        } else if ($get_listby_id[0] == 2) {
            return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_main_category', '=', $get_listby_id[1])->where('auc_end_date', '>', $date)->get();
        } else if ($get_listby_id[0] == 3) {
            return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_sub_category', '=', $get_listby_id[1])->where('auc_end_date', '>', $date)->get();
        } else if ($get_listby_id[0] == 4) {
            return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_second_sub_category', '=', $get_listby_id[1])->where('auc_end_date', '>', $date)->get();
        }
        
    }
    
    public static function get_related_product($id)
    {
        
        $catid = DB::table('nm_product')->where('pro_id', '=', $id)->pluck('pro_mc_id');
        return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_id', '!=', $id)->where('pro_mc_id', '=', $catid)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->take(4)->get();
    }
    
    public static function get_all_deals_details()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_deals.deal_shop_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->orderBy(DB::raw('RAND()'))->get();
    }
    
    public static function get_deals_details_by_id($sid)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_id', '=', $sid)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
    }    

    public static function get_related_deals($id)
    {
        $date  = date('Y-m-d H:i:s');
        $catid = DB::table('nm_deals')->where('deal_id', '=', $id)->pluck('deal_category');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_id', '!=', $id)->where('deal_category', '=', $catid)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->take(4)->get();
    }
    
    public static function get_all_action_details()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_auction.auc_category')->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_auction.auc_shop_id')->get();
        
    }

    public static function getorderdetails($id)
    {
        return DB::select(DB::raw(" select * from nm_order o left join nm_product p on o.order_pro_id=p.pro_id and o.order_type=1 left join nm_deals d on o.order_pro_id=d.deal_id and o.order_type=2 where o.order_id in ($id)"));
  
    }

    public static function getordercoddetails($id)
    {  
	    return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')->groupBy('cod_id')->get();
       
    }

    public static function get_action_details_by_id($id)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_auction.auc_category')->get();
        
    }

    public static function get_related_auction($id)
    {
        $date  = date('Y-m-d H:i:s');
        $catid = DB::table('nm_auction')->where('auc_id', '=', $id)->pluck('auc_category');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_category', '=', $catid)->where('auc_id', '!=', $id)->get();
        
    }

    public static function get_selected_product_details($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->get();
    }

    public static function get_pro_rating_avg()
    {
        $result     = "";
        $rate_check = DB::table('nm_product')->where('pro_status', '=', 1)->get();
        foreach ($rate_check as $rate) {
            $rate_result = DB::table('nm_product_rating')->where('pro_id', '=', $rate->pro_id)->avg('pro_rating');
            if ($rate_result) {
                $result[$rate->pro_id] = $rate_result;
            } else {
                $result[$rate->pro_id] = Array();
            }
        }
        
        return $result;
    }

    public static function get_related_product_details($prod_det)
    {
        foreach ($prod_det as $pr_det) {
        }
        return DB::table('nm_product')->whereNotIn('pro_id', array(
            '1' => $pr_det->pro_id
        ))->where('pro_mc_id', '=', $pr_det->pro_mc_id)->get();
    }
    
    public static function get_selected_product_color_details($prod_det)
    {
        foreach ($prod_det as $pr_det) {
            
            return DB::table('nm_procolor')->where('pc_pro_id', '=', $pr_det->pro_id)->LeftJoin('nm_color', 'nm_color.co_id', '=', 'nm_procolor.pc_co_id')->get();
        }
    }

    public static function get_selected_product_size_details($prod_det)
    {
        foreach ($prod_det as $pr_det) {
        }
        return DB::table('nm_prosize')->where('ps_pro_id', '=', $pr_det->pro_id)->LeftJoin('nm_size', 'nm_size.si_id', '=', 'nm_prosize.ps_si_id')->get();
    }

    public static function get_selected_product_spec_details($prod_det)
    {
        foreach ($prod_det as $pr_det) {
        }
        
        return DB::table('nm_prospec')->where('spc_pro_id', '=', $pr_det->pro_id)->LeftJoin('nm_specification', 'nm_specification.sp_id', '=', 'nm_prospec.spc_sp_id')->LeftJoin('nm_spgroup', 'nm_specification.sp_spg_id', '=', 'nm_spgroup.spg_id')->get();
    }

    public static function get_product_details_typeahed()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->get();
    }
    
    public static function get_product_details_autosearch($like)
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_title', 'like', "%" . $like . "%")->get();
    }

    public static function get_most_visited_product()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->orderBy(DB::raw('RAND()'))->take(2)->get();
    }
    
    public static function get_product_details_use_catid($id)
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_mc_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->take(8)->get();
    }
    
    public static function get_deals_details_use_catid($id)
    {
        $date = date('Y-m-d');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_category', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
    }
 
    public static function get_auction_details_use_catid($id)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_category', '=', $id)->get();
    }
    
    public static function get_deals_details()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->orderBy(DB::raw('RAND()'))->take(9)->get();
    }
    
    public static function get_left_side_special_product()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->orderBy(DB::raw('RAND()'))->take(2)->get();
    }
    
    public static function get_auction_details()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->orderBy(DB::raw('RAND()'))->take(3)->get();
    }

    public static function get_product_details_by_category($category_id)
    {
        
        if ($category_id) {
            foreach ($category_id as $cat_id) {
                $cat_result              = DB::table('nm_product')->where('pro_mc_id', '=', $cat_id->mc_id)->get();
                $results[$cat_id->mc_id] = $cat_result;
            }
            
        } else {
            $results[0] = '';
        }
        return $results;
        
    }
       
    /*public static function facebook_login_check($fb_id, $fb_details)
    {
        if ($fb_id != '') {
            $fb_details1 = DB::table('nm_customer')->where('facebook_id', '=', $fb_id)->get();
            
            if ($fb_details1) {
                
                Session::put('username', $fb_details1[0]->cus_name);
                Session::put('customerid', $fb_details1[0]->cus_id);
                Session::put('facebookid', $fb_details1[0]->facebook_id);
                return "success";
            } else {
                
                $insert_fb = DB::table('nm_customer')->insert($fb_details);
                $fb_details = DB::table('nm_customer')->where('facebook_id', '=', $fb_id)->get();
                Session::put('username', $fb_details[0]->cus_name);
                Session::put('customerid', $fb_details[0]->cus_id);
                Session::put('facebookid', $fb_details[0]->facebook_id);
                return "success";
            }
        } else {
            return "error";
        }
    }*/
	public static function facebook_login_check($fb_id,$fb_details)
	{

		if($fb_id!='')
		{
		$fb_details1 = DB::table('nm_customer')->where('facebook_id', '=', $fb_id)->get();
		
		if($fb_details1)
		{
		
			Session::put('username',$fb_details1[0]->cus_name);
			Session::put('customerid',$fb_details1[0]->cus_id);
			Session::put('facebookid',$fb_details1[0]->facebook_id);
			return "success";
		}
		else
		{
		
			$insert_fb = DB::table('nm_customer')->insert($fb_details);
			
			
			$fb_details = DB::table('nm_customer')->where('facebook_id', '=', $fb_id)->get();
			Session::put('username',$fb_details[0]->cus_name);
			Session::put('customerid',$fb_details[0]->cus_id);
			Session::put('facebookid',$fb_details[0]->facebook_id);
			return "success";
		}
		}
		else
		{
			return "error";
		}
	}
    
    public static function get_store_list()
    {
        return DB::table('nm_store')->where('stor_status', '=', 1)->get();
    }
    
    public static function get_store_deal_count($store)
    {
        $date = date('Y-m-d H:i:s');
        foreach ($store as $store_cnt) {
            $store_result = DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_shop_id', '=', $store_cnt->stor_id)->get();
            if ($store_result) {
                $result[$store_cnt->stor_id] = count($store_result);
            } else {
                $result[$store_cnt->stor_id] = 0;
            }
        }
        return $result;
    }
    
    public static function get_store_auction_count($store)
    {
        $date = date('Y-m-d H:i:s');
        foreach ($store as $store_cnt) {
            $store_result = DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_shop_id', '=', $store_cnt->stor_id)->get();
            if ($store_result) {
                $result[$store_cnt->stor_id] = count($store_result);
            } else {
                $result[$store_cnt->stor_id] = 0;
            }
        }
        return $result;
    }
    
    
    public static function get_store_product_count($store)
    {
        foreach ($store as $store_cnt) {
            $store_result = DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_sh_id', '=', $store_cnt->stor_id)->get();
            if ($store_result) {
                $result[$store_cnt->stor_id] = count($store_result);
            } else {
                $result[$store_cnt->stor_id] = 0;
            }
        }
        return $result;
    }
    
    public static function get_sold_deal_by_id()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '<', $date)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
    }
    
    public static function get_sold_auction_by_id()
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '<', $date)->get();
    }
    
    public static function get_sold_product_by_id()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
    }
    
    public static function get_store_deal_by_id($id)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_shop_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
    }
    
    public static function get_store_auction_by_id($id)
    {
        $date = date('Y-m-d H:i:s');
        return DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_shop_id', '=', $id)->get();
    }
    
    public static function get_store_by_id($id)
    {
        return DB::table('nm_store')->where('stor_status', '=', 1)->where('stor_id', '=', $id)->get();
    }
    
    public static function get_store_product_by_id($id)
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_sh_id', '=', $id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
    }
    
    public static function get_cms_page_title()
    {
        return DB::table('nm_cms_pages')->where('cp_status', '=', 1)->orderBy('cp_title', 'asc')->get();
    }

    public static function get_social_media_url()
    {
        return DB::table('nm_social_media')->where('sm_id', 1)->get();
    }

    public static function get_add_to_cart_details()
    {
        $get_pro_dea = "";
        if (isset($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                $pid               = $_SESSION['cart'][$i]['productid'];
                $pname             = "Have to get";
                $get_pro_dea[$pid] = DB::table('nm_product')->where('pro_id', $pid)->get();
            }
        } else {
            $get_pro_dea[0] = array();
        }
        return $get_pro_dea;
    }
    
    public static function get_add_to_cart_deal_details()
    {
        $get_pro_dea = "";
        if (isset($_SESSION['deal_cart'])) {
            $max = count($_SESSION['deal_cart']);
            for ($i = 0; $i < $max; $i++) {
                $pid               = $_SESSION['deal_cart'][$i]['productid'];
                $pname             = "Have to get";
                $get_pro_dea[$pid] = DB::table('nm_deals')->where('deal_id', $pid)->get();
            }
        } else {
            $get_pro_dea[0] = array();
        }
        return $get_pro_dea;
    }
    
    public static function get_add_to_cart_size()
    {
        $color_result = "";
        if (isset($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                $size = $_SESSION['cart'][$i]['size'];
                if ($size != '') {
                    $pname    = "Have to get";
                    $size_tab = DB::table('nm_size')->where('si_id', '=', $size)->get();
                    if ($size_tab) {
                        foreach ($size_tab as $sizename) {
                        }
                        $color_result[$size] = $sizename->si_name;
                    } else {
                        $color_result[$size] = '-';
                    }
                } else {
                    $color_result[$size] = '-';
                }
            }
        } else {
            $color_result[0] = array();
        }
        return $color_result;
    }

    public static function get_add_to_cart_color()
    {
        $color_result = "";
        if (isset($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                $color = $_SESSION['cart'][$i]['color'];
                if ($color != '') {
                    $pname     = "Have to get";
                    $color_tab = DB::table('nm_colorfixed')->where('cf_id', '=', $color)->get();
                    if ($color_tab) {
                        foreach ($color_tab as $colorname) {
                        }
                        $color_result[$color] = $colorname->cf_name;
                    } else {
                        $color_result[$color] = '-';
                    }
                } else {
                    $color_result[$color] = '-';
                }
            }
        } else {
            $color_result[0] = array();
            ;
        }
        return $color_result;
    }

    public static function get_added_product_details($cart_id, $cart_color, $cart_size)
    {
        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($cart_id == $_SESSION['cart'][$i]['productid']) {
                if ($cart_color == $_SESSION['cart'][$i]['color']) {
                    if ($cart_size == $_SESSION['cart'][$i]['size']) {
                        return 1;
                        break;
                    }
                }
            }
        }
        
    }
    
    public static function get_added_deal_details($cart_id)
    {
        $max = count($_SESSION['deal_cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($cart_id == $_SESSION['deal_cart'][$i]['productid']) {
                return 1;
                break;
            }
        }
        
    }
    
    public static function get_already_deals_details($cart_id)
    {
        $max = count($_SESSION['deal_cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($cart_id == $_SESSION['deal_cart'][$i]['productid']) {
                $qty = $_SESSION['deal_cart'][$i]['qty'];
                break;
            }
        }
        $get_pro_dea = DB::table('nm_deals')->where('deal_id', $cart_id)->get();
        return $get_pro_dea[0]->deal_title . ' is already present in your cart. Modify quantity from below
You have now ' . $qty . ' Product(s) in your cart.';
        
    }
    
    public static function get_already_product_details($cart_id)
    {
        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($cart_id == $_SESSION['cart'][$i]['productid']) {
                $qty = $_SESSION['cart'][$i]['qty'];
                break;
            }
        }
        $get_pro_dea = DB::table('nm_product')->where('pro_id', $cart_id)->get();
        return $get_pro_dea[0]->pro_title . ' is already present in your cart. Modify quantity from below
You have now ' . $qty . ' Product(s) in your cart.';
        
    }
    
    public static function get_estimate_zipcode_range($range)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_code_series', '<=', $range)->where('ez_code_series_end', '>=', $range)->get();
    }

    public static function purchased_checkout_product_insert($pid)
    {  
        $check                  = DB::table('nm_product')->where('pro_id', $pid)->get();
        $pro_no_of_purchase     = $check[0]->pro_no_of_purchase;
        $new_pro_no_of_purchase = $pro_no_of_purchase + 1;
        foreach ($check as $row) {
            $pur      = $row->pro_no_of_purchase;
            $purchase = $pur + 1;
            $quantity = $row->pro_qty;
        }
        if ($purchase >= $quantity) {
            return DB::table('nm_product')->where('pro_id', $pid)->update(array(
                'pro_no_of_purchase' => $new_pro_no_of_purchase,
                'sold_status' => 0
            ));
        } elseif ($purchase < $quantity) {
            
            return DB::table('nm_product')->where('pro_id', $pid)->update(array(
                'pro_no_of_purchase' => $new_pro_no_of_purchase
            ));
        }
        
    }

    public static function paypal_checkout_insert($data)
    {
        return DB::table('nm_order')->insert($data);
    }

    public static function insert_shipping_addr($data, $cust_id)
    {
        return DB::table('nm_shipping')->insert($data);
        
    }

    public static function cod_checkout_insert($data)
    {
        return DB::table('nm_ordercod')->insert($data);
        
    }

    public static function trans_check($transaction_id)
    {
        return DB::table('nm_ordercod')->where('cod_transaction_id', $transaction_id)->get();
        
    }

    public static function paypal_checkout_update($data, $insert_id)
    {
        $insert_id_exp   = explode(',', $insert_id);
        $insert_id_count = count($insert_id_exp);
        for ($i = 0; $i < $insert_id_count; $i++) {
            $result         = DB::table('nm_order')->where('order_id', '=', $insert_id_exp[$i])->update($data);
            $order_pro_type = DB::table('nm_order')->where('order_id', $insert_id_exp[$i])->pluck('order_type');
            $order_pro_id   = DB::table('nm_order')->where('order_id', $insert_id_exp[$i])->pluck('order_pro_id');
            $order_pro_qty  = DB::table('nm_order')->where('order_id', $insert_id_exp[$i])->pluck('order_qty');
            if ($order_pro_type == 1) {
                #product	
                $last_count_purchase = DB::table('nm_product')->where('pro_id', $order_pro_id)->pluck('pro_no_of_purchase');
                $last_count_new      = $last_count_purchase + $order_pro_qty;
                $entry               = array(
                    'pro_no_of_purchase' => $last_count_new
                );
                DB::table('nm_product')->where('pro_id', '=', $order_pro_id)->update($entry);
                
            } else if ($order_pro_type == 2) {
                #deals		
                $last_count_purchase = DB::table('nm_deals')->where('deal_id', $order_pro_id)->pluck('deal_no_of_purchase');
                $last_count_new      = $last_count_purchase + $order_pro_qty;
                $entry               = array(
                    'deal_no_of_purchase' => $last_count_new
                );
                DB::table('nm_deals')->where('deal_id', '=', $order_pro_id)->update($entry);
                
            }
        }
        return $result;
    }
    
    public static function save_bidding_details($entry)
    {
        return DB::table('nm_order_auction')->insert($entry);
    }
    
    public static function auction_last_bidder($auction_details)
    {
        $result = "";
        foreach ($auction_details as $auction) {
            $auction_result = DB::table('nm_order_auction')->orderBy('oa_id', 'desc')->take(1)->where('oa_pro_id', '=', $auction->auc_id)->get();
            foreach ($auction_result as $auction_biddeer_name) {
            }
            if ($auction_result) {
                $result[$auction->auc_id] = $auction_biddeer_name->oa_cus_name;
            } else {
                
                $result[$auction->auc_id] = array();
            }
            
        }
        return $result;
        
    }
    
    public static function max_bid_amt($id)
    {
        
        $result = DB::table('nm_order_auction')->where('oa_pro_id', '=', $id)->max('oa_bid_amt');
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }
    
    public static function get_bidder_by_id($id)
    {
        
        $auction_result = DB::table('nm_order_auction')->orderBy('oa_id', 'desc')->take(5)->where('oa_pro_id', '=', $id)->get();
        if ($auction_result) {
            return $auction_result;
        } else {
            return '';
        }
        
    }

    public static function get_paypal_credentials()
    {
        return DB::table('nm_paymentsettings')->where('ps_id', '=', 1)->get();
    }

    public static function get_fb_app_id()
    {
        return DB::table('nm_social_media')->where('sm_id', '=', 1)->pluck('sm_fb_app_id');
    }
    
    public static function get_product_search($id)
    {
        return DB::table('nm_product')->where('pro_title', 'LIKE', '%' . $id . '%')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
    }

    public static function get_deal_search($id)
    {
        return DB::table('nm_deals')->where('deal_title', 'LIKE', '%' . $id . '%')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_deals.deal_category')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_deals.deal_main_category')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_deals.deal_sub_category')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_deals.deal_second_sub_category')->get();
    }
    
    public static function insert_enquiry($entry)
    {
        return DB::table('nm_enquiry')->insert($entry);
    }

    public static function get_settings()
    {
        
        return DB::table('nm_paymentsettings')->where('ps_id', '=', '1')->get();
        
    }

    public static function get_breadcrumb_category($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->get();
        
    }

    public static function get_breadcrumb_deal($id)
    {
        return DB::table('nm_deals')->where('deal_id', '=', $id)->get();
        
    }

    public static function comment_insert($entry)
    {
        return DB::table('nm_review')->insert($entry);
    }

    public static function get_countone($id)
    {
        return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 1)->count();
    }

    public static function get_counttwo($id)
    {
        return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 2)->count();
  
    }

    public static function get_countthree($id)
    {
       return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 3)->count();
    }

    public static function get_countfour($id)
    {
        return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 4)->count();
    }

    public static function get_countfive($id)
    {
        return DB::table('nm_review')->where('product_id', '=', $id)->where('ratings', '=', 5)->count();
    
    }

    public static function get_customer_details()
    {
         return DB::table('nm_review')->LeftJoin('nm_customer', 'nm_review.customer_id', '=', 'nm_customer.cus_id')->get();
    }

    public static function get_review_details()
    {
         return DB::table('nm_review')->where('status', '=', 0)->get();
    }

    public static function get_prd_deatils($id)
    {
        $return = DB::table('nm_product')->where('pro_id', '=', $id)->get();
        foreach ($return as $row) {
            $store_id = $row->pro_sh_id;
        }
        return DB::table('nm_store')->where('stor_id', '=', $store_id)->get();

    }
    
    public static function get_dealcountone($id)
    {
        return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 1)->count();
    }

    public static function get_dealcounttwo($id)
    {
       return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 2)->count();
    }

    public static function get_dealcountthree($id)
    {
       return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 3)->count();
    }

    public static function get_dealcountfour($id)
    {
        return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 4)->count();
    }

    public static function get_dealcountfive($id)
    {
        return DB::table('nm_review')->where('deal_id', '=', $id)->where('ratings', '=', 5)->count();
    }
    
    public static function get_deal_deatils($id)
    {
        $return = DB::table('nm_deals')->where('deal_id', '=', $id)->get();
        foreach ($return as $row) {
            $store_id = $row->deal_shop_id;
        }
        return DB::table('nm_store')->where('stor_id', '=', $store_id)->get();
   
    }

    public static function get_store_sub_details($id)
    {
        $return = DB::table('nm_store')->where('stor_id', '=', $id)->get();
        foreach ($return as $row) {
            $stor_merchant_id = $row->stor_merchant_id;
        }
        return DB::table('nm_store')->where('stor_merchant_id', '=', $stor_merchant_id)->get();
        
    }

    public static function get_women_cat_title()
    {
        return DB::table('nm_maincategory')->where('mc_id', '=', 3)->get();
    }

    public static function get_category_product()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
      
    }

    public static function get_women_product()
    {
        $product = DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->LeftJoin('nm_secmaincategory', 'nm_secmaincategory.smc_id', '=', 'nm_product.pro_smc_id')->LeftJoin('nm_subcategory', 'nm_subcategory.sb_id', '=', 'nm_product.pro_sb_id')->LeftJoin('nm_secsubcategory', 'nm_secsubcategory.ssb_id', '=', 'nm_product.pro_ssb_id')->get();
        foreach ($product as $women) {
            $prod_cat_id = $women->pro_mc_id;
            
        }
        if (empty($prod_cat_id)) {
            return DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->take(5)->get();
        } else {
            return DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_mc_id', '=', $prod_cat_id)->LeftJoin('nm_maincategory', 'nm_maincategory.mc_id', '=', 'nm_product.pro_mc_id')->take(5)->get();
        }
    }
    
    public static function get_storecountone($id)
    {
       return DB::table('nm_review')->where('store_id', '=', $id)->where('ratings', '=', 1)->count();
    }

    public static function get_storecounttwo($id)
    {
      return DB::table('nm_review')->where('store_id', '=', $id)->where('ratings', '=', 2)->count();
    }

    public static function get_storecountthree($id)
    {
      return DB::table('nm_review')->where('store_id', '=', $id)->where('ratings', '=', 3)->count();
    }

    public static function get_storecountfour($id)
    {
      return DB::table('nm_review')->where('store_id', '=', $id)->where('ratings', '=', 4)->count();
    }

    public static function get_storecountfive($id)
    {
      return DB::table('nm_review')->where('store_id', '=', $id)->where('ratings', '=', 5)->count();
    }

    public static function get_store_deatils($id)
    {
        $return = DB::table('nm_store')->where('stor_id', '=', $id)->get();
        foreach ($return as $row) {
            $store_id = $row->stor_id;
        }
        return DB::table('nm_store')->where('stor_id', '=', $store_id)->get();
    
    }

    public static function get_store_setting()
    {
        return DB::table('nm_emailsetting')->get();
    }

    public static function get_store_all()
    {
        return DB::table('nm_store')->get();
    }

    public static function get_default_city()
    {
        return DB::table('nm_city')->where('ci_default', '=', 1)->get();
    }

    public static function get_smtp_mail()
    {
        return DB::table('nm_smtp')->where('sm_isactive', '=', 1)->get();
    }

    public static function get_general_settings()
    {
	    return DB::table('nm_generalsetting')->get();
    }  
	
	public static function transaction_id($id)
	{
        
        return DB::table('nm_ordercod')->where('cod_id', '=', $id)->pluck('cod_transaction_id');
    }
	
	public static function get_subtotal($id)
	{
       	return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->sum('cod_amt');
    }
	
	public static function get_tax($id)
	{
       	return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->sum('cod_tax');
    }
	
	public static function get_shipping_amount($id)
	{
       	return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)
		->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')
		->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')
		->sum('pro_shippamt');
    }
	/* Get Merchant Based Transaction ID */
	public static function get_merchant_based_transaction_id($trans_id)
	{
		return DB::table('nm_ordercod')->select('cod_transaction_id','cod_merchant_id')->where('cod_transaction_id','=',$trans_id)->groupBy('cod_merchant_id')->get();
	}
	/* Merchant mail subtotal calculation */
	public static function get_mer_subtotal($transid,$merchant_id)
	{
	    return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $transid)->where('cod_merchant_id','=',$merchant_id)->sum('cod_amt');
		
    }
	/* Merchant mail tax calculation */
	public static function get_mer_tax($transid,$merchant_id)
	{
       	return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $transid)->where('cod_merchant_id','=',$merchant_id)->sum('cod_tax');
    }
	/* Merchant mail shipping amount calculation */
	public static function get_mer_shipping_amount($transid,$merchant_id)
	{
       	return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $transid)->where('cod_merchant_id','=',$merchant_id)
		->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')
		->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')
		->sum('pro_shippamt');
    }
	/* Get Transaction ID for paypal payment */
	/*
	public static function order_transaction_id($id)
	{
        return DB::table('nm_order')->where('order_id', '=', $id)->pluck('transaction_id');
    }
	
	public static function get_order_subtotal($id)
	{
       	return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->sum('cod_amt');
    }
	
	public static function get_order_tax($id)
	{
       	return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)->sum('cod_tax');
    }
	
	public static function get_order_shipping_amount($id)
	{
       	return DB::table('nm_ordercod')->where('cod_transaction_id', '=', $id)
		->LeftJoin('nm_product', 'nm_product.pro_id', '=', 'nm_ordercod.cod_pro_id')
		->LeftJoin('nm_deals', 'nm_deals.deal_id', '=', 'nm_ordercod.cod_pro_id')
		->sum('pro_shippamt');
    }
	*/
    
}

?>
