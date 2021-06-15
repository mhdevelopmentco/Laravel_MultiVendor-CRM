<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'HomeController@index');
Route::get('index', 'HomeController@index');
Route::get('check_estimate_zipcode' , 'HomeController@check_estimate_zipcode');
Route::get('autosearch', 'HomeController@autosearch');
Route::get('my_wishlist','CustomerprofileController@get_userprofile');
Route::post('register_submit','HomeController@register_submit');
Route::get('products', 'HomeController@products');
Route::get('catproducts/{name}/{id}', 'HomeController@category_product_list');
Route::get('catdeals/{name}/{id}', 'HomeController@category_deal_list');
Route::get('catauction/{name}/{id}', 'HomeController@category_auction_list');
Route::get('productview/{mc}/{sc}/{sb}/{ssb}/{id}', 'HomeController@productview');
Route::get('productview1/{mc}/{sc}/{sb}/{id}', 'HomeController@productview1');
Route::get('productview2/{mc}/{sc}/{id}', 'HomeController@productview2');
Route::get('category_list/{id}', 'HomeController@category_list');
Route::get('registers/', 'HomeController@register');
Route::get('search', 'HomeController@search');
Route::get('newsletter/', 'HomeController@newsletter');
Route::post('subscription_submit','HomeController@subscription_submit');
Route::get('compare','HomeController@compare');
Route::post('addtowish','HomeController@addtowish');
Route::post('productcomments','HomeController@productcomments');
Route::post('dealcomments','HomeController@dealcomments');
Route::post('storecomments','HomeController@storecomments');
Route::get('/register',function(){
    $data = array('pageTitle'  =>  'Register');
    return View::make('index',$data);
});
Route::post('/register',function(){
    $inputData = Input::get('formData');
    parse_str($inputData, $formFields);  
    $userData = array(
      'name'      => $formFields['name'],
      'email'     =>  $formFields['email'],
      'password'  =>  $formFields['password'],
      'password_confirmation' =>  $formFields[ 'password_confirmation'],
    );
    $rules = array(
        'name'      =>  'required',
        'email'     =>  'required|email|unique:users',
        'password'  =>  'required|min:6|confirmed',
    );
    $validator = Validator::make($userData,$rules);
    if($validator->fails())
        return Response::json(array(
            'fail' => true,
            'errors' => $validator->getMessageBag()->toArray()
        ));
    else {
    //save password to show to user after registration
        $password = $userData['password'];
    //hash it now
        $userData['password'] =    Hash::make($userData['password']);
        unset($userData['password_confirmation']);
    //save to DB user details
      if(User::create($userData)) {  
          //return success  message
        return Response::json(array(
          'success' => true,
          'email' => $userData['email'],
          'password'    =>  $password
        ));
      }
  }
});

Route::get('deals', 'HomeController@deals');
Route::get('dealview/{id}', 'HomeController@dealview');
Route::get('dealview/{mc}/{sc}/{sb}/{ssb}/{id}', 'HomeController@dealview');
Route::get('dealview2/{mc}/{sc}/{id}', 'HomeController@dealview2');
Route::get('dealview1/{mc}/{sc}/{sb}/{id}', 'HomeController@dealview1');
Route::get('auction', 'HomeController@auction');
Route::get('auctionview/{id}', 'HomeController@auctionview');
Route::get('stores', 'HomeController@stores');
Route::get('storeview/{id}', 'HomeController@storeview');
Route::get('sold', 'HomeController@sold');
Route::get('front_newsletter_submit', 'FooterController@front_newsletter_submit');
Route::get('check_title','FooterController@check_title');
Route::post('user_ad_ajax','FooterController@user_ad_ajax');
Route::get('register_getcountry','RegisterController@register_getcountry_ajax');
Route::get('register_emailcheck','RegisterController@register_emailcheck_ajax');
Route::post('user_login_submit','UserloginController@user_login_submit');
Route::get('user_profile','CustomerprofileController@get_userprofile');
Route::get('user_logout','CustomerprofileController@user_logout');
Route::get('facebook_logout','CustomerprofileController@facebook_logout');
Route::get('update_username_ajax','CustomerprofileController@update_username_ajax');
Route::post('update_password_ajax','CustomerprofileController@update_password_ajax');
Route::get('update_phonenumber_ajax','CustomerprofileController@update_phonenumber_ajax');
Route::get('update_address_ajax','CustomerprofileController@update_address_ajax');
Route::get('update_city_ajax','CustomerprofileController@update_city_ajax');
Route::get('update_shipping_ajax','CustomerprofileController@update_shipping_ajax');
Route::post('profile_image_submit','CustomerprofileController@profile_image_submit');
Route::get('contactus', 'FooterController@contactus');
Route::post('enquiry_submit', 'FooterController@enquiry_submit');
Route::get('insert_inquriy_ajax','FooterController@insert_inquriy_ajax');
Route::get('blog', 'FooterController@blog');
Route::get('blog_category/{id}', 'FooterController@blog_category');
Route::get('blog_view/{id}', 'FooterController@blog_view');
Route::get('blog_comment/{id}', 'FooterController@blog_comment');
Route::post('blog_comment_submit', 'FooterController@blog_comment_submit');
Route::get('pages/{id}', 'FooterController@get_front_cms_pages');
Route::get('faq', 'FooterController@get_faq');
Route::get('termsandconditons', 'FooterController@termsandconditons');

Route::get('help', 'FooterController@help');
Route::get('nearbystore', 'HomeController@nearmemap');
Route::get('checkout', 'HomeController@checkout');
Route::post('checkout_auction', 'HomeController@checkout_auction');
Route::get('user_forgot_submit','UserloginController@password_emailcheck');
Route::post('payment_checkout_process', 'HomeController@payment_checkout_process');
Route::get('paypal_checkout_success', 'HomeController@paypal_checkout_success');
Route::get('paypal_checkout_cancel', 'HomeController@paypal_checkout_cancel');
Route::post('bid_payment', 'HomeController@bid_payment');
Route::get('bid_payment', 'HomeController@bid_payment_error');
Route::post('place_bid_payment', 'HomeController@place_bid_payment');
Route::get('place_bid_payment', 'HomeController@bid_payment_error');
//fb_login
Route::get('facebooklogin', 'HomeController@facebooklogin');
Route::get('merchant_signup', 'HomeController@merchant_signup');
Route::post('merchant_signup', 'HomeController@merchant_signup_submit');
Route::get('submission_merchant', 'HomeController@submission_merchant');


