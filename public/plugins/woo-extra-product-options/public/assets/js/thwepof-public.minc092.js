function thwepofViewPassword(elm){thwepof_public.thwepofviewpassword(elm)}function thwepof_init(){thwepof_public.initialize_thwepof()}var thwepof_public=function($,window,document){"use strict";function initialize_thwepof(){setup_date_picker($(".thwepo-extra-options"),"thwepof-date-picker",thwepof_public_var);var wepo_range_input=$('input[type="range"].thwepof-input-field');wepo_range_input.each(function(){display_range_value(this)}),wepo_range_input.on("change",function(){display_range_value(this)}),$(".thwepof-mask-input").each(function(){apply_input_masking(this)})}function setup_date_picker(form,class_selector,data){$("."+class_selector).each(function(){var readonly=$(this).data("readonly");readonly="yes"===readonly;var yearRange=$(this).data("year-range");yearRange=""==yearRange?"-100:+10":yearRange,$(this).datepicker({showButtonPanel:!0,changeMonth:!0,changeYear:!0,yearRange:yearRange}),$(this).prop("readonly",readonly)})}function oceanwp_qv_field_validating_notice(){jQuery("body").off("adding_to_cart").on("adding_to_cart",function(event,addToCartBtn,formData){var $cartForm=$("#owp-qv-content").find("form.cart"),$table=$cartForm.find("table.thwepo-extra-options"),$requiredTrs=$table.find("tr:has(abbr.required)"),$requiredTds=$requiredTrs.find("td.value, td.abovefield"),inputNames=[],reqFields_data=[];$requiredTds.each(function(){$(this).find("input, select, textarea").each(function(){var inputName=$(this).attr("name");if(void 0!==inputName){var $labelTr=$(this).closest("tr"),labelText=$labelTr.find("label.label-tag").text().trim(),ftype="other";$labelTr.has('input[type="email"]').length?ftype="email":$labelTr.has('input[type="url"]').length&&(ftype="url"),inputNames.push(inputName),reqFields_data.push({name:inputName,label:labelText,type:ftype})}})});for(var filteredNames=Array.from(new Set(inputNames)),req_fields=[],i=0;i<filteredNames.length;i++){for(var flag=0,j=0;j<formData.length;j++)formData[j].name==filteredNames[i]&&""!=formData[j].value&&(flag=1);flag||req_fields.push(filteredNames[i])}if(addToCartBtn.hasClass("notincart")&&addToCartBtn.removeClass("notincart"),0!==req_fields.length){for(var reqLabels=[],i=0;i<req_fields.length;i++)for(var j=0;j<reqFields_data.length;j++)if(req_fields[i]==reqFields_data[j].name){reqLabels.push(reqFields_data[j].label);break}1===reqLabels.length?alert(reqLabels+"  is a required field"):alert(reqLabels.join("\n ")+"  - are required fields"),addToCartBtn.removeClass("loading"),addToCartBtn.addClass("notincart")}else{var fields_data=[];$table.find("tr").each(function(){$(this).find('input[type="email"], input[type="url"]').each(function(){var fieldName=$(this).attr("name"),fieldType=$(this).attr("type");fields_data.push({name:fieldName,type:fieldType})})}),0!==fields_data.length&&validate_email_url(fields_data,formData)}})}function validate_email_url(fields_data,formData){for(var i=0;i<fields_data.length;i++)for(var j=0;j<formData.length;j++)if(fields_data[i].name==formData[j].name&&""!=formData[j].value)if("email"==fields_data[i].type){if(!isEmail(formData[j].value))return showMessage("Added email is not valid!"),!1}else if("url"==fields_data[i].type&&!isUrl(formData[j].value))return showMessage("Added URL is not valid!"),!1}function isEmail(value){return/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)}function isUrl(value){return/^(ftp|http|https):\/\/[^ "]+$/.test(value)}function showMessage(message){var box=document.createElement("div");box.style.position="fixed",box.style.top="50%",box.style.left="50%",box.style.transform="translate(-50%, -50%)",box.style.padding="20px",box.style.backgroundColor="#fff",box.style.boxShadow="0 0 10px rgba(0, 0, 0, 0.5)",box.style.zIndex=99999;var messageText=document.createElement("p");messageText.style.margin="0",messageText.innerHTML="<span style='color: yellow;'>&#9888;<b>Warning: </b> </span>"+message,box.appendChild(messageText),document.body.appendChild(box),setTimeout(function(){box.style.opacity="0",setTimeout(function(){document.body.removeChild(box)},2e3)},3e3)}function check_oceanwp_quickview_opened(){$("#owp-qv-wrap").hasClass("is-visible")?(initialize_thwepof(),oceanwp_qv_field_validating_notice()):setTimeout(function(){check_oceanwp_quickview_opened()},1e3)}function apply_input_masking(elm){var data=$(elm).data("mask-pattern"),alias_items=["datetime","numeric","cssunit","url","IP","email","mac","vin"];-1!==$.inArray(data,alias_items)?$(elm).inputmask({alias:data}):$(elm).inputmask({mask:data})}function thwepofviewpassword(elm){var icon=$(elm),parent_elm=icon.closest(".thwepof-password-field"),input=parent_elm.find("input");icon.hasClass("dashicons-visibility")?(input.attr("type","text"),icon.addClass("dashicons-hidden").removeClass("dashicons-visibility")):icon.hasClass("dashicons-hidden")&&(input.attr("type","password"),icon.addClass("dashicons-visibility").removeClass("dashicons-hidden"))}function display_range_value(elm){var range_input=$(elm),range_val=range_input.val(),width=range_input.width(),min_attr=range_input.attr("min"),max_attr=range_input.attr("max");const min=min_attr||0,max=max_attr||100,position=Number(100*(range_val-min)/(max-min));var display_div=range_input.siblings(".thwepof-range-val");display_div.html(range_val);var left_position,display_div_width=display_div.innerWidth(),slider_position=width*position/100;left_position=width-slider_position<display_div_width/2?"calc(100% - "+display_div_width+"px)":slider_position<display_div_width/2?"0px":"calc("+position+"% - "+display_div_width/2+"px)",display_div.css("left",left_position)}return initialize_thwepof(),"flatsome"==thwepof_public_var.is_quick_view?$(document).on("mfpOpen",function(){initialize_thwepof(),$.magnificPopup.instance._onFocusIn=function(e){return!!$(e.target).hasClass("ui-datepicker-month")||(!!$(e.target).hasClass("ui-datepicker-year")||void $.magnificPopup.proto._onFocusIn.call(this,e))}}):"yith"==thwepof_public_var.is_quick_view?$(document).on("qv_loader_stop",function(){initialize_thwepof()}):"astra"==thwepof_public_var.is_quick_view?$(document).on("ast_quick_view_loader_stop",function(){initialize_thwepof()}):"oceanwp"==thwepof_public_var.is_quick_view&&$(document).on("click",".owp-quick-view",function(e){check_oceanwp_quickview_opened()}),{initialize_thwepof:initialize_thwepof,thwepofviewpassword:thwepofviewpassword}}(window.jQuery,window,document);