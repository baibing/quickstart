<?php

class Application_Form_GroupLeader extends Zend_Form_SubForm
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
		
		// Add trim filter to all elements
		$this->setElementFilters(array('StringTrim'));
 
        // Add an firstName element
        $this->addElement('text', 'firstName', array(
            'label'      => 'First Name:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
 
        // Add an lastName element
        $this->addElement('text', 'lastName', array(
            'label'      => 'Last Name:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));

        // Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'Email:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));
 
        // Add an cellphone element
        $this->addElement('text', 'phone', array(
            'label'      => 'Cell Phone:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));

        // Add an street element
        $this->addElement('text', 'street', array(
            'label'      => 'Street:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));

        // Add an city element
        $this->addElement('text', 'city', array(
            'label'      => 'City:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));

        // Add an state element
        $state = new Zend_Form_Element_Select('state', array(
			'label' => 'State:',
			'required' => TRUE
		));
		$state->addMultiOptions(array(
			"AK" => "AK",
			"AL" => "AL",
			"AR" => "AR",
			"AZ" => "AZ",
			"CA" => "CA",
			"CO" => "CO",
			"CT" => "CT",
			"DC" => "DC",
			"DE" => "DE",
			"FL" => "FL",
			"GA" => "GA",
			"HI" => "HI",
			"IA" => "IA",
			"ID" => "ID",
			"IL" => "IL",
			"IN" => "IN",
			"KS" => "KS",
			"KY" => "KY",
			"LA" => "LA",
			"MA" => "MA",
			"MD" => "MD",
			"ME" => "ME",
			"MI" => "MI",
			"MN" => "MN",
			"MO" => "MO",
			"MS" => "MS",
			"MT" => "MT",
			"NC" => "NC",
			"ND" => "ND",
			"NE" => "NE",
			"NH" => "NH",
			"NJ" => "NJ",
			"NM" => "NM",
			"NV" => "NV",
			"NY" => "NY",
			"OH" => "OH",
			"OK" => "OK",
			"OR" => "OR",
			"PA" => "PA",
			"RI" => "RI",
			"SC" => "SC",
			"SD" => "SD",
			"TN" => "TN",
			"TX" => "TX",
			"UT" => "UT",
			"VA" => "VA",
			"VT" => "VT",
			"WA" => "WA",
			"WI" => "WI",
			"WV" => "WV",
			"WY" => "WY"
		));
		$this->addElement($state);
        $this->populate(array('state' => "TX"));
        
        // Add an zipcode element
        $this->addElement('text', 'zipcode', array(
            'label'      => 'Zipcode:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
    }


}

