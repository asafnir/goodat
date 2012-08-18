<?php

class ClassesController extends Zend_Controller_Action {
    public function indexAction() {
    	
    	
    	 
    }
    
    function classAction(){
    	$id = $this->_getParam('id', 0);
    	$classes = new Application_Model_Classes_Classes();
    	$class=$classes->getClass($id);
    	$this->view->class = $class;
    	$userid=$class['userid'];
    
    	
    }
    
    
    function addAction()
    {
    	$auth = Zend_Auth::getInstance();
    	
    	$form = new Application_Form_Addclass();
    	$form->submit->setLabel('Add Class');
    	$this->view->form = $form;
    	if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		if ($form->isValid($formData)) {
    			
    			$title = $form->getValue('title');
    			$category = $form->getValue('category');
    			$description = $form->getValue('description');
    			$location = $form->getValue('location');
    			$userid=$auth->getStorage()->read()->id;
    			
    			$classes = new Application_Model_Classes_Classes();
    			$classes->addClass($title,$category,$description,$location,$userid);
    			$this->_helper->redirector('users');
    		} else {
    			$form->populate($formData);
    		}
    	}
    }
}