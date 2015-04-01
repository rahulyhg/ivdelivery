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
        $this->Auth->allow('placeorder', 'index', 'delete', 'searchorder', 'searchresults', 'view');
    }

	public function isAuthorized($user) {
	    // All registered users can add posts
	    if ($this->action === 'placeorder' || 'enterdetails' || 'confirmorder' || 'receipt') {
		return true;
	    }
	    	    if (isset($user['role']) && $user['role'] === 'admin') {
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
		/* if (!($this->Order->deleteAll(array(), true))) {
			return false;	
		} */
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
		$options = array('conditions' => array(
				'Supermarket.' . $this->Supermarket->primaryKey => $id,
				));
		$this->set('supermarket', $this->Supermarket->find('first', $options));
		
		$users = $this->Order->User->find('list');
		$drivers = $this->Order->Driver->find('list');
		//$currentdriver = $drivers[0];
		//debug($currentdriver);
		///debug($drivers);
		$items = $this->Order->Item->find('list');
		//debug($items);

		$categories = $this->Order->Item->Category->find('list');

		$this->set('categories', $categories);		
		$items1 = $this->Order->Item->findAllBySupermarketId($id);
		//sdebug($items1);
		$categories1 = array();
		$catCount=0;
		foreach ($categories as $catId => $catName) {
		        $categories1[$catCount]['id'] = $catId;
		        $categories1[$catCount]['name'] = $catName;

		        $catCount = $catCount +1 ;
		}		

		$this->set('categoriesInfo', $categories1);		

		//return false;
		//debug($categories1);
		//return false;
		//$items1 = array();
		//$items1[$itemCount]= $this->Order->Item->find('all', array(

		$itemCount=0;
		//foreach ($categories1 as $category) {
				//debug($category);
				//debug($categories1[$itemCount]['id']);
				//$items1[$itemCount]= $this->Order->Item->find('all', array(
					//'conditions' => array(
						//array('Item.supermarket_id' => $id),
						//array('Item.category_id' => $category['id'])
						//)
					//));
				//$itemCount = $itemCount + 1;
		//}
		//debug($items1);
		//$catCount=count($categories);
		$itemsByCategory=array();
		//reset($categories);
		//debug($categories);
		//debug($catCount);



		$authuserid = $this->Auth->user('id');
		//$this->set('authUser', $this->Auth->user()); 
		//debug($authUser);
		$this->set(compact('users', 'drivers', 'items', 'authuserid'));
        $cartData = $this->Session->read('cart');
		$this->set('cartData', $cartData);		
		if ($this->request->is('post')) {


			debug($this->request->data);
			
			$orderData = $this->request->data['Order'];
			$orderItemsData = $this->request->data['ItemsOrder'];
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
		$cartData = $this->Session->read('cart');

		if ($cartData == array() || null) {
			$this->redirect(array('action' => 'placeorder', $id));
		}

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
		$cartData = $this->Session->read('cart');
		//debug($cartData);
		if ($cartData == array() || null) {
			$this->redirect(array('action' => 'placeorder', $id));
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
		$this->set('cartData', $cartData);		
		if ($this->request->is('post')) {

			//debug($this->request->data);
			//return false;

			$this->request->data['Order']['supermarket_id']=$id;	
			$this->request->data['Order']['payment_status']='false';
			$this->request->data['Order']['delivery_status']='false';	
	

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
		$this->layout = 'boots';
		$this->loadModel('Supermarket');
		
		$namedParams =$this->request->named;
		//debug($namedParams);
		$orderid=$namedParams['orderid'];	
		$supermarketid=$namedParams['supermarketid'];	

		$savedOrder=$this->Order->find('first', array(
			'conditions' => array('Order.id' => $orderid)
		));
		$savedItemsOrders = $this->Order->ItemsOrder->findAllByOrderId($orderid);

		//debug($savedItemsOrders);
	
		//Add custom find for obtaining all order items related to an order	
		$savedOrderItems=$this->Order->ItemsOrder->findAllByOrderId($orderid);
		//debug($savedOrderItems);
		$cartData = array();
		$cartItemCount = 0;
		foreach ($savedOrderItems as $item) {
			//$cartData[$cartItemCount]['name']=
			//debug($item['OrdersItem']['id']);
			//return false;
			$currentItem = $this->Order->Item->findById($item['ItemsOrder']['item_id']);
			//`debug($currentItem);
			$cartData['OrderItem']['quantity']= $item['ItemsOrder']['quantity'];
			$cartData['OrderItem']['total']=$item['ItemsOrder']['total'];
			$cartData['OrderItem']['name']=$item['ItemsOrder']['name'];

			//$cartData[$cartItemCount]['name']=
			//return false;
			

		}
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
         	//$cartData = $this->Session->read('cart');
		//debug($cartData);
		$this->set('cartData', $cartData);		
		return false;

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
		$orders = $this->Order->findAllByDeliveryTime($date, $time, $supermarket_id);
		$this->set('orders', $orders);
		$this->Order->recursive = 0;

		//$this->redirect(array(');
		//$this->redirect($this->request->referer());

	}




/**
 * index method
 *
 * @return void
 */
	public function searchorders($id = null) {
		$this->layout = 'boots';		
		$supermarkets = $this->Order->Supermarket->find('list');
		$this->set(compact('supermarkets'));

		//$orders = $this->Order->searchOrder($date, $time, $supermarket_id);
		//$this->set('orders', $orders);
		//$this->Order->recursive = 0;
		if ($this->request->is('post')) {
			//debug($this->request->data);
			//return false;
			//$this->Order->create();
			//$this->Session->setFlash(__('The order has been sa'));
			$order = $this->request->data;
			$date = $order['Order']['delivery_date'];
			$time = $order['Order']['delivery_time'];
			$supermarket_id = $order['Order']['supermarket'];
			return $this->redirect(array('action' => 'unpaidresults', 'date' => $date, 'time' => $time, 'supermarket_id' => $supermarket_id));
		}
	} 

/**
 * index method
 *
 * @return void
 */
	public function searchresults($id = null) {
		$this->layout = 'boots';
		$date = $this->params['named']['date'];
		//s$date = $this->Time->dayAsSql($da;te)
		$date = ($date['year'] . '-' . $date['month'] . '-' . $date['day']);
		$date1 = $this->params['named']['date'];
		$time = $this->params['named']['time'];
		//debug($time);
		//debug($date);
		$supermarket_id = $this->params['named']['supermarket_id'];
		//debug($supermarket_id);
		$conditions = array(
			array('Order.delivery_date' => $date),
			array('Order.delivery_time' => $time),
			array('Order.supermarket_id' => $supermarket_id)
		);
		
		//$orders = $this->Order->find('all');
		$orders = $this->Order->find('all', array('conditions' => $conditions));
		$orderCount = count($orders);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketId($supermarket_id);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketIdAndDeliveryTimeAndDeliveryDate($supermarket_id, $time, $date);
		//$orders = $this->Order->findAllByDeliveryDate($date);
		$supermarket = $this->Order->Supermarket->findById($supermarket_id);
		$supername = $supermarket['Supermarket']['name'];
		//debug($orders);

		//$orders = $this->Order->searchOrder($date, $time, $supermarket_id);
		//debug($this->params['named']);
		//return false;
		//if ($orders
		//$this->set(compact('orders'));
		//$this->set('orders', $orders);
		$this->set('orders', $this->Paginator->paginate());
		$this->set(compact('orders', 'date', 'time', 'supermarket_id', 'supername', 'date1', 'orderCount'));

		//$this->Order->recursive = 0;
		} 

/*	public function resultsitemsorders($id = null) {
		$this->layout = 'boots';
		$date = $this->params['named']['date'];
		$date1 = $this->params['named']['date'];

		//s$date = $this->Time->dayAsSql($da;te)
		$date = ($date['year'] . '-' . $date['month'] . '-' . $date['day']);
		$time = $this->params['named']['time'];
		//debug($time);
		//debug($date);
		$supermarket_id = $this->params['named']['supermarket_id'];
		$supermarket = $this->Order->Supermarket->findById($supermarket_id);
		$supername = $supermarket['Supermarket']['name'];
		//debug($supermarket_id);
		$conditions = array(
			array('Order.delivery_date' => $date),
			array('Order.delivery_time' => $time),
			array('Order.supermarket_id' => $supermarket_id)
		);
		
		//$orders = $this->Order->find('all');
		$orders = $this->Order->find('all', array('conditions' => $conditions));
		//$itemsOrders = $this->Order->ItemsOrder->find('list', array('conditions' => $conditions));

		$allItemsOrders = array();

		foreach ($orders as $order) {

			$currentOrderId = $order['Order']['id'];
			$currentItemsOrders=$this->Order->ItemsOrder->find('all', array(
					'conditions' => array('ItemsOrder.order_id' => $currentOrderId)
				));
			//debug($currentItemsOrders);
			//return false;
			$allItemsOrders=array_merge($allItemsOrders, $currentItemsOrders);

		}

		$itemsOrders = $allItemsOrders;
		    /*$usernameGroups = $this->Article->User->find('list', array(
        'fields' => array('User.username', 'User.first_name', 'User.group')
    )); */
		//debug($itemsOrders);
		//$orders = $this->Order->findAllBySupermarketId($supermarket_id);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketIdAndDeliveryTimeAndDeliveryDate($supermarket_id, $time, $date);
		//$orders = $this->Order->findAllByDeliveryDate($date);

		//debug($orders);

		//$orders = $this->Order->searchOrder($date, $time, $supermarket_id);
		//debug($this->params['named']);
		//return false;
		//if ($orders
		//$this->set(compact('orders'));
		//$this->set('orders', $orders);
		//$this->set('orders', $this->Paginator->paginate());
		//$this->Order->ItemsOrder->recursive = 0;
		//$this->set('itemsOrders', $this->Paginator->paginate());
		//$this->set(compact('orders', 'date', 'time', 'supermarket_id', 'supername'));

		//$this->Order->recursive = 0;
		//} 


	public function resultsitemsorders($id = null) {
		$this->layout = 'boots';
		$date = $this->params['named']['date'];
		//s$date = $this->Time->dayAsSql($da;te)
		$date = ($date['year'] . '-' . $date['month'] . '-' . $date['day']);
		$date1 = $this->params['named']['date'];
		$time = $this->params['named']['time'];
		//debug($time);
		//debug($date);
		$supermarket_id = $this->params['named']['supermarket_id'];
		//debug($supermarket_id);
		$conditions = array(
			array('Order.delivery_date' => $date),
			array('Order.delivery_time' => $time),
			array('Order.supermarket_id' => $supermarket_id)
		);
		
		//$orders = $this->Order->find('all');
		$orders = $this->Order->find('all', array('conditions' => $conditions));
		$orderCount = count($orders);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketId($supermarket_id);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketIdAndDeliveryTimeAndDeliveryDate($supermarket_id, $time, $date);
		//$orders = $this->Order->findAllByDeliveryDate($date);
		$supermarket = $this->Order->Supermarket->findById($supermarket_id);
		$supername = $supermarket['Supermarket']['name'];
		//debug($orders);

		//$orders = $this->Order->searchOrder($date, $time, $supermarket_id);
		//debug($this->params['named']);
		//return false;
		//if ($orders
		//$this->set(compact('orders'));
		//$this->set('orders', $orders);
		$this->set('orders', $this->Paginator->paginate());
		$this->set(compact('orders', 'date', 'time', 'supermarket_id', 'supername', 'date1', 'orderCount'));

		//$this->Order->recursive = 0;
		} 




   public function updatePaymentStatus($id = null) {
		//$this->Session->delete('cart');
		$currentOrder = $this->Order->findById($id);
		$this->Order->id = $id;
		$currentOrder['Order']['payment_status'] = 'paid';
		if ($this->Order->save($currentOrder)) {
			$this->redirect($this->request->referer());
		}

	}

	   public function updateDeliveryStatus($id = null) {
		//$this->Session->delete('cart');
		 $currentOrder = $this->Order->findById($id);
		 $this->Order->id = $id;
		$currentOrder['Order']['delivery_status'] = 'delivered';
		if ($this->Order->save($currentOrder)) {
			$this->redirect($this->request->referer());
		}
	}


/**
 * index method
 *
 * @return void
 */
	public function unpaidresults($id = null) {
		$this->layout = 'boots';
		$date = $this->params['named']['date'];
		//s$date = $this->Time->dayAsSql($da;te)
		$date = ($date['year'] . '-' . $date['month'] . '-' . $date['day']);
		$date1 = $this->params['named']['date'];
		$time = $this->params['named']['time'];
		//debug($time);
		//debug($date);
		$supermarket_id = $this->params['named']['supermarket_id'];
		//debug($supermarket_id);
		$conditions = array(
			array('Order.delivery_date' => $date),
			array('Order.delivery_time' => $time),
			array('Order.supermarket_id' => $supermarket_id),
			array('Order.payment_status' => 'false'),

		);
		
		//$orders = $this->Order->find('all');
		$orders = $this->Order->find('all', array('conditions' => $conditions));
		$orderCount = count($orders);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketId($supermarket_id);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketIdAndDeliveryTimeAndDeliveryDate($supermarket_id, $time, $date);
		//$orders = $this->Order->findAllByDeliveryDate($date);
		$supermarket = $this->Order->Supermarket->findById($supermarket_id);
		$supername = $supermarket['Supermarket']['name'];
		//debug($orders);

		//$orders = $this->Order->searchOrder($date, $time, $supermarket_id);
		//debug($this->params['named']);
		//return false;
		//if ($orders
		//$this->set(compact('orders'));
		//$this->set('orders', $orders);
		$this->set('orders', $this->Paginator->paginate());
		$this->set(compact('orders', 'date', 'time', 'supermarket_id', 'supername', 'date1', 'orderCount'));

		//$this->Order->recursive = 0;
		} 


/**
 * index method
 *
 * @return void
 */
	public function deliveriesresults($id = null) {
		$this->layout = 'boots';
		$date = $this->params['named']['date'];
		//s$date = $this->Time->dayAsSql($da;te)
		$date = ($date['year'] . '-' . $date['month'] . '-' . $date['day']);
		$date1 = $this->params['named']['date'];
		$time = $this->params['named']['time'];
		//debug($time);
		//debug($date);
		$supermarket_id = $this->params['named']['supermarket_id'];
		//debug($supermarket_id);
		$conditions = array(
			array('Order.delivery_date' => $date),
			array('Order.delivery_time' => $time),
			array('Order.supermarket_id' => $supermarket_id),
			array('Order.payment_status' => 'paid'),
			array('Order.delivery_status' => 'false')

		);
		
		//$orders = $this->Order->find('all');
		$orders = $this->Order->find('all', array('conditions' => $conditions));
		$orderCount = count($orders);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketId($supermarket_id);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketIdAndDeliveryTimeAndDeliveryDate($supermarket_id, $time, $date);
		//$orders = $this->Order->findAllByDeliveryDate($date);
		$supermarket = $this->Order->Supermarket->findById($supermarket_id);
		$supername = $supermarket['Supermarket']['name'];
		//debug($orders);

		//$orders = $this->Order->searchOrder($date, $time, $supermarket_id);
		//debug($this->params['named']);
		//return false;
		//if ($orders
		//$this->set(compact('orders'));
		//$this->set('orders', $orders);
		$this->set('orders', $this->Paginator->paginate());
		$this->set(compact('orders', 'date', 'time', 'supermarket_id', 'supername', 'date1', 'orderCount'));

		//$this->Order->recursive = 0;
		} 


/**
 * index method
 *
 * @return void
 */
	public function completedresults($id = null) {
		$this->layout = 'boots';
		$date = $this->params['named']['date'];
		//s$date = $this->Time->dayAsSql($da;te)
		$date = ($date['year'] . '-' . $date['month'] . '-' . $date['day']);
		$date1 = $this->params['named']['date'];
		$time = $this->params['named']['time'];
		//debug($time);
		//debug($date);
		$supermarket_id = $this->params['named']['supermarket_id'];
		//debug($supermarket_id);
		$conditions = array(
			array('Order.delivery_date' => $date),
			array('Order.delivery_time' => $time),
			array('Order.supermarket_id' => $supermarket_id),
			array('Order.payment_status' => 'paid'),
			array('Order.delivery_status' => 'delivered'),
			array('Order.canceled' => '')


		);
		
		//$orders = $this->Order->find('all');
		$orders = $this->Order->find('all', array('conditions' => $conditions));
		$orderCount = count($orders);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketId($supermarket_id);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketIdAndDeliveryTimeAndDeliveryDate($supermarket_id, $time, $date);
		//$orders = $this->Order->findAllByDeliveryDate($date);
		$supermarket = $this->Order->Supermarket->findById($supermarket_id);
		$supername = $supermarket['Supermarket']['name'];
		//debug($orders);

		//$orders = $this->Order->searchOrder($date, $time, $supermarket_id);
		//debug($this->params['named']);
		//return false;
		//if ($orders
		//$this->set(compact('orders'));
		//$this->set('orders', $orders);
		$this->set('orders', $this->Paginator->paginate());
		$this->set(compact('orders', 'date', 'time', 'supermarket_id', 'supername', 'date1', 'orderCount'));

		//$this->Order->recursive = 0;
		} 



    public function calculatevalue($id = null) {
		$this->layout = 'boots';	

		$params = $this->params['named'];
		$itemorderid = $params['itemorderid'];
		$orderid = $params['orderid'];
		//debug($params);
		//return false;
		$this->Order->ItemsOrder->id = $itemorderid;
		if (!$this->Order->ItemsOrder->exists()) {
			throw new NotFoundException(__('Invalid items order'));
		}

		//$this->Order->ItemsOrder->canceled = 'true';
		$currentItemsOrder = $this->Order->ItemsOrder->findById($itemorderid);
		$currentItemsOrder['ItemsOrder']['canceled'] = 'true';
		//return false;

		//$this->request->allowMethod('post', 'delete');
		if ($this->Order->ItemsOrder->save($currentItemsOrder)) {
			$this->Session->setFlash(__('The items order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The item order could not be deleted. Please, try again.'));
		}


		$this->Order->orderid = $id;
		$currentOrder = $this->Order->findById($orderid);
		//debug($currentOrder);
		$total = 0;
		$extraDeliveryFees = 0;
	
		if ($currentOrder['Item'] == null) {
			//$currentOrder['Order']['item_total'] = 0;
			//$currentOrder['Order']['delivery_charge'] = 0;
			//$currentOrder['Order']['total'] = 0;
			$currentOrder['Order']['canceled'] = 'true';

			if ($this->Order->save($currentOrder)) {		
				$this->Session->setFlash(__('Order updated'));
				$this->redirect($this->request->referer());		

			} else {
				$this->Session->setFlash(__('Order could not update'));
				$this->redirect($this->request->referer());	
			}
		}

		//debug($currentOrder);
		//return false;

		$itemCount = 0;
		foreach ($currentOrder['Item'] as $item) {
				if (!($item['ItemsOrder']['canceled'] == 'true')) { 
					$total = ($total + $item['ItemsOrder']['total']);	
					$deliveryFees = ($extraDeliveryFees + $item['ItemsOrder']['delivery_fee']);
					$itemCount = $itemCount + 1;
				}
		}
		//$currentOrder['Order']['processing_fee'] = $total;

		$groceryTotal = $total;
		$itemcount=$itemCount;
		if ($itemcount == 0) {
			$currentOrder['Order']['item_total'] = 0;
			$currentOrder['Order']['delivery_charge'] = 0;
			$currentOrder['Order']['total'] = 0;
			$currentOrder['Order']['canceled'] = 'true';

			if ($this->Order->save($currentOrder)) {		
				$this->Session->setFlash(__('Order updated'));
				$this->redirect($this->request->referer());		

			} else {
				$this->Session->setFlash(__('Order could not update'));
				$this->redirect($this->request->referer());	
			}
		}

		if ($itemCount <= 3) {
			$deliveryRate = 5;
			$deliveryCost=($deliveryRate+$deliveryFees);
			$grandTotal = ($groceryTotal+$deliveryRate+$deliveryFees);
		} elseif ($itemCount > 3 && $itemCount <= 10) {
			$deliveryRate = 10;
			$deliveryCost=($deliveryRate+$deliveryFees);
			$grandTotal = ($groceryTotal+$deliveryRate+$deliveryFees);

		}  elseif ($itemCount > 10 && $itemCount <= 20) {
			$deliveryRate = 15;
			if ($groceryTotal >= 200) {
				$smallCut = ($groceryTotal*.1);
				$deliveryCost = ($deliveryFees+$smallCut);
				$grandTotal = ($groceryTotal+$deliveryCost);
			} else {
				$deliveryCost=($deliveryRate+$deliveryFees);
				$grandTotal = ($groceryTotal+$deliveryCost);

			}

		}  elseif ($itemCount > 20) {
			$deliveryRate = 20;
			if ($groceryTotal >= 200) {
				$smallCut = ($groceryTotal*.1);
				$deliveryCost = ($deliveryFees+$smallCut);
				$grandTotal = ($groceryTotal+$deliveryCost);
			} else {
				$deliveryCost=($deliveryRate+$deliveryFees);
				$grandTotal = ($groceryTotal+$deliveryCost);
			}
		}

		$currentOrder['Order']['item_total'] = $total;
		$currentOrder['Order']['delivery_charge'] = $deliveryCost;
		$currentOrder['Order']['total'] = $grandTotal;

		if ($this->Order->save($currentOrder)) {		
			$this->Session->setFlash(__('Order updated'));
			$this->redirect($this->request->referer());		

		} else {
			$this->Session->setFlash(__('Order could not update'));
			$this->redirect($this->request->referer());	
		}


		//$this->Order->findAllByDeliveryTime($date, $time, $supermarket_id);

		//$this->set('orders', $orders);
		//$this->Order->recursive = 0;

		//$this->redirect(array(');
		//$this->redirect($this->request->referer());

	}


/**
 * index method
 *
 * @return void
 */
	public function canceledresults($id = null) {
		$this->layout = 'boots';
		$date = $this->params['named']['date'];
		//s$date = $this->Time->dayAsSql($da;te)
		$date = ($date['year'] . '-' . $date['month'] . '-' . $date['day']);
		$date1 = $this->params['named']['date'];
		$time = $this->params['named']['time'];
		//debug($time);
		//debug($date);
		$supermarket_id = $this->params['named']['supermarket_id'];
		//debug($supermarket_id);
		$conditions = array(
			array('Order.delivery_date' => $date),
			array('Order.delivery_time' => $time),
			array('Order.supermarket_id' => $supermarket_id),
			array('Order.canceled' => 'true')


		);
		
		//$orders = $this->Order->find('all');
		$orders = $this->Order->find('all', array('conditions' => $conditions));
		$orderCount = count($orders);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketId($supermarket_id);
		//debug($orders);
		//$orders = $this->Order->findAllBySupermarketIdAndDeliveryTimeAndDeliveryDate($supermarket_id, $time, $date);
		//$orders = $this->Order->findAllByDeliveryDate($date);
		$supermarket = $this->Order->Supermarket->findById($supermarket_id);
		$supername = $supermarket['Supermarket']['name'];
		//debug($orders);

		//$orders = $this->Order->searchOrder($date, $time, $supermarket_id);
		//debug($this->params['named']);
		//return false;
		//if ($orders
		//$this->set(compact('orders'));
		//$this->set('orders', $orders);
		$this->set('orders', $this->Paginator->paginate());
		$this->set(compact('orders', 'date', 'time', 'supermarket_id', 'supername', 'date1', 'orderCount'));

		//$this->Order->recursive = 0;
		} 



}
