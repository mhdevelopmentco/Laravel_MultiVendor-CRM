<?php 
class MobileModel extends Eloquent
{
	
	
	
	
	
	
	public static function get_banner_img_details()
	{
		$sql = DB::table('nm_banner')->where('bn_status', '=', 0)->get();
		
		if (count($sql) > 0) {
		
		$json ='{"result":"success","Banner_Image":[';
		
		foreach($sql as $data)
		{
			$json.='{"bn_id":"'.$data->bn_id.'",
					"bn_title":"'.strip_tags($data->bn_title).'",
					"bn_img":"'.url()."/assets/bannerimage/".$data->bn_img.'"},';
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		echo $json;
		}
		else
		{
		echo $json='{ "result" : "No Banner image Found "}';
		}
	
	}
	
	
	
	public static function get_all_category_list()
	{
		$sql = DB::select(DB::raw("select * from nm_maincategory where mc_status =1"));
		if (count($sql) > 0) {
		$json ='{"result":"success","Cateogry_List":[';
		
		foreach($sql as $data)
		{
			$json.='{"category_id":"'.$data->mc_id.'",
					"category_name":"'.strip_tags($data->mc_name).'",
					"Category_image":"'.url()."/assets/categoryimage/".$data->mc_img.'"
					
					},';
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
	
		else
		{
		echo $json='{ "result" : "No Category Found "}';
		}
	
	}
	
	
	public static function get_sub_category_list($mc_id)
	{
		$sql = DB::select(DB::raw("select * from nm_secmaincategory where smc_mc_id='$mc_id' and smc_status =1"));
		if (count($sql) > 0) {
		$json ='{"result":"success","Subcategory_List":[';
		
		foreach($sql as $data)
		{
			$json.='{"sub_category_id":"'.$data->smc_id.'",
					"subcategory_name":"'.strip_tags($data->smc_name).'"
					
					},';
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		else
		{
		echo $json='{ "result" : "No Sub Category Found "}';
		}
	
	}
	
	public static function stores_list()
	{
		$sql = DB::table('nm_store')->where('stor_status', '=', 1)->get();
		return $sql;
		
	}
	
	public static function get_stores_deal_count($stores_list)
	{
		
		$date = date('Y-m-d H:i:s');
		$json ='{"result":"success","store_list":[';
		
		foreach($stores_list as $store_cnt)
		{
			$store_deal_result = DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_expiry_date', '>', $date)->where('deal_shop_id','=',$store_cnt->stor_id)->get();
			if($store_deal_result)
			{
			$result_deal[$store_cnt->stor_id]=count($store_deal_result);
			}
			else
			{
				$result_deal[$store_cnt->stor_id]=0;
			}
			
			$store_auction_result = DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_shop_id','=',$store_cnt->stor_id)->get();
			if($store_auction_result)
			{
			$result_auction[$store_cnt->stor_id]=count($store_auction_result);
			}
			else
			{
				$result_auction[$store_cnt->stor_id]=0;
			}
			
			$store_product_result = DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_sh_id','=',$store_cnt->stor_id)->get();
				if($store_product_result)
				{
				$result_product[$store_cnt->stor_id]=count($store_product_result);
				}
				else
				{
					$result_product[$store_cnt->stor_id]=0;
				}
				
				if($result_deal[$store_cnt->stor_id] != 0)
				{
				 $deal_count = $result_deal[$store_cnt->stor_id];
				}
				else 
				{
				 $deal_count = 'N/A';
				} 
				
				if($result_auction[$store_cnt->stor_id] != 0)
				{
				 $auction_count = $result_auction[$store_cnt->stor_id];
				}
				else 
				{
				 $auction_count = 'N/A';
				} 
				
				if($result_product[$store_cnt->stor_id] != 0)
				{
				 $product_count = $result_product[$store_cnt->stor_id];
				}
				else 
				{
				 $product_count = 'N/A';
				} 
				
			$store_detail_list = DB::table('nm_store')->where('stor_status', '=', 1)->where('stor_id', '=', $store_cnt->stor_id)->get();	
			
			foreach($store_detail_list as $store_det)
			{
				
				$json.='{
					"stor_id":"'.$store_cnt->stor_id.'",
					"stor_name":"'.$store_cnt->stor_name.'",
					"store_image":"'.url()."/assets/storeimage/".$store_cnt->stor_img.'",
					"Deal":"'.$deal_count.'",
					"Product":"'.$product_count.'",
					"Auction":"'.$auction_count.'",
					"stor_address1":"'.$store_det->stor_address1.'",
					"stor_address2":"'.$store_det->stor_address2.'",
					"stor_zipcode":"'.$store_det->stor_zipcode.'",
					"stor_phone":"'.$store_det->stor_phone.'"
					"stor_latitude":"'.$store_det->stor_latitude.'",
					"stor_longitude":"'.$store_det->stor_longitude.'",
					"stor_website":"'.$store_det->stor_website.'"
					
					
					
					},';
					
			}
		}
		
			
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			
		}
		
		
	
	
	
	
	
	
	

		public static function get_product_details()
		{
			$sql = DB::table('nm_product')->where('pro_status', '=', 1)->orderBy(DB::raw('RAND()'))->take(9)->get();
			if (count($sql) > 0) {
			$json ='{"result":"success","Product_List":[';
			foreach($sql as $data)
			{
				$product_saving_price = $data->pro_price - $data->pro_disprice;
				$product_discount_percentage = round(($product_saving_price/ $data->pro_price)*100,2);
				
				$product_img = explode('/**/', $data->pro_Img);
				
				$json.='{"product_id":"'.$data->pro_id.'",
						"product_created_date":"'.strip_tags($data->pro_created_date).'",
						"product_title":"'.strip_tags($data->pro_title).'",
						"product_description":"'.strip_tags($data->pro_desc).'",
						"product_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
						"product_original_price":"'.$data->pro_disprice.'",
						"product_image":"'.url()."/assets/product/".$product_img[0].'"
						
						},';
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
			
			else
			{
			echo $json='{ "result" : "No Products Found "}';
			}
		
		}




	public static function get_category_product_details($id)
	{
		
		$sql =  DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_mc_id', '=', $id)->get();
		
		$result = array();
		
		if (count($sql) > 0) {
		$json ='{"result":"success","Product_Category_List":[';
		foreach($sql as $data)
		{
			$product_saving_price = $data->pro_price - $data->pro_disprice;
			$product_discount_percentage = round(($product_saving_price/ $data->pro_price)*100,2);
			
			$product_img = explode('/**/', $data->pro_Img);
			
			
			$json.='{"product_id":"'.$data->pro_id.'",
					"product_created_date":"'.strip_tags($data->pro_created_date).'",
					"product_title":"'.strip_tags($data->pro_title).'",
					"product_description":"'.strip_tags($data->pro_desc).'",
					"product_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
					"product_original_price":"'.$data->pro_disprice.'",
					"product_image":"'.url()."/assets/product/".$product_img[0].'"
					
					},';
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		
		
		else
		{
		echo $json='{ "result" : "No Category Products Found "}';
		}
	}
	
	public static function get_selected_product_details($id)
	{
		//return DB::table('nm_product')->where('pro_mc_id', '=', $id)->where('pro_status', '=', )->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_product.pro_mc_id')->get();

		return DB::select(DB::raw("SELECT * FROM nm_product left join nm_maincategory on nm_maincategory.mc_id = nm_product.pro_mc_id where nm_product.pro_mc_id = $id and nm_product.pro_status=1"));
	}
	
	public static function get_selected_product_detail_image($id)
	{
		
		$sql = DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_id', '=', $id)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_product.pro_mc_id')->get();
		if (count($sql) > 0) {
		$json ='{"result":"success","product_detail_image_list":[';
		
		foreach($sql as $data)
		{	
				$product_img = explode('/**/', $data->pro_Img);
				$img_count = count($product_img);
				
			/*$json.='{"product_image_list":"';
					for($i=0;$i < $img_count;$i++) {		
					$pr_image = url()."/assets/product/".$product_img[$i]."<br>";
					$json.= $pr_image;
					}
					$json.= '"	},';*/
				for($i=0;$i < $img_count;$i++) {
				if($product_img[$i] != '')
				{					
				$json.='{"product_image_list":"'.url()."/assets/product/".$product_img[$i].'"},';
				}
				}	
			
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		
		
		else
		{
		echo $json='{ "result" : "No Image Found "}';
		}
		
	}
	
	public static function get_selected_deal_detail_image($id)
	{
		
		$sql = DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_id', '=', $id)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_deals.deal_main_category')->get();
		if (count($sql) > 0) {
		$json ='{"result":"success","deal_detail_image_list":[';
		
		foreach($sql as $data)
		{	
				
				$product_img = explode('/**/', $data->deal_image);
				
				$img_count = count($product_img);
				
			/*$json.='{"product_image_list":"';
					for($i=0;$i < $img_count;$i++) {		
					$pr_image = url()."/assets/product/".$product_img[$i]."<br>";
					$json.= $pr_image;
					}
					$json.= '"	},';*/
				for($i=0;$i < $img_count;$i++) {	
				if($product_img[$i] != '')
				{		
				$json.='{"deal_image_list":"'.url()."/assets/deals/".$product_img[$i].'"},';
				}
				}
				
			
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		
		
		else
		{
		echo $json='{ "result" : "No Image Found "}';
		}
		
	}



	public static function get_category_product_detail_view($product_details)
	{
		
		$json ='{"result":"success","Product_Category_List":[';
		foreach($product_details as $pr_det) 
		{	
			
			$product_saving_price = $pr_det->pro_price - $pr_det->pro_disprice;
			$product_discount_percentage = round(($product_saving_price/ $pr_det->pro_price)*100,2);		
			
			 $color_detail = DB::select(DB::raw("SELECT GROUP_CONCAT(cf_name) As color,GROUP_CONCAT(cf_id) As color_id FROM nm_procolor left join nm_colorfixed on nm_colorfixed.cf_id = nm_procolor.pc_co_id where nm_procolor.pc_pro_id in ($pr_det->pro_id)"));//print_r($color_detail);
			//print_r($color_detail);exit;
			
			 $size_detail = DB::select(DB::raw("SELECT GROUP_CONCAT(si_name) As size,GROUP_CONCAT(si_id) As size_id FROM nm_prosize left join nm_size on nm_size.si_id = nm_prosize.ps_si_id where nm_prosize.ps_pro_id in ($pr_det->pro_id)"));
			 //print_r($size_detail);exit;
			 
			 $spec_details = DB::select(DB::raw("SELECT GROUP_CONCAT(spg_name) As group_name,GROUP_CONCAT(sp_name) As spec_name, GROUP_CONCAT(spc_pro_id) As spec_id FROM nm_prospec left join nm_specification on nm_specification.sp_id = nm_prospec.spc_sp_id left join nm_spgroup on nm_specification.sp_spg_id = nm_spgroup.spg_id where nm_prospec.spc_pro_id in ($pr_det->pro_id)"));
			 
			
			
			
			foreach($color_detail as $color)
			{
				
				foreach($size_detail as $size)
				{
				
					foreach($spec_details as $spec)
					{
				
				$product_img = explode('/**/', $pr_det->pro_Img);
				$img_count = count($product_img);
				if($pr_det->pro_no_of_purchase >= $pr_det->pro_qty) 
			 	{ 
			 	$status = "sold";
				echo $json='{ "result" : "No Active Products Found "}';
				 }
			 	else
			 	{ 
				$status = "Compare products";	 
				 }
				
				$json.='{"product_id":"'.$pr_det->pro_id.'",
						"product_title":"'.strip_tags($pr_det->pro_title).'",
						"product_description":"'.strip_tags($pr_det->pro_desc).'",
						"product_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
						"product_original_price":"'.round($pr_det->pro_price).'",
						"product_discount_price":"'.round($pr_det->pro_disprice).'",
						"Category":"'.strip_tags($pr_det->mc_name).'",
						"product_image":"'.url()."/assets/product/".$product_img[0].'",
						"product_no_of_purchase":"'.$pr_det->pro_no_of_purchase.'",
						"product_qty":"'.$pr_det->pro_qty.'",
					 	"product_color":"'.strip_tags($color->color).'",
						"Color_id":"'.$color->color_id.'",
						"product_size":"'.strip_tags($size->size).'",
						"Size_id":"'.$size->size_id.'",
						"product_delivery":"'.$pr_det->pro_delivery.'",
						"specification_group":"'.$spec->group_name.'",
						"specification":"'.$spec->spec_name.'",
						"status":"'.$status.'",
						"shipping_price":"'.round($pr_det->pro_shippamt).'"
						
						},';
					}
				
				}	
						
			}		
					
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		
		
		 
		
	
	}
	
	
	public static function get_country_list()
	{
		
	$sql =  DB::table('nm_country')->get();
		
		$result = array();
		
		if (count($sql) > 0) {
		$json ='{"result":"success","Country_List":[';
		foreach($sql as $data)
		{
			
			
			
			
			$json.='{"country_id":"'.$data->co_id.'",
					"country_name":"'.strip_tags($data->co_name).'"
					
					},';
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		
		
		else
		{
		echo $json='{ "result" : "No Countries Found "}';
		}
	
	}


	public static function get_mobile_city_list()
	{
		
	$sql =  DB::select(DB::raw("select * from nm_city"));
		
		$result = array();
		
		if (count($sql) > 0) {
		$json ='{"result":"success","City_List":[';
		foreach($sql as $data)
		{	
			
			
			$json.='{"city_id":"'.$data->ci_id.'",
					"city_name":"'.strip_tags($data->ci_name).'"
					
					},';
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		
		
		else
		{
		echo $json='{ "result" : "No City Found "}';
		}
	
	}
		

		


	public static function user_signup_check($name,$emailaddr,$password,$country,$city)
	 { 
		
		//$enc_password=base64_encode($password);//echo $enc_password;exit;
		$enc_password=md5($password);//echo $enc_password;exit;
	
		$sql = DB::table('nm_customer')->where('cus_email','=',$emailaddr)->get();
		$json ='{"result":"success","Signup":[';
		if($sql)
		{
			echo $json='{ "result" : "Fail","message" : "Email Already Exists"}';
			
		}
		else
		{
			$data = array(
			'cus_name' => $name,
			'cus_email' =>$emailaddr,
			'cus_pwd' => $enc_password,
			'cus_country' => $country,
			'cus_city' => $city,
			'cus_logintype' => 2
			);
			
			$insert =  DB::table('nm_customer')->insert($data);
			$sql = DB::select(DB::raw("select * from nm_customer left join nm_city on nm_city.ci_id=nm_customer.cus_city left join nm_country on nm_country.co_id=nm_customer.cus_country where cus_email = '$emailaddr' and cus_pwd = '$enc_password'")); 
			foreach($sql  as $det)
			{
			$insert_id = DB::getPdo()->lastInsertId(); 
			$json.='{"cus_id":"'.$insert_id.'",
					"cus_name":"'.strip_tags($name).'",
					"cus_email":"'.$emailaddr.'",
					"cus_password":"'.$enc_password.'",
					"cus_country":"'.$det->co_name.'",
					"cus_city":"'.$det->ci_name.'"
					
					},';
			}
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
			
		}
	 }
	 
	 
	 public static function facebook_login($name,$emailaddr)
	 { 
		
		//$enc_password=base64_encode($password);//echo $enc_password;exit;
	
		$sql = DB::table('nm_customer')->where('cus_email','=',$emailaddr)->get();
		$json ='{"result":"success","Facebook_Signup":[';
		if($sql)
		{
			foreach($sql as $data)
			{		
			$profile_image = $data->cus_pic;
			$json.='{"cus_id":"'.$data->cus_id.'",
					"cus_name":"'.$data->cus_name.'",
					"cus_email":"'.$data->cus_email.'",
					"city_name":"'.strip_tags($data->ci_name).'",
					"country_name":"'.strip_tags($data->co_name).'",
					"profile_image":"'.url()."/assets/profileimage/".$profile_image.'"
					},';
					
			}		
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
			
		}
		else
		{
			$data = array(
			'cus_name' => $name,
			'cus_email' =>$emailaddr,
			'cus_logintype' => 3
			);
			
			$insert =  DB::table('nm_customer')->insert($data);
			
			$insert_id = DB::getPdo()->lastInsertId(); 
			
			$sql = DB::select(DB::raw("select * from nm_customer left join nm_city on nm_city.ci_id=nm_customer.cus_city left join nm_country on nm_country.co_id=nm_customer.cus_country where cus_id = '$insert_id'"));
			
			foreach($sql as $data)
			{		
			$profile_image = $data->cus_pic;
			$json.='{"cus_id":"'.$insert_id.'",
					"cus_name":"'.$data->cus_name.'",
					"cus_email":"'.$data->cus_email.'",
					"city_name":"'.strip_tags($data->ci_name).'",
					"country_name":"'.strip_tags($data->co_name).'",
					"profile_image":"'.url()."/assets/profileimage/".$profile_image.'"
					},';
					
			}		
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
			
		}
	 }
	 
	 
	 public static function insert_shipping_details($cus_id,$cust_name,$cust_address,$cust_mobile,$cust_city,$cust_country,$cust_zip)
	 {
		 
		 $data = array(
			'ship_name' => $cust_name,
			'ship_address1' =>$cust_address,
			'ship_phone' => $cust_mobile,
			'ship_ci_id' => $cust_city,
			'ship_country' => $cust_country,
			'ship_postalcode' => $cust_zip,
			'ship_cus_id' => $cus_id
			
			);
			
			$insert =  DB::table('nm_shipping')->insert($data);
			if($insert)
			{
			echo $json='{ "result" : "Success "}';	
			}
			
			$customer_detail =DB::select(DB::raw("select * from nm_customer left join nm_country on nm_country.co_id = nm_customer.cus_country left join nm_city on nm_city.ci_id = nm_customer.cus_city where nm_customer.cus_id = $cus_id "));	
			
			$ship_cus_detail =DB::select(DB::raw("select * from nm_shipping where ship_cus_id = $cus_id"));	 
			
			$product_detail =DB::select(DB::raw("select * from nm_order left join nm_shipping on nm_shipping.ship_order_id = nm_order.order_pro_id left join nm_product on nm_product.pro_id = nm_order.order_pro_id  where nm_order.order_cus_id = $cus_id"));	
			
			foreach($customer_detail as $cus_detail){ 
				if(count($cus_detail)>0)
				{
				$cus_name = $cus_detail->cus_name;
				$cus_email = /*$cus_detail->cus_email*/'dineshvasudav@gmail.com';
				$cus_address = $cus_detail->cus_address1;
				$cus_country = $cus_detail->co_name;
				$cus_city = $cus_detail->ci_name;
				}	
				
			foreach($ship_cus_detail as $ship_cus_detail){ 
				if(count($ship_cus_detail)>0)
				{
				$ship_name = $ship_cus_detail->ship_name;
				$ship_address1 = $ship_cus_detail->ship_address1;
				$ship_address2 = $ship_cus_detail->ship_address2;
				$ship_city = $ship_cus_detail->ship_ci_id;
				$ship_country = $ship_cus_detail->ship_country;
				$ship_mobile_number = $ship_cus_detail->ship_phone;
				}
				
				
			foreach($product_detail as $products_detail){ //print_r($products_detail);exit;
				if(count($products_detail)>0)
				{
				$product_title = $products_detail->pro_title;
				$product_img = explode('/**/', $products_detail->pro_Img);
				$product_img_path = url()."/assets/product/".$product_img[0]; 
				$product_img_path1 = "<img src='$product_img_path' alt='' style='width:300px;height:150px;'>";
				
				
				$send_mail_data = array('cus_name' => $cus_name,'cus_email'=> /*$cus_email*/'dinesh@nexplocindia.com','cus_address'=>$cus_address,'cus_city' =>$cus_city,'cus_country' =>$cus_country,'ship_name'=>$ship_name,'ship_address1'=>$ship_address1,'ship_address2'=>$ship_address2,'ship_city'=>$ship_city,'ship_country'=>$ship_country,'ship_mobile_number'=>$ship_mobile_number,'product_title' =>$product_title,'product_image' =>$product_img_path1 );
				
				Mail::send('emails.mobile_product_buy_mail', $send_mail_data, function($message) use ($send_mail_data)
        		 {
           		 $message->to($send_mail_data['cus_email'], $send_mail_data['cus_name'])->subject('Successfully Purchased');
       			 });
				}
       			 
       			}
			}
		
		}
			
			
	 }
	 
	 
	 
	 
	 public static function insert_shipping_address($cus_id,$cust_name,$cust_address1,$cust_mobile,$cust_country,$cust_city,$zip_code)
	 {
		 
		 $json ='{"result":"success","Shipping_Address":[';
		  $data = array(
			'ship_name' => $cust_name,
			'ship_address1' =>$cust_address1,
			'ship_phone' => $cust_mobile,
			'ship_country' => $cust_country,
			'ship_ci_id' => $cust_city,
			'ship_postalcode' =>$zip_code,
			'ship_cus_id' => $cus_id
						
			);
			
			$insert =  DB::table('nm_shipping')->insert($data);
			
			//$insert_id = DB::getPdo()->lastInsertId(); 
			$json.='{
					"cus_id":"'.$cus_id.'",	
					"cus_name":"'.strip_tags($cust_name).'",
					"cus_address":"'.strip_tags($cust_address1).'",
					"cus_mobile":"'.$cust_mobile.'",
					"cus_country":"'.$cust_country.'",
					"cus_city":"'.$cust_city.'",
					"cus_zip_code":"'.$zip_code.'"
					
					},';
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
	 }
	 
	 
	  public static function get_selected_coutry_list($id)
	 { 
		$sql = DB::select(DB::raw("select * from nm_country left join nm_city on nm_city.ci_con_id=nm_country.co_id where nm_city.ci_con_id = $id"));	 
	
		if (count($sql) > 0) {
			$json ='{"result":"success","Countrt_Selected_List":[';
			foreach($sql as $data)
			{	
				
				
				$json.='{
					"country_id":"'.$data->co_id.'",
					"city_id":"'.$data->ci_id.'",
						"city_name":"'.strip_tags($data->ci_name).'"
						
						},';
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
			
			
			else
			{
			echo $json='{ "result" : "No City Found "}';
			}
	
	
	 }
	 
	 
	 
	 public static function user_login_check($emailaddr,$password)
	 {
		 
		// $enc_password=base64_encode($password);//echo $enc_password;exit;
		$enc_password=md5($password);
		
		 //$sql = DB::table('nm_customer')->where('cus_email','=',$emailaddr)->get();
		 
		 $sql = DB::select(DB::raw("select * from nm_customer left join nm_city on nm_city.ci_id=nm_customer.cus_city left join nm_country on nm_country.co_id=nm_customer.cus_country where cus_email = '$emailaddr' and cus_pwd = '$enc_password'")); 
		 if ($sql) {
			$json ='{"result":"success","Customer_Login_Detail":[';
			foreach($sql as $data)
			{	
				
				$profile_image = $data->cus_pic;
				$json.='{
					"cus_id":"'.$data->cus_id.'",
					"cus_name":"'.$data->cus_name.'",
					"cus_email":"'.$data->cus_email.'",
					"password":"'.base64_decode($data->cus_pwd).'",
					"city_name":"'.strip_tags($data->co_name).'",
					"country_name":"'.strip_tags($data->ci_name).'",
					"profile_image":"'.url()."/assets/profileimage/".$profile_image.'"
						
						},';
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
		 
		 else
		 {
			 echo $json='{ "result" : "Fail","message" : "Email and Password Does Not Match"}';
		 }
	 }
	 
	 public static function product_my_buys($customerid)
	{
		
		/*$sql =  DB::table('nm_order')
		->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')    
		->leftjoin('nm_shipping', 'nm_order.order_cus_id', '=', 'nm_shipping.ship_cus_id')
		->orderBy('nm_order.order_date', 'desc')
		->where('order_cus_id','=',$customerid)->get();*/
		
		$sql = DB::select(DB::raw("select * from nm_order
		 left join nm_product on nm_order.order_pro_id = nm_product.pro_id
		 left join nm_ordercod on nm_ordercod.cod_pro_id = nm_product.pro_id
		 left join nm_shipping on nm_shipping.ship_cus_id = nm_order.order_cus_id
		 where (nm_order.order_cus_id = $customerid or nm_ordercod.cod_cus_id = $customerid) group by nm_order.order_pro_id"));	
		
		
		if (count($sql) > 0) {
		$json ='{"result":"success","Product_Category_List":[';
		foreach($sql as $data)
		{
			
		if($data->order_status==1)
		{
		$orderstatus="success";
		}
		else if($data->order_status==2) 
		{
		$orderstatus="completed";
		}
		else if($data->order_status==3) 
		{
		$orderstatus="Hold";
		}
		else if($data->order_status==4) 
		{
		$orderstatus="failed";
		}
			
			
			
			$json.='{
				
					"product_title":"'.strip_tags($data->pro_title).'",
					"ship_address":"'.strip_tags($data->ship_address1).'",
					"order_date":"'.$data->order_date.'",
					"order_status":"'.$orderstatus.'"
					
					},';
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		
		
		else
		{
		echo $json='{ "result" : "No Products Bought "}';
		}
	}
	
	 
	 
	 
	  public static function get_pruchase_cod_order_details($cus_id,$pro_id,$cod_qty,$cod_amt,$cod_pro_color,$cod_pro_size,$order_type,$ship_addr,$token_id)
	 { 
		
		  $now = date('Y-m-d H:i:s');
		 
		 
		  $data = array(
			'cod_cus_id' => $cus_id,
			'cod_pro_id' =>$pro_id,
			'cod_qty' => $cod_qty,
			'cod_amt' => $cod_amt,
			'cod_date' => $now,
			'cod_status' => 3,
			'cod_pro_color' => $cod_pro_color,
			'cod_pro_size' => $cod_pro_size,
			'cod_order_type' => $order_type,
			'cod_ship_addr' => $ship_addr,
			'cod_transaction_id' => $token_id
			
			);
			
		 	$insert =  DB::table('nm_ordercod')->insert($data);
			if($insert)
			{
			if($order_type == 1)
			{		
			$sql =DB::select(DB::raw("select * from nm_ordercod o left join nm_product p on o.cod_pro_id=p.pro_id where o.cod_cus_id = $cus_id and o.cod_pro_id = $pro_id group by o.cod_pro_id" ));
			
			if ($sql) {
			$json ='{"result":"success","Payment_buyer_Detail":[';
			foreach($sql as $data)
			{	
				
				$taxamount= ($cod_amt*$data->pro_inctax)/100;
				$tot_amount = $cod_amt + $data->pro_shippamt;
				$amount = $taxamount + $tot_amount;
				
				$json.='{
					
					"payer_ack":"'.'HOLD'.'"
						
						},';
						
				
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
			else
			{
			echo $json='{ "result" : "No data updated"}';	
			}
			
			}
			else if($order_type == 2)
			{
			$sql =DB::select(DB::raw("select * from nm_ordercod o left join nm_deals d on o.cod_pro_id=d.deal_id  left join nm_product p on o.cod_pro_id=p.pro_id where o.cod_cus_id = $cus_id and o.cod_pro_id = $pro_id group by o.cod_pro_id" ));	
			if ($sql) {
			$json ='{"result":"success","Payment_buyer_Detail":[';
			foreach($sql as $data)
			{	
				
				$taxamount= ($cod_amt*$data->pro_inctax)/100;
				$tot_amount = $cod_amt + $data->pro_shippamt;
				$amount = $taxamount + $tot_amount;
				
				$json.='{
					
					"payer_ack":"'.'HOLD'.'"
						
						},';
				
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
			else
			{
			echo $json='{ "result" : "No data updated"}';	
			}
			
			}
			
			}
		 
		 
		$sql =DB::table('nm_ordercod')
		->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')    
		->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_shipping', 'nm_ordercod.cod_id', '=', 'nm_shipping.ship_order_id')
		->leftjoin('nm_colorfixed', 'nm_ordercod.cod_pro_color', '=', 'nm_colorfixed.cf_id')
		->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')
		->where('cod_cus_id','=',$cus_id)
		->get();
	
		if (count($sql) > 0) {
			$json ='{"result":"success","Shipping_List":[';
			foreach($sql as $data)
			{
				
				if($data->cod_status==1)
				{
					$orderstatus="success";
				}
				else if($data->cod_status==2) 
				{
					$orderstatus="completed";
				}
				else if($data->cod_status==3) 
				{
					$orderstatus="Hold";
				}
				else if($data->cod_status==4) 
				{
					$orderstatus="failed";
				}
				
				$product_title = $data->pro_title;
				$product_description = $data->pro_desc;
				$product_img = explode('/**/', $data->pro_Img);
				$product_img_path = url()."/assets/product/".$product_img[0];
				$product_img_path1 = "<img src='$product_img_path' alt='' style='width:300px;height:150px;'>";
				
				$color_name = $data->cf_name;
				$size_name = $data->si_name;
				$cus_email = /*$data->cus_email*/'dinesh@nexplocindia.com';
				$cus_name = $data->cus_name;
				
				$send_mail_data = array('product_title' =>$product_title,'product_description'=>$product_description,'product_image' =>$product_img_path1,'product_qty' =>$cod_qty,'product_amount'=> $cod_amt,'color_name'=>$color_name,'size_name'=>$size_name,'cus_email'=>$cus_email,'cus_name' => $cus_name);
				
				Mail::send('emails.mobile_product_addtocart_buy_mail', $send_mail_data, function($message) use ($send_mail_data)
        		 {
           		 $message->to($send_mail_data['cus_email'], $send_mail_data['cus_name'])->subject('Successfully Purchased');
       			 });
       			 exit;
			
				
			}
			
			}
			
		}
			
			
	public static function insert_paypal($cus_id,$pro_id,$cod_qty,$cod_amt,$cod_pro_color,$cod_pro_size,$order_type,$ship_addr,$token_id)
	 { 
		
		  $now = date('Y-m-d H:i:s');
			$data = array(
			'order_cus_id' => $cus_id,
			'order_pro_id' =>$pro_id,
			'order_qty' => $cod_qty,
			'order_amt' => $cod_amt,
			'order_date' => $now,
			'order_status' => 3,
			'order_pro_color' => $cod_pro_color,
			'order_pro_size' => $cod_pro_size,
			'order_type' => $order_type,
			'order_shipping_add' => $ship_addr,
			'transaction_id' => $token_id
			
			);
			$insert =  DB::table('nm_order')->insert($data);
		 	if($insert)
			{
			if($order_type == 1)
			{	
			$sql=  DB::select(DB::raw("select * from nm_order o left join nm_product p on o.order_pro_id=p.pro_id where o.order_cus_id = $cus_id and o.order_pro_id = $pro_id group by o.order_pro_id" ));
			if ($sql) {
			$json ='{"result":"success","Payment_buyer_Detail":[';
			foreach($sql as $data)
			{	
			
				
				$shipamt = $data->pro_shippamt;
				$taxamount=($cod_amt*$data->pro_inctax)/100;
				$amount = $cod_amt + $shipamt + $taxamount ; 
				
				$json.='{
					
					"payer_ack":"'.strip_tags($data->payment_ack).'"
						
						},';
				
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
			else
			{
			echo $json='{ "result" : "No data updated"}';	
			}
			
			
			}
			else if($order_type == 2)
			{ 
			$sql=  DB::select(DB::raw("select * from nm_order o left join nm_deals d on o.order_pro_id=d.deal_id and o.order_type=2 where o.order_cus_id = $cus_id and o.order_pro_id = $pro_id group by o.order_pro_id" ));	
			if ($sql) {
			$json ='{"result":"success","Payment_buyer_Detail":[';
			foreach($sql as $data)
			{	
			
				$shipamt = 0;
				$taxamount=0;
				$amount = $cod_amt + $shipamt + $taxamount ; 
				
				$json.='{
					
					"payer_ack":"'.strip_tags($data->payment_ack).'"
						
						},';
				
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
			else
			{
			echo $json='{ "result" : "No data updated"}';	
			}
			}
		
			}
		$sql =DB::table('nm_order')
		->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')    
		->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')
		->leftjoin('nm_shipping', 'nm_order.order_id', '=', 'nm_shipping.ship_order_id')
		->leftjoin('nm_colorfixed', 'nm_order.order_pro_color', '=', 'nm_colorfixed.cf_id')
		->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')
		->where('order_cus_id','=',$cus_id)
		->get();
	
		if (count($sql) > 0) {
			$json ='{"result":"success","Paypal_List":[';
			foreach($sql as $data)
			{
				
				if($data->order_status==1)
				{
					$orderstatus="success";
				}
				else if($data->order_status==2) 
				{
					$orderstatus="completed";
				}
				else if($data->order_status==3) 
				{
					$orderstatus="Hold";
				}
				else if($data->order_status==4) 
				{
					$orderstatus="failed";
				}
				
				$product_title = $data->pro_title;
				$product_description = $data->pro_desc;
				$product_img = explode('/**/', $data->pro_Img);
				$product_img_path = url()."/assets/product/".$product_img[0];
				$product_img_path1 = "<img src='$product_img_path' alt='' style='width:300px;height:150px;'>";
				
				$color_name = $data->cf_name;
				$size_name = $data->si_name;
				$cus_email = /*$data->cus_email*/'divya@nexplocindia.com';
				$cus_name = $data->cus_name;
				
				$send_mail_data = array('product_title' =>$product_title,'product_description'=>$product_description,'product_image' =>$product_img_path1,'product_qty' =>$cod_qty,'product_amount'=> $cod_amt,'color_name'=>$color_name,'size_name'=>$size_name,'cus_email'=>$cus_email,'cus_name' => $cus_name);
				/*Mail::send('emails.mobile_product_addtocart_buy_mail', $send_mail_data, function($message) use ($send_mail_data)
        		 {
           		 $message->to($send_mail_data['cus_email'], $send_mail_data['cus_name'])->subject('Successfully Purchased');
       			 });
       			 exit;*/
				
				
			}
			
			}
		
	 }
	 
	 
	 public static function get_product_detail_list()
	{
		$sql =  DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_store','nm_store.stor_id','=','nm_product.pro_sh_id')->take(8)->get();
		if ($sql) {
			$json ='{"result":"success","Product_list":[';
			foreach($sql as $data)
			{	

				if($data->pro_no_of_purchase < $data->pro_qty) 
			 	{
				$status = "not sold";	 
				}
				else
				{
				$status = "sold";	 
				}
				
				
				$product_saving_price = $data->pro_price - $data->pro_disprice;
				$product_discount_percentage = round(($product_saving_price/ $data->pro_price)*100,2);
				
				$product_img = explode('/**/', $data->pro_Img);
				
				$json.='{"product_id":"'.$data->pro_id.'",
						"product_title":"'.strip_tags($data->pro_title).'",
						"product_mc_id":"'.strip_tags($data->pro_mc_id).'",
						"product_description":"'.strip_tags($data->pro_desc).'",
						"product_discount_price":"'.$data->pro_disprice.'",
						"product_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
						"product_original_price":"'.$data->pro_price.'",
						"product_image":"'.url()."/assets/product/".$product_img[0].'",
						"product_status":"'.$status .'",
						
						},';
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
		 
		 else
		 {
			 echo $json='{ "result" : "Fail","message" : "No Products Found"}';
		 }
		
	}
	 
	 
	 
	 
	 
	  public static function get_all_deals_details_list()
	{
		$date = date('Y-m-d H:i:s');	
		$sql =  DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_expiry_date', '>', $date)->LeftJoin('nm_store','nm_store.stor_id','=','nm_deals.deal_shop_id')->orderBy(DB::raw('RAND()'))->get();
		if ($sql) {
			$json ='{"result":"success","Product_list":[';
			foreach($sql as $data)
			{	
				
				
				
				$product_discount_percentage = $data->deal_discount_percentage;
				
				$product_img = explode('/**/', $data->deal_image);
				
				/*if($data->deal_no_of_purchase >= $data->deal_max_limit) { */
				
				$json.='{"deal_id":"'.$data->deal_id.'",
						"deal_title":"'.strip_tags($data->deal_title).'",
						"deal_description":"'.strip_tags($data->deal_description).'",
						"deal_mc_id":"'.strip_tags($data->deal_main_category).'",
						"deal_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
						"deal_original_price":"'.$data->deal_original_price.'",
						"deal_discount_price":"'.$data->deal_discount_price.'",	
						"deal_image":"'.url()."/assets/deals/".$product_img[0].'"
						
						},';
					/*}*/	
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
		 
		 else
		 {
			 echo $json='{ "result" : "Fail","message" : "No Deals Found"}';
		 }
		
	}
	
	public static function get_deals_detail_by_id($id)
	{
		
		$date = date('Y-m-d H:i:s');
		$sql = DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_expiry_date', '>', $date)->where('deal_id', '=', $id)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_deals.deal_main_category')->get();
		if ($sql) {
			$json ='{"result":"success","Deal_detail":[';
			foreach($sql as $data)
			{	
				
				
				$savings = $data->deal_original_price - $data->deal_discount_price;
				$product_discount_percentage = $data->deal_discount_percentage;
				
				$product_img = explode('/**/', $data->deal_image);
				
				if($data->deal_no_of_purchase >= $data->deal_max_limit)
				 { 
				$status ="sold";
				}
				else
				{
				$status ="not sold"	;
				}
				
				$json.='{"deal_id":"'.$data->deal_id.'",
						"deal_title":"'.strip_tags($data->deal_title).'",
						"deal_description":"'.strip_tags($data->deal_description).'",
						"deal_mc_id":"'.strip_tags($data->deal_main_category).'",
						"deal_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
						"deal_original_price":"'.round($data->deal_original_price).'",
						"deal_discount_price":"'.round($data->deal_discount_price).'",
						"deal_savings":"'.$savings.'",
						"deal_no_of_purchase":"'.$data->deal_no_of_purchase.'",
						"deal_max_limit":"'.$data->deal_max_limit.'",
						"deal_image":"'.url()."/assets/deals/".$product_img[0].'",
						"deal_end_date":"'.$data->deal_end_date.'",
						"deal_category":"'.$data->mc_name.'",
						"deal_quantity":"'.$data->deal_max_limit.'",
						"deal_feature":"'.strip_tags($data->deal_description).'",
						"deal_status":"'.$status.'",
						
						
						},';
					/*}*/	
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
		 
		 else
		 {
			 echo $json='{ "result" : "Fail","message" : "No Deals Found"}';
		 }
		
		
	}
	
	
	
	
	
	 public static function get_all_action_detail()
	{
		$date = date('Y-m-d H:i:s');	
		$sql =  DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_auction.auc_category')->LeftJoin('nm_store','nm_store.stor_id','=','nm_auction.auc_shop_id')->get();
		
		return $sql;
		
	}
	
	
	
	 public static function get_auction_detail_view($auction_details)
	{
		
		$json ='{"result":"success","Auction_list":[';
		foreach($auction_details as $auction)
		{
		$date = date('Y-m-d H:i:s');
		
		$sql = DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_id', '=', $auction->auc_id)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_auction.auc_category')->get();
		
			foreach($sql as $data)
			{	
				
				$product_image = explode('/**/',$data->auc_image);
				
				$json.='{"auction_id":"'.$data->auc_id.'",
						"auction_title":"'.strip_tags($data->auc_title).'",
						"bit_amount":"'.$data->auc_auction_price.'",
						"product_image":"'.url()."/assets/auction/".$product_image[0].'",
						"bit_form":"'.$data->auc_auction_price.'",
						"bit_increment":"'.$data->auc_bitinc.'",
						"retail_price":"'.$data->auc_original_price.'",
						"auc_posted_date":"'.$data->auc_posted_date.'",
						"auc_end_date":"'.$data->auc_end_date.'"
						
						
						
						},';
					
			}
			
			
		}	
		$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			
		 
		 
		
	}
	
	
	
	public static function get_auction_detail_view_by_id($id)
	{
		
		$json ='{"result":"success","Auction_list":[';
		
		$date = date('Y-m-d H:i:s');
		
		$sql = DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_category', '=', $id)->where('auc_end_date', '>', $date)->get();
		
			foreach($sql as $data)
			{	
				$date = date('Y-m-d H:i:s');
				if($data->auc_end_date > $date)
				{
					$status  = "not sold";
				}
				else
				{
					$status  = "sold";
				}
				
				$product_image = explode('/**/',$data->auc_image);
				
				$json.='{"auction_id":"'.$data->auc_id.'",
						"auction_title":"'.strip_tags($data->auc_title).'",
						"auction_description":"'.strip_tags($data->auc_description).'",
						"bit_amount":"'.$data->auc_auction_price.'",
						"product_image":"'.url()."/assets/auction/".$product_image[0].'",
						"bit_form":"'.$data->auc_auction_price.'",
						"bit_increment":"'.$data->auc_bitinc.'",
						"retail_price":"'.$data->auc_original_price.'",
						"shipping_amount":"'.$data->auc_shippingfee.'",
						"auc_posted_date":"'.$data->auc_posted_date.'",
						"auc_posted_date":"'.$data->auc_end_date.'"
						"auc_status":"'.$status.'"
						},';
					
			}
			
		$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
		
	}
	
	public static function auction_detail_view_image_list($id)
	{
		
		$json ='{"result":"success","Auction_list":[';
		
		$date = date('Y-m-d H:i:s');
		
		$sql = DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_main_category', '=', $id)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_auction.auc_category')->get();
		
		if (count($sql) > 0) {
		$json ='{"result":"success","product_detail_image_list":[';
		
		foreach($sql as $data)
		{	
				$product_img= explode('/**/',trim($data->auc_image,"/**/"));	
				$img_count = count($product_img);
				for($i=0;$i < $img_count;$i++) {	
				if($product_img[$i] != '')
				{				
				$json.='{"product_image_list":"'.url()."/assets/auction/".$product_img[$i].'"},';
				}
				}	
			
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		
		
		else
		{
		echo $json='{ "result" : "No Image Found "}';
		}
		
		
		
	}
	
	public static function get_bidder_by_detail_id($id)
	{
		
		$json ='{"result":"success","bidder_Detail":[';
		$date = date('Y-m-d H:i:s');
		$sql = DB::table('nm_order_auction')
		->join('nm_auction', 'nm_order_auction.oa_pro_id', '=', 'nm_auction.auc_id') 
		->orderBy('oa_bid_amt', 'DESC')
		->where('oa_pro_id','=',$id)->get();
			foreach($sql as $data)
			{	
				$json.='{
						"name":"'.strip_tags($data->oa_cus_name).'",
						"bit_amount":"'.$data->oa_bid_amt.'",
						"auc_posted_date":"'.$data->oa_bid_date.'"
						
						
						
						},';
					
			}
		
		$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			
		
	}
	
	
	
	public static function get_customer_bidder_by_detail_id($id)
	{
		
		$json ='{"result":"success","Customer_bidder_Detail":[';
		$date = date('Y-m-d H:i:s');
		$sql = DB::table('nm_order_auction')
		->join('nm_auction', 'nm_order_auction.oa_pro_id', '=', 'nm_auction.auc_id')  
		->where('oa_cus_id','=',$id)->get();
		if(count($sql)>0)
		{
			foreach($sql as $data)
			{	
				$json.='{
						"auc_title":"'.strip_tags($data->auc_title).'",
						"name":"'.strip_tags($data->oa_cus_name).'",
						"bit_amount":"'.$data->oa_bid_amt.'",
						"auc_posted_date":"'.$data->oa_bid_date.'"
						
						
						
						},';
					
			}
		
		$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
		}
		else
		{
		echo $json='{ "result" : "No Bidder Details Found "}';	
		}
			
		
	}
	
	
	public static function get_action_details_by_id($bid_auc_id,$oa_cus_id,$oa_cus_name,$oa_cus_email,$oa_cus_address,$oa_bid_amt,$oa_bid_shipping_amt,$oa_original_bit_amt)
	{
		
		
		$data = array(
			'oa_pro_id' =>$bid_auc_id,
			'oa_cus_id' =>$oa_cus_id,
			'oa_cus_name' => $oa_cus_name,
			'oa_cus_email' => $oa_cus_email,
			'oa_cus_address' => $oa_cus_address,
			'oa_bid_amt' => $oa_bid_amt,
			'oa_bid_shipping_amt' => $oa_bid_shipping_amt,
			'oa_original_bit_amt' => $oa_original_bit_amt,
			);
			
			$insert =  DB::table('nm_order_auction')->insert($data);
			
			$insert_id = DB::getPdo()->lastInsertId(); 
		
		$json ='{"result":"success","bid_payment_Detail":[';
		$date = date('Y-m-d H:i:s');
		$sql = DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_id', '=', $bid_auc_id)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_auction.auc_category')->get();
			foreach($sql as $data)
			{	
				$product_image = explode('/**/',$data->auc_image);
				
				$json.='{
						"auc_title":"'.strip_tags($data->auc_title).'",
						"bit_amount":"'.$data->auc_auction_price.'",
						"shipping_amount":"'.$data->auc_shippingfee.'",
						"your_bit_amount":"'.$oa_bid_amt.'",
						"product_image":"'.url()."/assets/auction/".$product_image[0].'",
						"Estimated_shipping_charge":"'.$oa_bid_shipping_amt.'"
						},';
					
			}
		
		$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			
		
	}
	
	
	
	public static function update_user_profile($cus_id,$cname,$email,$phone,$country_id,$city_id)
	{
		
		$sql1= DB::table('nm_customer')->where('cus_id', '=', $cus_id)->update(array('cus_name' => $cname,'cus_email' => $email,'cus_phone'=>$phone,'cus_country'=>$country_id,'cus_city'=>$city_id));
		//$sql = "select * from nm_customer left join nm_city on nm_city.ci_id=nm_customer.cus_city left join nm_country on nm_country.co_id=nm_customer.cus_country where nm_customer.cus_id = '$cus_id'";	print_r($sql);exit;
		 $sql = DB::select(DB::raw("select * from nm_customer left join nm_city on nm_city.ci_id=nm_customer.cus_city left join nm_country on nm_country.co_id=nm_customer.cus_country where nm_customer.cus_id = '$cus_id'")); 
		 
			if ($sql) {
			$json ='{"result":"success","Customer_Update_Detail":[';
			foreach($sql as $data)
			{	
				
				
				$json.='{
					"cus_id":"'.$data->cus_id.'",
					"cus_name":"'.$data->cus_name.'",
					"cus_email":"'.$data->cus_email.'",
					"password":"'.base64_decode($data->cus_pwd).'",
					"city_name":"'.strip_tags($data->co_name).'",
					"country_name":"'.strip_tags($data->ci_name).'"
						
						},';
			}
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			}
			else
			{
			echo $json='{ "result" : "No data updated"}';	
			}
			
	
	}
	
	
	public static function update_profileimage($customerid,$filename)
	{
	
		$sql = DB::table('nm_customer')->where('cus_id', '=', $customerid)->update(array('cus_pic' => $filename));
		
		if ($sql) {
			$json ='{"result":"success","image_url":[';
		
		foreach($sql as $data)
		{
		$product_image = $data->cus_pic;
			
		$json.='{"product_image":"'.url()."/assets/profileimage/".$product_image.'",
					
					},';
					
		}		
		}	
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
	}



	public static function get_profile_bidhistory($customerid)
	{
	 
		$sql = DB::table('nm_order_auction')
		->join('nm_auction', 'nm_order_auction.oa_pro_id', '=', 'nm_auction.auc_id')  
		->where('oa_cus_id','=',$customerid)->get();
		
		if ($sql) {
			$json ='{"result":"success","bidder_history":[';
		
		foreach($sql as $data)
		{
		
		 $totalamt=$data->oa_bid_amt+$data->oa_bid_shipping_amt;			
		$json.='{
					"auc_title":"'.strip_tags($data->auc_title).'",
					"auc_original_price":"'.$data->auc_original_price.'",
					"auc_auction_price":"'.$data->auc_auction_price.'",
					"oa_original_bit_amt":"'.$data->oa_original_bit_amt.'",
					"oa_bid_date":"'.$data->oa_bid_date.'",
					"oa_bid_shipping_amt":"'.$data->oa_bid_shipping_amt.'",
					"oa_bid_amt":"'.$data->oa_bid_amt.'",
					"total_amt":"'.$totalamt.'"
					
					
					},';
					
		}		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		echo $json;
		}	
		
		else
		{
		echo $json='{ "result" : "No Bidding History Found "}';	
		}
		
	}

	
	 
	 public static function near_me_map_products()
	{
	 
		$sql = DB::table('nm_product')->where('pro_status', '=', 1)->LeftJoin('nm_store','nm_store.stor_id','=','nm_product.pro_sh_id')->take(8)->get();
		
		if ($sql) {
			$json ='{"result":"success","Near_me_map_products":[';
		
		foreach($sql as $data)
		{
		if($data->stor_latitude != '' && $data->stor_longitude != '')
		{
		$product_image = explode('/**/',$data->pro_Img); 
		$json.='{
					"pro_title":"'.strip_tags($data->pro_title).'",
					"product_image":"'.url()."/assets/product/".$product_image[0].'",
					"stor_name":"'.strip_tags($data->stor_name).'",
					"stor_city":"'.strip_tags($data->stor_city).'",
					"stor_img":"'.url()."/assets/storeimage/".$data->stor_img.'",
					"pro_disprice":"'.$data->pro_disprice.'",
					"stor_latitude":"'.$data->stor_latitude.'",
					"stor_longitude":"'.$data->stor_longitude.'",
					"pro_id":"'.$data->pro_id.'"
					
					},';
		}
					
		}		
		}	
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
	}

	 
	  public static function near_me_map_deals()
	{
	 
		$date = date('Y-m-d H:i:s');
		$sql =  DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_expiry_date', '>', $date)->LeftJoin('nm_store','nm_store.stor_id','=','nm_deals.deal_shop_id')->orderBy(DB::raw('RAND()'))->get();
		
		if ($sql) {
			$json ='{"result":"success","Near_me_map_deals":[';
		
		foreach($sql as $data)
		{
		if($data->stor_latitude != '' && $data->stor_longitude != '')
		{
		$deals_discount_percentage = $data->deal_discount_percentage;
   		$deals_img = explode('/**/', $data->deal_image); 
		$json.='{
					"deal_title":"'.strip_tags($data->deal_title).'",
					"deal_image":"'.url()."/assets/deals/".$deals_img[0].'",
					"stor_name":"'.strip_tags($data->stor_name).'",
					"stor_city":"'.strip_tags($data->stor_city).'",
					"stor_img":"'.url()."/assets/storeimage/".$data->stor_img.'",
					"pro_disprice":"'.$deals_discount_percentage.'",
					"stor_latitude":"'.$data->stor_latitude.'",
					"stor_longitude":"'.$data->stor_longitude.'",
					"deal_id":"'.$data->deal_id.'"
					
					},';
					
		}
					
		}		
		}	
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
	}

	 
	  public static function near_me_map_acution()
	{
	 
		$date = date('Y-m-d H:i:s');
		$sql = DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_auction.auc_category')->LeftJoin('nm_store','nm_store.stor_id','=','nm_auction.auc_shop_id')->get();
		
		if ($sql) {
			$json ='{"result":"success","Near_me_map_auctions":[';
		
		foreach($sql as $data)
		{
		
		if($data->stor_latitude != '' && $data->stor_longitude != '')
		{
   		$auction_image = explode('/**/', $data->auc_image);
		$json.='{
					"auc_title":"'.strip_tags($data->auc_title).'",
					"auction_image":"'.url()."/assets/auction/".$auction_image[0].'",
					"stor_name":"'.strip_tags($data->stor_name).'",
					"stor_city":"'.strip_tags($data->stor_city).'",
					"stor_img":"'.url()."/assets/storeimage/".$data->auc_auction_price.'",
					"auc_auction_price":"'.$data->auc_auction_price.'",
					"stor_latitude":"'.$data->stor_latitude.'",
					"stor_longitude":"'.$data->stor_longitude.'",
					"auc_id":"'.$data->auc_id.'"
					
					},';
					
		}
					
		}		
		}	
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
	}

	 
	public static function get_profile_image($customerid)
	{
		$sql =  DB::select(DB::raw("select * from nm_customer where cus_id = $customerid"));	
		
		if ($sql) {
			$json ='{"result":"success","image_url":[';
		
		foreach($sql as $data)
		{
		$product_image = $data->cus_pic;
			
		$json.='{"profile_image":"'.url()."/assets/profileimage/".$product_image.'"
					
					},';
					
		}		
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}	
		else
		{
			echo $json='{ "result" : "No Image Found "}';	
		}
	}
	
	
	public static function terms_condition()
	{
		//$sql = DB::select(DB::raw("select *from nm_cms_pages where cp_title like '%terms%' and cp_status =1"));
		$sql = DB::select(DB::raw("select *from nm_terms"));
		if($sql)
		{
		$json ='{"result":"success","Terms_Condition":[';	
		foreach($sql as $data)
		{
			
			$json.='{
					"terms_description":"'.strip_tags($data->tr_description).'"
					},';	
			
		}
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
	
		else
		{
		echo $json='{ "result" : "Not Found "}';
		}
	
	}
	
	
	public static function get_related_selected_product_details($pid)
	{
		

		return DB::select(DB::raw("SELECT * FROM nm_product left join nm_maincategory on nm_maincategory.mc_id = nm_product.pro_mc_id where nm_product.pro_id = $pid and nm_product.pro_status=1"));
	}
	
	
	public static function get_related_category_product_detail_view($product_details)
	{
		
		$json ='{"result":"success","Product_Related_Category_List":[';
		foreach($product_details as $pr_det) 
		{	
			
			
			$related_product_detail =  DB::table('nm_product')->whereNotIn('pro_id', array( '1' => $pr_det->pro_id))->where('pro_mc_id','=',$pr_det->pro_mc_id)->get();
			
			foreach($related_product_detail as $related_pro)
			{
				 $color_detail = DB::select(DB::raw("SELECT GROUP_CONCAT(cf_name) As color,GROUP_CONCAT(cf_id) As color_id FROM nm_procolor left join nm_colorfixed on nm_colorfixed.cf_id = nm_procolor.pc_co_id where nm_procolor.pc_pro_id in ($related_pro->pro_id)"));
				 
			 $size_detail = DB::select(DB::raw("SELECT GROUP_CONCAT(si_name) As size,GROUP_CONCAT(si_id) As size_id FROM nm_prosize left join nm_size on nm_size.si_id = nm_prosize.ps_si_id where nm_prosize.ps_pro_id in ($related_pro->pro_id)"));
			 //print_r($size_detail);exit;
			 
			
				
			$product_saving_price = $related_pro->pro_price - $related_pro->pro_disprice;
			$product_discount_percentage = round(($product_saving_price/ $related_pro->pro_price)*100,2);
			if($related_pro->pro_no_of_purchase >= $related_pro->pro_qty) 
			 { 
			 $status = "sold";
			 }
			else
			{ 
			$status = "not sold";	 
			 }
				
			foreach($color_detail as $color)
			{
				
				foreach($size_detail as $size)
				{
				
				$product_img = explode('/**/', $related_pro->pro_Img);//print_r($product_img);exit;
				$json.='{"product_id":"'.$related_pro->pro_id.'",
						"product_title":"'.strip_tags($related_pro->pro_title).'",
						"product_description":"'.strip_tags($related_pro->pro_desc).'",
						"product_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
						"product_original_price":"'.$related_pro->pro_price.'",
						"product_discount_price":"'.$related_pro->pro_disprice.'",
						"Category":"'.strip_tags($pr_det->mc_name).'",
						"product_image":"'.url()."/assets/product/".$product_img[0].'",
						"product_color":"'.strip_tags($color->color).'",
						"Color_id":"'.$color->color_id.'",
						"product_size":"'.strip_tags($size->size).'",
						"Size_id":"'.$size->size_id.'",
						"product_delivery":"'.$related_pro->pro_delivery.'",
						"product_status":"'.$status.'",
						"product_no_of_purchase":"'.$related_pro->pro_no_of_purchase.'",
						"product_qty":"'.$related_pro->pro_qty.'",
							
						
						},';
						
				}	
						
			}	
		}
					
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		
	}
	
	
	
	
	
	public static function get_related_selected_deal_details($deal_id)
	{
		

		return DB::select(DB::raw("SELECT * FROM nm_deals left join nm_maincategory on nm_maincategory.mc_id = nm_deals.deal_main_category where nm_deals.deal_id = $deal_id and nm_deals.deal_status=1"));
	}
	
	
	public static function get_related_category_deal_detail_view($deal_details)
	{
		
		$json ='{"result":"success","Deal_Related_Category_List":[';
		if($deal_details)
		{
		foreach($deal_details as $pr_det) 
		{	
		$date = date('Y-m-d H:i:s');
		$catid = DB::table('nm_deals')->where('deal_id', '=',$pr_det->deal_id)->pluck('deal_category');
			$related_product_detail =  DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_id', '!=', $pr_det->deal_id)->where('deal_category', '=', $catid)->get();
			if(count($related_product_detail)>0)
			{
			foreach($related_product_detail as $related_pro)
			{
			
			$savings = $related_pro->deal_original_price - $related_pro->deal_discount_price;
			$product_discount_percentage = round(($savings/ $related_pro->deal_original_price)*100,2);
			if($related_pro->deal_no_of_purchase >= $related_pro->deal_max_limit)
				 { 
				$status ="sold";
				}
				else
				{
				$status ="not sold"	;
				}
				
			$product_img = explode('/**/', $related_pro->deal_image);//print_r($product_img);exit;
				$json.='{"deal_id":"'.$related_pro->deal_id.'",
						"deal_title":"'.strip_tags($related_pro->deal_title).'",
						"deal_description":"'.strip_tags($related_pro->deal_description).'",
						"deal_mc_id":"'.strip_tags($related_pro->deal_main_category).'",
						"deal_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
						"deal_original_price":"'.$related_pro->deal_original_price.'",
						"deal_discount_price":"'.$related_pro->deal_discount_price.'",
						"deal_savings":"'.$savings.'",
						"deal_no_of_purchase":"'.$related_pro->deal_no_of_purchase.'",
						"deal_max_limit":"'.$related_pro->deal_max_limit.'",
						"deal_image":"'.url()."/assets/deals/".$product_img[0].'",
						"deal_end_date":"'.$related_pro->deal_end_date.'",
						"deal_category":"'.$pr_det->mc_name.'",
						"deal_quantity":"'.$related_pro->deal_max_limit.'",
						"deal_feature":"'.strip_tags($related_pro->deal_description).'",
						"deal_status":"'.$status.'"
							
					},';
						
						
						
						
						
		}
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		else
		{
		echo $json='{ "result" : "No Related Deals Found "}';	
		}
		}
		}
		else
		{
		echo $json='{ "result" : "No Related Deals Found "}';
		}
		
	}
	
	
	
	public static function get_related_selected_auction_details($auc_id)
	{
	
	
		$date = date('Y-m-d H:i:s');
		return  DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_id', '=', $auc_id)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_auction.auc_category')->get();
	}
	
	
	
	
	public static function get_related_category_auction_detail_view($auction_details)
	{
		if($auction_details)
		{
		foreach($auction_details as $pr_det) 
		{	
		$date = date('Y-m-d H:i:s');
		$catid = DB::table('nm_auction')->where('auc_id', '=', $pr_det->auc_id)->pluck('auc_category');
		$auc_related_detail =  DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_category', '=', $catid)->where('auc_id', '!=', $pr_det->auc_id)->get();
		
		if(count($auc_related_detail)>0)
		{
		$json ='{"result":"success","Related_auction_list":[';		
		foreach($auc_related_detail as $auc_det) 
		{	
		
		if($auc_det->auc_end_date > $date)
				{
					$status  = "not sold";
				}
				else
				{
					$status  = "sold";
				}
				
				$product_image = explode('/**/',$auc_det->auc_image);
				
				$json.='{"auction_id":"'.$auc_det->auc_id.'",
						"auction_title":"'.strip_tags($auc_det->auc_title).'",
						"bit_amount":"'.$auc_det->auc_auction_price.'",
						"product_image":"'.url()."/assets/auction/".$product_image[0].'",
						"bit_form":"'.$auc_det->auc_auction_price.'",
						"bit_increment":"'.$auc_det->auc_bitinc.'",
						"retail_price":"'.$auc_det->auc_original_price.'",
						"shipping_amount":"'.$auc_det->auc_shippingfee.'",
						"auc_posted_date":"'.$auc_det->auc_posted_date.'",
						"auc_posted_date":"'.$auc_det->auc_end_date.'",
						"auc_status":"'.$status.'"
						
						
						
						},';
						
						
						
						
						
		}
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		else
		{
		echo $json='{ "result" : "No Related Acution Found "}';	
		}
		}
		
		}
		else
		{
		echo $json='{ "result" : "No Related Acution Found "}';
		}
		
	}
	
	
	
	
	
	
	
