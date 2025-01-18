<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            background-color: #f3fafb;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
        }

        /* .header{

        }
        .header h1{
            background-color: #275c58;
            color: #FFF;
            padding: 5px 10px;
            font-size: 20px;
            line-height: 100%;
            margin-top: 0px;
            margin-bottom: 10px;
        }
        .header img {
            max-width: 150px;
            margin-left: 20px;
        } */

        .content {
            padding: 20px;
            text-align: left;
            line-height: 150%;
            font-size: 16px;
        }

        .content h1 {
            color: #01193d;
            font-size: 20px;
            line-height: 170%;
        }

        .content p {
            color: #333333;
        }

        .button {
            display: inline-block;
            padding: 15px 25px;
            margin: 20px 0;
            background-color: #275c58;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        /* .footer {
            background-color: #fbfbfb;
            padding: 20px;
            text-align: center;
            font-size: 16px;
            line-height: 150%;
            color: #275c58;
        } */

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .code {
            display: inline-block;
            padding: 15px 25px;
            margin: 20px 0;
            background-color: #275c58;
            color: #FFF !important;
            text-decoration: none;
            border-radius: 5px;
            font-size: 30px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 20px 0;
            background-color: #275c58;
            color: #FFF !important;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .table{
            width: 100%;
            border: 4px solid #275c58;
        }
        .table th{
            color: #275c58;
            font-weight: bold;
            font-size: 14px;
            padding: 7px;
        }
        .table td{
            color: #5a5c5d;
            font-weight: normal;
            font-size: 14px;
            padding: 7px;
        }

    </style>
    @stack('css')
</head>

<body>
    <div class="container">
        <div class="header" style="font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #275c58; color: #fff;">
            <img src="{{ asset('img/logo.png') }}?ver={{ config('app.version') }}" alt="Logo" style="margin-top: 10px; max-width: 150px; height: auto;">
        </div>
        
        @yield('content')



        <div class="footer" style="font-family: Arial, sans-serif; font-size: 14px; color: #444; text-align: center; line-height: 1.6; padding: 20px; border-top: 1px solid #ddd; background-color: #f9f9f9;">
            <strong style="font-size: 16px; color: #275c58;">{{ config('app.name') }}</strong> <br>
            Registered in England No. 9923259 <br>
            Registered Office: 2nd Floor, Admiral House, Harlington Way, Fleet, Hampshire, GU51 4BB <br>
            <a href="{{ url('/customer-terms-of-business') }}" style="color: #275c58; text-decoration: none;">Terms</a> | 
            <a href="{{ url('/privacy-policy') }}" style="color: #275c58; text-decoration: none;">Privacy</a>
        </div>

        
        
    </div>
</body>

</html>
