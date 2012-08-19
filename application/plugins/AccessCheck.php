<?php
class Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract {
    /**
     * @var Zend_Acl
     */
    private $acl = null;
     
    public function __construct(Zend_Acl $acl) {
        $this->acl = $acl;
    }
     
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        $resource = strtolower($request->getControllerName());
        $action = strtolower($request->getActionName());
        $params = $request->getParams();
         
        $role = Zend_Registry::get('role');
        try {
            if (! $this->acl->isAllowed($role, $resource, $action)) {
                $request->setControllerName('Login')
                        ->setActionName('index')
                        ->setParams($params);
            }
        } catch (Exception $e) {
            $request->setControllerName('Error')
                    ->setActionName('index')
                    ->setParams($params);
        }
    }
}