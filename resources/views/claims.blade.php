@php
    $user =  auth('web')->Check()? auth('web')->user() : null;
@endphp
@extends('templates.page')


@push('meta')
    <title>Claims - {{ config('app.name') }}</title>

@endpush

@push('css')
 {{-- Extra css files here --}}

         {{-- Claimns --}}
         <link rel='stylesheet' id='elementor-post-85263388-css' href='/uploads/elementor/css/post-852633888ffa.css?ver={{config('app.version')}}' type='text/css' media='all' />
         
@endpush




@section('content')
    

<br><div id="post-1669" class="post-1669 page type-page status-publish hentry">
    <div class="post-entry">
        <div data-elementor-type="wp-page" data-elementor-id="1669" class="elementor elementor-1669" data-elementor-post-type="page">
            <section class="elementor-section elementor-top-section elementor-element elementor-element-c34cd65 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c34cd65" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-05df591" data-id="05df591" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-021414a elementor-widget elementor-widget-theme-post-featured-image elementor-widget-image" data-id="021414a" data-element_type="widget" data-widget_type="theme-post-featured-image.default">
    <div class="elementor-widget-container">
<style>/*! elementor - v3.23.0 - 05-08-2024 */
.elementor-widget-image{text-align:center}.elementor-widget-image a{display:inline-block}.elementor-widget-image a img[src$=".svg"]{width:48px}.elementor-widget-image img{vertical-align:middle;display:inline-block}</style>							<figure class="wp-caption">
                            <img  width="150" height="150" src="/img/shield.png" class="attachment-thumbnail size-thumbnail wp-image-2283" alt=""  sizes="(max-width: 150px) 100vw, 150px">											<figcaption class="widget-image-caption wp-caption-text"></figcaption>
                            </figure>
                </div>
    </div>
        </div>
</div>
        </div>
</section>
    <section class="elementor-section elementor-top-section elementor-element elementor-element-1ec3b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1ec3b4e" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-382b5d5" data-id="382b5d5" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-1748c9e elementor-widget elementor-widget-heading" data-id="1748c9e" data-element_type="widget" data-widget_type="heading.default">
    <div class="elementor-widget-container">
<style>/*! elementor - v3.23.0 - 05-08-2024 */
.elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style><h2 class="elementor-heading-title text-center elementor-size-default">Make a Claim</h2>		</div>
    </div>
        </div>
</div>
        </div>
</section>
    <section class="elementor-section elementor-top-section elementor-element elementor-element-2db4b09 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2db4b09" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-928f92a" data-id="928f92a" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-cb67a38 elementor-widget elementor-widget-metform" data-id="cb67a38" data-element_type="widget" data-widget_type="metform.default">
    <div class="elementor-widget-container">
<div id="mf-response-props-id-85263388" data-previous-steps-style="" data-editswitchopen="" data-response_type="alert" data-erroricon="fas fa-exclamation-triangle" data-successicon="fas fa-check" data-messageposition="top" class="   mf-scroll-top-no">
<div class="formpicker_warper formpicker_warper_editable" data-metform-formpicker-key="85263388">
    
<div class="elementor-widget-container">
    
