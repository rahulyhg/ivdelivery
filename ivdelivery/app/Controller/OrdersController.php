<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('placeorder', 'index');
    }

	public function isAuthorized($user) {
	    // All registered users can add posts
	    if ($this->action === 'placeorder') {
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
		$this->layout = 'confirmation';		
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
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
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$users = $this->Order->User->find('list');
		$drivers = $this->Order->Driver->find('list');
		$items = $this->Order->Item->find('list');
		$this->set(compact('users', 'drivers', 'items'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$users = $this->Order->User->find('list');
		$drivers = $this->Order->Driver->find('list');
		$items = $this->Order->Item->find('list');
		$this->set(compact('users', 'drivers', 'items'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('The order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function placeorder($id = null) {
		$this->layout = 'boots';
		//$this->layout = 'BootStrap.boots';
		$this->loadModel('Supermarket');
		if (!$this->Supermarket->exists($id)) {
			throw new NotFoundException(__('Invalid supermarket'));
		}
		$options = array('conditions' => array('Supermarket.' . $this->Supermarket->primaryKey => $id));
		$this->set('supermarket', $this->Supermarket->find('first', $options));
		
		$users = $this->Order->User->find('list');
		$drivers = $this->Order->Driver->find('list');
		//$currentdriver = $drivers[0];
		//debug($currentdriver);
		///debug($drivers);
		$items = $this->Order->Item->find('list');
		$authuserid = $this->Auth->user('id');
		//$this->set('authUser', $this->Auth->user()); 
		//debug($authUser);
		$this->set(compact('users', 'drivers', 'items', 'authuserid'));
         	$cartData = $this->Session->read('cart');
		$this->set('cartData', $cartData);		
		if ($this->request->is('post')) {


			debug($this->request->data);
			
			$orderData = $this->request->data['Order'];
			$orderItemsData = $this->request->data['OrdersItem'];
			$paymentData = $this->request->data['Payment'];
		
			if ($this->Session->write('Order', $orderData)) {
				return true;
			}
			return false;
			
			$this->Order->create();
			//$this->Order->OrdersItem->create();
			if ($this->Order->placeNewOrder($this->request->data)) {
			//if ($this->Order->placeNewOrder($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				//debug($this->Order->validationErrors);
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
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
	public function confirmorder($id = null) {
		$this->layout = 'boots';
		$this->loadModel('Supermarket');
		if (!$this->Supermarket->exists($id)) {
			throw new NotFoundException(__('Invalid supermarket'));
		}
		$options = array('conditions' => array('Supermarket.' . $this->Supermarket->primaryKey => $id));
		$this->set('supermarket', $this->Supermarket->find('first', $options));
		
		$users = $this->Order->User->find('list');
		$drivers = $this->Order->Driver->find('list');
		//$currentdriver = $drivers[0];
		//debug($currentdriver);
		///debug($drivers);
		$items = $this->Order->Item->find('list');
		$authuserid = $this->Auth->user('id');
		$this->set('currentUser', $this->Auth->user());
		//$this->set('authUser', $this->Auth->user()); 
		//debug($authUser);
		$this->set(compact('users', 'drivers', 'items', 'authuserid'));
         	$cartData = $this->Session->read('cart');
         	$sessionOrderData = $this->Session->read('Order');

		$this->set('cartData', $cartData);		
		$this->set('sessionOrderData', $sessionOrderData);		

		if ($this->request->is('post')) {
			//debug($this->request->data);
			
			//$orderData = $this->request->data['Order'];
			$orderItemsData = $this->Session->read('cart');
			$paymentData = $this->request->data['Payment'];
		
		//	if ($this->Session->write('Order', $sessionOrderData)) {
			
				$this->Order->create();
				//$this->Order->OrdersItem->create();
				if ($this->Order->saveNewOrder($sessionOrderData, $orderItemsData, $paymentData)) {
				//if ($this->Order->placeNewOrder($this->request->data)) {
					$newOrderId=$this->Order->id;
					$this->Session->setFlash(__('The order has been saved.'));
					$this->Session->delete('cart');
					$this->Session->delete('Order');
					return $this->redirect(array('action' => 'receipt', 'supermarketid' => $id, 'orderid' => $newOrderId));
				} else {
					//debug($this->Order->validationErrors);
					$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
				}
		/*	} else {
					$this->Session->setFlash(__('The order could not be saved. Please, try again. Session Error.'));

			} */
		}


	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function enterdetails($id = null) {
		$this->layout = 'boots';
		$this->loadModel('Supermarket');
		if (!$this->Supermarket->exists($id)) {
			throw new NotFoundException(__('Invalid supermarket'));
		}
		$options = array('conditions' => array('Supermarket.' . $this->Supermarket->primaryKey => $id));
		$this->set('supermarket', $this->Supermarket->find('first', $options));
		
		$users = $this->Order->User->find('list');
		$drivers = $this->Order->Driver->find('list');
		//$currentdriver = $drivers[0];
		//debug($currentdriver);
		///debug($drivers);
		$items = $this->Order->Item->find('list');
		$authuserid = $this->Auth->user('id');
		$this->set('currentUser', $this->Auth->user());
		//$this->set('authUser', $this->Auth->user()); 
		//debug($authUser);
		$this->set(compact('users', 'drivers', 'items', 'authuserid'));
         	$cartData = $this->Session->read('cart');
		$this->set('cartData', $cartData);		
		if ($this->request->is('post')) {
			//debug($this->request->data);
			
			$orderData = $this->request->data['Order'];
			$orderItemsData = $this->Session->read('cart');
			//debug($orderData);
			//return false;	
			if ($this->Session->write('Order', $orderData)) {
			
				//$this->Order->create();
				//$this->Order->OrdersItem->create();
			//	if ($this->Order->saveNewOrder($this->request->data, $orderItemsData)) {
				//if ($this->Order->placeNewOrder($this->request->data)) {
				//	$newOrderId=$this->Order->id;
				//	$this->Session->setFlash(__('The order has been saved.'));
					return $this->redirect(array('action' => 'confirmorder', $id));
			/*	} else {
					//debug($this->Order->validationErrors);
					$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
				} */
			} else {
					$this->Session->setFlash(__('The order could not be saved to session. Please, try again. Session Error.'));

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
	public function receipt($id = null) {
		$this->layout = 'confirmation';
		$this->loadModel('Supermarket');
		
		$namedParams =$this->request->named;
		//debug($namedParams);
		$orderid=$namedParams['orderid'];	
		$supermarketid=$namedParams['supermarketid'];	

		$savedOrder=$this->Order->find('first', array(
			'conditions' => array('Order.id' => $orderid)
		));
		//debug($savedOrder);
		$this->set('savedOrder', $savedOrder);


		if (!$this->Supermarket->exists($supermarketid)) {
			throw new NotFoundException(__('Invalid supermarket'));
		}
		$options = array('conditions' => array('Supermarket.' . $this->Supermarket->primaryKey => $id));
		$this->set('supermarket', $this->Supermarket->find('first', $options));
		
		$users = $this->Order->User->find('list');
		$drivers = $this->Order->Driver->find('list');
		//$currentdriver = $drivers[0];
		//debug($currentdriver);
		///debug($drivers);
		$items = $this->Order->Item->find('list');
		$authuserid = $this->Auth->user('id');
		$this->set('currentUser', $this->Auth->user());
		//$this->set('authUser', $this->Auth->user()); 
		//debug($authUser);
		$this->set(compact('users', 'drivers', 'items', 'authuserid'));
         	$cartData = $this->Session->read('cart');
		$this->set('cartData', $cartData);		
		

	}







    public function saveProduct($data) {
        return CakeSession::write('cart',$data);
    }
 
    /*
     * read cart data from session
     */
    public function readProduct() {
        return CakeSession::read('cart');
    }


    public function deliveryorders($date) {
		$this->layout = 'boots';				
		$orders = $this->Order->findAllByDeliveryTime($date);
		$this->set('orders', $orders);
		$this->Order->recursive = 0;

		//$this->redirect(array(');
		//$this->redirect($this->request->referer());

	}



}
