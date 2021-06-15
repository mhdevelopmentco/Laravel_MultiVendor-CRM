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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class SettingsController extends Controller
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
    public function general_setting()
    {
        if (Session::has('userid')) {
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus   = view('siteadmin.includes.admin_left_menus');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $general_settings = Settings::view_general_setting();
            $language_list    = Settings::view_language_list();
            $theme_list       = Settings::view_theme_list();
            return view('siteadmin.general_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('general_settings', $general_settings)->with('language_list', $language_list)->with('theme_list', $theme_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function general_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'site_name' => 'required',
                'meta_title' => 'required',
                'meta_key' => 'required',
                'meta_desc' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('general_setting')->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry  = array(
                    'gs_sitename' => Input::get('site_name'),
                    'gs_metatitle' => Input::get('meta_title'),
                    'gs_metakeywords' => Input::get('meta_key'),
                    'gs_metadesc' => Input::get('meta_desc'),
                    'gs_payment_status' => Input::get('payment_status'),
                    'gs_themes' => Input::get('themes')
                );
                $return = Settings::save_general_set($entry);
                return Redirect::to('general_setting')->with('success', 'Record Updated Successfully');
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function email_setting()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $email_settings = Settings::view_email_settings();
            return view('siteadmin.email_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('email_settings', $email_settings);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function smtp_setting()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $smtp_settings  = Settings::view_smtp_settings();
            $send_settings  = Settings::view_send_settings();
            return view('siteadmin.smtp_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('smtp_settings', $smtp_settings)->with('send_settings', $send_settings);
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function email_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'contact_name' => 'required',
                'contact_email' => 'required|email',
                'webmaster_email' => 'required|email',
                'no_reply_email' => 'required|email',
                'contact_pno' => 'required|numeric|min:10',
                'lati' => 'required',
                'long' => 'required'                
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('email_setting')->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry  = array(
                    'es_contactname' => Input::get('contact_name'),
                    'es_contactemail' => Input::get('contact_email'),
                    'es_webmasteremail' => Input::get('webmaster_email'),
                    'es_noreplyemail' => Input::get('no_reply_email'),
                    'es_phone1' => Input::get('contact_pno'),
                    'es_phone2' => Input::get('contact_pno2'),
                    'es_latitude' => Input::get('lati'),
                    'es_longitude' => Input::get('long')
                    
                );
                $return = Settings::save_email_set($entry);
                return Redirect::to('email_setting')->with('success', 'Record Updated Successfully');
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function smtp_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'smtp_host' => 'required',
                'smtp_port' => 'required',
                'smtp_username' => 'required',
                'password' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('smtp_setting')->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry  = array(
                    'sm_host' => Input::get('smtp_host'),
                    'sm_port' => Input::get('smtp_port'),
                    'sm_uname' => Input::get('smtp_username'),
                    'sm_pwd' => Input::get('password'),
                    'sm_isactive' => 1
                 );
                $return = Settings::save_smtp_set_def();
                $return = Settings::save_smtp_set($entry);
                return Redirect::to('smtp_setting')->with('success', 'Record Updated Successfully');
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function send_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'send_host' => 'required',
                'send_port' => 'required',
                'send_username' => 'required',
                'send_password' => 'required'
            
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('smtp_setting')->withErrors($validator->messages())->withInput();
                
            } else {
                
                $entry  = array(
                    'sm_host' => Input::get('send_host'),
                    'sm_port' => Input::get('send_port'),
                    'sm_uname' => Input::get('send_username'),
                    'sm_pwd' => Input::get('send_password'),
                    'sm_isactive' => 1
               
                );
                $return = Settings::save_smtp_set_def();
                $return = Settings::save_send_set($entry);
                return Redirect::to('smtp_setting')->with('success', 'Record Updated Successfully');
                
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function social_media_settings()
    {
        if (Session::has('userid')) {
            $adminheader     = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus  = view('siteadmin.includes.admin_left_menus');
            $adminfooter     = view('siteadmin.includes.admin_footer');
            $social_settings = Settings::social_media_settings();
            return view('siteadmin.social_media_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('social_settings', $social_settings);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function social_media_setting_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'fb_app_id' => 'required',
                'fb_secret_key' => 'required',
                'fb_page_url' => 'required|url',
                'fb_like_box_url' => 'required|url',
                'twitter_page_url' => 'required|url',
                'twitter_app_id' => 'required',
                'twitter_secret_key' => 'required',
                'linkedin_page_url' => 'required|url',
                'youtube_page_url' => 'required|url',
                'gmap_app_key' => 'required',
                'analytics_code' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('social_media_settings')->withErrors($validator->messages())->withInput();
            } else {
                $entry  = array(
                    'sm_fb_app_id' => Input::get('fb_app_id'),
                    'sm_fb_sec_key' => Input::get('fb_secret_key'),
                    'sm_fb_page_url' => Input::get('fb_page_url'),
                    'sm_fb_like_page_url' => Input::get('fb_like_box_url'),
                    'sm_twitter_url' => Input::get('twitter_page_url'),
                    'sm_twitter_app_id' => Input::get('twitter_app_id'),
                    'sm_twitter_sec_key' => Input::get('twitter_secret_key'),
                    'sm_linkedin_url' => Input::get('linkedin_page_url'),
                    'sm_youtube_url' => Input::get('youtube_page_url'),
                    'sm_gmap_app_key' => Input::get('gmap_app_key'),
                    'sm_android_page_url' => Input::get('android_page_url'),
                    'sm_iphone_url' => Input::get('iphone_page_url'),
                    'sm_analytics_code' => Input::get('analytics_code')
                );
                $result = Settings::update_social_media_settings($entry);
                if ($result) {
                    return Redirect::to('social_media_settings')->with('success', 'Record updated successfully');
                } else {
                    return Redirect::to('social_media_settings')->with('success', 'Something Went wrong');
                }
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function payment_settings()
    {
        if (Session::has('userid')) {
            $adminheader      = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus   = view('siteadmin.includes.admin_left_menus');
            $adminfooter      = view('siteadmin.includes.admin_footer');
            $country_settings = Settings::get_country_details();
            $get_pay_settings = Settings::get_pay_settings();
            return view('siteadmin.payment_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('country_settings', $country_settings)->with('get_pay_settings', $get_pay_settings);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function payment_settings_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'country_name' => 'required',
                'country_code' => 'required',
                'currency_symbol' => 'required',
                'currency_code' => 'required',
                'payment_mode' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('payment_settings')->withErrors($validator->messages())->withInput();
            } else {
                $entry            = array(
                    'ps_flatshipping' => Input::get('flat_shipping'),
                    'ps_taxpercentage' => Input::get('tax_percentage'),
                    'ps_extenddays' => Input::get('extended_days'),
                    'ps_alertdays' => Input::get('alert_day'),
                    'ps_minfundrequest' => Input::get('maximum_fund_request'),
                    'ps_maxfundrequest' => Input::get('maximum_fund_request'),
                    'ps_referralamount' => Input::get('referral_amount'),
                    'ps_countryid' => Input::get('country_name'),
                    'ps_countrycode' => Input::get('country_code'),
                    'ps_cursymbol' => Input::get('currency_symbol'),
                    'ps_curcode' => Input::get('currency_code'),
                    'ps_paypalaccount' => Input::get('paypal_account'),
                    'ps_paypal_api_pw' => Input::get('paypal_api_password'),
                    'ps_paypal_api_signature' => Input::get('paypal_api_signature'),
                    'ps_authorize_trans_key' => Input::get('authorizenet_trans_key'),
                    'ps_authorize_api_id' => Input::get('authorizenet_api_id'),
                    'ps_paypal_pay_mode' => Input::get('payment_mode')
                );
                $get_pay_settings = Settings::update_payment_settings($entry);
                return Redirect::to('payment_settings')->with('success', 'Record updated successfully');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function select_currency_value_ajax()
    {
        $id = $_GET['id'];
        $get_currency = Settings::get_country_value_ajax($id);
        if ($get_currency) {
            foreach ($get_currency as $get_currency_ajax) {
            }
            echo '<div id="whole_currency_div">
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Country Code <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="country_code" placeholder="12" id="text1" value="' . $get_currency_ajax->co_code . '" readonly >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Currency Symbol   <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="currency_symbol" placeholder="Rs." id="text1" value="' . $get_currency_ajax->co_cursymbol . '" readonly >
                    </div>
                </div>
                        </div>
                 
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Currency Code   <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="currency_code" placeholder="INR" id="text1" value="' . $get_currency_ajax->co_curcode . '" readonly  >
                    </div>
                </div>
                 </div>
              </div>';
            
        } else {
            echo '<div id="whole_currency_div">
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1"></label>

                    <div class="col-lg-4">
                  <h4>Please select Country</h4>
                    </div>
                </div>
                        </div>';
        }
    }
    
    public function module_settings()
    {
        if (Session::has('userid')) {
            $adminheader            = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus         = view('siteadmin.includes.admin_left_menus');
            $adminfooter            = view('siteadmin.includes.admin_footer');
            $module_setting_details = Settings::get_module_details();
            return view('siteadmin.module_settings')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('module_setting_details', $module_setting_details);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function module_settings_submit()
    {
        if (Session::has('userid')) {
            $data             = Input::except(array(
                '_token'
            ));
            $entry            = array(
                'ms_dealmodule' => Input::get('deal_module'),
                'ms_productmodule' => Input::get('product_module'),
                'ms_auctionmodule' => Input::get('auction'),
                'ms_blogmodule' => Input::get('blog'),
                'ms_nearmemapmodule' => Input::get('near_me_map'),
                'ms_storelistmodule' => Input::get('store_list'),
                'ms_pastdealmodule' => Input::get('past_deal'),
                'ms_faqmodule' => Input::get('faq'),
                'ms_cod' => Input::get('cod'),
                'ms_paypal' => Input::get('paypal'),
                'ms_creditcard' => Input::get('credit_card'),
                'ms_googlecheckout' => Input::get('google_checkout'),
                'ms_shipping' => Input::get('shipping_settings'),
                'ms_newsletter_template' => Input::get('newsletter_temp'),
                'ms_citysettings' => Input::get('city_settings')
            );
            $get_pay_settings = Settings::update_modul_settings($entry);
            return Redirect::to('module_settings')->with('success', 'Record updated successfully');
        } else {
            return Redirect::to('siteadmin');
        }
        
    }
    
    public function manage_newsletter_subscribers()
    {
        if (Session::has('userid')) {
            $adminheader     = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus  = view('siteadmin.includes.admin_left_menus');
            $adminfooter     = view('siteadmin.includes.admin_footer');
            $subscriber_list = Settings::get_newsletter_subscribers();
            return view('siteadmin.manage_newsletter_subscribers')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('subscriber_list', $subscriber_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function edit_newsletter_subscriber_status($id, $status)
    {
        if (Session::has('userid')) {
            $return = Settings::edit_newsletter_subs_status($id, $status);
            if ($status == 0) {
                return Redirect::to('manage_newsletter_subscribers')->with('success', 'Record Blocked Successfully');
            } else if ($status == 1) {
                return Redirect::to('manage_newsletter_subscribers')->with('success', 'Record Unblocked Successfully');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }

    public function delete_newsletter_subscriber($id)
    {
        if (Session::has('userid')) {
            Settings::delete_newsletter_subs($id);
            return Redirect::to('manage_newsletter_subscribers')->with('success', 'Record Deleted Successfully');
            
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function send_newsletter()
    {
        if (Session::has('userid')) {
            $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            $adminfooter    = view('siteadmin.includes.admin_footer');
            $city_list      = Settings::get_city_details();
            return view('siteadmin.send_newsletter')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('city_list', $city_list);
        } else {
            return Redirect::to('siteadmin');
        }
    }
    
    public function send_newsletter_submit()
    {
        if (Session::has('userid')) {
            $data = Input::except(array(
                '_token'
            ));
            $rule = array(
                'city' => 'required',
                'subject' => 'required',
                'message' => 'required'
            );
            
            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                return Redirect::to('send_newsletter')->withErrors($validator->messages())->withInput();
            } else {
                return Redirect::to('send_newsletter')->with('success', 'Successfully Updated');
            }
        } else {
            return Redirect::to('siteadmin');
        }
    }
}

?>