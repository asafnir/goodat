<?php
class Zend_View_Helper_LoggedUser extends Zend_View_Helper_Abstract {
    public function loggedUser() {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $name = $auth->getStorage()->read()->name;
            return 'Hello ' . $name . ' | <a href="/Logout" >LogOut</a>'.' | <a href="/Edituser">Edit User</a>';
        }
         
        return 'Hello Gust | <a href="/Login" >Login</a> | <a href="/Register" class="registerLink" >Register</a>';
    }
}