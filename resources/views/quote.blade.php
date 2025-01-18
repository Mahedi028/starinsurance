@php
    // $user = auth('user')->user();
@endphp
@extends('templates.page')


@push('meta')
    <title>Quote - {{ config('app.name') }}</title>

@endpush




@push('css')
 {{-- Extra css files here --}}

 <style>

body.single-product .title-bar {
  display: none !important;
}

/* Define some CSS variables for consistent theming */
:root {
    --input-height: 50px;
    --input-bg-color: #fff;
    --input-border-color: #ddd;
    --input-border-radius: 8px; /* Rounded corners for modern look */
    --input-transition: all 0.3s ease-in-out; /* Smooth transitions */
}

/* Simplify and group your selectors */
form.cart .thwepo-extra-options input,
form.cart .thwepo-extra-options select,
form.cart .thwepo-extra-options textarea,
.thwepo-extra-options input,
.thwepo-extra-options textarea,
.thwepo-extra-options select,
.woocommerce form .password-input input[type="password"],
.woocommerce-page form .password-input input[type="password"] {
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
    height: var(--input-height);
    line-height: var(--input-height);
    padding: 10px;
    background-color: var(--input-bg-color);
    border: 1px solid var(--input-border-color);
    border-radius: var(--input-border-radius); /* Soft rounded corners */
    transition: var(--input-transition); /* Smooth transitions on hover or focus */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

/* Add hover and focus effects for better user interaction */
.thwepo-extra-options input:hover,
.thwepo-extra-options textarea:hover,
.thwepo-extra-options select:hover,
.woocommerce form .password-input input[type="password"]:hover,
.woocommerce-page form .password-input input[type="password"]:hover,
.thwepo-extra-options input:focus,
.thwepo-extra-options textarea:focus,
.thwepo-extra-options select:focus,
.woocommerce form .password-input input[type="password"]:focus,
.woocommerce-page form .password-input input[type="password"]:focus {
    border-color: #aaa; /* Darken border on hover/focus */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Increase shadow depth on hover/focus */
}

/* Container styling */
.cpw {
    font-family: 'Arial', sans-serif; /* Modern font */
    padding: 20px;
    width: 300px; /* Adjust width as needed */
    margin: 0 auto; /* Center the container */
    text-align: center; /* Center the inner content */
}

/* Label and currency symbol styling */
.cpw-input-wrapper label {
    font-size: 1.2em;
    font-weight: bold;
    color: #333;
    display: block;
    margin-bottom: 10px;
}

.woocommerce-Price-currencySymbol {
    font-size: 1em;
    color: #555;
}

/* Input field styling */
.cpw-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1em;
    color: #333;
    transition: border-color 0.3s ease;
}

.cpw-input:focus {
    border-color: #007acc; /* Blue color when focused */
    outline: none;
}

/* Error message styling */
.woocommerce-cpw-message {
    color: #f44336; /* Red color for error */
    padding: 10px;
    font-size: 0.9em;
    margin-top: 10px;
}

.woocommerce-cpw-message ul {
    list-style-type: none; /* Remove bullet points */
    padding: 0;
    margin: 0;
}

.woocommerce-cpw-message li {
    text-align: center;
}

.quick-btn {
    display: inline-block; /* Makes sure the anchor behaves like a block element */
    width: 100px; /* Set a fixed width */
    height: 30px; /* Set a fixed height */
    line-height: 30px; /* Vertically center the text */
    text-align: center; /* Horizontally center the text */
    border: 1px solid #ccc; /* Optional: Add a border for visual clarity */
    margin-right: 5px; /* Optional: Add some spacing between the buttons */
    overflow: hidden; /* Ensures content doesn't spill out */
    white-space: nowrap; /* Prevents text from wrapping */
    text-overflow: ellipsis; /* Optional: If text is too long, it will end with '...' */
}

/* You can also style the label if needed */
label {
    display: inline-block;
    margin-right: 10px;
}

form.cart table.thwepo-extra-options label.label-tag {
    display: inline;
    word-break: unset;
    font-weight: 900;
	  text-transform: uppercase;
}

/* Logged in & out conditions */
.logged-in-condition .hide-logged-in {
  display: none!important;
}
.logged-out-condition .hide-logged-out {
  display: none!important;
} 

