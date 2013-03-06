<?php

// application/models/GroupMapper.php

class Application_Model_GroupMapper
{
    protected $_dbTable;
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Group');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Group $group)
    {
        $data = array(
            'firstName'   => $group->getFirstName(),
            'lastName' => $group->getLastName(),
            'email' => $group->getEmail(),
            'phone' => $group->getPhone(),
            'street' => $group->getStreet(),
            'city' => $group->getCity(),
            'state' => $group->getState(),
            'zipcode' => $group->getZipcode()
        );
 
        if (null === ($id = $group->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_Group $group)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $group->setId($row->id)
              ->setFirstName($row->firstName)
              ->setLastName($row->lastName)
              ->setEmail($row->email)
			  ->setPhone($row->phone)
			  ->setStreet($row->street)
			  ->setCity($row->city)
			  ->setState($row->state)
			  ->setZipcode($row->zipcode);
		return $group;
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Group();
            $entry->setId($row->id)
	              ->setFirstName($row->firstName)
	              ->setLastName($row->lastName)
	              ->setEmail($row->email)
				  ->setPhone($row->phone)
				  ->setStreet($row->street)
				  ->setCity($row->city)
				  ->setState($row->state)
				  ->setZipcode($row->zipcode);
            $entries[] = $entry;
        }
        return $entries;
    }
}

