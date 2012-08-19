<?php
 
class Application_Model_Users_Table extends Zend_Db_Table_Abstract {
    protected $_name = 'users';
    protected $_rowClass = 'Application_Model_Users_Row';
     
    /**
     * @param string $username
     * @param string $password
     * @param string $name
     * @param string $email
     * @return Model_Users_Row
     */
    public function insertNewUser($username,$password, $name, $email,$goodat) {
        $user = $this->createRow(); /* @var $user Model_Users_Row */
         
        $user->setUsername($username)
             ->setPassword($password)
             ->setName($name)
             ->setEmail($email)
             ->setGoodat($goodat)
             ->save();
 
        return $user;
    }
    
    public function updateUser(){
    	
    }
    
    public function getUser($id)
    {
    	$id = (int)$id;
    	$row = $this->fetchRow('id = ' . $id);
    	if (!$row) {
    		throw new Exception("Could not find row $id");
    	}
    	return $row->toArray();
    }
}