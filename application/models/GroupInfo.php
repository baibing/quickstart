<?php

class Application_Model_GroupInfo {
	protected $_id;
	protected $_name;
	protected $_type;
	protected $_studentSize;
	protected $_adultSize;
	protected $_totalSize;
	protected $_payment;
	protected $_parking;
	protected $_busName;

	public function __construct(array $options = null) {
		if (is_array($options)) {
			$this -> setOptions($options);
		}
	}

	public function __set($name, $value) {
		$method = 'set' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid group information property');
		}
		$this -> $method($value);
	}

	public function __get($name) {
		$method = 'get' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid group information property');
		}
		return $this -> $method();
	}

	public function setOptions(array $options) {
		$methods = get_class_methods($this);
		foreach ($options as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (in_array($method, $methods)) {
				$this -> $method($value);
			}
		}
		return $this;
	}

	public function setId($id) {
		$this -> _id = (int)$id;
		return $this;
	}

	public function getId() {
		return $this -> _id;
	}

	public function setName($name) {
		$this -> _name = (string)$name;
		return $this;
	}

	public function getName() {
		return $this -> _name;
	}

	public function setType($type) {
		$this -> _type = (string)$type;
		return $this;
	}

	public function getType() {
		return $this -> _type;
	}

	public function setStudentSize($studentSize) {
		$this -> _studentSize = (int)$studentSize;
		return $this;
	}

	public function getStudentSize() {
		return $this -> _studentSize;
	}

	public function setAdultSize($adultSize) {
		$this -> _adultSize = (int)$adultSize;
		return $this;
	}

	public function getAdultSize() {
		return $this -> _adultSize;
	}

	public function setTotalSize($totalSize) {
		$this -> _totalSize = (int)$totalSize;
		return $this;
	}

	public function getTotalSize() {
		return $this -> _totalSize;
	}

	public function setPayment($payment) {
		$this -> _payment = $payment;
		return $this;
	}

	public function getPayment() {
		return $this -> _payment;
	}

	public function setParking($parking) {
		$this -> _parking = $parking;
		return $this;
	}

	public function getParking() {
		return $this -> _parking;
	}

	public function setBusName($busName) {
		$this -> _busName = $busName;
		return $this;
	}

	public function getBusName() {
		return $this -> _busName;
	}

}
