<?php
App::uses('AppModel', 'Model');
App::uses('OrdersItems', 'Model');
App::uses('Orders', 'Model');


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
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
			'joinTable' => 'orders_items',
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
			return true;
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
	$ordersItemsDataSource = $this->OrdersItem->getDataSource();
	$paymentsDataSource = $this->Payment->getDataSource();
	$ordersDataSource->begin();
	$ordersItemsDataSource->begin();
	$paymentsDataSource->begin();

	if (!empty($orderDetails)) {		
		if ($this->save($orderDetails)) {
			//debug('aaa');
			//return false;
			$orderId=$this->id;
			foreach ($orderItemsData as $orderItem) {
				$orderItem['order_id']=$orderId;
				$this->OrdersItem->create();
				if (!($this->OrdersItem->save($orderItem, array('deep' => true)))) {
					return false;
				} 
			}	
			$paymentData['order_id']=$orderId;
			if (!($this->Payment->save($paymentData))) {
				return false;
			}
			$ordersDataSource->commit();
			$ordersItemsDataSource->commit();
			$paymentsDataSource->commit();

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
			$ordersItemsDataSource->rollback();
			$paymentsDataSource->rollback();
			return false;
		}
	}
	$ordersDataSource->rollback();
	$ordersItemsDataSource->rollback();
	$paymentsDataSource->rollback();
	
	return false;

    }



}
