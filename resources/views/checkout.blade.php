@php
    // $user = auth('user')->user();
@endphp
@extends('templates.page')


@push('meta')
    <title>Checkout - {{ config('app.name') }}</title>
@endpush

@push('css')
    {{-- Extra css files here --}}
    <style>
        .view_summ_action {
            cursor: pointer;
            color: #275c58;
            font-weight: 600;
            text-decoration: none;
        }

        .pay_btn {
            background-color: #275c58;
        }

        .card-header {
            background-color: #eaebec;
        }

        .cart_summary {
            background-color: #f8f8f8;
            padding: 20px;
        }

        .cart_header {
            font-size: 1.4em;
            color: #333;
            font-weight: 700;
        }

        .cart_header2 {
            font-size: 1.2em;
            color: #333;
            font-weight: 700;
        }

        .cart_header3 {
            font-size: 1.1em;
            color: #333;
            font-weight: 700;
        }

        .variationx .dt {
            font-size: 0.75em;
            font-weight: 700;
            color: rgb(113, 113, 113);
            font-size: 0.75em;
            width: 100%;
            line-height: 1;
        }

        .variationx .dd {
            font-size: 0.75em;
            font-weight: 400;
            width: 100%;
            color: rgb(113, 113, 113);
            margin-bottom: 10px;
            line-height: 1;
        }

        .payment_error {
            color: red;
            font-size: 14px;
        }

        .modal .form-control {
            padding: 14px 10px !important;
        }

        .payment_method_icons img {
            height: 30px;
        }

        .auth_modal input {
            font-size: 16px;
        }

        .auth_modal .modal-content {
            box-shadow: 2px 2px 4px 6px #275c58;
        }
        input, input[type="email"], input[type="text"]{
            /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; */
            font-family: 'Roboto', sans-serif !important;
            font-weight: 400 !important;
        }
    </style>
@endpush