//fb_login


Route::get('register_getcity_shipping','CustomerprofileController@register_getcity_shipping');
 
//user_login_forgot_pwd
Route::get('user_forgot_pwd_email/{email_id}','UserloginController@user_forgot_pwd_email');
Route::get('user_reset_password_submit','UserloginController@user_reset_password_submit');

//payment result
Route::get('show_payment_result/{orderid}', 'HomeController@show_payment_result');
Route::get('show_payment_result_cod/{orderid}', 'HomeController@show_payment_result_cod');

//add_to_cart

Route::get('cart', 'HomeController@cart');
Route::get('addtocart', 'HomeController@cart');
Route::post('addtocart', 'HomeController@add_to_cart');
Route::get('remove_session_cart_data', 'HomeController@remove_session_cart_data');
Route::get('set_quantity_session_cart', 'HomeController@set_quantity_session_cart');
Route::get('remove_session_dealcart_data', 'HomeController@remove_session_dealcart_data');
Route::get('set_quantity_session_dealcart', 'HomeController@set_quantity_session_dealcart');

Route::get('deal_cart', 'HomeController@deal_cart');
Route::get('addtocart_deal', 'HomeController@deal_cart');
Route::post('addtocart_deal', 'HomeController@add_to_cart_deal');
//add_to_cart

//admin_login
Route::get('chart', 'AdminController@chart');
Route::get('siteadmin', 'AdminController@siteadmin');
Route::get('admin_settings', 'AdminController@admin_settings');
Route::post('admin_settings_submit', 'AdminController@admin_settings_submit');
Route::get('admin_profile', 'AdminController@admin_profile');
Route::post('login_check', 'AdminController@login_check');
Route::post('forgot_check', 'AdminController@forgot_check');
Route::get('admin_logout', 'AdminController@admin_logout');
Route::get('merchant_profile', 'MerchantSettingsController@merchant_profile');
//admin_login

//admin_dashboard
Route::get('siteadmin_dashboard', 'DashboardController@siteadmin_dashboard');

//admin_dashboard

// admin -> settings -> attribute managment 
Route::get('add_size', 'AttributeController@add_size');
Route::post('addsize_submit', 'AttributeController@addsizesubmit');
Route::get('manage_size', 'AttributeController@manage_size');
Route::get('delete_size/{id}', 'AttributeController@delete_size');
Route::get('edit_size/{id}', 'AttributeController@edit_size');
Route::post('editsize_submit', 'AttributeController@editsize_submit');
Route::get('add_color', 'AttributeController@add_color');
Route::post('add_color_submit', 'AttributeController@add_color_submit');
Route::get('manage_color', 'AttributeController@manage_color');
Route::get('edit_color/{id}', 'AttributeController@edit_color');
Route::post('editcolor_submit', 'AttributeController@editcolor_submit');
Route::get('delete_color/{id}', 'AttributeController@deletecolor_submit');
//ajax color
Route::get('attribute_select_color', 'AttributeController@attribute_select_color');
//ajax color
// admin -> settings -> attribute managment 

// admin -> Banner image settings -> add banner image
Route::get('add_banner_image', 'BannerController@add_banner_image');
Route::post('add_banner_submit', 'BannerController@add_banner_submit');
Route::get('manage_banner_image', 'BannerController@manage_banner_image');
Route::get('edit_banner_image/{id}', 'BannerController@edit_banner_image');
Route::post('edit_banner_submit', 'BannerController@edit_banner_submit');
Route::get('delete_banner_submit/{id}', 'BannerController@delete_banner_submit');
Route::get('status_banner_submit/{id}/{status}', 'BannerController@status_banner_submit');
// admin -> Banner image settings -> add banner image



//admin -> Settings -> Specification management
Route::get('add_specification', 'SpecificationController@add_specification');
Route::post('add_specification_submit', 'SpecificationController@add_specification_submit');
Route::get('manage_specification', 'SpecificationController@manage_specification');
Route::get('edit_specification/{id}', 'SpecificationController@edit_specification');
Route::get('delete_specification/{id}', 'SpecificationController@delete_specification');
Route::post('update_specification_submit', 'SpecificationController@update_specification');
Route::get('add_specification_group', 'SpecificationController@add_specification_group');
Route::post('add_specification_group_submit', 'SpecificationController@add_specification_group_submit');
Route::get('manage_specification_group', 'SpecificationController@manage_specification_group');
Route::get('edit_specification_group/{id}', 'SpecificationController@edit_specification_group');
Route::get('delete_specification_group/{id}', 'SpecificationController@delete_specification_group');
Route::post('edit_specification_group_submit', 'SpecificationController@edit_specification_group_submit');
//admin -> Settings -> Specification management

//admin country management->add country 

Route::get('add_country', 'CountryController@add_country');
Route::post('add_country_submit', 'CountryController@add_country_submit');
Route::get('manage_country', 'CountryController@manage_country');
Route::post('update_country_submit', 'CountryController@update_country_submit');
Route::get('edit_country/{id}', 'CountryController@edit_country');
Route::get('delete_country/{id}', 'CountryController@delete_country');
Route::get('status_country_submit/{id}/{status}', 'CountryController@update_status_country');


// admin->settings->CMS management

Route::get('add_cms_page', 'CmsController@add_cms_page');
Route::post('cms_add_page_submit','CmsController@cms_add_page_submit');
Route::get('manage_cms_page', 'CmsController@manage_cms_page');
Route::get('edit_cms_page/{id}', 'CmsController@edit_cms_page');
Route::post('edit_cms_page_submit', 'CmsController@edit_cms_page_submit');
Route::get('block_cms_page/{id}/{status}', 'CmsController@block_cms_page');
Route::get('delete_cms_page/{id}','CmsController@delete_cms_page');
Route::get('aboutus_page','CmsController@aboutus_page');
Route::post('aboutus_page_update','CmsController@aboutus_page_update');
Route::get('terms','CmsController@terms');
Route::post('terms_update','CmsController@terms_update');
// admin->settings->CMS management

