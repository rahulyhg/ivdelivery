<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'login', 'logout', 'index', 'edit', 'signup', 'home');
    }


	public function isAuthorized($user) {
	    // All registered users can add posts
	    if ($this->action === 'view') {
		return true;
	    }
	    return parent::isAuthorized($user);
	}

	public function login() {

		$id = AuthComponent::user('id');
		//debug($id);
		if (isset($id)) {
				return $this->redirect(array('controller' => 'Users', 'action' => 'home'));
		}


		        $this->layout = 'boots';
		        //$lastRoute = $this->router->referer();


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
										//$this->Session->setFlash(__('Successfully Logged In', 'alert alert-success'));
										return $this->redirect($this->Auth->redirect());
									} else {
													$this->Session->setFlash(__('Failed Logged In', 'alert alert-danger'));


									}
							
							}
							if (isset($this->request->data['btn2'])){
									unset($this->request->data['btn2']);
									unset($this->request->data['log']);
									unset($this->request->data['User'][0]);
									$data = $this->request->data['User'][1];
									unset($this->request->data['User'][1]);
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
										//$this->Session->setFlash(__('Successfully Logged In', 'alert alert-success'));
										return $this->redirect($this->Auth->redirect());
									} else {
													$this->Session->setFlash(__('Failed Logged In', 'alert alert-danger'));


									}

									//debug($this->request->data);
									//return false;
									//$userdata = array('User' => $data);

							}
							//return false;
							
					    }




	}

	public function logout() {
		//$this->Session->setFlash(__('Logged out', 'alert alert-success'));
	    return $this->redirect($this->Auth->logout());
	}


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
        	$this->layout = 'boots';
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        	$this->layout = 'boots';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->layout = 'BoostCake.generic';
		if ($this->request->is('post')) {
			$this->User->create();
			$this->User->create();
			debug($this->request->data);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
        	$this->layout = 'boots';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * add method
 *
 * @return void
 */
	public function signup() {
		$id = AuthComponent::user('id');
		//debug($id);
		if (isset($id)) {
				return $this->redirect(array('controller' => 'Users', 'action' => 'home'));
		}

        $this->layout = 'boots';

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
								//$this->Session->setFlash(__('Successfully Logged In', 'alert alert-success'));
								return $this->redirect(array('controller' => 'Users', 'action' => 'home'));
							} else {
											$this->Session->setFlash(__('Failed Logged In', 'alert alert-danger'));


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
											//$this->Session->setFlash(__('Successful Registration and Login!', 'alert alert-success'));
											//debug('a');
											if ($this->Auth->login()) {
												//debug('b');
												return $this->redirect(array('controller' => 'Users', 'action' => 'home'));
											}
							} else {
											//$this->User->validationErrors;
											//$this->set('validationErrorsArray', $this->User->invalidFields());
											$this->User->validate;
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

			}
		}



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function pastorders($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function openorders($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}


/**
 * index method
 *
 * @return void
 */
	public function adminindex() {
        $this->layout = 'boots';
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}




/**
 * index method
 *
 * @return void
 */
	public function home() {
 		$this->layout = 'userhome';
		//$this->Supermarket->recursive = 0;
		$this->set('supermarkets', $this->Paginator->paginate());
		$id = $this->Auth->user('id');
		//debug($id);
		//return false;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));

		if ($this->request->is('post')) {
			//debug($this->request->data);
			//return false;
			//if (isset($this->request->data['btn1'])){
					/* unset($this->request->data['btn1']);
					unset($this->request->data['log']);
					unset($this->request->data['User'][1]);
					$data = $this->request->data['User'][0];
					unset($this->request->data['User'][0]);
					$this->request->data['User'] = $data;
					$password = $this->request->data['User']['password'];
					unset($this->request->data['User']['password']);
					$this->request->data['User']['password'] = $password; */
					//debug($this->request->data);
					//return false;
					//$data = $this->request->data['User'][0];
					//$userdata = $data;
					//debug($userdata);
					//$this->loadModel('Users');
					if ($this->Auth->login()) {
						$this->Session->setFlash(__('Successfully Logged In', 'alert alert-success'));
						return $this->redirect(array('controller' => 'Supermarkets', 'action' => 'home'));
					} else {
									$this->Session->setFlash(__('Failed Logged In', 'alert alert-danger'));


					}
			
			//}
		
			//return false;
			
	    }
	}




}
