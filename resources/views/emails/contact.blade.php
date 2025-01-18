


@php

$title = "Contact Message  ".config('app.name');

@endphp


@extends('emails.templates.base')

@push('css')

@endpush

@section('content')

@if($type == "claim")


<div class="content left">
    <h1 class="center">Claim Request</h1>
    <div class="left">
        <table style="width:100%; max-width:800px; border-collapse: collapse;">
            <tbody>
                <tr>
                    <th style="padding: 10px; text-align: left;">Policy Number:</th>
                    <td style="padding: 10px;">{{$policy_number}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">First Name:</th>
                    <td style="padding: 10px;">{{$first_name}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Last Name:</th>
                    <td style="padding: 10px;">{{$last_name}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Email:</th>
                    <td style="padding: 10px;">{{$email}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Telephone:</th>
                    <td style="padding: 10px;">{{$telephone}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Details of What Happened :</th>
                    <td style="padding: 10px;">{{$comment}}</td>
                </tr>
            </tbody>
        </table>
        


    </div>
</div>




@else
<div class="content left">
    <h1 class="center">Contact Message</h1>
    <div class="left">
        <table style="width:100%; max-width:800px; border-collapse: collapse;">
            <tbody>
                <tr>
                    <th style="padding: 10px; text-align: left;">First Name:</th>
                    <td style="padding: 10px;">{{$first_name}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Last Name:</th>
                    <td style="padding: 10px;">{{$last_name}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Email:</th>
                    <td style="padding: 10px;">{{$email}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Telephone:</th>
                    <td style="padding: 10px;">{{$telephone}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Subject:</th>
                    <td style="padding: 10px;">{{$subject}}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Message:</th>
                    <td style="padding: 10px;">{{$comment}}</td>
                </tr>
            </tbody>
        </table>
        


    </div>
</div>

@endif

@endsection
