<?php
class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'SeeDB',
		'password' => 'SeeDB',
		'database' => 'SeeDB',
	);
        var $plain_mysql = array(
            'datasource' => 'plain_mysql',
            'login' => 'SeeDB',
            'password' => 'SeeDB',
        );
}
?>