<?php
/* Stocks Test cases generated on: 2010-02-16 09:02:13 : 1266313873*/
App::import('Controller', 'Stocks');

class TestStocksController extends StocksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StocksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.stock', 'app.item', 'app.condition');

	function startTest() {
		$this->Stocks =& new TestStocksController();
		$this->Stocks->constructClasses();
	}

	function endTest() {
		unset($this->Stocks);
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