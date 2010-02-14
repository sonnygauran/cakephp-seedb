<?php

class SeedbController extends AppController {
    var $uses = array('Database');
    var $helpers = array('Form');

    function index(){
        $databases = $this->Database->find('all');
        $this->set(compact('databases'));
    }
    /**
     * Interprets commands and stores valid sql
     * commands in the session as SeeDB.commands
     */
    function interpret(){
        if ($this->data != null){
            $queries = array();
            $_queries = explode(';', $this->data['Seedb']['commands']);
            
            unset($_queries[count($_queries)-1]); // unset the last item, produced by the last semicolon

            // Prepare queries to be identified
            foreach ($_queries as $query){
                $queries[] = array(
                    'type' => null,
                    'command' => trim($query).';' // trim and then return the semicolon
                );
            }
            
            $expectedCommands = array(
                'use'=>'/(USE|use) [A-Za-z0-9]+;/',
                'show databases'=>'/(SHOW|show) (DATABASES|databases);/',
                'show tables'=>'/(SHOW|show) (TABLES|tables);/',
            );

            $commands = null;
            $matches = array();
            foreach($queries as $query){
                foreach($expectedCommands as $commandName => $expectedCommandFormat ){
                    if (preg_match($expectedCommandFormat, $query['command'], $matches)){
                        $query['type'] = $commandName;
                        $commands[] = $query;
                    }
                }
            }

            $this->Session->write('SeeDB.commands',$commands);
        }
        $this->redirect(array('action' => 'index'));
    }
}
?>