//admin-> Deals
Route::get('deals_dashboard', 'DealsController@deals_dashboard');
Route::get('add_deals', 'DealsController@add_deals');
Route::post('add_deals_submit', 'DealsController@add_deals_submit');
//for ajax
Route::get('deals_select_main_cat', 'DealsController@deals_select_main_cat');
Route::get('deals_select_sub_cat', 'DealsController@deals_select_sub_cat');
Route::get('deals_select_second_sub_cat', 'DealsController@deals_select_second_sub_cat');
Route::get('deals_edit_select_main_cat', 'DealsController@deals_edit_select_main_cat');
Route::get('deals_edit_select_sub_cat', 'DealsController@deals_edit_select_sub_cat' );
Route::get('deals_edit_second_sub_cat', 'DealsController@deals_edit_second_sub_cat');
Route::get('check_title_exist','DealsController@check_title_exist');
Route::get('check_title_exist_edit', 'DealsController@check_title_exist_edit');
//for ajax
Route::post('edit_deals_submit', 'DealsController@edit_deals_submit');
Route::get('edit_deals/{id}', 'DealsController@edit_deals');
Route::get('delete_deals/{id}', 'DealsController@delete_deals');
Route::get('manage_deals','DealsController@manage_deals');
Route::post('manage_deals','DealsController@manage_deals');
Route::get('block_deals/{id}/{status}','DealsController@block_deals');
Route::get('deal_details/{id}', 'DealsController@deal_details');
Route::get('expired_deals', 'DealsController@expired_deals');
Route::post('expired_deals', 'DealsController@expired_deals');


Route::get('validate_coupon_code', 'DealsController@validate_coupon_code');
Route::get('redeem_coupon_list', 'DealsController@redeem_coupon_list');



//admin-> Deals
//admin -> cities management

Route::get('add_city', 'CityController@add_city');
Route::post('add_city_submit', 'CityController@add_city_submit');
Route::get('manage_city', 'CityController@manage_city');
Route::post('edit_city_submit', 'CityController@edit_city_submit');
Route::get('edit_city/{id}', 'CityController@edit_city');
Route::get('delete_city/{id}', 'CityController@delete_city');
Route::get('status_city_submit/{id}/{status}', 'CityController@status_city_submit');
Route::post('update_default_city_submit', 'CityController@update_default_city_submit');

//admin-> categories management
Route::get('add_category', 'CategoryController@add_category');
Route::post('add_category_submit', 'CategoryController@add_category_submit');
Route::get('manage_category', 'CategoryController@manage_category');
Route::get('edit_category/{id}', 'CategoryController@edit_category');
Route::post('edit_category_submit', 'CategoryController@edit_category_submit');
Route::get('status_category_submit/{id}/{status}', 'CategoryController@status_category_submit');
Route::get('delete_category/{id}', 'CategoryController@delete_category');
Route::get('add_main_category/{id}', 'CategoryController@add_main_category');
Route::post('add_main_category_submit', 'CategoryController@add_main_category_submit');
Route::get('manage_main_category/{id}', 'CategoryController@manage_main_category');

Route::get('edit_main_category/{id}', 'CategoryController@edit_main_category');
Route::post('edit_main_category_submit', 'CategoryController@edit_main_category_submit');
Route::get('status_main_category_submit/{id}/{mc_id}/{status}', 'CategoryController@status_main_category_submit');
Route::get('delete_main_category/{id}/{mc_id}', 'CategoryController@delete_main_category');

Route::get('add_sub_main_category/{id}', 'CategoryController@add_sub_main_category');
Route::post('add_sub_category_submit', 'CategoryController@add_sub_category_submit');
Route::get('manage_sub_category/{id}', 'CategoryController@manage_sub_category');
Route::get('add_secsub_main_category/{id}', 'CategoryController@add_secsub_main_category');
Route::post('add_secsub_category_submit', 'CategoryController@add_secsub_main_category_submit');
Route::get('edit_secsub_main_category/{id}', 'CategoryController@edit_secsub_main_category');
Route::post('edit_secsub_category_submit', 'CategoryController@edit_secsub_category_submit');
Route::get('status_sub_category_submit/{id}/{mc_id}/{status}', 'CategoryController@status_subsec_category_submit');
Route::get('delete_sub_category/{id}/{mc_id}', 'CategoryController@delete_subsec_category');
Route::get('manage_secsubmain_category/{id}', 'CategoryController@manage_secsubmain_category');
Route::get('status_secsub_category_submit/{id}/{mc_id}/{status}', 'CategoryController@status_secsub_category_submit');
Route::get('delete_secsub_category/{id}/{mc_id}', 'CategoryController@delete_secsub_category');
Route::get('edit_sec1sub_main_category/{id}', 'CategoryController@edit_sec1sub_main_category');
Route::post('edit_sec1sub_category_submit', 'CategoryController@edit_sec1sub_category_submit');

//admin-> settings->FAQ
Route::get('add_faq', 'FaqController@add_faq');
Route::get('manage_faq', 'FaqController@manage_faq');
Route::post('add_faq_submit', 'FaqController@add_faq_submit');
Route::post('update_faq_submit', 'FaqController@update_faq_submit');
Route::get('edit_faq/{id}', 'FaqController@edit_faq');
Route::get('delete_faq/{id}', 'FaqController@delete_faq');
Route::get('status_faq_submit/{id}/{status}', 'FaqController@update_status_faq');

//admin->settings->Ads Management 
Route::get('add_ad', 'AdController@add_ad');
Route::post('add_ad_submit', 'AdController@add_ad_submit');
Route::get('manage_ad', 'AdController@manage_ad');
Route::get('edit_ad/{id}', 'AdController@edit_ad');
Route::post('edit_ad_submit', 'AdController@edit_ad_submit');
Route::get('delete_ad/{id}', 'AdController@delete_ad');
Route::get('status_ad_submit/{id}/{status}', 'AdController@status_ad_submit');

