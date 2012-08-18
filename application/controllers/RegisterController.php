<?php
 
class RegisterController extends Zend_Controller_Action {
    public function indexAction() {
    	$form = new Application_Form_Register();
         
        $request = $this->getRequest();
        if ($request->isPost()) {
            $params = $request->getParams();
            if ($form->isValid($params)) {
                $usersTable = new Application_Model_Users_Table();
                $usersTable->insertNewUser($params['username'],
                                           $params['password'],
                                           $params['name'],
                                           $params['email'],
                						   $params['goodat']);
                 
                $this->_redirect('/');
            }
        }
         
        $this->view->form = $form;
    }
}