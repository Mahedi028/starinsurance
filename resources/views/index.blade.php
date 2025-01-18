@php
    // $user = auth('user')->user();
@endphp
@extends('templates.page')


@push('meta')
    <title>Temporary Car, Van or Bike Insurance | {{ config('app.name') }}</title>

@endpush

@push('css')
 {{-- Extra css files here --}}
    
     {{-- HOME PAGE --}}

     <link rel='stylesheet'   href='/plugins/elementor/assets/css/frontend-lite.mind5d5.css?ver={{config('app.version')}}' type='text/css' media='all' />

     <link rel='stylesheet'   href='/uploads/elementor/css/global5eb8.css?ver=1730215372' type='text/css' media='all' />


     <link rel='stylesheet' id='elementor-post-85265199-css'
     href='/uploads/elementor/css/post-852651995eb8.css?ver=1730215372' type='text/css' media='all' />


     <style>
        .top_container{
            padding: 0px !important;
            max-width: 100% !important;max-width: ;
        }
        .home_strip_1{
            font-family: "Cabin", Sans-serif;
            font-size: 16px;
            font-weight: 500;
            fill: #FFFFFF;
            color: #FFFFFF;
            background-color: #328C9C;
            border-radius: 8px 8px 8px 8px;
            padding: 15px 15px 15px 15px;
        }
        .home_strip_2{
            font-family: "Cabin", Sans-serif;
            font-size: 16px;
            font-weight: 500;
            fill: #FFFFFF;
            color: #FFFFFF;
            background-color: #19515A;
            border-radius: 8px 8px 8px 8px;
            padding: 15px 15px 15px 15px;
        }
     </style>

@endpush




@section('content')
    
<div data-elementor-type="wp-page" data-elementor-id="85265199" class="elementor elementor-85265199" data-elementor-post-type="page" >
	
<section class="elementor-section elementor-top-section elementor-element elementor-element-6d9d4e8 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6d9d4e8" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-fd52522" data-id="fd52522" data-element_type="column">
<div class="elementor-widget-wrap">
        </div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-93144e0" data-id="93144e0" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-d3d7d57 elementor-widget elementor-widget-heading" data-id="d3d7d57" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.23.0 - 05-08-2024 */
.elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style><h3 class="elementor-heading-title elementor-size-default">Fast, Simple Short-Term Car Insurance</h3>		</div>
</div>
<div class="elementor-element elementor-element-33c5489 elementor-hidden-mobile elementor-widget elementor-widget-heading" data-id="33c5489" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Affordable, Lightning-Fast Coverage</h2>		</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-478a60e" data-id="478a60e" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-94c6403 elementor-hidden-desktop elementor-hidden-tablet elementor-widget elementor-widget-heading" data-id="94c6403" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default">Affordable, Lightning-Fast Coverage</h4>		</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-345a5a2 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="345a5a2" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-bc96db8" data-id="bc96db8" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-42029da elementor-hidden-desktop elementor-hidden-tablet elementor-widget elementor-widget-heading" data-id="42029da" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h5 class="elementor-heading-title elementor-size-default">To begin, provide your vehicle registration number.</h5>		</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-e0588ed" data-id="e0588ed" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-3265752 elementor-widget elementor-widget-html" data-id="3265752" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<form id="homeform" method="get" action="/policy/get-quote/" onsubmit="validateRegNumber(event)">
<div class="reg-wrapper">
<div class="gb-icon">GB</div>
<label for="Registration" class="visuallyhidden" aria-label="Registration">Registration</label>
<input id="Registration" autocomplete="off" name="reg_no" required type="text" maxlength="8" autocorrect="off" value="">
</div>
<input type="hidden" name="cstm_hour" />
<input type="hidden" name="cstm_day" />
</form>		</div>
</div>
<div class="elementor-element elementor-element-4ee47c6 elementor-align-center elementor-widget-mobile__width-inherit elementor-widget elementor-widget-button" data-id="4ee47c6" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-md" href="#" id="homeformbtn">
    <span class="elementor-button-content-wrapper">
                <span class="elementor-button-text">Get a new quote</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-05f51de" data-id="05f51de" data-element_type="column">
<div class="elementor-widget-wrap">
        </div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-e951831 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="e951831" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="elementor-background-overlay"></div>
        <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-143f022" data-id="143f022" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <section class="elementor-section elementor-inner-section elementor-element elementor-element-94637f3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="94637f3" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-319d845" data-id="319d845" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
    <div class="elementor-element elementor-element-3b3e478 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-id="3b3e478" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Flexible, Short-Term Car Insurance</h3>		</div>
