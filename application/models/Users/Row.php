<?php
class Application_Model_Users_Row extends Zend_Db_Table_Row_Abstract {
     
    protected $_tableClass = 'Application_Model_Users_Table';
     
    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
     
    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }
     
    /**
     * @return string
     */
    public function getName() {
    	return $this->name;
    }
     
    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }
    
    /**
     * @return string
     */
    public function getEmail() {
    	return $this->email;
    }
    
    /**
     * @return string
     */
    public function getGoodat() {
    	return $this->goodat;
    }
     
    /**
     * @param string $username
     * @return Model_Users_Row
     */
    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }
    
    /**
     * @param string $name
     * @return Model_Users_Row
     */
    public function setName($name) {
    	$this->name = $name;
    	return $this;
    }
     
    /**
     * @param string $goodat
     * @return Model_Users_Row
     */
    public function setGoodat($goodat) {
    	$this->goodat = $goodat;
    	return $this;
    }

    /**
     * @param string $email
     * @return Model_Users_Row
     */
    public function setEmail($email) {
    	$this->email = $email;
    	return $this;
    }
    
    /**
     * @param string $categoryId
     * @return Model_Users_Row
     */
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }
}