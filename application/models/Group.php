<?php
class Application_Model_Group {
	protected $_id;
	protected $_firstName;
	protected $_lastName;
	protected $_email;
	protected $_phone;
	protected $_street;
	protected $_city;
	protected $_state;
	protected $_zipcode;

	public function __construct(array $options = null) {
		if (is_array($options)) {
			$this -> setOptions($options);
		}
	}

	public function __set($name, $value) {
		$method = 'set' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid group registration property');
		}
		$this -> $method($value);
	}

	public function __get($name) {
		$method = 'get' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid group registration property');
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

	public function setFirstName($firstName) {
		$this -> _firstName = (string)$firstName;
		return $this;
	}

	public function getFirstName() {
		return $this -> _firstName;
	}

	public function setLastName($lastName) {
		$this -> _lastName = (string)$lastName;
		return $this;
	}

	public function getLastName() {
		return $this -> _lastName;
	}

	public function setEmail($email) {
		$this -> _email = (string)$email;
		return $this;
	}

	public function getEmail() {
		return $this -> _email;
	}

	public function setPhone($phone) {
		$this -> _phone = (int)$phone;
		return $this;
	}

	public function getPhone() {
		return $this -> _phone;
	}

	public function setStreet($street) {
		$this -> _street = $street;
		return $this;
	}

	public function getStreet() {
		return $this -> _street;
	}

	public function setCity($city) {
		$this -> _city = $city;
		return $this;
	}

	public function getCity() {
		return $this -> _city;
	}

	public function setState($state) {
		$this -> _state = $state;
		return $this;
	}

	public function getState() {
		return $this -> _state;
	}

	public function setZipcode($zipcode) {
		$this -> _zipcode = (int)$zipcode;
		return $this;
	}

	public function getZipcode() {
		return $this -> _zipcode;
	}

}