/* Hide quantity indicator on view order page */
.woocommerce-page.woocommerce-view-order .order_details .product-quantity {
    display: none;
}

.elementor-widget-woocommerce-my-account .e-my-account-tab:not(.e-my-account-tab__dashboard--custom) .woocommerce-MyAccount-content p:last-of-type {
    margin-bottom: 0;
}

p.order-details {
    display: none;
}

.elementor-widget-woocommerce-my-account .e-my-account-tab:not(.e-my-account-tab__dashboard--custom) .woocommerce-MyAccount-content h2:first-of-type {
    margin-top: 30px;
    display: none;
}

/* Change the font for input text fields */
input[type="text"] {
    font-family: 'Roboto', sans-serif; /* Change 'Roboto' to your desired font */
    font-size: 16px; /* Change the font size as needed */
}

/* Change the font for the email input field */
#reg_email {
    font-family: 'Roboto', sans-serif; /* Change 'Roboto' to your desired font */
    font-size: 16px; /* Change the font size as needed */
}

/* Hide the "Order again" button based on its link text */
a.button[href*="order_again="] {
    display: none;
}

/* Apply styles to the woocommerce customer details section */
.woocommerce-customer-details {
    border: 2px solid #275c58;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(50, 140, 156, 0.1);
    background-color: rgba(50, 140, 156, 0.05);
    color: #000;
    font-size: 18px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Add hover effect to the woocommerce customer details section */
.woocommerce-customer-details:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(50, 140, 156, 0.15);
}



/* Apply styles to the WooCommerce order details container */
.woocommerce-order {
    border: 2px solid #275c58;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(50, 140, 156, 0.1);
    background-color: rgba(50, 140, 156, 0.05);
    color: #000;
    font-size: 18px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Add hover effect to the WooCommerce order details container */
.woocommerce-order:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(50, 140, 156, 0.15);
}

ul.wc_stripe_cart_payment_methods li.wc-stripe-payment-method button, ul.wc_stripe_checkout_banner_gateways li button, ul.wc_stripe_product_payment_methods li[class*=payment_method_stripe_] button {
    margin: 0;
    display: none;
}

body.checkout-wc form h1, body.checkout-wc h2, body.checkout-wc h3, body.checkout-wc h4, main.checkoutwc form h1, main.checkoutwc h2, main.checkoutwc h3, main.checkoutwc h4 {
    color: #333;
    font-weight: 300;
    margin-bottom: 0.6em;
    margin-top: 0;
    font-weight: 700;
    margin-bottom: 1em;
    text-transform: uppercase;
    font-size: 1.5em;
}

img.custom-logo {
    height: auto;
    max-width: 60%;
    margin-left: -50px;
}

#wrapper{
	min-height:0px;
}		
*{
    box-sizing: unset;
}
a{
    text-decoration: none;
}

form div{
 box-sizing: border-box;   
}

 </style>

 @endpush




@section('content')
    
<br>
<div id="content-full" class="grid xcontainer col-940  single-product">
	<div class="woocommerce">
		<div class="woocommerce-notices-wrapper"></div><div id="product-2233" class="cpw-product product type-product post-2233 status-publish first instock product_cat-uncategorized downloadable virtual sold-individually purchasable product-type-simple">

	<div class="woocommerce-product-gallery woocommerce-product-gallery--without-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out;">
	<div class="woocommerce-product-gallery__wrapper">
		<div class="woocommerce-product-gallery__image--placeholder"><img src="../../wp-content/uploads/woocommerce-placeholder-600x600.png" alt="Awaiting product image" class="wp-post-image"></div>	</div>
