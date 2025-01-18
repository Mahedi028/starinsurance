@php

$title = config('app.name')." - Orde Cancelled - {{$quote->policy_number}}";

@endphp


@extends('emails.templates.base')

@push('css')

@endpush

@section('content')


<div class="content left">


<h2 style="text-align: center; font-size:18px; line-height:150%; color: #3e6d75">Policy #{{$quote->policy_number}} Cancelled</h2>


<div style="font-size: 16px;">
<p><b>Hi {{$quote->first_name}} {{$quote->middle_name}} {{$quote->last_name}},</b></p>

<p>Thank you for choosing {{config('app.name')}}</p>

<p>This is to notify your that your recent policy  (<b>{{$quote->policy_number}}</b>) has been cancelled</p>

</div>


<table class="table">
<tbody>
<tr><th colspan="2" style="color: rgb(77, 77, 179)">Policy summary</th></tr>
  <tr><th>Policy number:</th><td>{{$quote->policy_number}}</td></tr>

<tr><th>Policy holder:</th><td>{{$quote->first_name}} {{$quote->middle_name}} {{$quote->last_name}}</td></tr>

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


<tr><th style="padding-top:20px; border-top:2px solid #333;">Total Charge:</th><td style="padding-top:20px; border-top:2px solid #333;">£{{ number_format($quote->update_price, 2) }}</td></tr>

</tbody>

</table>





</div>

@endsection
