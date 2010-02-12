<?php
class TablesController extends AppController {

	var $name = 'Tables';
        var $helpers = array('Form');
	function index() {
		$this->Table->recursive = 0;
		$this->set('tables', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'table'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('table', $this->Table->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
                        debug($this->data);
//			$this->Table->create();
//			if ($this->Table->save($this->data)) {
//				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'table'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'table'));
//			}
		}
		$databases = $this->Table->Database->find('list');
		$this->set(compact('databases'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'table'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
//			if ($this->Table->save($this->data)) {
//				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'table'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'table'));
//			}
		}
		if (empty($this->data)) {
			$this->data = $this->Table->read(null, $id);
		}
		$databases = $this->Table->Database->find('list');
		$this->set(compact('databases'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'table'));
			$this->redirect(array('action'=>'index'));
		}
//		if ($this->Table->delete($id)) {
//			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Table'));
//			$this->redirect(array('action'=>'index'));
//		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Table'));
		$this->redirect(array('action' => 'index'));
	}
}
?>