<div id="metform-wrap-cb67a38-85263388" class="mf-form-wrapper" data-form-id="85263388" data-action="" data-wp-nonce="219eb998f1" data-form-nonce="2dee130b90" data-quiz-summery="false" data-save-progress="false" data-form-type="general-form" data-stop-vertical-effect=""><form  onsubmit="sendClaim(event)" class="metform-form-content"><div class="metform-form-main-wrapper"><div data-elementor-type="wp-post" data-elementor-id="85263388" class="elementor elementor-85263388" data-elementor-post-type="metform-form"><section class="elementor-section elementor-top-section elementor-element elementor-element-26ea9738 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="26ea9738" data-element_type="section"><div class="elementor-container elementor-column-gap-default"><div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7c8f3e4b" data-id="7c8f3e4b" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-48307f1 elementor-widget elementor-widget-text-editor" data-id="48307f1" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><style>/*! elementor - v3.23.0 - 05-08-2024 */
.elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>				<div class="group w-full text-token-text-primary border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]" data-testid="conversation-turn-3"><div class="flex p-4 gap-4 text-base md:gap-6 md:max-w-2xl lg:max-w-[38rem] xl:max-w-3xl md:py-6 lg:px-0 m-auto"><div class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]"><div class="flex flex-grow flex-col gap-3 max-w-full"><div class="min-h-[20px] flex flex-col items-start gap-3 overflow-x-auto whitespace-pre-wrap break-words"><div class="markdown prose w-full break-words dark:prose-invert light"><p>A dedicated member of our claims team will promptly reach out to you within the next 24 hours following the submission of this claim form.</p></div></div></div></div></div></div>						</div></div><section class="elementor-section elementor-inner-section elementor-element elementor-element-6a37e2f9 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="6a37e2f9" data-element_type="section"><div class="elementor-container elementor-column-gap-default"><div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-24dd7809" data-id="24dd7809" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-184663a1 elementor-widget elementor-widget-mf-text" data-id="184663a1" data-element_type="widget" data-settings="{&quot;mf_input_name&quot;:&quot;mf-first-name&quot;}" data-widget_type="mf-text.default"><div class="elementor-widget-container"><div class="mf-input-wrapper"><label class="mf-input-label" for="mf-input-text-184663a1">First Name 					<span class="mf-input-required-indicator">*</span></label><input value="{{$user->first_name?? '' }}" type="text" class="mf-input mf-conditional-input" id="mf-input-text-184663a1" name="first_name" placeholder="First name here " aria-invalid="false"></div></div></div></div></div><div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1e243baf" data-id="1e243baf" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-763108f5 elementor-widget elementor-widget-mf-text" data-id="763108f5" data-element_type="widget" data-settings="{&quot;mf_input_name&quot;:&quot;mf-last-name&quot;}" data-widget_type="mf-text.default"><div class="elementor-widget-container"><div class="mf-input-wrapper"><label class="mf-input-label" for="mf-input-text-763108f5">Last Name 					<span class="mf-input-required-indicator">*</span></label><input value="{{$user->last_name?? '' }}" type="text" class="mf-input mf-conditional-input" id="mf-input-text-763108f5" name="last_name" placeholder="Last name here " aria-invalid="false"></div></div></div></div></div></div></section><section class="elementor-section elementor-inner-section elementor-element elementor-element-3a62ea78 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="3a62ea78" data-element_type="section"><div class="elementor-container elementor-column-gap-default"><div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-2c9a43de" data-id="2c9a43de" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-47e25ccc elementor-widget elementor-widget-mf-email" data-id="47e25ccc" data-element_type="widget" data-settings="{&quot;mf_input_name&quot;:&quot;mf-email&quot;}" data-widget_type="mf-email.default"><div class="elementor-widget-container"><div class="mf-input-wrapper"><label class="mf-input-label" for="mf-input-email-47e25ccc">Email Address 					<span class="mf-input-required-indicator">*</span></label><input value="{{$user->email?? '' }}" type="email" class="mf-input mf-conditional-input" id="mf-input-email-47e25ccc" name="email" placeholder="Add email " aria-invalid="false" value=""></div></div></div></div></div><div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-676e8797" data-id="676e8797" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-20deb7b9 elementor-widget elementor-widget-mf-text" data-id="20deb7b9" data-element_type="widget" data-settings="{&quot;mf_input_name&quot;:&quot;mf-subject&quot;}" data-widget_type="mf-text.default"><div class="elementor-widget-container"><div class="mf-input-wrapper"><label class="mf-input-label" for="mf-input-text-20deb7b9">Phone number 					<span class="mf-input-required-indicator">*</span></label><input type="text" class="mf-input mf-conditional-input" id="mf-input-text-20deb7b9" name="telephone" placeholder="Phone Number " aria-invalid="false"></div></div></div></div></div><div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-9016a7c" data-id="9016a7c" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-da8e9ca elementor-widget elementor-widget-mf-text" data-id="da8e9ca" data-element_type="widget" data-settings="{&quot;mf_input_name&quot;:&quot;mf-subject&quot;}" data-widget_type="mf-text.default"><div class="elementor-widget-container"><div class="mf-input-wrapper"><label class="mf-input-label" for="mf-input-text-da8e9ca">Policy Number 					<span class="mf-input-required-indicator">*</span></label><input type="text" class="mf-input mf-conditional-input" id="mf-input-text-da8e9ca" name="policy_number" placeholder="Policy Number " aria-invalid="false"></div></div></div></div></div></div></section><section class="elementor-section elementor-inner-section elementor-element elementor-element-1f6daab4 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="1f6daab4" data-element_type="section"><div class="elementor-container elementor-column-gap-default"><div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-54f54cbc" data-id="54f54cbc" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-7e5c045e elementor-widget elementor-widget-mf-textarea" data-id="7e5c045e" data-element_type="widget" data-settings="{&quot;mf_input_name&quot;:&quot;mf-comment&quot;}" data-widget_type="mf-textarea.default"><div class="elementor-widget-container"><div class="mf-input-wrapper"><label class="mf-input-label" for="mf-input-text-area-7e5c045e">Details of What Happened 					<span class="mf-input-required-indicator">*</span></label><textarea class="mf-input mf-textarea mf-conditional-input" id="mf-input-text-area-7e5c045e" name="comment" placeholder="Comments " cols="30" rows="10" aria-invalid="false"></textarea></div></div></div><div class="elementor-element elementor-element-4429ff08 elementor-widget elementor-widget-mf-recaptcha" data-id="4429ff08" data-element_type="widget" data-widget_type="mf-recaptcha.default"><div class="elementor-widget-container"></div></div><div class="elementor-element elementor-element-d3af341 elementor-widget__width-auto elementor-widget elementor-widget-mf-button" data-id="d3af341" data-element_type="widget" data-widget_type="mf-button.default"><div class="elementor-widget-container"><div class="mf-btn-wraper mf-conditional-input sbutton" data-mf-form-conditional-logic-requirement=""><button type="submit" class="metform-btn metform-submit-btn " id=""><span>Send Claim </span></button></div></div></div></div></div></div></section></div></div></div></section></div></div></form></div>


        </div>
</div>
</div>		</div>
    </div>
        </div>
</div>
        </div>
</section>
    </div>				</div><!-- end of .post-entry -->
</div>
<br><br>	





@endsection('content')



@push('js')

{{-- extra jss files here --}}

@endpush
