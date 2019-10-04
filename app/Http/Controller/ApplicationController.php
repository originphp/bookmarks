<?php
namespace App\Http\Controller;

use Origin\Http\Controller\Controller;
use Origin\I18n\I18n;

/**
 * @property \Origin\Http\Controller\Component\SessionComponent $Session
 * @property \Origin\Http\Controller\Component\CookieComponent $Cookie
 * @property \Origin\Http\Controller\Component\AuthComponent $Auth
 */
class ApplicationController extends Controller
{
    /**
     * This is called immediately after construct, so you don't have
     * to overload it. Load and configure components, helpers etc.
     */
    public function initialize() : void
    {
        /**
         * Configure your locale settings here. OriginPHP ships with en_US and en_GB locales
         * by default. For others you can run the following command and it will create the locale
         * settings in config/locale.
         * $ bin/console locale:generate zh-CN ru-RU fr-FR es-ES de-DE it-IT ja-JP
         */
        I18n::initialize(['locale'=>'en_US','language'=>'en','timezone'=>'UTC']);
    }

    /**
     * This is called before the controller action is executed but after initialize.
     */
    public function startup()
    {
    }

    /**
     * This is called after the controller action is executed, and view has been rendered
     * but before it has been sent to the client.
     */
    public function shutdown()
    {
    }
}