</div>
<div class="elementor-element elementor-element-b10122a elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="b10122a" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.23.0 - 05-08-2024 */
.elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>				<p><span style="/color: #364344;">If you’re looking for <span style="color: #0b7bfb;"><a style="text-decoration: underline; color: #0b7bfb;"  href="policy/get-quote"><strong>learner driver insurance</strong></a></span> or <span style="/color: #0b7bfb;"><strong><a style="text-decoration: underline; color: #0b7bfb;" href="policy/get-quote">temporary insurance,</a></strong></span> we’ve got you covered.</span></p>						</div>
</div>
<div class="elementor-element elementor-element-b59790d elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="b59790d" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<link rel="stylesheet" href="/plugins/elementor/assets/css/widget-icon-list.min.css?ver={{config('app.version')}}">		<ul class="elementor-icon-list-items">
        <li class="elementor-icon-list-item">
                        <span class="elementor-icon-list-icon">
        <i aria-hidden="true" class="fas fa-check-circle"></i>						</span>
                    <span class="elementor-icon-list-text">Flexible, short-term cover</span>
                </li>
            <li class="elementor-icon-list-item">
                        <span class="elementor-icon-list-icon">
        <i aria-hidden="true" class="fas fa-check-circle"></i>						</span>
                    <span class="elementor-icon-list-text">Insure yourself or borrow a car</span>
                </li>
            <li class="elementor-icon-list-item">
                        <span class="elementor-icon-list-icon">
        <i aria-hidden="true" class="fas fa-check-circle"></i>						</span>
                    <span class="elementor-icon-list-text">Be on the road in minutes</span>
                </li>
    </ul>
</div>
</div>
<div class="elementor-element elementor-element-cb184d4 elementor-align-center elementor-widget__width-initial elementor-widget elementor-widget-button" data-id="cb184d4" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm " href="policy/get-quote" id="button-learner">
    <span class="elementor-button-content-wrapper">
                <span class="elementor-button-text">Learner driver insurance</span>
</span>
</a>
</div>
</div>
</div>
<div class="elementor-element elementor-element-2328fe0 elementor-align-center elementor-widget__width-initial elementor-widget elementor-widget-button" data-id="2328fe0" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm" href="policy/get-quote" id="button-learner">
    <span class="elementor-button-content-wrapper">
                <span class="elementor-button-text">Temporary insurance</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4ca1cbc" data-id="4ca1cbc" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-c060ee9 elementor-hidden-mobile elementor-widget elementor-widget-image" data-id="c060ee9" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.23.0 - 05-08-2024 */
.elementor-widget-image{text-align:center}.elementor-widget-image a{display:inline-block}.elementor-widget-image a img[src$=".svg"]{width:48px}.elementor-widget-image img{vertical-align:middle;display:inline-block}</style>										<img  width="500" height="500" src="/img/starlingtheme2.png" class="attachment-large size-large wp-image-85278134" alt=""  sizes="(max-width: 500px) 100vw, 500px" />													</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-61d5739 elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default" data-id="61d5739" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-24bcd8f" data-id="24bcd8f" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <section class="elementor-section elementor-inner-section elementor-element elementor-element-6cb2379 elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6cb2379" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2eb9dd0" data-id="2eb9dd0" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-4dc9ad2 elementor-hidden-mobile elementor-widget elementor-widget-image" data-id="4dc9ad2" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
                                <img  width="643" height="554" src="/uploads/2023/09/icon5.png" class="attachment-large size-large wp-image-85263549" alt=""  sizes="(max-width: 643px) 100vw, 643px" />													</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-f3aaba3" data-id="f3aaba3" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-527db00 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-id="527db00" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default"><span class="background">We're a leading provider</span></h3>		</div>
</div>
<div class="elementor-element elementor-element-a696d6d elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="a696d6d" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
        <p>At {{ucfirst(config('app.name_replace'))}}, we specialize in providing reliable and flexible temporary insurance solutions across the UK. With years of experience, we&#8217;ve crafted short-term insurance options that make it easy and affordable for drivers to access coverage that fits their unique needs.</p>						</div>
