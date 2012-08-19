<?php 
class Application_Form_Login extends Zend_Form {

public function __construct($options = null) {
    		parent::__construct($options);
    		 
    		$this->setName('login')
    		->setMethod('post');
    		 
    		$username = new Zend_Form_Element_Text('username');
    		$username->setLabel('UserName');
    		$username->class="formTextElement";
    		
    		 
    		$password = new Zend_Form_Element_Password('password');
    		$password->setLabel('Password');
    		$password->class="formTextElement";
    		
    		$submit = new Zend_Form_Element_Submit('login');
    		$submit->setLabel('Login');
    		 
    		 
    		$this->addElements(array($username, $password, $submit));
    	}
}    	 