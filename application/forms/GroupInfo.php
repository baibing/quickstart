<?php

class Application_Form_GroupInfo extends Zend_Form_SubForm
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
		
		// Add trim filter to all elements
		$this->setElementFilters(array('StringTrim'));
 
        // Add an name element
        $this->addElement('text', 'name', array(
            'label'      => 'Group Name:',
            'required'   => true,
        ));

        // Add an type element
        $type = new Zend_Form_Element_Select('type', array(
			'label' => 'Group Type:',
			'required' => TRUE
		));
		$type->addMultiOptions(array(
			"9th - 12th Grade" => "9th - 12th Grade",
			"8th Grade" => "8th Grade",
			"7th Grade" => "7th Grade",
			"6th Grade and Below" => "6th Grade and Below",
			"After School Club" => "After School Club",
			"Aggie Affiliated Club or Organization" => "Aggie Affiliated Club or Organization",
			"Business Representatives" => "Business Representatives",
			"Church Youth Group" => "Church Youth Group",
			"Church Adult Group" => "Church Adult Group",
			"College Transfer Students" => "College Transfer Students",
			"Conference/Workshop Attendees" => "Conference/Workshop Attendees",
			"Elected Officials" => "Elected Officials",
			"Former Students" => "Former Students",
			"Governmental Official" => "Governmental Official",
			"Non-profit Organization" => "Non-profit Organization",
			"Prospective Graduate Students" => "Prospective Graduate Students",
			"Senior Citizens Group" => "Senior Citizens Group",
			"Tourist Group" => "Tourist Group",
			"University Department Guests" => "University Department Guests",
			"University Faculty/Staff" => "University Faculty/Staff",
			"Other" => "Other"
		));
		$this->addElement($type);
 
        // Add an studentSize element
        $studentSize = new Zend_Form_Element_Text('studentSize', array(
            'label'      => 'Enter the number of students in your party:',
            'required'   => TRUE			
		));
		$validator = new Zend_Validate_Between(
			array(
				'min' => 15,
				'max' => 75,
				'inclusive' => TRUE
			)
		);
		$studentSize->addValidator($validator);
        $this->addElement($studentSize);
 
        // Add an adultSize element
        $this->addElement('text', 'adultSize', array(
            'label'      => 'Enter the number of adults in your party:',
            'required'   => true,
        ));

        // Add an totalSize element
        $this->addElement('text', 'totalSize', array(
            'label'      => 'Enter the size of your party:',
            'required'   => true,
        ));

        // Add an payment element
        $payment = new Zend_Form_Element_Radio('payment', array(
			'label' => 'Lunch Payment Method',
			'required' => TRUE
		));
		$payment->addMultiOptions(array(
			"Individual" => "Individual",
			"School Payment" => "School Payment"
		));
		$this->addElement($payment);
 
        // Add an parking element
        $parking = new Zend_Form_Element_Radio('parking', array(
			'label' => 'Bus Parking:',
			'required' => TRUE
		));
		$parking->addMultiOptions(array(
			TRUE => "Yes",
			FALSE => "No"
		));
		$this->addElement($parking);
        
        // Add an busName element
        $this->addElement('text', 'busName', array(
            'label'      => 'Name on Bus:',
            'required'   => true,
        ));
    }


}

