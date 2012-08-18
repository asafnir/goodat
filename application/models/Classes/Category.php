<?php
class Application_Model_Classes_Category extends Zend_Db_Table_Abstract
{
    protected $_name = 'category'; 
    
    public function findForSelect()
    {
    	$select = $this->select();
    	$select->order('order');
    	return $this->fetchAll($select);
    }
}