</div>
<div class="elementor-element elementor-element-3d0248c elementor-align-center elementor-tablet-align-right elementor-widget__width-initial elementor-widget elementor-widget-button" data-id="3d0248c" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm" href="policy/get-quote" id="button-temporary">
    <span class="elementor-button-content-wrapper">
                <span class="elementor-button-text">Go to temporary insurance</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-ab6dcfb elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ab6dcfb" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-b963d5f" data-id="b963d5f" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-c8bc30f elementor-widget__width-initial elementor-widget elementor-widget-heading" data-id="c8bc30f" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default"><span class="background">We compare prices</span></h3>		</div>
</div>
<div class="elementor-element elementor-element-9bed63d elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="9bed63d" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
        <div class="flex max-w-full flex-col flex-grow"><div class="min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal break-words [.text-message+&amp;]:mt-5" dir="auto" data-message-author-role="assistant" data-message-id="0bfd850d-810c-4165-a4e3-d1062e7e5934" data-message-model-slug="gpt-4o"><div class="flex w-full flex-col gap-1 empty:hidden first:pt-[3px]"><div class="markdown prose w-full break-words dark:prose-invert light"><p>We partner with a trusted network of insurers to help you find the perfect policy, offering a range of options and coverage durations. This way, you’ll only pay for exactly what you need, when you need it.</p></div></div></div></div>						</div>
</div>
<div class="elementor-element elementor-element-2b1136f elementor-align-center elementor-tablet-align-right elementor-widget__width-initial elementor-widget elementor-widget-button" data-id="2b1136f" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm" href="policy/get-quote" id="button-temporary">
    <span class="elementor-button-content-wrapper">
                <span class="elementor-button-text">Insurance for learner drivers</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4a39c75" data-id="4a39c75" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-0b5f89d elementor-hidden-mobile elementor-widget elementor-widget-image" data-id="0b5f89d" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
                                <img   width="643" height="554" src="/uploads/2023/09/icon6.png" class="attachment-large size-large wp-image-85263550" alt=""  sizes="(max-width: 643px) 100vw, 643px" />													</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-66ae5a6 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="66ae5a6" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6841642" data-id="6841642" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-97ea0df elementor-widget elementor-widget-heading" data-id="97ea0df" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default">The cover you need for the duration you want</h4>		</div>
</div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-ef22539 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ef22539" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-d54d140" data-id="d54d140" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-09f57b0 elementor-widget elementor-widget-heading" data-id="09f57b0" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Full cover, no impact</h3>		</div>
</div>
<div class="elementor-element elementor-element-7a55b4a elementor-widget elementor-widget-text-editor" data-id="7a55b4a" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
        <div class="group w-full text-token-text-primary border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]" data-testid="conversation-turn-25"><div class="p-4 justify-center text-base md:gap-6 md:py-6 m-auto"><div class="flex flex-1 gap-4 text-base mx-auto md:gap-6 md:max-w-2xl lg:max-w-[38rem] xl:max-w-3xl }"><div class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]"><div class="flex flex-grow flex-col gap-3 max-w-full"><div class="min-h-[20px] flex flex-col items-start gap-3 overflow-x-auto whitespace-pre-wrap break-words"><div class="markdown prose w-full break-words dark:prose-invert light"><p>Acquire comprehensive coverage with our standard short-term policies, all without any impact on your no claims discount.</p></div></div></div></div></div></div></div>						</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-6bcb73b" data-id="6bcb73b" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-14b98bf elementor-widget elementor-widget-heading" data-id="14b98bf" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Hourly, daily, weekly</h3>		</div>
</div>
<div class="elementor-element elementor-element-89e5b7e elementor-widget elementor-widget-text-editor" data-id="89e5b7e" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
        <div class="group w-full text-token-text-primary border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]" data-testid="conversation-turn-25"><div class="p-4 justify-center text-base md:gap-6 md:py-6 m-auto"><div class="flex flex-1 gap-4 text-base mx-auto md:gap-6 md:max-w-2xl lg:max-w-[38rem] xl:max-w-3xl }"><div class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]"><div class="flex flex-grow flex-col gap-3 max-w-full"><div class="min-h-[20px] flex flex-col items-start gap-3 overflow-x-auto whitespace-pre-wrap break-words"><div class="markdown prose w-full break-words dark:prose-invert light"><p>Select the duration that suits you, with options ranging from 1-12 hours to 1-28 days of coverage, ensuring you only pay for the protection you require.</p></div></div></div></div></div></div></div>						</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-a25d385" data-id="a25d385" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-a09c560 elementor-widget elementor-widget-heading" data-id="a09c560" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">All customised, nothing added</h3>		</div>
