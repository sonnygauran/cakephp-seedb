<?php
/* Guests Test cases generated on: 2010-04-10 11:04:17 : 1270898957*/
App::import('Controller', 'Guests');

class TestGuestsController extends GuestsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GuestsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.guest');

	function startTest() {
		$this->Guests =& new TestGuestsController();
		$this->Guests->constructClasses();
	}

	function endTest() {
		unset($this->Guests);
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