//admin -> Settings -> Newsletter
Route::get('send_newsletter', 'SettingsController@send_newsletter');
Route::post('send_newsletter_submit', 'SettingsController@send_newsletter_submit');
Route::get('manage_newsletter_subscribers', 'SettingsController@manage_newsletter_subscribers');
Route::get('edit_newsletter_subscriber_status/{id}/{status}', 'SettingsController@edit_newsletter_subscriber_status');
Route::get('delete_newsletter_subscriber/{id}', 'SettingsController@delete_newsletter_subscriber');
//admin ->product->Add Product
Route::get('add_product', 'ProductController@add_product');
Route::post('add_product_submit', 'ProductController@add_product_submit');
Route::get('product_getmaincategory', 'ProductController@product_getmaincategory');
Route::get('product_getsubcategory', 'ProductController@product_getsubcategory');
Route::get('product_getsecondsubcategory', 'ProductController@product_getsecondsubcategory');
Route::get('product_getcolor', 'ProductController@product_getcolor');
Route::get('product_getsize', 'ProductController@product_getsize');
Route::get('add_estimated_zipcode', 'ProductController@add_estimated_zipcode');
Route::post('add_estimated_zipcode_submit', 'ProductController@add_estimated_zipcode_submit');
Route::get('estimated_zipcode','ProductController@estimated_zipcode');
Route::get('edit_zipcode/{id}', 'ProductController@edit_zipcode');
Route::get('block_zipcode/{id}/{status}', 'ProductController@block_zipcode');
Route::post('edit_estimated_zipcode_submit', 'ProductController@edit_estimated_zipcode_submit');

Route::get('product_edit_getmaincategory', 'ProductController@product_edit_getmaincategory');
Route::get('product_edit_getsubcategory', 'ProductController@product_edit_getsubcategory' );
Route::get('product_edit_getsecondsubcategory', 'ProductController@product_edit_getsecondsubcategory');
 
Route::post('edit_product_submit', 'ProductController@edit_product_submit');
Route::get('edit_product/{id}', 'ProductController@edit_product');
Route::get('delete_product/{id}', 'ProductController@delete_product');
Route::get('manage_product','ProductController@manage_product');
Route::post('manage_product','ProductController@manage_product');
Route::get('block_product/{id}/{status}','ProductController@block_product');
Route::get('product_details/{id}', 'ProductController@product_details');
Route::get('manage_product_shipping_details','ProductController@manage_product_shipping_details');
Route::get('manage_cashondelivery_details','ProductController@manage_cashondelivery_details');
Route::get('sold_product', 'ProductController@sold_product');
Route::post('sold_product', 'ProductController@sold_product');
Route::get('product_getmerchantshop', 'ProductController@product_getmerchantshop');
Route::get('product_getmerchantshop_ajax', 'ProductController@product_getmerchantshop');


Route::get('product_dashboard', 'ProductController@product_dashboard');


//admin->customer->add customer
Route::get('add_customer','CustomerController@add_customer');
Route::get('load_getcity','CustomerController@getcity');
Route::post('add_customer_submit','CustomerController@add_customer_submit');
Route::post('edit_customer_submit','CustomerController@edit_customer_submit');
Route::get('edit_customer/{id}','CustomerController@edit_customer');
Route::get('delete_customer/{id}','CustomerController@delete_customer');
Route::get('status_customer_submit/{id}/{status}','CustomerController@status_customer_submit');
Route::get('customer_edit_getcity','CustomerController@customer_edit_getcity');
Route::get('manage_customer','CustomerController@manage_customer');
Route::post('manage_customer','CustomerController@manage_customer');
Route::get('manage_subscribers','CustomerController@manage_subscribers');
Route::get('edit_subscriber_status/{id}/{status}','CustomerController@edit_subscriber_status');
Route::get('delete_subscriber/{id}','CustomerController@delete_subscriber');
Route::get('manage_inquires','CustomerController@manage_inquires');
Route::post('manage_inquires','CustomerController@manage_inquires');
Route::get('send_inquiry_email/{id}','CustomerController@send_inquiry_email');
Route::get('delete_inquires/{id}','CustomerController@delete_inquires');
Route::get('manage_referral_users','CustomerController@manage_referral_users');
Route::get('customer_dashboard', 'CustomerController@customer_dashboard');

//admin ->general settings

Route::get('general_setting', 'SettingsController@general_setting');
Route::post('general_setting_submit', 'SettingsController@general_setting_submit');
Route::get('email_setting', 'SettingsController@email_setting');
Route::post('email_setting_submit', 'SettingsController@email_setting_submit');
Route::get('smtp_setting', 'SettingsController@smtp_setting');
Route::post('smtp_setting_submit', 'SettingsController@smtp_setting_submit');
Route::post('send_setting_submit', 'SettingsController@send_setting_submit');

//Admin -> Settings-> Social media settings

Route::get('social_media_settings','SettingsController@social_media_settings');
Route::post('social_media_setting_submit', 'SettingsController@social_media_setting_submit');
Route::get('payment_settings', 'SettingsController@payment_settings');
Route::get('select_currency_value_ajax', 'SettingsController@select_currency_value_ajax');
Route::post('payment_settings_submit', 'SettingsController@payment_settings_submit');
Route::get('module_settings', 'SettingsController@module_settings');
Route::post('module_settings_submit', 'SettingsController@module_settings_submit');
//admin->merchants->add merchant

Route::get('add_merchant','MerchantController@add_merchant');
Route::get('ajax_select_city','MerchantController@ajax_select_city');
Route::get('ajax_select_city_edit', 'MerchantController@ajax_select_city_edit');
Route::post('add_merchant_submit', 'MerchantController@add_merchant_submit');
Route::get('edit_merchant/{id}','MerchantController@edit_merchant');
Route::post('edit_merchant_submit', 'MerchantController@edit_merchant_submit');
Route::get('manage_merchant', 'MerchantController@manage_merchant');
Route::post('manage_merchant', 'MerchantController@manage_merchant');
Route::get('manage_enquiry', 'MerchantController@manage_enquiry');
Route::get('block_merchant/{id}/{status}', 'MerchantController@block_merchant');
Route::get('manage_store/{id}', 'MerchantController@manage_store');
Route::get('add_store/{id}', 'MerchantController@add_store');
Route::post('add_store_submit','MerchantController@add_store_submit');
Route::get('edit_store/{id}/{mer_id}','MerchantController@edit_store');
Route::post('edit_store_submit','MerchantController@edit_store_submit');
Route::get('block_store/{id}/{status}/{mer_id}', 'MerchantController@block_store');

