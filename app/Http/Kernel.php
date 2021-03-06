<?php

namespace Rahasi\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Rahasi\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Rahasi\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'sentry.auth' => \Sentinel\Middleware\SentryAuth::class,
        'sentry.admin' => \Sentinel\Middleware\SentryAdminAccess::class,
        'sentry.member' => \Sentinel\Middleware\SentryMember::class,
        'sentry.guest' => \Sentinel\Middleware\SentryGuest::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'apiguard' => \Chrisbjr\ApiGuard\Http\Middleware\ApiGuard::class,
    ];
}
