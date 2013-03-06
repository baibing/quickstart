<?php

class Application_Form_Group extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
		
		// Add trim filter to all elements
		$this->setElementFilters(array('StringTrim'));
		
		$leaderForm = new Application_Form_GroupLeader();
		$infoForm = new Application_Form_GroupInfo();
		$this->addSubForm($infoForm, 'groupInfo');
		$this->addSubForm($leaderForm, 'groupLeader');		
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Continue',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }


}