Route::get('merchant_dashboard', 'MerchantController@merchant_dashboard');
//admin-> Auction
Route::get('auction_dashboard', 'AuctionController@auction_dashboard');
Route::get('add_auction', 'AuctionController@add_auction');
Route::get('auction_winners', 'AuctionController@auction_winners');
Route::get('auction_cod', 'AuctionController@auction_cod');
Route::get('cancel_auction_cod/{id}', 'AuctionController@cancel_auction_cod');
Route::post('add_auction_submit', 'AuctionController@add_auction_submit');
//for ajax
Route::get('auction_select_main_cat', 'AuctionController@auction_select_main_cat');
Route::get('auction_select_sub_cat', 'AuctionController@auction_select_sub_cat');
Route::get('auction_select_second_sub_cat', 'AuctionController@auction_select_second_sub_cat');
Route::get('auction_edit_select_main_cat', 'AuctionController@auction_edit_select_main_cat');
Route::get('auction_edit_select_sub_cat', 'AuctionController@auction_edit_select_sub_cat' );
Route::get('auction_edit_second_sub_cat', 'AuctionController@auction_edit_second_sub_cat');
Route::get('check_auctiontitle_exist','AuctionController@check_auctiontitle_exist');
Route::get('check_auctiontitle_exist_edit', 'AuctionController@check_auctiontitle_exist_edit');
Route::get('auction_select_store_name', 'AuctionController@auction_select_store_name');
Route::get('auction_select_store_name_edit', 'AuctionController@auction_select_store_name_edit');
//for ajax
Route::post('edit_auction_submit', 'AuctionController@edit_auction_submit');
Route::get('edit_auction/{id}', 'AuctionController@edit_auction');
Route::get('manage_auction','AuctionController@manage_auction');
Route::get('block_auction/{id}/{status}','AuctionController@block_auction');
Route::get('auction_details/{id}', 'AuctionController@auction_details');
Route::get('expired_auction', 'AuctionController@expired_auction');

//merchant-> Auction
Route::get('merchant_add_auction', 'MerchantauctionController@add_auction');
Route::post('merchant_add_auction_submit', 'MerchantauctionController@add_auction_submit');
Route::get('merchant_auction_winners', 'MerchantauctionController@auction_winners');
Route::get('merchant_auction_cod', 'MerchantauctionController@auction_cod');



//for ajax
Route::get('check_auctiontitle_exist','MerchantauctionController@check_auctiontitle_exist');
Route::get('check_auctiontitle_exist_edit', 'MerchantauctionController@check_auctiontitle_exist_edit');
Route::get('auction_select_store_name', 'MerchantauctionController@auction_select_store_name');
Route::get('auction_select_store_name_edit', 'MerchantauctionController@auction_select_store_name_edit');
//for ajax
Route::post('merchant_edit_auction_submit', 'MerchantauctionController@edit_auction_submit');
Route::get('merchant_edit_auction/{id}', 'MerchantauctionController@edit_auction');
Route::get('merchant_manage_auction','MerchantauctionController@manage_auction');
Route::get('merchant_block_auction/{id}/{status}','MerchantauctionController@block_auction');
Route::get('merchant_auction_details/{id}', 'MerchantauctionController@auction_details');
Route::get('merchant_expired_auction', 'MerchantauctionController@expired_auction');
Route::get('merchant_block_auction/{id}/{status}/{merid}','MerchantauctionController@block_auction');





//admin-> Deals



//adming-Blogs
Route::get('add_blog', 'BlogController@add_blog');
Route::post('add_blog_submit', 'BlogController@add_blog_submit');
Route::get('manage_draft_blog', 'BlogController@manage_draft_blog');
Route::get('manage_publish_blog', 'BlogController@manage_publish_blog');
Route::get('block_blog/{id}/{status}/{blog_type}', 'BlogController@block_blog');
Route::get('delete_blog_submit/{id}/{blog_type}', 'BlogController@delete_blog_submit');
Route::get('edit_blog/{id}', 'BlogController@edit_blog');
Route::post('edit_blog_submit', 'BlogController@edit_blog_submit');
Route::get('blog_details/{id}', 'BlogController@blog_details');
Route::get('blog_settings', 'BlogController@blog_settings');
Route::post('edit_blog_settings', 'BlogController@edit_blog_settings');
Route::get('manage_blogcmts', 'BlogController@manage_blogcomments');
Route::get('status_blogcmt_submit/{cmtid}/{status}','BlogController@status_blogcmt_submit');
Route::get('reply_blogcmts/{cmtid}', 'BlogController@reply_blogcmts');
Route::post('admin_blogreply_submit', 'BlogController@admin_blogreply_submit');

//merchant login
Route::get('sitemerchant', 'MerchantLoginController@merchant_login');
Route::post('mer_login_check', 'MerchantLoginController@merchant_login_check');
Route::post('merchant_forgot_check', 'MerchantLoginController@merchant_forgot_check');
Route::get('forgot_pwd_email/{email}', 'MerchantLoginController@forgot_pwd_email');
Route::post('forgot_pwd_email_submit', 'MerchantLoginController@forgot_pwd_email_submit');
Route::get('merchant_logout', 'MerchantLoginController@merchant_logout');


//admin ->Image settings 
Route::get('add_logo', 'ImagesettingsController@add_logo');
Route::post('add_logo_submit', 'ImagesettingsController@add_logo_submit');
Route::get('add_favicon', 'ImagesettingsController@add_favicon');
Route::post('add_favicon_submit', 'ImagesettingsController@add_favicon_submit');
Route::get('add_noimage', 'ImagesettingsController@add_noimage');
Route::post('add_noimage_submit', 'ImagesettingsController@add_noimage_submit');