@section('content')
    <div class="row py-5">




        <div class="col-12 col-md-7 order-1 order-md-0">

            <div class=" mb-4">
                <h3 class="cart_header mt-2">INFORMATION</h3>

                <div id="login_region">
                    @auth('web')
                        <div style="font-size: 16px;">Welcome back,
                            <b>{{ auth('web')->user()->first_name . ' ' . auth('web')->user()->last_name }}</b>
                            ({{ auth('web')->user()->email }})</div>
                    @endauth
                </div>

                @guest('web')
                    <div class="auth_region">
                        <div class="py-2" style="font-size: 16px;">Already have an account with us? <a
                                style="cursor: pointer; color: #06F; font-weight: bold;" data-bs-toggle="modal"
                                data-bs-target="#authModal">Login</a> </div>

                        <div class="form-floating mb-3">
                            <input autocomplete="off" style="max-width:500px" value="" type="email" class="form-control"
                                id="new_email" placeholder="Email Address">
                            <label for="new_email">Email Address</label>
                        </div>
                            <input type="hidden" value="{{$quote->first_name}}"  id="new_first_name">
                            <input type="hidden" value="{{$quote->last_name}}"  id="new_last_name">


                                <div class="py-2" style="font-size: 16px;">If you do not have an account, we will create one for you
                        </div>
                    </div>
                @endguest



                <input type="hidden" value="{{ auth('web')->check() ? auth('web')->user()->email : '' }}" readonly
                    type="" class="form-control" readonly id="user_email" placeholder="Email Address">
                <br>
                <input type="hidden"
                    value="{{ auth('web')->check() ? auth('web')->user()->first_name . ' ' . auth('web')->user()->last_name : '' }}"
                    readonly type="" class="form-control" readonly id="user_name" placeholder="Name">
            </div>


            <h3 class="cart_header mt-2">PAYMENT</h3>
            <h4 class="cart_header2">All transactions are secure and encrypted.</h4>

            <hr>

            <h3>Amount: <span class="ms-5">£<span class="cpw_amount">{{ number_format($quote->cpw, 2) }}</span></span>
            </h3>

            <form class="mb-4" onsubmit="applyPromoCode(event)">
                <label class="mt-3">Have a promo code?</label>
                <div class="input-group" style="max-width:450px">
                    <input autocomplete="off" value="{{ $quote->promo_code }}" class="form-control" id="promo_code"
                        placeholder="Promo code">
                    <div class="input-group-append" placeholder="Code">
                        <button class="sbutton input-group-text btn btn-secondary px-5">Apply</button>
                    </div>
                </div>
            </form>


            <!-- Container for the Card Element -->
            <div class="card">
                <div class="card-header">
                    <h4 class="cart_header2">Credt/Debit Cards <span class="payment_method_icons float-end">
                            <span class="wc-stripe-card-icons-container">
                                <img src="/img/icons/amex.svg">
                                <img src="/img/icons/discover.svg">
                                <img src="/img/icons/visa.svg">
                                <img src="/img/icons/mastercard.svg">
                            </span></span> </h4>
                </div>
                <div class="card-body">
                    <div style="border: 1px solid #CCC; padding: 10px 7px;">
                        <div id="card-element"></div>
                    </div>
                    <div id="payment_error1" class="payment_error">
                        <!-- Display an error message to your customers here -->
                    </div>
                </div>
            </div>
            <div class="card mt-2">

                <div class="card-body">
                    <div style="border: 1px solid #CCC; padding: 10px 7px;">
                        <div id="payment-request-button" style=""></div>
                    </div>
                    <div id="payment_error1" class="payment_error">
                        <!-- Display an error message to your customers here -->
                    </div>
                </div>
            </div>

            @guest('web')
            <div class="auth_region">
                <input type="password" style="display: none">
                <h3 class="cart_header mt-4">CREATE AN ACCOUNT  PASSWORD</h3>
                <div class="form-floating mb-3">
                    <input type="password" autocomplete="off" class="form-control" id="new_password"
                        placeholder="Choose a Password">
                    <label for="new_password">Password</label>
                </div>
                <div style="font-size: 14px; color: #777">Your personal data will be used to process your order, support
                    your experience throughout this website, and for other purposes described in our <a
                        href="/privacy-policy" target="_blank">privacy policy.</a></div>
            </div>
            @endguest


            <div class="text-end mt-3"><button onclick="completePayment()" class="btn  btn-primary pay_btn py-3 px-4"> Complete Payment</button></div>




            <div class="card d-none mt-3">
                <div class="card-header">
                    <h4 class="cart_header2">Quick Payment </h4>
                </div>
                <div class="card-body">
                    <div id="express-checkout-element">
                        <!-- Express Checkout Element will be inserted here -->
                    </div>
                    <div id="payment_error2" class="payment_error">
                        <!-- Display an error message to your customers here -->
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-5 order-0 order-md-1">

            <div id="cfw-cart-summary" class="cart_summary" role="complementary">
                <div id="cfw-cart-summary-content">
                    <h3 class="cart_header">
                        YOUR QUOTE </h3>
                    <hr>
                    <div class="d-block d-md-none mb-3"><a class="view_summ_action">View Summary Details <i
                                class="fa fa-caret-down"></i></a></div>

                    <div id="cfw-checkout-before-order-review"></div>
                    <div class="d-none d-md-block  quotation_summ">
                        <table id="cfw-cart" class="cfw-module">
                            <tbody>
                                <tr class="cart-item-row cart-item-f4bc63535943868b6eab0ed53bff19e0 cart_item">



                                    <th class="cfw-cart-item-description">

                                        <div class="cfw-cart-item-data">
                                            <div class="variationx">
                                                <div class="dt">Registration Number:</div>
                                                <div class="dd">{{ $quote->reg_number }}</div>
                                                <div class="dt">Vehicle Make:</div>
                                                <div class="dd">{{ $quote->vehicle_make }}</div>
                                                <div class="dt">Vehicle Model:</div>
                                                <div class="dd">{{ $quote->vehicle_model }}</div>
                                                <div class="dt">Engine CC:</div>
                                                <div class="dd">{{ $quote->engine_cc }}</div>
                                                <div class="dt">Start Date:</div>
                                                <div class="dd">{{ date('d-m-Y', strtotime($quote->start_date)) }}
                                                </div>
                                                <div class="dt">Start Time:</div>
                                                <div class="dd">{{ $quote->start_time }}</div>
                                                <div class="dt">End Date:</div>
                                                <div class="dd">{{ date('d-m-Y', strtotime($quote->end_date)) }}</div>
                                                <div class="dt">End Time:</div>
                                                <div class="dd">{{ $quote->end_time }}</div>
                                                <div class="dt">Date of Birth:</div>
                                                <div class="dd">{{ date('d-m-Y', strtotime($quote->date_of_birth)) }}
                                                </div>
                                                <div class="dt">First Name(s):</div>
                                                <div class="dd">{{ $quote->first_name }}</div>
                                                @if (!empty($quote->middle_name))
                                                    <div class="dt">Middle Name(s):</div>
                                                    <div class="dd">{{ $quote->middle_name }}</div>
                                                @endif
                                                <div class="dt">Last Name:</div>
                                                <div class="dd">{{ $quote->last_name }}</div>
                                                <div class="dt">Licence Type:</div>
                                                <div class="dd">{{ $quote->licence_type }}</div>
                                                <div class="dt">Licence Held Duration:</div>
                                                <div class="dd">{{ $quote->licence_held_duration }}</div>
                                                <div class="dt">Vehicle Value:</div>
                                                <div class="dd">{{ $quote->vehicle_type }}</div>
                                            </div>
                                        </div>
                                        <div class="cfw_cart_item_after_data">
                                        </div>
                                    </th>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="cfw-totals-list" class="cfw-module d-none d-md-block  quotation_summ">
                        <table class="cfw-module table">

                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">£</span><span
                                                    class="cpw_subtotal">{{ number_format($quote->cpw, 2) }}</span></bdi></span>
                                    </td>
                                </tr>
                                <tr class="cart-discount d-none">
                                    <th>Discount</th>
                                    <td><span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">£</span><span
                                                    class="cpw_discount"></span></bdi></span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">£</span><span
                                                        class="cpw_total">{{ number_format($quote->cpw, 2) }}</span></bdi></span></strong>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade auth_modal" id="authModal" tabindex="-1" aria-labelledby="authModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="authModalLabel"><b>WELCOME BACK</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs mb-3 justify-content-center d-none" id="authTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                                type="button" role="tab" aria-controls="login" aria-selected="true">
                                Login
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                                type="button" role="tab" aria-controls="register" aria-selected="false">
                                Register
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="authTabContent">
                        <!-- Login Form -->
                        <div class="tab-pane fade show active" id="login" role="tabpanel"
                            aria-labelledby="login-tab">
                            <form onsubmit="loginForm(event)">
                                <p>Please enter your login details below.</p>
                                <div class="form-floating mb-3">
                                    <input style="padding-top: 32px !important" class="form-control" placeholder="Email address" name="username"
                                        id="username" required>
                                    <label for="username" class="form-label">Email Address</label>
                                </div>
                                <div class="form-floating  mb-3">
                                    <input style="padding-top: 32px !important" type="password" class="form-control" placeholder="Password" id="password"
                                        required>
                                    <label for="password" class="form-label">Password</label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberme">
                                        <label class="form-check-label" for="rememberme">Remember Me</label>
                                    </div>
                                    <a href="#"  data-bs-toggle="modal"
                                    data-bs-target="#fgetModal"  class="text-decoration-none">Forgot
                                        Password?</a>
                                </div>
                                <div class="sbutton"><button type="submit"
                                        class="btn btn-primary w-100 py-3 pay_btn">Login</button></div>
                            </form>
                        </div>

                        <!-- Register Form -->
                        <div class="tab-pane fade d-none" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form onsubmit="registerForm(event)">
                                <div class="mb-3">
                                    <label for="reg_first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="reg_first_name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="reg_last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="reg_last_name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="reg_email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="reg_email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="reg_password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="reg_password"
                                        required>
                                </div>
                                <div class="sbutton"><button type="submit"
                                        class="btn btn-success w-100 py-3 ">Register</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- FORGET Modal -->
    <div class="modal fade" id="fgetModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="authModalLabel">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">We will send a password reset link to your email address</div>
                    <form onsubmit="forgotForm(event)">
                        <div class="mb-3">
                            <label for="fgt_email" class="form-label">Email Address</label>
                            <input class="form-control" name="email" id="fgt_email" required>
                        </div>
                        <div class="sbutton"><button type="submit"
                                class="btn btn-primary w-100 py-3 pay_btn">Submit</button></div>
                    </form>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <style>
        .payment_indicator {
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0px;
            top: 0px;
            background: linear-gradient(to right, rgba(2, 2, 2, 0.7), rgba(2, 2, 2, 0.7));
            z-index: 999999;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #FFF;
            display: none;
        }

        .payment_indicator p {
            font-size: 18px;
        }
    </style>
    <div class="payment_indicator" id="payment_indicator">
        <div>
            <i class="fa fa-spin  fa-5x fa-spinner"></i>
            <p>Processing payment</p>
        </div>
    </div>
