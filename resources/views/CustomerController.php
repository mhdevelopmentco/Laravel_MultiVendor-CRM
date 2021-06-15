<?php

class CustomerController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	     public function customer_dashboard()
		{
				if(Session::has('userid'))
				{
			 $adminheader 		= View::make('siteadmin.includes.admin_header')->with("routemenu","customer");	
			 $adminleftmenus	= View::make('siteadmin.includes.admin_left_menu_customer');
			 $adminfooter 		= View::make('siteadmin.includes.admin_footer');
			 $website_users     =  Customer::get_website_users();	
			 $fb_users     	    =  Customer::get_fb_users();
			 $admin_users 	    =  Customer::get_admin_users();
			 $logintoday=Customer::get_logintoday_users();
 			$login7days=Customer::get_login7days_users();
			$login30days=Customer::get_login30days_users();
			$login12mnth=Customer::get_login12mnth_users();
			 $ordermnth_count =Customer::get_chart_detailsnew();	
			 	$get_meta_details   = Home::get_meta_details(); 
			 return View::make('siteadmin.customer_dashboard')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('admin_user', $admin_users)->with('fb_users', $fb_users)->with('website_users', $website_users)->with('logintoday', $logintoday)->with('login7days', $login7days)->with('login30days', $login30days)->with('login12mnth', $login12mnth)->with('ordermnth_count', $ordermnth_count)->with('get_meta_details', $get_meta_details);
				}
				else
{
return Redirect::to('siteadmin');
}
		 
		}
		public function add_customer()
		{
			if(Session::has('userid'))
				{
			 $adminheader 		= View::make('siteadmin.includes.admin_header')->with("routemenu","customer");	
			 $adminleftmenus	= View::make('siteadmin.includes.admin_left_menu_customer');
			 $adminfooter 		= View::make('siteadmin.includes.admin_footer');
			 $countryresult    = Customer::get_country();
			 return View::make('siteadmin.add_customer')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('countryresult',$countryresult);	
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		public function edit_customer($id)
		{
			if(Session::has('userid'))
				{
 			$adminheader 		= View::make('siteadmin.includes.admin_header')->with("routemenu","customer");	
			 $adminleftmenus	= View::make('siteadmin.includes.admin_left_menu_customer');
			 $adminfooter 		= View::make('siteadmin.includes.admin_footer');
			 $countryresult    = Customer::get_country();
			 $customerresult=Customer::get_customer($id);
			 return View::make('siteadmin.edit_customer')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('countryresult',$countryresult)->with('customerresult',$customerresult);	
				}
				else
{
return Redirect::to('siteadmin');
}
		
		}
			public function send_inquiry_email($id)
			{
				if(Session::has('userid'))
				{
					Session::put('inquiriesid',$id);
				 $get_inquiry_details    = Customer::get_inquiry_details_email($id);
				 $email= $get_inquiry_details[0]->iq_emailid;
				 $name=$get_inquiry_details[0]->iq_name;
				 
			  $send_mail_data = array('name' =>$name  , 'password' =>$email,'email'=>$email,'name'=>$name);			  
			  # It will show these lines as error but no issue it will work fine Line no 119 - 122
			  Mail::send('emails.marchantmail', $send_mail_data, function($message)
        		{
					$id=Session::get('inquiriesid');
					 $get_inquiry_details    = Customer::get_inquiry_details_email($id);
				 $email= $get_inquiry_details[0]->iq_emailid;
				 $name=$get_inquiry_details[0]->iq_name;
           	 $message->to($email,$name)->subject('Reply To Your Inquiry');
       		 });
	 		 
			 return Redirect::to('manage_inquires')->with('success','Email Successfully sent');
				}
				else
				{
				return Redirect::to('siteadmin');
				}
			
			}
		public function manage_customer()
		{
			if(Session::has('userid'))
				{
 			$adminheader 		= View::make('siteadmin.includes.admin_header')->with("routemenu","customer");	
			 $adminleftmenus	= View::make('siteadmin.includes.admin_left_menu_customer');
			 $adminfooter 		= View::make('siteadmin.includes.admin_footer');
			$customerresult=Customer::get_customer_list();
			$citylist=Customer::get_city_list();
			 return View::make('siteadmin.manage_customer')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('customerresult',$customerresult)->with('cityresult',$citylist);	
				}
				else
{
return Redirect::to('siteadmin');
}
		
		}
		public function delete_customer($id)
		{
			if(Session::has('userid'))
				{
			$return = Customer::delete_customer($id);
	  		return Redirect::to('manage_customer')->with('delete_result','Record Deleted Successfully');
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		public function status_customer_submit($id,$status)
		{
			if(Session::has('userid'))
				{
			$return = Customer::status_customer($id,$status);
	  		return Redirect::to('manage_customer')->with('updated_result','Record Updated Successfully');
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		

		
		public function customer_edit_getcity()
		{
			$id =  $_GET['city_id'];
		$selectcity = Customer::get_customer_city($id);
		if($selectcity)
		{
			$return  = "";
			foreach($selectcity as $selectcity_ajax) {
			$return .= "<option value='".$selectcity_ajax->ci_id."' selected> ".$selectcity_ajax->ci_name." </option>";		
			}
			echo $return;
		}
		else
		{
		echo	$return = "<option value='0'> No datas found </option>";
		}
 		}


			
		public function add_customer_submit()
		{
			 if(Session::has('userid'))
				{
			$data =  Input::except(array('_token')) ;

 			$rule  =  array(
                    		'customer_first_name' => 'required' ,
				 'customer_Email' => 'required|email' ,
				'customer_phone'=>'required|numeric',
      				'customer_address1' => 'required' ,
				'customer_address2' => 'required' ,
				'select_customer_country' => 'required' ,
				'select_customer_city' => 'required' ,
              		  ) ;

			$validator = Validator::make($data,$rule);			
        		  if ($validator->fails())
          		  {
				return Redirect::to('add_customer')->withErrors($validator->messages())->withInput();
			  }

			 else
			{	
				$emailaddr=Input::get('customer_Email');


				$checkemailaddr=Customer::check_emailaddress($emailaddr);
				
				if($checkemailaddr)
				{	
				return Redirect::to('add_customer')->withMessage("Already EmailId Exists")->withInput();
				}
			else
			{	
				$uname=Input::get('customer_first_name');
				$address= Input::get('customer_Email');
			 //$pwd=Customer::randomPassword();
			 $mdpwd=md5(Input::get('customer_first_name'));		
			 $entry = array(
            		
			'cus_name' => Input::get('customer_first_name'),
			'cus_email' => Input::get('customer_Email') ,
			'cus_pwd' => $mdpwd,
			'cus_phone' => Input::get('customer_phone') ,
			'cus_address1' => Input::get('customer_address1') ,
			'cus_address2' => Input::get('customer_address2') ,
			 'cus_country' => Input::get('select_customer_country') ,
			'cus_city' => Input::get('select_customer_city') ,
			);


  			 $return = Customer::insert_customer($entry);
			 
			 include('SMTP/Send_Mail.php');	
			 $subject="You Account has been created.....";
			  $emailsubject="You Account has been created.....";
			 $message="Your Login Credentials <br>";
			 $message .="Email: ".$address."<br>";	
			 $message .="Password: ".$uname;
			 
			 ob_start();
			 include('Emailsub/customeraccountcreation.php');
			 $body=ob_get_contents();
			 ob_clean();
		 
			 Send_Mail($address,$subject,$body);	
			 
			 return Redirect::to('manage_customer');	

			}
			}
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		public function edit_customer_submit()
		{
			if(Session::has('userid'))
				{
			$data =  Input::except(array('_token')) ;
			$customerid=Input::get('customer_edit_id');

 			$rule  =  array(
                    		'customer_first_name' => 'required' ,
				 'customer_Email' => 'required|email' ,
				'customer_phone'=>'required|numeric',
      				'customer_address1' => 'required' ,
				'customer_address2' => 'required' ,
				'select_customer_country' => 'required' ,
				'select_customer_city' => 'required' ,
              		  ) ;

			$validator = Validator::make($data,$rule);			
        		  if ($validator->fails())
          		  {
				return Redirect::to('edit_customer/'.$customerid)->withErrors($validator->messages())->withInput();
			  }

			 else
			{	
				
				$emailaddr=Input::get('customer_Email');
				$checkemailaddr=Customer::check_emailaddress_edit($emailaddr,$customerid);
				
				if($checkemailaddr)
				{
				
		 return Redirect::to('edit_customer/'.$customerid)->withMessage('Already EmailId Exists')->withInput();	
				}
				else
				{

			 $entry = array(
            		
			'cus_name' => Input::get('customer_first_name'),
			'cus_email' => Input::get('customer_Email') ,
			'cus_phone' => Input::get('customer_phone') ,
			'cus_address1' => Input::get('customer_address1') ,
			'cus_address2' => Input::get('customer_address2') ,
			 'cus_country' => Input::get('select_customer_country') ,
			'cus_city' => Input::get('select_customer_city') ,
			);


  			 $return = Customer::update_customer($customerid,$entry);
			 return Redirect::to('manage_customer')->with('updated_result','Record Updated successfully');	
			}

			}
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		public function manage_subscribers()
		{
			if(Session::has('userid'))
				{
			 Session::put('newsubscriberscount',0);
			  Customer::update_subscriber_msgstatus();
			 $adminheader 		= View::make('siteadmin.includes.admin_header')->with("routemenu","customer");	
			 $adminleftmenus	= View::make('siteadmin.includes.admin_left_menu_customer');
			 $adminfooter 		= View::make('siteadmin.includes.admin_footer');
			 $subscriber_list    = Customer::subscriber_list();
			 return View::make('siteadmin.manage_subscribers')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('subscriber_list',$subscriber_list);	
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		public function delete_subscriber($id)
		{
			if(Session::has('userid'))
				{
			$return = Customer::delete_subscriber($id);
	  		return Redirect::to('manage_subscribers')->with('success','Record Deleted Successfully');
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		public function edit_subscriber_status($id,$status)
		{
			if(Session::has('userid'))
				{
			$return = Customer::edit_subscriber_status($id,$status);
	  		return Redirect::to('manage_subscribers')->with('success','Record Updated Successfully');
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		public function manage_inquires()
		{
			if(Session::has('userid'))
				{
				 Session::put('inquiriescnt',0);
			  Customer::update_inquiries_msgstatus();
			 $adminheader 		= View::make('siteadmin.includes.admin_header')->with("routemenu","customer");	
			 $adminleftmenus	= View::make('siteadmin.includes.admin_left_menu_customer');
			 $adminfooter 		= View::make('siteadmin.includes.admin_footer');
			 $inquires_list    = Customer::inquires_list();
			 return View::make('siteadmin.manage_inquires')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('inquires_list',$inquires_list);	
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		public function delete_inquires($id)
		{
			if(Session::has('userid'))
				{
			$return = Customer::delete_inquires($id);
	  		return Redirect::to('manage_inquires')->with('success','Record Deleted Successfully');
				}
				else
{
return Redirect::to('siteadmin');
}
		}
		public function manage_referral_users()
		{
			if(Session::has('userid'))
				{
			 $adminheader 		= View::make('siteadmin.includes.admin_header')->with("routemenu","customer");	
			 $adminleftmenus	= View::make('siteadmin.includes.admin_left_menu_customer');
			 $adminfooter 		= View::make('siteadmin.includes.admin_footer');
			 $referral_list    = Customer::referral_list();
			 return View::make('siteadmin.manage_referral_users')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('referral_list',$referral_list);
				}
				
				else
{
return Redirect::to('siteadmin');
}
		}

}
