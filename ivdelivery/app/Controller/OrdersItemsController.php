<?php
App::uses('AppController', 'Controller');
/**
 * OrdersItems Controller
 *
 * @property OrdersItem $OrdersItem
 * @property PaginatorComponent $Paginator
 */
class OrdersItemsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'add', 'edit', 'delete', 'addOrdersItem', 'getCount', 'saveOrdersItem', 'readOrdersItem');
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
		$this->OrdersItem->recursive = 0;
		$this->set('ordersItems', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrdersItem->exists($id)) {
			throw new NotFoundException(__('Invalid orders item'));
		}
		$options = array('conditions' => array('OrdersItem.' . $this->OrdersItem->primaryKey => $id));
		$this->set('ordersItem', $this->OrdersItem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrdersItem->create();
			if ($this->OrdersItem->save($this->request->data)) {
				$this->Session->setFlash(__('The orders item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orders item could not be saved. Please, try again.'));
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
		if (!$this->OrdersItem->exists($id)) {
			throw new NotFoundException(__('Invalid orders item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrdersItem->save($this->request->data)) {
				$this->Session->setFlash(__('The orders item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orders item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrdersItem.' . $this->OrdersItem->primaryKey => $id));
			$this->request->data = $this->OrdersItem->find('first', $options);
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
		$this->OrdersItem->id = $id;
		if (!$this->OrdersItem->exists()) {
			throw new NotFoundException(__('Invalid orders item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrdersItem->delete()) {
			$this->Session->setFlash(__('The orders item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The orders item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

   /*
     * add a ordersitem to cart
     */
    public function addOrdersItem($ordersitemId) {
	//$this->autoRender = false;
	//$this->layout = $this->autoRender = false;
	
        $allOrdersItems = $this->Session->read('cart');
	$currentItem = $this->OrdersItem->Item->find('first', array(
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
	
        if ($this->saveOrdersItem($allOrdersItems)) {
		$this->Session->setFlash(__('The orders item has been saved.'));
	} else {
		$this->Session->setFlash(__('The orders item could not be saved. Please, try again.'));
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
    public function saveOrdersItem($data) {
	//$this->autoRender = false;
	//$this->layout = $this->autoRender = false;	
        return $this->Session->write('cart', $data);

    }
 
    /*
     * read cart data from session
     */
    public function readOrdersItem() {
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
	
        if ($this->saveOrdersItem($allOrdersItems)) {
		$this->Session->setFlash(__('The orders item has been saved.'));
	} else {
		$this->Session->setFlash(__('The orders item could not be saved. Please, try again.'));
	}
	$this->redirect($this->request->referer());
	//$this->redirect( ‘/’ );
    }








}
