<?php
App::uses('AppController', 'Controller');
/**
 * Drivers Controller
 *
 * @property Driver $Driver
 * @property PaginatorComponent $Paginator
 */
class DriversController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Driver->recursive = 0;
		$this->set('drivers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Driver->exists($id)) {
			throw new NotFoundException(__('Invalid driver'));
		}
		$options = array('conditions' => array('Driver.' . $this->Driver->primaryKey => $id));
		$this->set('driver', $this->Driver->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Driver->create();
			if ($this->Driver->save($this->request->data)) {
				$this->Session->setFlash(__('The driver has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The driver could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Driver->exists($id)) {
			throw new NotFoundException(__('Invalid driver'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Driver->save($this->request->data)) {
				$this->Session->setFlash(__('The driver has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The driver could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Driver.' . $this->Driver->primaryKey => $id));
			$this->request->data = $this->Driver->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Driver->id = $id;
		if (!$this->Driver->exists()) {
			throw new NotFoundException(__('Invalid driver'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Driver->delete()) {
			$this->Session->setFlash(__('The driver has been deleted.'));
		} else {
			$this->Session->setFlash(__('The driver could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