//merchant_dashboard
Route::get('sitemerchant_dashboard', 'DashboardController@sitemerchant_dashboard');


//merchant settings

//merchant settings

Route::get('merchant_settings', 'MerchantSettingsController@show_settings');
Route::get('edit_merchant_info/{id}', 'MerchantSettingsController@edit_info');
Route::get('change_merchant_password/{id}', 'MerchantSettingsController@change_pwd');
Route::post('change_password_submit', 'MerchantSettingsController@change_password_submit');
Route::post('edit_merchant_account_submit', 'MerchantSettingsController@edit_merchant_account_submit');


//merchant shop 
Route::get('merchant_manage_shop/{id}', 'MerchantshopController@manage_shop');
Route::post('merchant_manage_shop/{id}', 'MerchantshopController@manage_shop');
Route::get('merchant_add_shop/{id}', 'MerchantshopController@add_shop');
Route::get('merchant_edit_shop/{id}/{merid}', 'MerchantshopController@edit_shop');
Route::get('merchant_block_shop/{id}/{status}/{merid}', 'MerchantshopController@block_shop');

Route::post('merchant_add_shop_submit', 'MerchantshopController@add_shop_submit');
Route::post('merchant_edit_shop_submit', 'MerchantshopController@edit_shop_submit');



//merchant-> Deals
Route::get('mer_add_deals', 'MerchantdealsController@add_deals');
Route::post('mer_add_deals_submit', 'MerchantdealsController@add_deals_submit');
//for ajax
//for ajax
Route::post('mer_edit_deals_submit', 'MerchantdealsController@edit_deals_submit');
Route::get('mer_edit_deals/{id}', 'MerchantdealsController@edit_deals');
Route::get('mer_manage_deals','MerchantdealsController@manage_deals');
Route::post('mer_manage_deals','MerchantdealsController@manage_deals');
Route::get('mer_block_deals/{id}/{status}','MerchantdealsController@block_deals');
Route::get('mer_deal_details/{id}', 'MerchantdealsController@deal_details');
Route::get('mer_expired_deals', 'MerchantdealsController@expired_deals');
Route::post('mer_expired_deals', 'MerchantdealsController@expired_deals');


Route::get('mer_validate_coupon_code', 'MerchantdealsController@validate_coupon_code');
Route::get('mer_redeem_coupon_list', 'MerchantdealsController@redeem_coupon_list');

//merchant-> Deals

//merchant ->product->Add Product
Route::get('mer_add_product', 'MerchantproductController@add_product');
Route::post('mer_add_product_submit', 'MerchantproductController@mer_add_product_submit');
Route::get('mer_product_getcolor', 'MerchantproductController@product_getcolor'); 
Route::post('mer_edit_product_submit', 'MerchantproductController@mer_edit_product_submit');
Route::get('mer_edit_product/{id}', 'MerchantproductController@mer_edit_product');
Route::get('mer_manage_product','MerchantproductController@manage_product');
Route::post('mer_manage_product','MerchantproductController@manage_product');
Route::get('mer_block_product/{id}/{status}','MerchantproductController@block_product');
Route::get('mer_product_details/{id}', 'MerchantproductController@product_details');
Route::get('mer_manage_product_shipping_details','MerchantproductController@manage_product_shipping_details');
Route::get('mer_manage_cashondelivery_details','MerchantproductController@manage_cashondelivery_details');
Route::get('mer_sold_product', 'MerchantproductController@sold_product');
Route::post('mer_sold_product', 'MerchantproductController@sold_product');
//merchant ->product->Add Product
// merchant -> settings -> attribute managment 
Route::get('mer_add_size', 'MerchantattributeController@mer_add_size');
Route::post('mer_addsize_submit', 'MerchantattributeController@mer_addsizesubmit');
Route::get('mer_manage_size', 'MerchantattributeController@mer_manage_size');
Route::get('mer_delete_size/{id}', 'MerchantattributeController@mer_delete_size');
Route::get('mer_edit_size/{id}', 'MerchantattributeController@mer_edit_size');
Route::post('mer_editsize_submit', 'MerchantattributeController@mer_editsize_submit');
Route::get('mer_add_color', 'MerchantattributeController@mer_add_color');
Route::post('mer_add_color_submit', 'MerchantattributeController@mer_add_color_submit');
Route::get('mer_manage_color', 'MerchantattributeController@mer_manage_color');
Route::get('mer_edit_color/{id}', 'MerchantattributeController@mer_edit_color');
Route::post('mer_editcolor_submit', 'MerchantattributeController@mer_editcolor_submit');
Route::get('mer_delete_color/{id}', 'MerchantattributeController@mer_deletecolor_submit');
//ajax color
Route::get('attribute_select_color', 'MerchantattributeController@mer_attribute_select_color');
//ajax color

/*merchant transaction */
Route::get('show_merchant_transactions', 'MerchantTransactionController@show_merchant_transactions');

/* merchant deals transaction */
Route::get('merchant_deals_all_orders/{merid}', 'MerchantTransactionController@merchant_deals_all_orders');
Route::get('merchant_deals_all_orders', 'MerchantTransactionController@deals_all_orders');
Route::post('merchant_deals_all_orders', 'MerchantTransactionController@deals_all_orders');
Route::get('merchant_deals_success_orders', 'MerchantTransactionController@deals_success_orders');
Route::get('merchant_deals_completed_orders', 'MerchantTransactionController@deals_completed_orders');
Route::get('merchant_deals_hold_orders', 'MerchantTransactionController@deals_hold_orders');
Route::get('merchant_deals_failed_orders', 'MerchantTransactionController@deals_failed_orders');


Route::post('merchant_deals_success_orders', 'MerchantTransactionController@deals_success_orders');
Route::post('merchant_deals_completed_orders', 'MerchantTransactionController@deals_completed_orders');
Route::post('merchant_deals_hold_orders', 'MerchantTransactionController@deals_hold_orders');
Route::post('merchant_deals_failed_orders', 'MerchantTransactionController@deals_failed_orders');
/* merchant dealscod transaction */
Route::get('merchant_dealscod_all_orders', 'MerchantTransactionController@dealscod_all_orders');
Route::get('merchant_dealscod_completed_orders', 'MerchantTransactionController@dealscod_completed_orders');
Route::get('merchant_dealscod_hold_orders', 'MerchantTransactionController@dealscod_hold_orders');
Route::get('merchant_dealscod_failed_orders', 'MerchantTransactionController@dealscod_failed_orders');

