<?php

class Application_Model_GroupInfoMapper
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
            $this->setDbTable('Application_Model_DbTable_GroupInfo');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_GroupInfo $groupInfo)
    {
        $data = array(
            'name'   => $groupInfo->getName(),
            'type' => $groupInfo->getType(),
            'studentSize' => $groupInfo->getStudentSize(),
            'adultSize' => $groupInfo->getAdultSize(),
            'totalSize' => $groupInfo->getTotalSize(),
            'payment' => $groupInfo->getPayment(),
            'parking' => $groupInfo->getParking(),
            'busName' => $groupInfo->getBusName()
        );
 
        if (null === ($id = $groupInfo->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_GroupInfo $groupInfo)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $groupInfo->setId($row->id)
              	  ->setName($row->name)
              	  ->setType($row->type)
              	  ->setStudentSize($row->studentSize)
			  	  ->setAdultSize($row->adultSize)
			  	  ->setTotalSize($row->totalSize)
			  	  ->setPayment($row->payment)
			  	  ->setParking($row->parking)
			  	  ->setBusName($row->busName);
		return $groupInfo;
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_GroupInfo();
            $entry->setId($row->id)
              	  ->setName($row->name)
              	  ->setType($row->type)
              	  ->setStudentSize($row->studentSize)
			  	  ->setAdultSize($row->adultSize)
			  	  ->setTotalSize($row->totalSize)
			  	  ->setPayment($row->payment)
			  	  ->setParking($row->parking)
			  	  ->setBusName($row->busName);
            $entries[] = $entry;
        }
        return $entries;
    }
}

