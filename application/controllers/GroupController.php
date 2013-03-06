<?php

class GroupController extends Zend_Controller_Action {

	public function init() {
		/* Initialize action controller here */
	}

	public function indexAction() {
		// Zend_Debug::dump($_POST);
		
		// display all the records
		$groupLeaderMapper = new Application_Model_GroupMapper();
		$this -> view -> leaderEntries = $groupLeaderMapper -> fetchAll();
		$groupInfoMapper = new Application_Model_GroupInfoMapper();
		$this -> view -> infoEntries = $groupInfoMapper -> fetchAll();

		// generate the form
		$request = $this -> getRequest();
		$form = new Application_Form_Group();
		$leaderForm = $form->getSubForm('groupLeader');
		$infoForm = $form->getSubForm('groupInfo');

		if ($this -> getRequest() -> isPost()) {
			if ($leaderForm -> isValid($request -> getPost())) {
				$leaderValue = $leaderForm->getValues();
				$group = new Application_Model_Group($leaderValue['groupLeader']);
				$mapper = new Application_Model_GroupMapper();
				$mapper -> save($group);
			}
			if ($infoForm -> isValid($request -> getPost())) {
				$infoValue = $infoForm -> getValues();
				$group = new Application_Model_GroupInfo($infoValue['groupInfo']);
				// print_r($infoForm -> getValues());echo "<br>";
				// print_r($infoValue['groupInfo']); echo "<br>";
				// print_r($group);
				$mapper = new Application_Model_GroupInfoMapper();
				$mapper -> save($group);
				return $this -> _helper -> redirector('index');
			}
		}

		$this -> view -> form = $form;
	}

}
