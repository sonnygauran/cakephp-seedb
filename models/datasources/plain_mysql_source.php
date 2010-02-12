<?php

App::import('Datasource','DboSource');
App::import('Datasource','DboMysql');

class PlainMysqlSource extends DboMysql {
    var $cacheSources = false;
    var $_schema = array(
            'databases' => array(
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
            ),
            'tables' => array(
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
            )
    );
    
    public function  __construct($config = array()) {
        parent::__construct($config);
    }

    public function listSources() {
        return parent::listSources();
    }

    public function read($model, $queryData = array()) {
        $databases = $this->_getDatabases();
        $model->tableToModel = array('tables' => 'Table', 'databases' =>'Database');
        switch ($model->name) {
            case 'Database':
                switch ($model->findQueryType) {
                    case 'first':
                        $me[] = $databases[$queryData['conditions']['Database.id']-1];
                        return $me;
                        break;
                    case 'all':
                        return $databases;
                        break;
                    case 'count':
                        return count($databases);
                        break;
                    default:
                        return $databases;
                        break;
                }
                break;
            case 'Table':
                $tables = array();
                foreach ($databases as $database) {
                    $database_tables = $this->_getTables($database);
                    foreach($database_tables as $table) {
                        $tables[] = $table;
                    }
                }
                switch ($model->findQueryType) {
                    case 'all':
                        return $tables;
                        break;
                    case 'count':
                        return count($tables);
                        break;
                    case 'first':
                        $result = array();

                        foreach($tables as $table) {
                            if ($table['Table']['id'] == $queryData['conditions']['Table.id']) {
                                $result[] = $table;

//                                 If Rows are needed, these can be useful
//                                $this->query('USE '.$table['Database']['name']);
//                                debug(parent::describe($table['Table']['name']));
                            }
                        }

                        return $result;
                        break;
                    default:
                        return $databases;
                        break;
                }
                break;
        }
        return array();
    }

    public function describe($model) {
        return $this->_schema[Inflector::tableize($model->name)];
    }

    /**
     * @return array databases visible to the current mysql user
     */
    public function _getDatabases() {
        $results = array();
        $databases = Set::extract('/SCHEMATA/Database', $this->query('SHOW DATABASES'));
        $counter_db = 1;
        foreach($databases as $database) {
            $current = array (
                    'Database'=>array (
                            'id' => $counter_db++,
                            'name' => $database
                    ),
            );
            $tables = $this->_getTables($current);
            foreach($tables as $table) {
                $current['Table'][] = $table['Table'];
            }
            $results[] = $current;
        }
        return $results;
    }

    public function _getTables($database) {
        $return = array();

        $database_id = $database['Database']['id'];
        $database_name = $database['Database']['name'];

        // Select the current database
        $this->query('USE '.$database_name);

        // Show tables in the selected db
        $items = $this->query('SHOW TABLES');
        $tables = Set::extract('/TABLE_NAMES/Tables_in_'.$database_name, $items);

        $counter_tables = 1;
        foreach($tables as $table) {
            $current['Table'] = array(
                    'id' => $database_id.'-'.$counter_tables++,
                    'name' => $table,
                    'database_id' =>$database_id,
            );
            $current['Database'] = $database['Database'];
            $return[] = $current;
        }

        return $return;
    }
}
?>
