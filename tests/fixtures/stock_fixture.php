<?php
/* Stock Fixture generated on: 2010-02-16 09:02:12 : 1266313872 */
class StockFixture extends CakeTestFixture {
	var $name = 'Stock';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'condition_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'item_id' => 1,
			'condition_id' => 1
		),
	);
}
?>