</div>

	<div class="summary entry-summary">
		<h1 class="product_title entry-title">Get Quote</h1>
	
	<form onsubmit="quoteForm(event)" class="cart" action="" method="post" enctype="multipart/form-data">
		<div class="cpw" data-minimum-error="Please enter at least %%MINIMUM%%." data-hide-minimum="" data-hide-minimum-error="Please enter a higher amount." data-max-price="" data-maximum-error="Please enter less than or equal to %%MAXIMUM%%." data-empty-error="Please enter an amount." data-initial-price="" data-min-price="0"> 
		<p class="cwp-input-wrapper" style="border:1px solid var( --e-global-color-primary );  border-radius:10px; padding: 10px 30px; display:inline-block;">
				<label for="cpw-1">Quote <span class="woocommerce-Price-currencySymbol">( £ )</span></label>
				<input type="text" id="cpw-1" class="input-text amount cpw-input text" name="cpw" value="" title="Quote ( £ )" placeholder="" readonly="readonly">

		<input type="hidden" name="update-price" value="">
		<input type="hidden" name="_cpwnonce" value="">
	</p>
	<div id="cpw-error-1" class="woocommerce-cpw-message" aria-live="assertive" style="display: none"><ul class="woocommerce-error wc-cpw-error"><li>Please enter an amount.</li></ul></div>
</div>



<table class="thwepo-extra-options  thwepo_simple" cellspacing="0"><tbody><tr class="div1" ><td colspan="2" class="label abovefield"><label class="label-tag " >Registration Number</label> <abbr class="required" title="Required">*</abbr><br/><input type="text" id="reg_number867" name="reg_number" value="" class="thwepof-input-field validate-required" ></td></tr><tr class="div2" ><td colspan="2" style="width:100%"><a id="get_cars" class="find-car-btn" style="width:100%; box-sizing:border-box; height: var(--input-height); margin-top: 12px">Find Car</a></td></tr><tr class="div3" ><td colspan="2" class="label abovefield"><label class="label-tag " >Vehicle Make</label> <abbr class="required" title="Required">*</abbr><br/><input readonly type="text" id="vehicle_make632" name="vehicle_make" value="" class="thwepof-input-field validate-required" ></td></tr><tr class="div4" ><td colspan="2" class="label abovefield"><label class="label-tag " >Vehicle Model</label> <abbr class="required" title="Required">*</abbr><br/><input readonly type="text" id="vehicle_model756" name="vehicle_model" value="" class="thwepof-input-field validate-required" ></td></tr><tr class="kakak12" ><td class="label leftside" ><label class="label-tag " >Engine CC</label></td><td class="value leftside" ><input readonly type="text" id="engine_cc681" name="engine_cc" value="" class="thwepof-input-field" ></td></tr><tr class="div6" ><td colspan="2"><p id="quick_selection714" name="quick_selection" value=""><p><label>Quick Selection</label><a class="quick-btn active quick daycustom" data-gap="0">Custom</a><a class="quick-btn disabled quick day1" data-gap="1">1 Day</a><a class="quick-btn disabled quick day2" data-gap="2">2 Days</a><a class="quick-btn disabled quick day7" data-gap="7">1 Week</a>
</p></p></td></tr><tr class="div7" ><td colspan="2" class="label abovefield"><label class="label-tag " >Start Date</label> <abbr class="required" title="Required">*</abbr><br/><input type="text" autocomplete="off" id="start_date838" name="start_date" value=""data-year-range="-100:+10" class="thwepof-input-field thwepof-date-picker validate-required" data-readonly="no" ></td></tr><tr class="div8" ><td colspan="2" class="label abovefield"><label class="label-tag " >Start Time</label> <abbr class="required" title="Required">*</abbr><br/><input type="text" id="start_time819" name="start_time" value="" class="thwepof-input-field validate-required" ></td></tr><tr class="div9" ><td colspan="2" class="label abovefield"><label class="label-tag " >End Date</label> <abbr class="required" title="Required">*</abbr><br/><input type="text" autocomplete="off" id="end_date357" name="end_date" value=""data-year-range="-100:+10" class="thwepof-input-field thwepof-date-picker validate-required" data-readonly="no" ></td></tr><tr class="div10" ><td colspan="2" class="label abovefield"><label class="label-tag " >End Time</label> <abbr class="required" title="Required">*</abbr><br/><input type="text" id="end_time700" name="end_time" value="" class="thwepof-input-field validate-required" ></td></tr><tr class="div11" ><td colspan="2" class="label abovefield"><label class="label-tag " >Date of Birth</label> <abbr class="required" title="Required">*</abbr><br/><input type="text" autocomplete="off" id="date_of_birth954" name="date_of_birth" value=""data-year-range="-100:+10" class="thwepof-input-field thwepof-date-picker validate-required" data-readonly="no" ></td></tr><tr class="div12" ><td colspan="2" class="label abovefield"><label class="label-tag " >First Name(s)</label> <abbr class="required" title="Required">*</abbr><br/><input type="text" id="first_name556" name="first_name" value="" class="thwepof-input-field validate-required" ></td></tr><tr class="div13" ><td colspan="2" class="label abovefield"><label class="label-tag " >Middle Name</label><br/><input type="text" id="middle_name517" name="middle_name" value="" class="thwepof-input-field" ></td></tr><tr class="div14" ><td colspan="2" class="label abovefield"><label class="label-tag " >Last Name</label> <abbr class="required" title="Required">*</abbr><br/><input type="text" id="last_name386" name="last_name" value="" class="thwepof-input-field validate-required" ></td></tr><tr class="div15" ><td colspan="2" class="label abovefield"><label class="label-tag " >Licence Type</label> <abbr class="required" title="Required">*</abbr><br/><select id="licence_type304" name="licence_type" value="" class="thwepof-input-field validate-required" ><option value="Full UK Licence" >Full UK Licence</option><option value="Full Northern Ireland Licence" >Full Northern Ireland Licence</option><option value="Full EU Licence" >Full EU Licence</option><option value="Full International" >Full International</option><option value="Automatic UK Licence" >Automatic UK Licence</option></select></td></tr><tr class="div16" ><td colspan="2" class="label abovefield"><label class="label-tag " >Licence Held Duration</label> <abbr class="required" title="Required">*</abbr><br/><select id="licence_held_duration384" name="licence_held_duration" value="" class="thwepof-input-field validate-required" ><option value="Under 1 Year" >Under 1 Year</option><option value="1-2 Years" >1-2 Years</option><option value="2-4 Years" >2-4 Years</option><option value="5-10 Years" >5-10 Years</option><option value="10+ Years" >10+ Years</option></select></td></tr><tr class="div17" ><td colspan="2" class="label abovefield"><label class="label-tag " >Vehicle Value</label> <abbr class="required" title="Required">*</abbr><br/><select id="vehicle_type928" name="vehicle_type" value="" class="thwepof-input-field validate-required" ><option value="£1,000 - £5,000" >£1,000 - £5,000</option><option value="£5,000 - £10,000" >£5,000 - £10,000</option><option value="£10,000 - £20,000" >£10,000 - £20,000</option><option value="£20,000 - £30,000" >£20,000 - £30,000</option><option value="£30,000 - £50,000" >£30,000 - £50,000</option><option value="£50,000 - £80,000" >£50,000 - £80,000</option><option value="£80,000+" >£80,000+</option></select></td></tr></tbody></table>
<div class="quantity">

