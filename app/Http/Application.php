<?php
/**
 * Application
 * Configure any middleware here
 */
declare(strict_types = 1);
namespace App\Http;

use Origin\Http\BaseApplication;

use Origin\Http\Middleware\CsrfProtectionMiddleware;
use Origin\Http\Middleware\MaintenanceModeMiddleware;
use Origin\Http\Middleware\SessionMiddleware;

class Application extends BaseApplication
{
    /**
     * Setup middlewares here
     *
     * Example:
     *
     * $this->loadMiddleware('RequestModifier');
     * $this->loadMiddleware(RequestModifierMiddleware::class);
     * $this->loadMiddleware('MyPlugin.RequestModifier')
     */
    protected function initialize() : void
    {
        // Load first
        $this->loadMiddleware(SessionMiddleware::class);

        $this->loadMiddleware(CsrfProtectionMiddleware::class, [
            'tokenLength' => 32,  // CSRF token length 128 bits (16 bytes) is the recommended minimum
            'singleUse' => true   // Disable for applications that use AJAX requests or mutliple tabs
        ]);
        $this->loadMiddleware(MaintenanceModeMiddleware::class);
    }
}
