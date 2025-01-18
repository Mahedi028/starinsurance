<?php

use App\Http\Middleware\HandleUnAdminAuthorized;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\HandleUnAuthorized;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware->alias([
            'unauth' => HandleUnauthorized::class,
            'unadmin' => HandleUnAdminAuthorized::class,
        ]);


        $middleware->redirectGuestsTo(function ($request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'not authenticated.'], 401);
            }
        
            // Determine the referer URL
            $refererUrl = $request->headers->get('referer') ?? '';
            $targetUrl = Redirect::intended('/')->getTargetUrl();
        
            // Check if the user is accessing an admin page
            $isAdminRoute = str_contains($targetUrl, '/admin') || str_contains($refererUrl, '/admin');
        
            if ($isAdminRoute) {
                $redirectUrl = str_contains($targetUrl, '/admin') ? $targetUrl : $refererUrl;
                $encodedRedirectUrl = urlencode($redirectUrl);
                return "/admin/login?redirect={$encodedRedirectUrl}";
            }
        
            // Default redirect for non-admin pages
            return '/my-account';
        });

        
        $middleware->validateCsrfTokens(except: [
            'stripe/*',
            '/api/*',
        ]);


    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
