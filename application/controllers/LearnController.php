<?php 
class LearnController extends Zend_Controller_Action {
     
    public function indexAction() {
    	$this->_helper->_layout->setLayout('user'); //other-layout.phtml
    	$classes = new Application_Model_Classes_Classes();
    	$this->view->classes = $classes->fetchAll();
    	
    }
}