Route::post('merchant_dealscod_all_orders', 'MerchantTransactionController@dealscod_all_orders');
Route::post('merchant_dealscod_completed_orders', 'MerchantTransactionController@dealscod_completed_orders');
Route::post('merchant_dealscod_hold_orders', 'MerchantTransactionController@dealscod_hold_orders');
Route::post('merchant_dealscod_failed_orders', 'MerchantTransactionController@dealscod_failed_orders');

/* merchant products transaction */
Route::get('merchant_product_all_orders', 'MerchantTransactionController@product_all_orders');
Route::get('merchant_product_success_orders', 'MerchantTransactionController@product_success_orders');
Route::get('merchant_product_failed_orders', 'MerchantTransactionController@product_failed_orders');
Route::get('merchant_product_completed_orders', 'MerchantTransactionController@product_completed_orders');
Route::get('merchant_product_hold_orders', 'MerchantTransactionController@product_hold_orders');

Route::post('merchant_product_all_orders', 'MerchantTransactionController@product_all_orders');
Route::post('merchant_product_success_orders', 'MerchantTransactionController@product_success_orders');
Route::post('merchant_product_failed_orders', 'MerchantTransactionController@product_failed_orders');
Route::post('merchant_product_completed_orders', 'MerchantTransactionController@product_completed_orders');
Route::post('merchant_product_hold_orders', 'MerchantTransactionController@product_hold_orders');

/* merchant productscod transaction */
Route::get('merchant_product_cod_all_orders', 'MerchantTransactionController@cod_all_orders');
Route::get('merchant_product_cod_completed_orders', 'MerchantTransactionController@cod_completed_orders');
Route::get('merchant_product_cod_hold_orders', 'MerchantTransactionController@cod_hold_orders');
Route::get('merchant_product_cod_failed_orders', 'MerchantTransactionController@cod_failed_orders');

Route::post('merchant_product_cod_all_orders', 'MerchantTransactionController@cod_all_orders');
Route::post('merchant_product_cod_completed_orders', 'MerchantTransactionController@cod_completed_orders');
Route::post('merchant_product_cod_hold_orders', 'MerchantTransactionController@cod_hold_orders');
Route::post('merchant_product_cod_failed_orders', 'MerchantTransactionController@cod_failed_orders');


//admin Transactions
Route::get('show_transactions', 'TransactionController@show_transactions');
Route::get('show_all_deals_transactions', 'TransactionController@show_all_deals_transactions');
Route::get('auction_bidder', 'TransactionController@auction_bidder');
Route::get('manage_auction_bidder', 'TransactionController@manage_auction_bidder');
Route::get('auction_by_bidder', 'TransactionController@auction_by_bidder');
Route::get('list_auction_bidders/{id}', 'TransactionController@list_auction_bidders');
Route::get('auction_winner/{id}/{pageid}', 'TransactionController@auction_winner');
Route::get('send_auction_to_winner/{id}/{pageid}', 'TransactionController@send_auction_to_winner');
Route::post('send_auction_to_winner_submit', 'TransactionController@send_auction_to_winner_submit');
Route::get('all_fund_request', 'TransactionController@all_fund_request');
Route::get('success_fund_request', 'TransactionController@success_fund_request');
Route::get('pending_fund_request', 'TransactionController@pending_fund_request');
Route::get('failed_fund_request', 'TransactionController@failed_fund_request');



Route::get('fund_paypal/{data}', 'TransactionController@fund_paypal');
Route::post('paypal_success', 'TransactionController@paypal_success');
Route::post('paypal_ipn', 'TransactionController@paypal_ipn');
Route::get('paypal_cancel', 'TransactionController@paypal_cancel');



Route::get('update_cod_order_status', 'MerchantTransactionController@update_order_cod');

Route::get('product_all_orders', 'TransactionController@product_all_orders');
Route::get('product_success_orders', 'TransactionController@product_success_orders');
Route::get('product_failed_orders', 'TransactionController@product_failed_orders');
Route::get('product_completed_orders', 'TransactionController@product_completed_orders');
Route::get('product_hold_orders', 'TransactionController@product_hold_orders');
Route::get('cod_all_orders', 'TransactionController@cod_all_orders');
Route::post('cod_all_orders', 'TransactionController@cod_all_orders');
Route::get('cod_completed_orders', 'TransactionController@cod_completed_orders');
Route::get('cod_hold_orders', 'TransactionController@cod_hold_orders');
Route::get('cod_failed_orders', 'TransactionController@cod_failed_orders');

Route::post('cod_completed_orders', 'TransactionController@cod_completed_orders');
Route::post('cod_hold_orders', 'TransactionController@cod_hold_orders');
Route::post('cod_failed_orders', 'TransactionController@cod_failed_orders');

Route::get('deals_all_orders', 'TransactionController@deals_all_orders');
Route::post('deals_all_orders', 'TransactionController@deals_all_orders');
Route::get('deals_success_orders', 'TransactionController@deals_success_orders');
Route::post('deals_success_orders', 'TransactionController@deals_success_orders');
Route::get('deals_failed_orders', 'TransactionController@deals_failed_orders');
Route::post('deals_failed_orders', 'TransactionController@deals_failed_orders');
Route::get('deals_completed_orders', 'TransactionController@deals_completed_orders');
Route::post('deals_completed_orders', 'TransactionController@deals_completed_orders');
Route::get('deals_hold_orders', 'TransactionController@deals_hold_orders');
Route::post('deals_hold_orders', 'TransactionController@deals_hold_orders');

Route::get('dealscod_all_orders', 'TransactionController@dealscod_all_orders');
Route::get('dealscod_completed_orders', 'TransactionController@dealscod_completed_orders');
Route::get('dealscod_hold_orders', 'TransactionController@dealscod_hold_orders');
Route::get('dealscod_failed_orders', 'TransactionController@dealscod_failed_orders');

