<?php
namespace App\Http\Controller;

/**
 * @property \App\Model\Bookmark $Bookmark
 * @property \Origin\Http\Controller\Component\SessionComponent $Session
 * @property \Origin\Http\Controller\Component\CookieComponent $Cookie
 */
class PagesController extends ApplicationController
{
    public $layout = 'default';

    public function display()
    {
        $args = func_get_args();
    
        $count = count($args);
        if (!$count) {
            return $this->redirect('/');
        }
   
        return $this->render(implode('/', $args));
    }
}
