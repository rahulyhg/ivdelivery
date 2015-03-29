<?php
App::uses('AppController', 'Controller');
/**
 * Supermarkets Controller
 *
 * @property Supermarket $Supermarket
 * @property PaginatorComponent $Paginator
 */
class SupermarketsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'home');
    }

	public function isAuthorized($user) {
	    // All registered users can add posts
		return true;
	    if ($this->action === 'index') {
		return true;
	    }
	    return parent::isAuthorized($user);
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Supermarket->recursive = 0;
		$this->set('supermarkets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Supermarket->exists($id)) {
			throw new NotFoundException(__('Invalid supermarket'));
		}
		$options = array('conditions' => array('Supermarket.' . $this->Supermarket->primaryKey => $id));
		$this->set('supermarket', $this->Supermarket->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Supermarket->create();
			if ($this->Supermarket->save($this->request->data)) {
				$this->Session->setFlash(__('The supermarket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supermarket could not be saved. Please, try again.'));
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
		if (!$this->Supermarket->exists($id)) {
			throw new NotFoundException(__('Invalid supermarket'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Supermarket->save($this->request->data)) {
				$this->Session->setFlash(__('The supermarket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supermarket could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Supermarket.' . $this->Supermarket->primaryKey => $id));
			$this->request->data = $this->Supermarket->find('first', $options);
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
		$this->Supermarket->id = $id;
		if (!$this->Supermarket->exists()) {
			throw new NotFoundException(__('Invalid supermarket'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Supermarket->delete()) {
			$this->Session->setFlash(__('The supermarket has been deleted.'));
		} else {
			$this->Session->setFlash(__('The supermarket could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * index method
 *
 * @return void
 */
	public function home() {
 		$this->layout = 'newhome';
		$this->Supermarket->recursive = 0;
		$this->set('supermarkets', $this->Paginator->paginate());
		if ($this->request->is('post')) {
			//debug($this->request->data);
			//return false;
			if (isset($this->request->data['btn1'])){
					unset($this->request->data['btn1']);
					unset($this->request->data['log']);
					unset($this->request->data['User'][1]);
					$data = $this->request->data['User'][0];
					unset($this->request->data['User'][0]);
					$this->request->data['User'] = $data;
					$password = $this->request->data['User']['password'];
					unset($this->request->data['User']['password']);
					$this->request->data['User']['password'] = $password;
					//debug($this->request->data);
					//return false;
					//$data = $this->request->data['User'][0];
					//$userdata = $data;
					//debug($userdata);
					//$this->loadModel('Users');
					if ($this->Auth->login()) {
						return $this->redirect(array('controller' => 'Supermarkets', 'action' => 'home'));
					} else {
									$this->Session->setFlash(__('Nawwww'));


					}
			
			}
			if (isset($this->request->data['btn2'])){
					unset($this->request->data['btn2']);
					unset($this->request->data['log']);
					$data = $this->request->data['User'][1];
					unset($this->request->data['User'][0]);
					unset($this->request->data['User'][1]);
					$this->request->data['User'] = $data;
					$this->loadModel('User');
					$this->User->create();
					if ($this->User->save($this->request->data)) {
									$this->Session->setFlash(__('Success'));
									return $this->redirect(array('controller' => 'Supermarkets', 'action' => 'index'));

					} else {
									//$this->User->validationErrors;
									//$this->set('validationErrorsArray', $this->User->invalidFields());
									$this->User[1]->validate;
									//return false;
									//$this->redirect($this->request->referer());
									//$this->Session->setFlash(__('Nawwww'));
									//return $this->User->invalidFields();
									//return false;


					}

					//debug($this->request->data);
					//return false;
					//$userdata = array('User' => $data);

			}
			//return false;
			
	    }
	}

/**
 * index method
 *
 * @return void
 */
	public function choosemarket() {
  		$this->layout = 'BoostCake.supermarkets';
		$this->Supermarket->recursive = 0;
		$this->set('supermarkets', $this->Paginator->paginate());
	}


/**
 * index method
 *
 * @return void
 */
	public function about() {
 		$this->layout = 'home';
		$this->Supermarket->recursive = 0;
		$this->set('supermarkets', $this->Paginator->paginate());
	}


/**
 * index method
 *
 * @return void
 */
	public function pricing() {
 		$this->layout = 'home';
		$this->Supermarket->recursive = 0;
		$this->set('supermarkets', $this->Paginator->paginate());
	}


/**
 * index method
 *
 * @return void
 */
	public function contactus() {
 		$this->layout = 'home';
		$this->Supermarket->recursive = 0;
		$this->set('supermarkets', $this->Paginator->paginate());
	}


/**
 * index method
 *
 * @return void
 */
	public function termsprivacy() {
 		$this->layout = 'boots';
		$this->Supermarket->recursive = 0;
		$this->set('supermarkets', $this->Paginator->paginate());
	}



}
