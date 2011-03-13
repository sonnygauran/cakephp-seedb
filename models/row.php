<?php
class Row extends AppModel {
    var $name = 'Row';
    var $displayField = 'name';
    var $useDbConfig = 'plain_mysql';
    var $useTable = false;
    var $_schema = array(
            'id' => array(
                            'type' => 'string',
                            'null' => 'false',
                            'key' => 'primary',
                            'length' => 32
            ),
            'name' => array(
                            'type' => 'string',
                            'null' => 'false',
                            'key' => 'primary',
                            'length' => 255
            ),
            'type' => array(
                            'type' => 'string',
                            'null' => 'false',
                            'key' => 'primary',
                            'length' => 32
            ),
            'null' => array(
                            'type' => 'string',
                            'null' => 'false',
                            'key' => 'primary',
                            'length' => 32
            ),
            'default' => array(
                            'type' => 'string',
                            'null' => 'false',
                            'key' => 'primary',
                            'length' => 32
            ),
            'length' => array(
                            'type' => 'string',
                            'null' => 'false',
                            'key' => 'primary',
                            'length' => 32
            ),
            'key' => array(
                            'type' => 'string',
                            'null' => 'false',
                            'key' => 'primary',
                            'length' => 32
            ),
    );
    var $belongsTo = array(
            'Table' => array(
                            'className' => 'Table',
                            'foreignKey' => 'table_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            )
    );
}
?>
