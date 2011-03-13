<?php

class SeedbController extends AppController {
    var $uses = array('Seedb','Database');
    var $helpers = array('Form');

    function index(){
        $databases = $this->Database->find('all');

        if (!$this->Session->check('Database.index'))
            $this->Session->write('Database.index', $databases);
        
        $index = $this->Session->read('Database.index');
        $difference = $this->Seedb->array_compare($index, $databases);
        if (!empty($difference)){

            debug($this->Seedb->array_compare(
                $index,
                $databases
            ));
            $this->Session->write('Database.index', $databases);
        }
        $this->set(compact('databases'));
    }
    /**
     * Interprets commands and stores valid sql
     * commands in the session as SeeDB.commands
     */
    function interpret(){
        if ($this->data != null){
            // Here, we supply the USE statement
            // to the commands when the session
            // has a selected database.
            $database = null;
            if ($this->Session->check('Database.selected')){
                $database = $this->Session->read('Database.selected');
            $this->data['Seedb']['commands'] =
                    "USE {$database['name']};\n".
                    $this->data['Seedb']['commands'];
            }
            $_queries = explode(';', $this->data['Seedb']['commands']);
            unset($_queries[count($_queries)-1]); // unset the last item, produced by the last semicolon

            $queries = array();
            // Prepare queries to be identified
            foreach ($_queries as $query){
                $queries[] = array(
                    'type' => null,
                    'valid' => false,
                    'done' => false,
                    'command' => trim($query.';') // return the semicolon then trim
                );
            }
            
            $expectedCommands = array(
                'use'=>'/USE|use [A-Za-z0-9]+;/',
                'show databases'=>'/SHOW|show DATABASES|databases;/',
                'show tables'=>'/SHOW|show TABLES|tables;/',
                //'create table'=>'/CREATE|create TABLE|table [A-Za-z][A-Za-z0-9]* ?\(([A-Za-z0-9]+ (int|char|date|tinyint)( (NOT)?\,?)+\);/',
            );

            $commands = null;
            $commands_ctr = 0;
            $matches = array();
            foreach($queries as $qCount => $query){
                foreach($expectedCommands as $commandName => $expectedCommandFormat ){
                    if (preg_match($expectedCommandFormat, $query['command'], $matches)){
                        $query['type'] = $commandName;
                        $query['valid'] = true;
                    }
                    $commands[$qCount] = $query;
                }
            }
            $this->Session->write('SeeDB.commands',$commands);
        }
        $this->redirect(array('action' => 'index'));
    }
    function clear(){
//        $this->Session->delete('Database.selected');
        $this->Session->delete('SeeDB.commands');
        $this->Session->setFlash(sprintf(__('%s cleared', true), 'Commands'));
        $this->redirect($this->_root);
    }
    /**
     * Executes all the SeeDB.commands found
     * on the session. Use run() to specify by command
     * number.
     */
    function execute(){
        
    }

    /**
     * Executes commands by singles.
     * @param <type> $index The index of the command
     *      found via the session variable SeeDB.command
     *      passed by SeeDB.plugin.jquery at /
     */
    function run($index = null, $ajax = null){
        if ($ajax == 'true')
            $this->layout = 'ajax';

        if ($this->Session->check('SeeDB.commands')){
            $commands = $this->Session->read('SeeDB.commands');
            debug($commands[$index]);
        }
    }
}
?>