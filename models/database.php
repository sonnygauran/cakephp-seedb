<?php
class Database extends AppModel {
	var $name = 'Database';
	var $displayField = 'name';
        var $useDbConfig = 'plain_mysql';
        var $useTable = false;

	//The Associations below have been created with all possible keys, those that are not needed can be removed
        var $_schema = array(
                'id' => array(
                                'type' => 'integer',
                                'null' => 'false',
                                'key' => 'primary',
                                'length' => 11
                ),
                'name' => array(
                                'type' => 'string',
                                'null' => 'false',
                                'key' => 'primary',
                                'length' => 255
                )
        );
        var $hasMany = array(
                'Table' => array(
                                'className' => 'Table',
                                'foreignKey' => 'database_id',
                                'dependent' => false,
                                'conditions' => '',
                                'fields' => '',
                                'order' => '',
                                'limit' => '',
                                'offset' => '',
                                'exclusive' => '',
                                'finderQuery' => '',
                                'counterQuery' => ''
                )
	);
   
}
?>