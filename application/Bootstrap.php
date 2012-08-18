<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload() {
		$this->bootstrap('layout');
		$layout = $this->getResource('layout'); /* @var $layout Zend_Layout_Controller_Plugin_Layout */
		$layout->setLayout('main');
		$autoLoader = new Zend_Application_Module_Autoloader(array(
    	    'namespace' => '',
        	'basePath' => APPLICATION_PATH,
    	));
     
	    // set the user role
	    if (Zend_Auth::getInstance()->hasIdentity()) {
    	    $role = Model_MyAcl::USER;
    		} else {
        			$role = Model_MyAcl::GUEST;
    		}
    		Zend_Registry::set('role', $role);
     
	    // register acl and accessCheck
	    $acl = new Model_MyAcl();
    	Zend_Controller_Front::getInstance()->registerPlugin(new Plugin_AccessCheck($acl));
     
	    return $autoLoader;
	}

}