Route::post('dealscod_all_orders', 'TransactionController@dealscod_all_orders');
Route::post('dealscod_completed_orders', 'TransactionController@dealscod_completed_orders');
Route::post('dealscod_hold_orders', 'TransactionController@dealscod_hold_orders');
Route::post('dealscod_failed_orders', 'TransactionController@dealscod_failed_orders');

Route::get('fund_request', 'FundController@fund_request');
Route::get('with_fund_request', 'FundController@with_fund_request');
Route::post('withdraw_submit', 	'FundController@withdraw_submit');








//local mobile json route

Route::any('front_end_banner_image', 'MobileController@home_page_banner_image');
Route::any('country_list', 'MobileController@country_list');
Route::any('city_list', 'MobileController@mobile_city_list');
Route::any('normal_signup/{name}/{email}/{password}/{country}/{city}', 'MobileController@user_signup');
Route::any('signin/{email}/{password}', 'MobileController@user_login');
Route::any('facebook_signup/{name}/{email}', 'MobileController@facebook_login');
Route::any('all_main_category_list', 'MobileController@all_main_category_list');
Route::any('mobile_products', 'MobileController@Products');
Route::any('product_detail_page/{id}', 'MobileController@product_mobile_category_list');
Route::any('product_detail_page_image_list/{id}', 'MobileController@product_detail_page_image_list');
Route::any('mobile_deals', 'MobileController@Deals');
Route::any('mobile_deals_detail_view/{id}', 'MobileController@deals_detail_view');
Route::any('deal_detail_page_image_list/{id}', 'MobileController@deal_detail_page_image_list');
Route::any('mobile_auctions', 'MobileController@Acutions');
Route::any('auction_detail_view/{id}', 'MobileController@auction_detail_view');
Route::any('auction_detail_view_image_list/{id}', 'MobileController@auction_detail_view_image_list');
Route::any('auction_bidder_detail/{id}', 'MobileController@auction_bidder_detail');
Route::any('auction_customer_bidder_detail/{id}', 'MobileController@auction_customer_bidder_detail');

Route::any('mobile_bid_payment/{bid_auc_id}/{oa_cus_id}/{oa_cus_name}/{oa_cus_email}/{oa_cus_address}/{oa_bid_amt}/{oa_bid_shipping_amt}/{oa_original_bit_amt}', 'MobileController@mobile_bid_payment');
Route::any('update_user_profile/{cus_id}/{name}/{email}/{phone}/{country_id}/{city_id}', 'MobileController@update_user_profile');
Route::any('my_buys/{id}', 'MobileController@product_my_buys');
Route::any('profile_image_submit/{cus_id}', 'MobileController@profile_image_submit');
Route::any('sub_category_list/{id}', 'MobileController@sub_category_list');
Route::any('country_selected_city/{id}', 'MobileController@country_selected_city');
Route::any('facebook_signup/{name}/{email}/{password}/{country}/{city}', 'MobileController@facebook_login');
Route::any('cash_and_delivery/{cus_id}/{cust_name}/{cust_address}/{cust_mobile}/{cust_city}/{cust_country}/{cust_zip}', 'MobileController@shipping_delivery');
Route::any('purchase_cod_order_list/{cus_id}/{pro_id}/{cod_qty}/{cod_amt}/{cod_pro_color}/{cod_pro_size}/{order_type}/{ship_addr}/{token_id}', 'MobileController@purchase_cod_order_list');
Route::any('paypal/{cus_id}/{pro_id}/{cod_qty}/{cod_amt}/{cod_pro_color}/{cod_pro_size}/{order_type}/{ship_addr}/{token_id}', 'MobileController@paypal');
Route::any('bidding_history/{cus_id}', 'MobileController@bidding_history');

Route::any('near_me_map_products', 'MobileController@near_me_map_products');
Route::any('near_me_map_deals', 'MobileController@near_me_map_deals');
Route::any('near_me_map_auction', 'MobileController@near_me_map_auction');
Route::any('stores_list', 'MobileController@stores_list');


Route::any('get_profile_image/{cus_id}', 'MobileController@get_profile_image');



Route::any('store_dealview_detail_by_id/{store_id}', 'MobileController@store_dealview_detail_by_id');
Route::any('store_productview_detail_by_id/{store_id}', 'MobileController@store_productview_detail_by_id');
Route::any('store_auctionview_detail_by_id/{store_id}', 'MobileController@store_auctionview_detail_by_id');
Route::any('terms_condition', 'MobileController@terms_condition');
Route::any('related_product_details/{pid}', 'MobileController@related_product_details');
Route::any('related_deal_details/{deal_id}', 'MobileController@related_deal_details');
Route::any('related_auction_details/{deal_id}', 'MobileController@related_auction_details');
Route::any('add_position', 'MobileController@add_position');
Route::any('add_pages', 'MobileController@add_pages');
Route::any('request_for_advertisment/{add_title}/{ads_position}/{ads_pages}/{url}', 'MobileController@request_for_advertisment');
Route::any('forgot_password_check/{email}', 'MobileController@forgot_password_check');

/* 07nov16  */
Route::get('cms/{id}', 'FooterController@cms');
Route::get('aboutus','FooterController@aboutus');

// Vinod mobile api

Route::any('home_page', 'MobileController@home_page_details');


//product review
Route::get('manage_review','ProductController@manage_review');
Route::get('edit_review/{id}', 'ProductController@edit_review');
Route::post('edit_review_submit', 'ProductController@edit_review_submit');
Route::get('block_review/{id}/{status}','ProductController@block_review');
Route::get('delete_review/{id}', 'ProductController@delete_review');

//deal review
Route::get('manage_deal_review','DealsController@manage_deal_review');
Route::get('edit_deal_review/{id}', 'DealsController@edit_deal_review');
Route::post('edit_deal_review_submit', 'DealsController@edit_deal_review_submit');
Route::get('block_deal_review/{id}/{status}','DealsController@block_deal_review');
Route::get('delete_deal_review/{id}', 'DealsController@delete_deal_review');