</div>
<div class="elementor-element elementor-element-3147806 elementor-widget elementor-widget-text-editor" data-id="3147806" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
        <div class="group w-full text-token-text-primary border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]" data-testid="conversation-turn-25"><div class="p-4 justify-center text-base md:gap-6 md:py-6 m-auto"><div class="flex flex-1 gap-4 text-base mx-auto md:gap-6 md:max-w-2xl lg:max-w-[38rem] xl:max-w-3xl }"><div class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]"><div class="flex flex-grow flex-col gap-3 max-w-full"><div class="min-h-[20px] flex flex-col items-start gap-3 overflow-x-auto whitespace-pre-wrap break-words"><div class="markdown prose w-full break-words dark:prose-invert light"><p>Tailor your policy to fit your unique circumstances. You can design the policy you desire, right down to selecting the precise minute you want it to start.</p></div></div></div></div></div></div></div>						</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-6cd4647 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="6cd4647" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="elementor-background-overlay"></div>
        <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-11f26f5" data-id="11f26f5" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <section class="elementor-section elementor-inner-section elementor-element elementor-element-af4f63a elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="af4f63a" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1121a38" data-id="1121a38" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-04c264a elementor-widget elementor-widget-heading" data-id="04c264a" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default">What is temporary car insurance?</h4>		</div>
</div>
<div class="elementor-element elementor-element-8155e4c elementor-widget elementor-widget-text-editor" data-id="8155e4c" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
        <p>Annual car insurance isn&#8217;t always necessary. Short-term coverage provides an alternative for various everyday needs. Temporary car insurance offers flexibility with comprehensive protection, spanning from as little as 1 hour to 28 days. This coverage includes damage to other drivers and their vehicles, as well as yourself and your car.</p><p>If you&#8217;re temporarily borrowing or sharing a car, temporary car insurance proves to be a cost-effective solution, eliminating the need for long-term contracts and the hassle of modifying existing coverage or adding new names to an ongoing policy.</p>						</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a48c3d0" data-id="a48c3d0" data-element_type="column">
<div class="elementor-widget-wrap">
        </div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-19bf8da elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="19bf8da" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-69690f8" data-id="69690f8" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-360a190 elementor-widget elementor-widget-heading" data-id="360a190" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h1 class="elementor-heading-title elementor-size-default">Frequently asked questions</h1>		</div>
