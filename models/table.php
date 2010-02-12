<?php
class Table extends AppModel {
	var $name = 'Table';
	var $displayField = 'name';
        var $useDbConfig = 'plain_mysql';
        var $useTable = false;
        
	//The Associations below have been created with all possible keys, those that are not needed can be removed
        var $_schema = array(
                'id' => array(
                                'type' => 'string',
                                'null' => 'false',
                                'key' => 'primary',
                                'length' => 11
                ),
                'name' => array(
                                'type' => 'string',
                                'null' => 'false',
                                'key' => 'primary',
                                'length' => 255
                ),
                'database_id' => array(
                                'type' => 'integer',
                                'null' => 'false',
                                'key' => 'primary',
                                'length' => 11
                ),
        );

        var $belongsTo = array(
                'Database' => array(
                                'className' => 'Database',
                                'foreignKey' => 'database_id',
                                'conditions' => '',
                                'fields' => '',
                                'order' => ''
                )
        );
}
?>