@endsection('content')



@push('js')
    {{-- extra jss files here --}}


    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const QUOTATION_ID = {{ $quote->id }};
        const CPW_AMOUNT_DEFAULT = {{ $quote->cpw }};
        let CPW_AMOUNT = {{ $quote->cpw }};

        let CLIENT_SECRET = "";

        let THIS_CFR_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');




        function showProgress(message) {
            $("#payment_indicator p").html(message);
            $("#payment_indicator").css('display', 'flex');
        }

        function closeProgress() {
            $("#payment_indicator p").html('');
            $("#payment_indicator").css('display', 'none');
        }

        function showError(n, message) {
            $(`#payment_error${n}`).html(message);
        }

        function closeError() {
            $(".payment_error").html('');
        }



        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/apikeys
        const stripe = Stripe('{{ config('services.stripe.public') }}', {
            locale: 'en-GB' // Set the locale to UK English
        });



        const appearance = {
            theme: 'stripe',
            variables: {
                borderRadius: '15px',
            }
        }


        const options = {
            paymentMethodTypes: ['link', 'card'], // Includes both Link and card payments
            paymentMethods: {
                amazonPay: 'auto',
                applePay: 'always',
                googlePay: 'always',
                link: 'auto'
            },
            mode: 'payment',
            amount: parseInt(CPW_AMOUNT * 100),
            currency: 'gbp',
            appearance: appearance // Optional appearance customization,

        };



        const expressCheckoutOptions = {
            buttonType: {
                applePay: 'buy',
                googlePay: 'buy',
                klarna: 'pay',
            }
        }


        // Initialize Stripe Elements
        const elements = stripe.elements(options);

        /*
        // Mount the Express Checkout Element for digital wallets
        const expressCheckoutElement = elements.create('expressCheckout', expressCheckoutOptions);
        expressCheckoutElement.mount('#express-checkout-element');


        expressCheckoutElement.on('click', (event) => {

            closeError();
            showProgress('Expreess checkout action in progress..');

            const options = {
                emailRequired: true,
                phoneNumberRequired: false
            };
            event.resolve(options);

        });


        // Cancel action
        expressCheckoutElement.on('cancel', () => {
            // elements.update({
            //     amount: 1099
            // })
            //CLIENT_SECRET = "";

            closeProgress();

        });



        expressCheckoutElement.on('confirm', async (event) => {
            const {
                error: submitError
            } = await elements.submit();
            if (submitError) {
                showError(2, submitError.message);
                closeProgress();
                return;
            }


            await getClientSecret();

            let client_secret = CLIENT_SECRET;



            if(! client_secret){
                closeProgress();
                return;
            }


            showProgress('Confirming Payment');

            const {
                error
            } = await stripe.confirmPayment({

                // `elements` instance used to create the Express Checkout Element
                elements,
                // `clientSecret` from the created PaymentIntent
                clientSecret: client_secret,
                confirmParams: {
                    return_url: "{{ url('/confirmed') }}",
                },
            });

            if (error) {
                // This point is only reached if there's an immediate error when
                // confirming the payment. Show the error to your customer (for example, payment details incomplete)
                showError(2, error.message);
                closeProgress();
            } else {
                // The payment UI automatically closes with a success animation.
                // Your customer is redirected to your `return_url`.
            }
        });

        */






        // Define custom styling for the Card Element
        const style = {
            base: {
                lineHeight: '29px',
                color: '#32325d', // Text color
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif', // Font family
                fontSize: '18px', // Font size
                '::placeholder': {
                    color: '#555', // Placeholder text color
                },
            },
            invalid: {
                color: '#fa755a', // Color for invalid input
                iconColor: '#fa755a', // Icon color for invalid input
            },
        };




        // Create and mount the Card Element for card payments
        const cardElement = elements.create('card', {
            style
        });
        cardElement.mount('#card-element'); // Add a div with id="card-element" in your HTML



        async function completePayment() {

            closeError();

            await getClientSecret();


            let client_secret = CLIENT_SECRET;

            if (client_secret) {

                showProgress('Confirming Payment');

                const {
                    error,
                    paymentIntent
                } = await stripe.confirmCardPayment(client_secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            email: $("#user_email").val().trim(),
                            name: $("#user_name").val().trim()
                        },
                    },
                    return_url: "{{ url('/confirmed') }}",
                });

                if (error) {
                    showError(1, error.message);
                    closeProgress();
                } else if (paymentIntent.status === 'succeeded') {

                    console.log(paymentIntent);

                    confirmCardPayment(paymentIntent.id);
                }
            } else {
                closeProgress();
            }
        }


        async function getClientSecret() {

            if (CLIENT_SECRET) {
                return CLIENT_SECRET;
            }

            CLIENT_SECRET = "";

            showProgress('Fetching Client Details');

            let fdata = {
                id: QUOTATION_ID
            };
            if ($("#new_email").length) {
                fdata["new_email"] = $("#new_email").val().trim();
                fdata["first_name"] = $("#new_first_name").val().trim();
                fdata["last_name"] = $("#new_last_name").val().trim();
                fdata["need_register"] = $("#new_last_name").length? "yes" : "";
                fdata["new_password"] = $("#new_password").val().trim();
            }


            try {
                const res = await fetch('/payment-intent', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', // Specify content type
                        'X-CSRF-TOKEN': THIS_CFR_TOKEN, // Add CSRF token
                    },
                    body: JSON.stringify(fdata), // Add body if required
                });

                if (!res.ok) {
                    // Handle HTTP errors (e.g., 4xx or 5xx responses)
                    // throw new Error();
                    closeError();
                    closeProgress();

                    // Parse response JSON to extract errors
                    const errorData = await res.json();

                    // Render errors using your `render_errors` function
                    render_errors(errorData, 'toast', $("body"));

                    // console.log(res);

                    // toastr.error(`Server error: ${res.status} ${res.statusText}`);

                    return "";
                }

                const {
                    client_secret: clientSecret,
                    user_name,
                    user_email,
                    token
                } = await res.json();

                if (!clientSecret) {
                    // Handle the case where the response does not include `client_secret`
                    closeError();
                    closeProgress();
                    toastr.error(`Client secret not returned in response`);

                    return "";
                } else {

                    if (clientSecret == "") {
                        // Refresh if it seems already paid
                        window.location.reload();
                    }
                    CLIENT_SECRET = clientSecret; // Set it here
                    if ($("#new_email").length) {
                        $("#user_email").val(user_email);
                        $("#user_name").val(user_name);
                        $(".auth_region").remove();

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        });

                        THIS_CFR_TOKEN = token;

                        $("#login_region").html(
                            `<div style="font-size: 16px;">Your account have been created, and you are currently logged in as  <b>${user_name}</b> (${user_email})</div>`
                            );


                    }

                }

                console.log('Client Secret:', clientSecret);

                // Proceed with your payment confirmation logic...
            } catch (error) {
                // Catch both network and server-side errors
                closeError();
                closeProgress();
                toastr.error(`Error: ${error.message}`);

                return "";

            }



            return CLIENT_SECRET;

        }


        async function confirmCardPayment(intent_id) {

            showProgress('Confirming Payment.  Please wait');


            const res = await fetch('/confirm-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', // Specify content type
                    'X-CSRF-TOKEN': THIS_CFR_TOKEN, // Add CSRF token
                },
                body: JSON.stringify({
                    intent_id
                }), // Add body if required
            });
            // alert();
            // Redirect
            let redirect_link = "{{ url('/confirmed') }}";
            window.location.href = redirect_link + "?payment_intent=" + intent_id;

        }

        document.addEventListener('DOMContentLoaded', async ()=>{
            const stripe = Stripe('{{ config('services.stripe.public') }}', {
                apiVersion: "2024-04-10",
            });
            //payment request
            const paymentRequest = stripe.paymentRequest({
                country: 'US',
                currency: 'gbp',
                total: {
                    label: 'Demo total',
                    amount: parseInt(CPW_AMOUNT * 100),
                },
                requestPayerName: true,
                requestPayerEmail: true,
            });
            const elements = stripe.elements();
            const prButton = elements.create('paymentRequestButton', {
            paymentRequest,
            });

            (async () => {
            // Check the availability of the Payment Request API first.
            const result = await paymentRequest.canMakePayment();
            if (result) {
                prButton.mount('#payment-request-button');
                console.log(result);
            } else {
                document.getElementById('payment-request-button').style.display = 'none';
            }
            })();

            paymentRequest.on('paymentmethod', async (e) => {
                //create a payment intent on the server
                const clientSecret = await getClientSecret()
                console.log("[clientSecret]", clientSecret);

                //confirm the payment on the client
                const {error, paymentIntent}=stripe.confirmCardPayment(
                    clientSecret, {
                    payment_method:e.paymentMethod.id
                    },
                    {
                    handleActions:false
                    }
                )

                if(error) {
                    toastr.error(`Client secret not returned in response`);
                    return
                }else{
                    toastr.success(`Payment successful`);
                    if(paymentIntent.status === 'requires_action'){
                        stripe.confirmCardPayment(clientSecret)
                    }
                }


            })


        })



    </script>
@endpush