	public static function add_position()
	{
		$sql = DB::select(DB::raw("select *from nm_add group by ad_position"));
		if($sql)
		{
		$json ='{"result":"success","add_position":[';	
		foreach($sql as $data)
		{
			
			if($data->ad_position == 1)
			{
			$position = 'Header right';	
			$position_id = 1;	
			}
			
			$json.='{
					"position_id":"'.$position_id.'",
					"position":"'.$position.'"
					},';	
		}
		
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
	
		else
		{
		echo $json='{ "result" : "Not Found "}';
		}
	
	}
	
	
	
	public static function add_pages()
	{
		$sql = DB::select(DB::raw("select *from nm_add group by ad_pages"));
		if($sql)
		{
		$json ='{"result":"success","add_pages":[';	
		
		foreach($sql as $data)
		{ 
			
			if($data->ad_pages == 1)
			{
			$pages = 'Home';
			$page_id = 1;	
			
			/*else if($data->ad_pages == 2)
			{
			$pages = 'Product';	
			$page_id = 2;	
			}
			else if($data->ad_pages == 3)
			{
			$pages = 'Deals';	
			$page_id = 3;	
			}
			else if($data->ad_pages == 4)
			{	
			$pages = 'Auction';	
			$page_id = 4;	
			}*/
			
		$json.='{
					"page_id":"'.$page_id.'",
					"pages":"'.$pages.'"
					},';	
					
		}
			
		
		}
		$json = substr($json,0,strlen($json)-1);
		$json.=']}';
		
		echo $json;
		}
		
	
		else
		{
		echo $json='{ "result" : "Not Found "}';
		}
	
	}


	public static function insert_adds($add_title,$ads_position,$ads_pages,$url)
	{
	
	
		$data = array(
			'ad_name' => $add_title,
			'ad_position' =>$ads_position,
			'ad_pages' => $ads_pages,
			'ad_redirecturl' => $url,
			
			);
			
		$insert =  DB::table('nm_add')->insert($data);
		if ($insert) {
		echo $json='{ "result" : "Success "}';
		}
		else
		{
		echo $json='{ "result" : "Not inserted"}';
		}
	}
	
	
	
	public static function store_dealview_detail_by_id($id)
	{
		
		$json ='{"result":"success","storeview_deals":[';	
				$date = date('Y-m-d H:i:s');
				 $deal_detail = DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_shop_id','=',$id)->get();
				 
			if($deal_detail)
			{
				foreach($deal_detail as $data)
				{ 
				$date = date('Y-m-d H:i:s');
				$get_cate_name = DB::table('nm_deals')->where('deal_status', '=', 1)->where('deal_end_date', '>', $date)->where('deal_id', '=', $data->deal_id)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_deals.deal_main_category')->get();	
				$savings = $data->deal_original_price - $data->deal_discount_price;		
				$product_discount_percentage = $data->deal_discount_percentage;
				$product_img = explode('/**/', $data->deal_image);
				if($data->deal_no_of_purchase >= $data->deal_max_limit)
				 { 
				$status ="sold";
				}
				else
				{
				$status ="not sold"	;
				}
			foreach($get_cate_name as $cate)
			{	
			$product_img = explode('/**/', $data->deal_image);//print_r($product_img);exit;
				$json.='{"deal_id":"'.$data->deal_id.'",
						"deal_title":"'.strip_tags($data->deal_title).'",
						"deal_description":"'.strip_tags($data->deal_description).'",
						"deal_mc_id":"'.strip_tags($data->deal_main_category).'",
						"deal_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
						"deal_original_price":"'.$data->deal_original_price.'",
						"deal_discount_price":"'.$data->deal_discount_price.'",
						"deal_savings":"'.$savings.'",
						"category":"'.$cate->mc_name.'",
						"deal_no_of_purchase":"'.$data->deal_no_of_purchase.'",
						"deal_max_limit":"'.$data->deal_max_limit.'",
						"deal_image":"'.url()."/assets/deals/".$product_img[0].'",
						"deal_end_date":"'.$data->deal_end_date.'",
						"deal_quantity":"'.$data->deal_max_limit.'",
						"deal_feature":"'.strip_tags($data->deal_description).'",
						"deal_status":"'.$status.'"
							
						
						},';
						
			$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			echo $json;
			}
			}
		}
		else
		{
			echo $json='{ "result" : "Not deals details found"}';
		}
	}
	
	
	public static function store_productview_detail_by_id($id)
	{
		
		$json ='{"result":"success","storeview_products":[';	
		
				$date = date('Y-m-d H:i:s');
				 $product_detail = DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_sh_id','=',$id)->get();
		if($product_detail)
			{
				foreach($product_detail as $data)
				{
				$product_saving_price = $data->pro_price - $data->pro_disprice;
				$product_discount_percentage = round(($product_saving_price/ $data->pro_price)*100,2);
				
				$product_img = explode('/**/', $data->pro_Img);
				
				$product_saving_price = $data->pro_price - $data->pro_disprice;
			$product_discount_percentage = round(($product_saving_price/ $data->pro_price)*100,2);		
			
			 $color_detail = DB::select(DB::raw("SELECT GROUP_CONCAT(cf_name) As color,GROUP_CONCAT(cf_id) As color_id FROM nm_procolor left join nm_colorfixed on nm_colorfixed.cf_id = nm_procolor.pc_co_id where nm_procolor.pc_pro_id in ($data->pro_id)"));//print_r($color_detail);
			//print_r($color_detail);exit;
			
			 $size_detail = DB::select(DB::raw("SELECT GROUP_CONCAT(si_name) As size,GROUP_CONCAT(si_id) As size_id FROM nm_prosize left join nm_size on nm_size.si_id = nm_prosize.ps_si_id where nm_prosize.ps_pro_id in ($data->pro_id)"));
			 //print_r($size_detail);exit;
			 
			 $get_cate_name = DB::table('nm_product')->where('pro_status', '=', 1)->where('pro_id', '=', $data->pro_id)->LeftJoin('nm_maincategory','nm_maincategory.mc_id','=','nm_product.pro_mc_id')->get();	
			
			foreach($color_detail as $color)
			{
				
				foreach($size_detail as $size)
				{
				  
				  foreach( $get_cate_name as $cate)
				  {
				$product_img = explode('/**/', $data->pro_Img);
				$img_count = count($product_img);
				if($data->pro_no_of_purchase >= $data->pro_qty) 
			 	{ 
			 	$status = "sold";
				
				 }
			 	else
			 	{ 
				$status = "not sold";	 
				 }
				
				$json.='{"product_id":"'.$data->pro_id.'",
						"product_title":"'.strip_tags($data->pro_title).'",
						"product_description":"'.strip_tags($data->pro_desc).'",
						"product_discount_percentage":"'.substr($product_discount_percentage,0,2).'",
						"product_original_price":"'.$data->pro_price.'",
						"product_discount_price":"'.$data->pro_disprice.'",
						"Category":"'.strip_tags($cate->mc_name).'",
						"product_image":"'.url()."/assets/product/".$product_img[0].'",
						"product_no_of_purchase":"'.$data->pro_no_of_purchase.'",
						"product_qty":"'.$data->pro_qty.'",
					 	"product_color":"'.strip_tags($color->color).'",
						"Color_id":"'.$color->color_id.'",
						"product_size":"'.strip_tags($size->size).'",
						"Size_id":"'.$size->size_id.'",
						"product_delivery":"'.$data->pro_delivery.'",
						"status":"'.$status.'"
						
						},';
						
						$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			echo $json;
				}
				
				}	
						
			}		
				
		
			}
		}
		else
		{
			echo $json='{ "result" : "Not product details found"}';
		}
		
	}
	
	
	
	
	
	
	
	
	 public static function store_auctionview_detail_by_id($id)
	{
		$date = date('Y-m-d H:i:s');
		$sql = DB::table('nm_auction')->where('auc_status', '=', 1)->where('auc_end_date', '>', $date)->where('auc_shop_id','=',$id)->get();
		if($sql)
			{
		$json ='{"result":"success","Auction_list":[';
			foreach($sql as $data)
			{	
				if($data->auc_end_date > $date)
				{
					$status  = "not sold";
				}
				else
				{
					$status  = "sold";
				}
				$product_image = explode('/**/',$data->auc_image);
				
				$json.='{"auction_id":"'.$data->auc_id.'",
						"auction_title":"'.strip_tags($data->auc_title).'",
						"bit_amount":"'.$data->auc_auction_price.'",
						"product_image":"'.url()."/assets/auction/".$product_image[0].'",
						"bit_form":"'.$data->auc_auction_price.'",
						"bit_increment":"'.$data->auc_bitinc.'",
						"shipping_amount":"'.$data->auc_shippingfee.'",
						"retail_price":"'.$data->auc_original_price.'",
						"auc_posted_date":"'.$data->auc_posted_date.'",
						"auc_end_date":"'.$data->auc_posted_date.'",
						"auc_status":"'.$status.'"
					},';
					
			}
			
		$json = substr($json,0,strlen($json)-1);
			$json.=']}';
			
			echo $json;
			
		}
		else
		{
			echo $json='{ "result" : "Not auction details found"}';
		}
	}
	
	
	 public static function checkvalidemail($email)
	{
		return DB::table('nm_customer')->where('cus_email','=',$email)->get();
		
	}
	
	
	
}	



?>
	
