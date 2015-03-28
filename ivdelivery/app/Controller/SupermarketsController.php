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
        $this->Auth->allow('index', 'view', 'choosemarket', 'home');
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
		if ($this->Auth->login()) {
		    $this->redirect($this->request->referer());
		} else {
				//return false;
			$this->Session->setFlash(__('Auth fialed'));
		}
		//debug($this->request->data);
		$this->Session->setFlash(__('Invalid username or password, try again'));
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
