<?php
class Application_Form_Addclass extends Zend_Form
{
    public function init()
    {
        $this->setName('Class');
        
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
       
        $userid = new Zend_Form_Element_Hidden('userid');
        $userid->addFilter('Int');
        
        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Title')
              ->setRequired(true)
			  ->addFilter('StripTags')
			  ->addFilter('StringTrim')
			  ->addValidator('NotEmpty');
        $title->class="formTextElement";

        $category = new Zend_Form_Element_Select('category');
        $category->setLabel('category')
        		 ->setRequired(true)
        		 ->addFilter('StripTags')
        		 ->addFilter('StringTrim')
        		 ->addValidator('NotEmpty');
        $table = new Application_Model_Classes_Category();
        foreach ($table->findForSelect() as $c) {
        	$category->addMultiOption($c->id, $c->name);
        }
        $category->class="formTextElement";
        
        
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('description')
        			->setRequired(true)
        			->addFilter('StripTags')
        			->addFilter('StringTrim')
        			->addValidator('NotEmpty')
        			->setAttrib('cols', '40')
        			->setAttrib('rows', '4')
        			->setAttrib('size', '10');
        $description->class="formTextElement";
        
        $location = new Zend_Form_Element_Text('location');
        $location->setLabel('location')
        		 ->setRequired(true)
        		 ->addFilter('StripTags')
        		 ->addFilter('StringTrim')
        		 ->addValidator('NotEmpty');
        $location->class="formTextElement";
        
        
        
       
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($title,$category,$description,$location,$userid,$submit));
    }
}