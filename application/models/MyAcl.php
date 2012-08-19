<?php
class Model_MyAcl extends Zend_Acl {
    const GUEST = 0;
    const USER  = 1;
     
    public function __construct() {
        $this->addRole(new Zend_Acl_Role(self::GUEST));
        $this->addRole(new Zend_Acl_Role(self::USER), self::GUEST);
         
        // add resources
        $this->addResource(new Zend_Acl_Resource('error'))
             ->addResource(new Zend_Acl_Resource('index'))
             ->addResource(new Zend_Acl_Resource('register'))
             ->addResource(new Zend_Acl_Resource('login'))
             ->addResource(new Zend_Acl_Resource('logout'))
             ->addResource(new Zend_Acl_Resource('users'))
        	 ->addResource(new Zend_Acl_Resource('teach'))
             ->addResource(new Zend_Acl_Resource('classes'))
        	 ->addResource(new Zend_Acl_Resource('learn'))
        	 ->addResource(new Zend_Acl_Resource('add'));
             
              
        // privileges
        $this->allow(self::GUEST, array('error', 'index', 'register', 'login'));
        $this->allow(self::USER, array('users', 'logout','teach','classes','learn','add'));
    }
}