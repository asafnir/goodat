<?php
 
class LogoutController extends Zend_Controller_Action
{
    public function indexAction() {
        // clear identity
        Zend_Auth::getInstance()->clearIdentity();
         
        // redirect back to main page
        $this->_redirect('/');
    }
}