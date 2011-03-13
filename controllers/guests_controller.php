<?php
class GuestsController extends AppController {

	var $name = 'Guests';
	var $helpers = array('Fomr');
	function index() {
		$this->Guest->recursive = 0;
		$this->set('guests', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'guest'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('guest', $this->Guest->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Guest->create();
			if ($this->Guest->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'guest'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'guest'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'guest'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Guest->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'guest'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'guest'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Guest->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'guest'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Guest->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Guest'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Guest'));
		$this->redirect(array('action' => 'index'));
	}
}
?>