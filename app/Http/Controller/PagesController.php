<?php
declare(strict_types = 1);
namespace App\Http\Controller;

/**
 * This is an optional controller for serving static page content. For example
 * /pages/about_us will load the view file View/Pages/about_us.ctp
 *
 *  Router::add('/pages/*', ['controller'=>'Pages','action'=>'display']);
 */

class PagesController extends ApplicationController
{
    protected $layout = 'default';

    public function display()
    {
        $args = func_get_args();
    
        $count = count($args);
        if (! $count) {
            return $this->redirect('/');
        }
   
        return $this->render(implode('/', $args));
    }
}
