<?php
class Application_Form_Register extends Zend_Form {
	public function __construct($options = null) {
		parent::__construct($options);
		 
		$this->setName('register')
		->setMethod('post');
		 
		$username = new Zend_Form_Element_Text('username');
		$username->setLabel('username');
		$username->class="formTextElement";
		 
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('password');
		$password->class="formTextElement";
		 
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('full name');
		$name->class="formTextElement";
		 
		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('Email');
		$email->class="formTextElement";
		
		$goodat = new Zend_Form_Element_Text('goodat');
		$goodat->setLabel('I good at: ');
		$goodat->class="formTextElement";
		 
		$submit = new Zend_Form_Element_Submit('register');
		$submit->setLabel('register');
		
		 
		 
		$this->addElements(array($username, $password, $name, $email,$goodat, $submit));
	}
}