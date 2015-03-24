<?php
App::uses('AppController', 'Controller');
/**
 * ItemsOrders Controller
 *
 * @property ItemsOrders $OrdersItem
 * @property PaginatorComponent $Paginator
 */
class ItemsOrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'add', 'edit', 'delete', 'addItemsOrder', 'getCount', 'saveItemsOrder', 'readItemsOrder');
    }

	public function isAuthorized($user) {
	    // All registered users can add posts
	    if ($this->action === 'add') {
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
		$this->ItemsOrder->recursive = 0;
		$this->set('itemsOrders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ItemsOrder->exists($id)) {
			throw new NotFoundException(__('Invalid items order'));
		}
		$options = array('conditions' => array('ItemsOrder.' . $this->ItemsOrder->primaryKey => $id));
		$this->set('itemsOrder', $this->ItemsOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ItemsOrder->create();
			if ($this->ItemsOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The items order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items order could not be saved. Please, try again.'));
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
		if (!$this->ItemsOrder->exists($id)) {
			throw new NotFoundException(__('Invalid items order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ItemsOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The items order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ItemsOrder.' . $this->ItemsOrder->primaryKey => $id));
			$this->request->data = $this->ItemsOrder->find('first', $options);
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
		$this->ItemsOrder->id = $id;
		if (!$this->OrdersItem->exists()) {
			throw new NotFoundException(__('Invalid orders item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ItemsOrder->delete()) {
			$this->Session->setFlash(__('The orders item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The orders item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

   /*
     * add a ordersitem to cart
     */
    public function addItemsOrder($ordersitemId) {
	//$this->autoRender = false;
	//$this->layout = $this->autoRender = false;
	
        $allOrdersItems = $this->Session->read('cart');
	$currentItem = $this->ItemsOrder->Item->find('first', array(
		'conditions' => array(
			'Item.id' => $ordersitemId
			),
	));
	$itemName = $currentItem['Item']['name'];
	$itemCost = $currentItem['Item']['cost'];
	$itemDelivery = $currentItem['Item']['delivery_fee'];

	//debug($currentItem);
	//return false;
	//debug($allOrdersItems);
	//return false;
        if (null!=$allOrdersItems) {
            if (array_key_exists($ordersitemId, $allOrdersItems)) {
                $allOrdersItems[$ordersitemId]['quantity']++;
		$newQuantity = $allOrdersItems[$ordersitemId]['quantity'];
		$cost = $allOrdersItems[$ordersitemId]['cost'];
		$newTotal = ($newQuantity*$cost);
		$allOrdersItems[$ordersitemId]['total'] = $newTotal;
            } else {
		    $allOrdersItems[$ordersitemId] = array(
			'id' => $ordersitemId,
			'quantity' => 1,
			'name' => $itemName,
			'cost' => $itemCost,
			'delivery_fee' => $itemDelivery,
			'total' => $itemCost
			);
	    }
        } else {
            $allOrdersItems[$ordersitemId] = array(
		'id' => $ordersitemId,
		'quantity' => 1,
		'name' => $itemName,
		'cost' => $itemCost,
		'delivery_fee' => $itemDelivery,
		'total' => $itemCost
	    );
        }
        
	//debug($allords 
	
        if ($this->saveItemsOrder($allOrdersItems)) {
		$this->Session->setFlash(__('The items order has been saved.'));
	} else {
		$this->Session->setFlash(__('The items order could not be saved. Please, try again.'));
	}
	$this->redirect($this->request->referer());
	//$this->redirect( ‘/’ );
    }
  


   public function removeItemsOrder($ordersitemId) {
	//$this->autoRender = false;
	//$this->layout = $this->autoRender = false;
	
        $allOrdersItems = $this->Session->read('cart');
	$currentItem = $this->ItemsOrder->Item->find('first', array(
		'conditions' => array(
			'Item.id' => $ordersitemId
			),
	));
	$itemName = $currentItem['Item']['name'];
	$itemCost = $currentItem['Item']['cost'];
	$itemDelivery = $currentItem['Item']['delivery_fee'];

	//debug($currentItem);
	//return false;
	//debug($allOrdersItems);
	//return false;
        if (null!=$allOrdersItems) {
            if (array_key_exists($ordersitemId, $allOrdersItems)) {
                $allOrdersItems[$ordersitemId]['quantity']--;
                $newQuantity = $allOrdersItems[$ordersitemId]['quantity'];

				if ($newQuantity < 1)  {
						$this->redirect(array('action' => 'deleteFromCart', $ordersitemId));

				} else {
						$cost = $allOrdersItems[$ordersitemId]['cost'];
						$newTotal = ($newQuantity*$cost);
						$allOrdersItems[$ordersitemId]['total'] = $newTotal;

				}

            
            } 
        }
        
	//debug($allords 
	
        if ($this->saveItemsOrder($allOrdersItems)) {
		$this->Session->setFlash(__('The items order has been saved.'));
	} else {
		$this->Session->setFlash(__('The items order could not be saved. Please, try again.'));
	}
	$this->redirect($this->request->referer());
	//$this->redirect( ‘/’ );
    }
        
    /*
     * get total count of ordersitems
     */
    public function getCount() {
		$this->autoRender = false;
        $allOrdersItems = $this->readOrdersItem();
         
        if (count($allOrdersItems)<1) {
            return 0;
        }
         
        $count = 0;
        foreach ($allOrdersItems as $ordersitem) {
            $count=$count+$ordersitem;
        }
         
        return $count;
    }
 
    /*
     * save data to session
     */
    public function saveItemsOrder($data) {
	//$this->autoRender = false;
	//$this->layout = $this->autoRender = false;	
        return $this->Session->write('cart', $data);

    }
 
    /*
     * read cart data from session
     */
    public function readItemsOrder() {
	//$this->autoRender = false;	
         return $this->Session->read('cart');
            }

    public function emptyCart() {
	$this->Session->delete('cart');
	$this->redirect($this->request->referer());

	}


  public function deleteFromCart($ordersitemId) {
	//$this->autoRender = false;
	//$this->layout = $this->autoRender = false;
	
        $allOrdersItems = $this->Session->read('cart');


	//debug($currentItem);
	//return false;
	//debug($allOrdersItems);
	//return false;
        if (null!=$allOrdersItems) {
            if (array_key_exists($ordersitemId, $allOrdersItems)) {
                unset($allOrdersItems[$ordersitemId]);
            } 
        } 
        
	//debug($allords 
	
        if ($this->saveItemsOrder($allOrdersItems)) {
		$this->Session->setFlash(__('The items order has been saved.'));
	} else {
		$this->Session->setFlash(__('The items order could not be saved. Please, try again.'));
	}
	$this->redirect($this->request->referer());
	//$this->redirect( ‘/’ );
    }




public function resultsitemsorders($id = null) {
		$this->layout = 'boots';
		$date = $this->params['named']['date'];
		$date1 = $this->params['named']['date'];

		//s$date = $this->Time->dayAsSql($da;te)
		$date = ($date['year'] . '-' . $date['month'] . '-' . $date['day']);
		$time = $this->params['named']['time'];
		//debug($time);
		//debug($date);
		$supermarket_id = $this->params['named']['supermarket_id'];
		//$supermarket = $this->Order->Supermarket->findById($supermarket_id);
		//$supername = $supermarket['Supermarket']['name'];
		//debug($supermarket_id);
		$conditions = array(
			array('Order.delivery_date' => $date),
			array('Order.delivery_time' => $time),
			array('Order.supermarket_id' => $supermarket_id)
		);
		
		//$orders = $this->Order->find('all');
		$itemsOrders = $this->ItemsOrder->find('all', array('conditions' => $conditions));
		$this->set('itemsOrders', $this->Paginator->paginate());
		$this->set('itemsOrders', $itemsOrders);		

		//$itemsOrders = $this->Order->ItemsOrder->find('list', array('conditions' => $conditions));
		//debug($orders);
		//return false;
		/* $allItemsOrders = array();

		foreach ($orders as $order) {

			$currentOrderId = $order['Order']['id'];
			$currentItemsOrders=$this->ItemsOrder->find('all', array(
					'conditions' => array('ItemsOrder.order_id' => $currentOrderId)
				));
			//debug($currentItemsOrders);
			//return false;
			$allItemsOrders=array_merge($allItemsOrders, $currentItemsOrders);

		}

		$itemsOrders = $allItemsOrders; */
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
		//$this->ItemsOrder->recursive = 0;
		$this->set(compact('orders', 'date', 'time', 'supermarket_id', 'supername'));

		//$this->Order->recursive = 0;
		} 








}
