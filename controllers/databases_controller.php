<?php
class DatabasesController extends AppController {

	var $name = 'Databases';
        var $helpers=array('Form','Session');

	function index() {
		$this->Database->recursive = 0;
		$this->set('databases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'database'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('database', $this->Database->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
                        debug($this->data);
//			$this->Database->create();
//			if ($this->Database->save($this->data)) {
//				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'database'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'database'));
//			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'database'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
//			if ($this->Database->save($this->data)) {
//				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'database'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'database'));
//			}
		}
		if (empty($this->data)) {
			$this->data = $this->Database->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'database'));
			$this->redirect(array('action'=>'index'));
		}
//		if ($this->Database->delete($id)) {
//			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Database'));
//			$this->redirect(array('action'=>'index'));
//		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Database'));
		$this->redirect(array('action' => 'index'));
	}

        function select($id = null) {
                if (!$id) {
                        $this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'database'));
                        $this->redirect(array('action'=>'/'));
                }
                if ($this->Database->select($id)) {
                        $this->Session->setFlash(sprintf(__('%s now selected', true), 'Database'));
                        $this->Session->write('Database.selected', $id);
                        $this->redirect(array('action'=>'/'));
                }
                $this->Session->setFlash(sprintf(__('%s was not selected', true), 'Database'));
                $this->redirect(array('action' => '/'));
        }
}
?>