<label class="screen-reader-text" for="quantity_6753204777743">Get Quote quantity</label>
	<input type="hidden" id="quantity_6753204777743" class="input-text qty text" name="quantity" value="1" aria-label="Product quantity" size="4" min="1" max="1" step="1" placeholder="" inputmode="numeric" autocomplete="off">
	</div>

	<button type="submit" name="add-to-cart" value="2233" class="single_add_to_cart_button sbutton button alt cpw-disabled" style="pointer-events: none;">Continue</button>

		<div class="wc-stripe-clear"></div>

    </form>

	
<div class="product_meta">

	
	
		<span class="sku_wrapper">SKU: <span class="sku">quote-01</span></span>

	
	<span class="posted_in">Category: <a href="../../product-category/uncategorized/index.html" rel="tag">Uncategorized</a></span>
	
	
</div>
	</div>

	</div>

	</div>	
</div>

<br><br><br>



@endsection('content')




@push('js')

{{-- extra jss files here --}}




<script type="text/javascript" src="/js/jquery/ui/datepicker.minb37e.js?ver={{config('app.version')}}" id="jquery-ui-datepicker-js"></script>
<script type="text/javascript" id="jquery-ui-datepicker-js-after">
/* <![CDATA[ */
jQuery(function(jQuery){jQuery.datepicker.setDefaults({"closeText":"Close","currentText":"Today","monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Previous","dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"dateFormat":"dd\/mm\/yy","firstDay":1,"isRTL":false});});
/* ]]> */

setTimeout(() => {

    jQuery('.thwepof-date-picker').datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: "1924:2034" // Year dropdown range
    });

}, 500);


</script>


@endpush
