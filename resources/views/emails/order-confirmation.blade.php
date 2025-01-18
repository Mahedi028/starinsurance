@php

$title = config('app.name')." - Policy confirmation - {{$quote->policy_number}}";

@endphp


@extends('emails.templates.base')

@push('css')

@endpush

@section('content')


<div class="content left">


<h2 style="text-align: center; font-size:18px; line-height:150%; color: #275c58">Thanks for choosing <a href="config('app.url')">{{ config('app.name') }}</a> <br>
  Your temporary insurance is all ready to go!</h2>


<div style="font-size: 16px;">
<p><b>Hi {{$quote->first_name}} {{$quote->middle_name}} {{$quote->last_name}},</b></p>

<p>You can relax now, everything is taken care of. Your temporary insurance policy is in place and will begin at the time you selected.</p>

<p>Check out the summary of your policy and a link to view and print your policy documents below.</p>

<p>Should you need to make a claim at any point, please <a href="{{url('/claims')}}">Click here</a> for more information.</p>

<p>Thanks again for choosing <a href="config('app.url')">{{ config('app.name') }}</a> for your temporary insurance needs - we hope to see you again soon.</p>

<p style="text-align:center"><small><i> This policy meets the Demands and Needs of a customer who wishes to insure a vehicle for a short period.</i></small></p>

<p>Our Customer Terms of Business can be found <a href="{{ url('/customer-terms-of-business') }}">here.</a></p>

</div>

<div class="center"><a href="{{url('/my-account')}}" class="center btn">View your policy documents</a></div>


<table class="table">
<tbody>
<tr><th colspan="2" style="color: rgb(77, 77, 179)">Policy summary</th></tr>
  <tr><th>Policy number:</th><td>{{$quote->policy_number}}</td></tr>

<tr><th>Policy holder:</th><td>{{$quote->first_name}} {{$quote->middle_name}}  {{$quote->last_name}}</td></tr>

<tr><th>Vehicle registration:</th><td>{{$quote->reg_number}}</td></tr>

<tr><th>Vehicle Make:</th><td>{{$quote->vehicle_make}}</td></tr>

<tr><th>Vehicle Model:</th><td>{{$quote->vehicle_model}}</td></tr>

<tr><th>Engine CC:</th><td>{{$quote->engine_cc}}</td></tr>

<tr><th>Vehicle value:</th><td>{{$quote->vehicle_type}}</td></tr>

<tr><th>Licence Type:</th><td>{{$quote->licence_type}}</td></tr>

<tr><th>Licence Held Duration:</th><td>{{$quote->licence_held_duration}}</td></tr>

@php

// Combine start date and time
$start = new DateTime($quote->start_date . " " . $quote->start_time);

// Combine end date and time
$end = new DateTime($quote->end_date . " " . $quote->end_time);

// Calculate the difference
$interval = $start->diff($end);

// Format the output
$days = $interval->days; // Total days
$hours = $interval->h;   // Remaining hours

// Build the duration string
$duration = '';
if ($days > 0) {
    $duration .= $days . " day" . ($days > 1 ? "s" : "");
}

if ($hours > 0) {
    if (!empty($duration)) {
        $duration .= " and ";
    }
    $duration .= $hours . " hour" . ($hours > 1 ? "s" : "");
}

@endphp

<tr><th>Duration:</th><td>{{$duration}}</td></tr>
<tr><th>Start date/time: </th><td>{{ date("d F Y h:ia", strtotime($quote->start_date. " ".$quote->start_time)) }}</td></tr>
<tr><th>End date/time:</th><td>{{ date("d F Y h:ia", strtotime($quote->end_date. " ".$quote->end_time)) }}</td></tr>

@if($quote->cpw  > $quote->update_price)

<tr><th style="padding-top:20px; border-top:2px solid #333;">Subtotal:</th><td style="padding-top:20px; border-top:2px solid #333;">£{{ number_format($quote->cpw, 2) }}</td></tr>

<tr><th style="padding-top:10px; border-top:1px solid #333;">Discount:</th><td style="padding-top:10px; border-top:1px solid #333;">£{{ number_format(($quote->cpw - $quote->update_price), 2) }}</td></tr>

<tr><th style="padding-top:10px; border-top:1px solid #333;">Total Charge:</th><td style="padding-top:10px; border-top:1px solid #333;">£{{ number_format($quote->update_price, 2) }}</td></tr>

@else

<tr><th style="padding-top:20px; border-top:2px solid #333;">Total Charge:</th><td style="padding-top:20px; border-top:2px solid #333;">£{{ number_format($quote->update_price, 2) }}</td></tr>

@endif



</tbody>

</table>

<div style="font-size:14px">

<p style="font-size:18px"><b>Updating the MID</b></p>

<p>Your insurance details will shortly be passed to the <a href="https://ownvehicle.askmid.com/">Motor Insurance Database (MID)</a> within the timescales required by the MID. However, due to the short-term nature of your policy, it is possible your policy may have expired before the details are loaded into the database.</p>

<p>We recommend that you print your insurance certificate and have this with you whilst you drive the vehicle as this remains valid proof of your insurance and legal entitlement to drive the vehicle. If you need to get in touch with us, please <a href="{{url('/contact')}}">Contact Us.</a></p>

<p>We hope to see you again soon,</p>

<p>You are receiving this email as part of our quote service. This service does not relate to the marketing communication preferences you set when obtaining a quote.</p>

<p><b>{{ config('app.name') }}</b></p>

<p>IMPORTANT CONFIDENTIALITY NOTICE: this email and the information it contains may be confidential, legally privileged and protected by law. Access by the intended recipient only is authorised. Any liability (in negligence or otherwise) arising from any third party acting, or refraining from acting, on any information contained in this e-mail is hereby excluded. If you are not the intended recipient, please notify the sender immediately and do not disclose the contents of this e-mail or any attachment to any other person, use it for any purpose, or store or copy the information in any medium. Copyright in this e-mail and attachments attached here to belongs to Starling Insure Ltd; the author also reserves the right to be identified as such and objects to any misuse. Starling Insure Ltd do not accept any liability in connection with either the innocent or inadvertent transmission of any virus contained in this e-mail or any attachment thereto.</p>


</div>




</div>

@endsection
