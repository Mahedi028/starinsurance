<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppAdminController;
use App\Http\Controllers\Admin\AppUserController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\EntityController;



Route::get('/', [PageController::class, 'index']);
Route::get('/features', [PageController::class, 'features']);
Route::get('/about-us', [PageController::class, 'aboutUs']);
Route::get('/contact', [PageController::class, 'contact']);
Route::post('/contact', [AuthController::class, 'contactUs']);
Route::get('/customer-terms-of-business', [PageController::class, 'customerTermsOfBusiness']);

Route::get('/privacy-policy', [PageController::class, 'privacyPolicy']);
Route::get('/cookies', [PageController::class, 'cookies']);
Route::get('/website-terms-of-use', [PageController::class, 'websiteTermsOfUse']);
Route::get('/claims', [PageController::class, 'claims']);
Route::post('/claims', [AuthController::class, 'sendClaims']);

Route::get('/my-account', [PageController::class, 'myAccount']);





Route::get('/policy/get-quote', [PageController::class, 'policyGetQuote']);
Route::post('/policy/get-quote', [PageController::class, 'processQuote']);

Route::get('/checkout', [PageController::class, 'checkout']);


Route::post('/promo-code', [PageController::class, 'getPromoCode']);
Route::post('/payment-intent', [StripeController::class, 'paymentIntent']);
Route::post('/confirm-payment', [StripeController::class, 'confirmPayment']);


// ==========  ROUTE ONLY AVAILABLE TO LOGIN USERS   ============
Route::middleware(['auth'])->group(function () {

    
    Route::get('/my-account/orders', [UserController::class, 'orders']);
    
    Route::get('/my-account/edit-account', [UserController::class, 'editAccount']);
    Route::post('/my-account/edit-account', [UserController::class, 'updateAccount']);

    Route::get('/my-account/logout', [UserController::class, 'logout']);

    Route::get('/my-account/policy/{id}', [UserController::class, 'getPolicy']);

    Route::get('/my-account/insurace-certificate/{policy_number}', [UserController::class, 'policyCertificate']);

    

});

Route::get('/confirmed', [StripeController::class, 'confirmed']);




// ==========  ROUTE ONLY AVAILABLE TO NON LOGIN USERS   ============
Route::middleware(['unauth'])->group(function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

    Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordPage']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);

});






Route::prefix('admin')->group(function () {


    // Authentication
    Route::middleware(['unadmin'])->group(function () {
        Route::get('/login', [AdminAuthController::class, 'loginPage']);
        Route::post('/login', [AdminAuthController::class, 'login']);
        Route::post('/login-2fa', [AdminAuthController::class, 'login2fa']);
        
        Route::get('/forgot-password', [AdminAuthController::class, 'forgotPasswordPage']);
        Route::post('/forgot-password', [AdminAuthController::class, 'forgotPassword']);

        Route::get('/reset-password/{token}', [AdminAuthController::class, 'resetPasswordPage']);
        Route::post('/reset-password', [AdminAuthController::class, 'resetPassword']);

    });


    // Routes without the 'auth' middleware
    Route::middleware(['auth:admin'])->group(function () {

        //Route::view('/', 'admin.index');
        Route::get('/', [AdminController::class, 'index']);

        Route::get('/optimize', function () {
            Artisan::call('optimize:clear');
            Artisan::call('optimize');
            return "App optimized";
        });


        Route::get('/admins', [AppAdminController::class, 'index']);
        Route::get('/admins/data', [AppAdminController::class, 'data']);
        Route::post('/admins', [AppAdminController::class, 'addAdmin']);
        Route::patch('/admins', [AppAdminController::class, 'updateAdmin']);
        Route::delete('/admin/{admin_id}', [AppAdminController::class, 'deleteAdmin']);


        Route::get('/users', [AppUserController::class, 'index']);
        Route::get('/users/data', [AppUserController::class, 'data']);  
        Route::patch('/users', [AppUserController::class, 'updateUser']);
        Route::delete('/user/{user_id}', [AppUserController::class, 'deleteUser']);

        

        Route::get('/policies', [PolicyController::class, 'index']);
        Route::get('/policies/data', [PolicyController::class, 'data']);
        Route::delete('/policies/cancel/{id}', [PolicyController::class, 'cancelPolicy']);
        Route::delete('/policies/refund/{id}', [PolicyController::class, 'refundPolicy']);
        Route::delete('/policies/{id}', [PolicyController::class, 'deletePolicy']);


        Route::get('/coupons', [CouponController::class, 'index']);
        Route::get('/coupons/data', [CouponController::class, 'data']);  
        Route::post('/coupons', [CouponController::class, 'addCoupon']);
        Route::patch('/coupons', [CouponController::class, 'updateCoupon']);
        Route::delete('/coupons/{id}', [CouponController::class, 'deleteCoupon']);

        



        Route::get('/update-password', [AdminController::class, 'showChangePassword']);
        Route::post('/update-password', [AdminController::class, 'updatePassword']);


        Route::get('/logout', [AdminController::class, 'logout']);

    });

});