</div>
<div class="elementor-element elementor-element-ff3dfc1 elementor-widget elementor-widget-accordion" data-id="ff3dfc1" data-element_type="widget" data-widget_type="accordion.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.23.0 - 05-08-2024 */
.elementor-accordion{text-align:start}.elementor-accordion .elementor-accordion-item{border:1px solid #d5d8dc}.elementor-accordion .elementor-accordion-item+.elementor-accordion-item{border-top:none}.elementor-accordion .elementor-tab-title{margin:0;padding:15px 20px;font-weight:700;line-height:1;cursor:pointer;outline:none}.elementor-accordion .elementor-tab-title .elementor-accordion-icon{display:inline-block;width:1.5em}.elementor-accordion .elementor-tab-title .elementor-accordion-icon svg{width:1em;height:1em}.elementor-accordion .elementor-tab-title .elementor-accordion-icon.elementor-accordion-icon-right{float:right;text-align:right}.elementor-accordion .elementor-tab-title .elementor-accordion-icon.elementor-accordion-icon-left{float:left;text-align:left}.elementor-accordion .elementor-tab-title .elementor-accordion-icon .elementor-accordion-icon-closed{display:block}.elementor-accordion .elementor-tab-title .elementor-accordion-icon .elementor-accordion-icon-opened,.elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon-closed{display:none}.elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon-opened{display:block}.elementor-accordion .elementor-tab-content{display:none;padding:15px 20px;border-top:1px solid #d5d8dc}@media (max-width:767px){.elementor-accordion .elementor-tab-title{padding:12px 15px}.elementor-accordion .elementor-tab-title .elementor-accordion-icon{width:1.2em}.elementor-accordion .elementor-tab-content{padding:7px 15px}}.e-con-inner>.elementor-widget-accordion,.e-con>.elementor-widget-accordion{width:var(--container-widget-width);--flex-grow:var(--container-widget-flex-grow)}</style>		<div class="elementor-accordion">

    <script>

setTimeout(() => {
    
   $(document).ready(function(){
        $(".elementor-tab-title").on('click', function(){
            $(".elementor-tab-content").slideUp(500);
            $(".elementor-accordion-icon-closed").show();
            $(".elementor-accordion-icon-opened").hide();

            $(this).closest('.elementor-accordion-item').find(".elementor-tab-content").slideDown(500);
            $(this).closest('.elementor-accordion-item').find(".elementor-accordion-icon-closed").hide();
            $(this).closest('.elementor-accordion-item').find(".elementor-accordion-icon-opened").show();

            

        });
   });

}, 5000);

    </script>

        <div class="elementor-accordion-item">
<div id="elementor-tab-title-2671" class="elementor-tab-title" data-tab="1" role="button" aria-controls="elementor-tab-content-2671" aria-expanded="false">
                                <span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
                                        <span class="elementor-accordion-icon-closed" style="display: none"><i class="fas fa-plus"></i></span>
            <span class="elementor-accordion-icon-opened" style="display: inline-block;"><i class="fas fa-minus"></i></span>
                                    </span>
                            <a class="elementor-accordion-title" tabindex="0">What does temporary car insurance cover?</a>
</div>
<div id="elementor-tab-content-2671" style="display: block" class="elementor-tab-content elementor-clearfix" data-tab="1" role="region" aria-labelledby="elementor-tab-title-2671"><p>{{ucfirst(config('app.name_replace'))}} offers temporary car insurance that comes with full comprehensive coverage as a standard feature. Our short-term car insurance policy includes the following:</p><ol><li>Protection against accidental and deliberate damage to your vehicle.</li><li>Coverage for legal liabilities in the event of injury or damage to another person or their property.</li><li>Permission to drive in the UK, and in certain cases, the option to drive in the EU.</li></ol><p>We also provide optional coverage options at an additional cost. {{ucfirst(config('app.name_replace'))}} collaborates with a panel of insurers to ensure that each customer receives the appropriate level of coverage they need. Consequently, the specifics of your temporary car insurance may vary depending on the insurer you choose. It is essential to carefully review the policy wording before making your purchase to ensure it meets your specific needs.</p></div>
</div>
        <div class="elementor-accordion-item">
<div id="elementor-tab-title-2672" class="elementor-tab-title" data-tab="2" role="button" aria-controls="elementor-tab-content-2672" aria-expanded="false">
                                <span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
                                        <span class="elementor-accordion-icon-closed"><i class="fas fa-plus"></i></span>
            <span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
                                    </span>
                            <a class="elementor-accordion-title" tabindex="0">How do I make a claim?</a>
</div>
<div id="elementor-tab-content-2672" class="elementor-tab-content elementor-clearfix" data-tab="2" role="region" aria-labelledby="elementor-tab-title-2672"><p>To initiate a claim, it’s essential to report the incident within 24 hours. You can locate the contact details in your policy documents or utilize the in-house claim reporting form available on our website.</p></div>
</div>
        <div class="elementor-accordion-item">
<div id="elementor-tab-title-2673" class="elementor-tab-title" data-tab="3" role="button" aria-controls="elementor-tab-content-2673" aria-expanded="false">
                                <span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
                                        <span class="elementor-accordion-icon-closed"><i class="fas fa-plus"></i></span>
            <span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
                                    </span>
                            <a class="elementor-accordion-title" tabindex="0">When will I recieve my policy?</a>
</div>
<div id="elementor-tab-content-2673" class="elementor-tab-content elementor-clearfix" data-tab="3" role="region" aria-labelledby="elementor-tab-title-2673"><p>We deliver an email instantly to you, providing you entered your email address correctly. If you do not receive a confirmation e-mail from us within the hour, please check your spam or junk mail folders. If you have still not received your documents, get in contact with us to request they are sent again.</p></div>
</div>
        <div class="elementor-accordion-item">
<div id="elementor-tab-title-2674" class="elementor-tab-title" data-tab="4" role="button" aria-controls="elementor-tab-content-2674" aria-expanded="false">
                                <span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
                                        <span class="elementor-accordion-icon-closed"><i class="fas fa-plus"></i></span>
            <span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
                                    </span>
                            <a class="elementor-accordion-title" tabindex="0">How does short-term car insurance work?</a>
</div>
<div id="elementor-tab-content-2674" class="elementor-tab-content elementor-clearfix" data-tab="4" role="region" aria-labelledby="elementor-tab-title-2674"><p>{{ucfirst(config('app.name_replace'))}}s short-term car insurance offers comprehensive coverage for a specified duration, with flexible options available by the hour, day, week, or month. Simply provide us with some essential information about yourself and your vehicle, and then select the start date for your desired coverage.</p></div>
</div>
            </div>
</div>
</div>
<div class="elementor-element elementor-element-2593157 elementor-align-center elementor-widget elementor-widget-button" data-id="2593157" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm" href="#" id="button-help">
    <span class="elementor-button-content-wrapper">
                <span class="elementor-button-text">Need more help?  Check out our help centre.</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-3f3e4b5 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3f3e4b5" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4cd9a12" data-id="4cd9a12" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
    <section class="elementor-section elementor-inner-section elementor-element elementor-element-04cb5d6 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="04cb5d6" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-283ee2e" data-id="283ee2e" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-a42e18a elementor-widget elementor-widget-image" data-id="a42e18a" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
                                <img   width="1024" height="536" src="/uploads/2023/12/image-7-1024x536.jpg" class="attachment-large size-large wp-image-85265274" alt=""  sizes="(max-width: 1024px) 100vw, 1024px" />													</div>
</div>
<div class="elementor-element elementor-element-df3ca95 elementor-widget elementor-widget-heading" data-id="df3ca95" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="elementor-heading-title elementor-size-default">Temporary car insurance</h6>		</div>
</div>
<div class="elementor-element elementor-element-9e7d3c0 elementor-widget elementor-widget-text-editor" data-id="9e7d3c0" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
        Drivers aged 17-78 can get short-term car insurance for 1-28 days, perfect for various everyday needs. From borrowing a car to a test drive.						</div>
</div>
<div class="elementor-element elementor-element-6b100c1 elementor-widget elementor-widget-heading" data-id="6b100c1" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="/elementor-heading-title elementor-size-default"><a href="policy/get-quote">Get a Quote</a></h6>		</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-bf6a1d4" data-id="bf6a1d4" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-0ac7456 elementor-widget elementor-widget-image" data-id="0ac7456" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
                                <img  width="1024" height="536" src="/uploads/2023/12/image-44-1024x536.jpg" class="attachment-large size-large wp-image-85265273" alt=""  sizes="(max-width: 1024px) 100vw, 1024px" />													</div>
</div>
<div class="elementor-element elementor-element-81f83e6 elementor-widget elementor-widget-heading" data-id="81f83e6" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="elementor-heading-title elementor-size-default">Temporary van insurance</h6>		</div>
</div>
<div class="elementor-element elementor-element-3aa0016 elementor-widget elementor-widget-text-editor" data-id="3aa0016" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
        Individuals aged 17-78 can discover versatile short-term van insurance, ranging from 1 hour to 28 days, perfectly suited for various everyday needs.						</div>
</div>
<div class="elementor-element elementor-element-7aeb4b8 elementor-widget elementor-widget-heading" data-id="7aeb4b8" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="/elementor-heading-title elementor-size-default"><a href="policy/get-quote">Get a Quote</a></h6>		</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-e705bdd" data-id="e705bdd" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-0436400 elementor-widget elementor-widget-image" data-id="0436400" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
                                <img   width="1186" height="621" src="/uploads/2023/12/image-44.jpg" class="attachment-full size-full wp-image-85265273" alt=""  sizes="(max-width: 1186px) 100vw, 1186px" />													</div>
</div>
<div class="elementor-element elementor-element-de3faa7 elementor-widget elementor-widget-heading" data-id="de3faa7" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="elementor-heading-title elementor-size-default">Temporary car insurance</h6>		</div>
</div>
<div class="elementor-element elementor-element-f4534e5 elementor-widget elementor-widget-text-editor" data-id="f4534e5" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
        Drivers aged 17-78 can access adaptable short-term bike insurance, spanning from 1 hour to 28 days, ideal for various everyday scenarios.						</div>
</div>
<div class="elementor-element elementor-element-71043cb elementor-widget elementor-widget-heading" data-id="71043cb" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="/elementor-heading-title elementor-size-default"><a href="policy/get-quote">Get a Quote</a></h6>		</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>

</div>



@endsection('content')



@push('js')

{{-- extra jss files here --}}

<script src="/plugins/elementor/assets/js/accordion.8799675460c73eb48972.bundle.min.js?ver={{config('app.version')}}"></script>
<script src="/plugins/elementor/assets/js/frontend.mind5d5.js?ver={{config('app.version')}}"></script>

@endpush
