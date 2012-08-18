<?php 
class UsersController extends Zend_Controller_Action {
     
    public function indexAction() {
    	$this->_helper->_layout->setLayout('user'); //other-layout.phtml	
    }
    
}