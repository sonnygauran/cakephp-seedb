<?php
/* Conditions Test cases generated on: 2010-02-16 09:02:58 : 1266313858*/
App::import('Controller', 'Conditions');

class TestConditionsController extends ConditionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ConditionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.condition', 'app.stock');

	function startTest() {
		$this->Conditions =& new TestConditionsController();
		$this->Conditions->constructClasses();
	}

	function endTest() {
		unset($this->Conditions);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>