<?php
class LoginController extends Zend_Controller_Action {
     
    public function indexAction() {
        $form = new Application_Form_Login();
         
        $request = $this->getRequest();
        if ($request->isPost()) {
            $request = $this->getRequest();
            if ($form->isValid($request->getPost())) {
                $username = $request->getParam('username');
                $password = $request->getParam('password');
                 
                $authAdapter = $this->getAuthAdapter();
                $authAdapter->setIdentity($username)
                            ->setCredential($password);
                             
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
                 
                if ($result->isValid()) {
                    $identity = $authAdapter->getResultRowObject();
                    $authStorage = $auth->getStorage()->write($identity);
                     
                    $this->_redirect('/Users');
                } else {
                    $this->view->errorMessage = 'Password or user name incorrect';
                }
            }
        }
         
        $this->view->form = $form;
    }
     
    /**
     * @return Zend_Auth_Adapter_DbTable
     */
    private function getAuthAdapter() {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('users')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password');
        return $authAdapter;
    }
}