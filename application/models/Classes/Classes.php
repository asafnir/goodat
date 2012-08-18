<?php 
class Application_Model_Classes_Classes extends Zend_Db_Table_Abstract
{
    protected $_name = 'classes';
   
	public function getClass($id) 
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();    
    }
    
    public function getClassByUserId($id)
    {
    	$id = (int)$id;
    	$row = $this->fetchRow('userid = ' . $id);
    	if (!$row) {
    		throw new Exception("Could not find row $id");
    	}
    	return $row->toArray();
    }
    
	public function addClass($title,$category,$description,$location,$userid)
    {
        $data = array(
            'title' => $title,
        	'category'=>$category,
        	'description'=>$description,
        	'location'=>$location,
        	'userid'=>$userid	
        );
        $this->insert($data);
    }
public function updateClass($title,$category,$description,$location)
    {
        $data = array(
            'title' => $title,
        	'category'=>$category,
        	'description'=>$description,
        	'location'=>$location 	
        );
        $this->update($data, 'id = '. (int)$id);
    }
public function deleteClass($id)
    {
        $this->delete('id =' . (int)$id);
    }
}