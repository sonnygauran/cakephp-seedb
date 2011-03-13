<?php
/* Guest Test cases generated on: 2010-04-10 11:04:17 : 1270898957*/
App::import('Model', 'Guest');

class GuestTestCase extends CakeTestCase {
	var $fixtures = array('app.guest');

	function startTest() {
		$this->Guest =& ClassRegistry::init('Guest');
	}

	function endTest() {
		unset($this->Guest);
		ClassRegistry::flush();
	}

}
?>