<?php
/* Condition Test cases generated on: 2010-02-16 09:02:58 : 1266313858*/
App::import('Model', 'Condition');

class ConditionTestCase extends CakeTestCase {
	var $fixtures = array('app.condition', 'app.stock');

	function startTest() {
		$this->Condition =& ClassRegistry::init('Condition');
	}

	function endTest() {
		unset($this->Condition);
		ClassRegistry::flush();
	}

}
?>