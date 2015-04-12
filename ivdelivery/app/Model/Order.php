<?php
App::uses('AppModel', 'Model');
App::uses('ItemsOrders', 'Model');
App::uses('Orders', 'Model');
App::uses('Items', 'Model');


/**
 * Order Model
 *
 * @property User $User
 * @property Driver $Driver
 * @property Email $Email
 * @property Payment $Payment
 * @property Item $Item
 */
class Order extends AppModel {

    //public $displayField = 'last_name';
public $recursive = 0;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'time_stamp' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'delivery_time' => array(
			'time' => array(
				'rule' => array('time'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'delivery_date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'delivery_charge' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		//'driver_id' => array(
		//	'uuid' => array(
			//	'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		//),
		'supermarket_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => false,
				'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'processing_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'item_total' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),		
		),
		'street' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),		
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
		),
		'phone' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),		
		),
		'first_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),		
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),		
		),
		'delivery_choice' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),		
		),

	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Driver' => array(
			'className' => 'Driver',
			'foreignKey' => 'driver_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Supermarket' => array(
			'className' => 'Supermarket',
			'foreignKey' => 'supermarket_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Promotion' => array(
			'className' => 'Promotion',
			'foreignKey' => 'promotion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Email' => array(
			'className' => 'Email',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Payment' => array(
			'className' => 'Payment',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Item' => array(
			'className' => 'Item',
			'joinTable' => 'items_orders',
			'foreignKey' => 'order_id',
			'associationForeignKey' => 'item_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);




    function placeNewOrder($data, $orderitems) {
	//Create datasource for fallback on models: order, orderitems, email, payment
	//Create / save orderitems
	//Create order

	//Consider page flow
	//Choose items >> Enter details (select payment on same page?) >> confirmation
	//debug($data);
	//return false;
	//$this->loadModel('Orders');
	//$this->loadModel('OrdersItems');
	//$newOrder=$this->Order->create();
	$orderData = $data['Order'];
	$orderItemsData = $orderitems;
	//debug($orderitems);
	//return false;
	$paymentData = $data['Payment'];
	//debug($paymentData);
	//return false;
	//$this->loadModel('Order');
	//$order=$this->create();
	//debug($this->Session);
	//debug($orderData);
	//return false;
	if (!empty($data)) {
		if ($this->save($data)) {	
			//return true;
		//if ($this->save($data)) {
			$orderId=$this->id;
			foreach ($orderItemsData as $orderItem) {
				$orderItem['order_id']=$orderId;
				$orderItem['item_id']=$orderItem['id'];
				unset($orderItem['id']);
				$this->OrdersItem->create();
				if (!($this->OrdersItem->save($orderItem, array('deep' => true)))) {
					return false;
				} 
			}	
			$paymentData['order_id']=$orderId;
			if (!($this->Payment->save($paymentData))) {
				return false;
			}

			return true;		
			//if ($this->saveAll($data, array('deep' => true))) {
			//create, send and save email
			//$this->Session->setFlash(__('The order has been saved.'));
			//return $this->redirect(array('action' => 'index'));
				//return true;
			//} else {
			//	return false;
			//}
			
		} else {
			//debug($this->OrdersItem->invalidFields());
			debug($this->validationErrors);
			return false;
		}
	}
	//return false;

    }




    function saveNewOrder($orderDetails, $orderitems, $payment) {
	//Create datasource for fallback on models: order, orderitems, email, payment
	//Create / save orderitems
	//Create order

	//Consider page flow
	//Choose items >> Enter details (select payment on same page?) >> confirmation
	//debug($data);
	//return false;
	//$this->loadModel('Orders');
	//$this->loadModel('OrdersItems');
	//$newOrder=$this->Order->create();
	$orderData = $orderDetails;
	$orderItemsData = $orderitems;
	$paymentData = $payment;
	//debug($paymentData);
	//return false;
	//$this->loadModel('Order');
	//$order=$this->create();
	//debug($this->Session);
	//return false;
	$ordersDataSource = $this->getDataSource();
	$itemsOrderDataSource = $this->ItemsOrder->getDataSource();
	$paymentsDataSource = $this->Payment->getDataSource();
	$ordersDataSource->begin();
	$itemsOrderDataSource->begin();
	$paymentsDataSource->begin();
	//$this->loadModel('Item');
	if (!empty($orderDetails)) {		
		if ($this->saveAll($orderDetails)) {
			//return true;
			$orderId=$this->id;
			//debug($orderItemsData);
			//return false;
			foreach ($orderItemsData as $orderItem) {
				$orderItem['order_id']=$orderId;
				//debug($orderItem['id']);
				$item = $this->Item->find('first', array(
					'conditions' => array('Item.id' => $orderItem['id']),
						'recursive' => 0
					));
				$category_id = $item['Item']['category_id'];
				$this->ItemsOrder->create();
				//debug($orderItem);
				//return false;
				$orderItem['item_id'] = $orderItem['id'];
				$orderItem['purchased'] = 'false';
				$orderItem['added_to_order'] = 'false';
				$orderItem['category_id'] = $category_id;

				unset($orderItem['id']);
				if (!($this->ItemsOrder->save($orderItem))) {
					return false;
				}
		
			}	
			$paymentData['order_id']=$orderId;
			if (!($this->Payment->save($paymentData))) {
				return false;
			}
			$ordersDataSource->commit();
			$itemsOrderDataSource->commit();
			$paymentsDataSource->commit();
		//debug('aaa4');
			//return false;
			return true;		
			//if ($this->saveAll($data, array('deep' => true))) {
			//create, send and save email
			//$this->Session->setFlash(__('The order has been saved.'));
			//return $this->redirect(array('action' => 'index'));
				//return true;
			//} else {
			//	return false;
			//}
			
		} else {
			//debug($this->OrdersItem->invalidFields());
			//debug($this->validationErrors);
			$ordersDataSource->rollback();
			$itemsOrderDataSource->rollback();
			$paymentsDataSource->rollback();
			return false;
		}
	} else { 
		$ordersDataSource->rollback();
		$itemsOrderDataSource->rollback();
		$paymentsDataSource->rollback();
		
		return false;
	}

    }


	function clearOrders() {

		if ($this->Model->deleteAll(array(), true)) {
			return true;
		} else {
			return false;
		}

	}


	function searchOrder($date, $time, $supermarket_id) {

		if (!$date || !$time || !$supermarket_id) {
			return false;	
		}	


		$options['joins'] = array(
		    array('table' => 'items_orders',
		        'alias' => 'ItemsOrder',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'ItemsOrder.order_id = Order.id',
		        )
		    )
		);




		$conditions = array('AND' => array(
			array('Order.date' => $date),
			array('Order.time' => $time),
			array('Order.supermarket_id' => $supermarket_id)
		));
		
		$orders = $this->Order->find('all', $options);
		//$orders = $this->Order->find('all', array('conditions' => $conditions));

		return $orders;
	}



}
