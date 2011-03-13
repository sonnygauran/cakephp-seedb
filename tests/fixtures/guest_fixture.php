<?php
/* Guest Fixture generated on: 2010-04-10 11:04:16 : 1270898956 */
class GuestFixture extends CakeTestFixture {
	var $name = 'Guest';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'time_arrived' => array('type' => 'time', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'time_arrived' => '11:29:16'
		),
	);
}
?>