<?php 
class UsersController extends Zend_Controller_Action {
     
    public function indexAction() {
    	$this->_helper->_layout->setLayout('user'); //other-layout.phtml	
    }
    
  	function editAction(){
        $form = new Application_Form_Register();
        $this->view->form = $form;
		if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
                $username = $form->getValue('username');
                $email = $form->getValue('email');
                $users = new Application_Model_Users_Table();
                $users->updateUser($id, $username, $email);
				$this->_helper->redirector('index');
            } else {
                	$form->populate($formData);
            		}
        } else {
            	$id = $this->_getParam('id', 0);
            	if ($id > 0) {
                	$albums = new Application_Model_Users_Table();
                	$form->populate($users->getUser($id));
            		}
        		}
    	}
    }