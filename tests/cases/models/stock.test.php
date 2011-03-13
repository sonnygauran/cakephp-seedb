<?php
/* Stock Test cases generated on: 2010-02-16 09:02:12 : 1266313872*/
App::import('Model', 'Stock');

class StockTestCase extends CakeTestCase {
	var $fixtures = array('app.stock', 'app.item', 'app.condition');

	function startTest() {
		$this->Stock =& ClassRegistry::init('Stock');
	}

	function endTest() {
		unset($this->Stock);
		ClassRegistry::flush();
	}

}
?>