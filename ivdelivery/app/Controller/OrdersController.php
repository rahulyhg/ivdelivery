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
        $this->Auth->allow('placeorder');
    }

	public function isAuthorized($user) {
	    // All registered users can add posts
	    if ($this->action === 'placeorder' || 'enterdetails' || 'confirmorder' || 'receipt' || 'paypalredirect' || 'payment' || 'failedreceipt') {
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
		$this->Order->recursive = 1;
		//$currentItemsOrder = $this->Order->ItemsOrders
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
						return $this->redirect(array('action' => 'placeorder', $id));
					} else {
									//debug($this->validationErrors);
									$this->Session->setFlash(__('Failed Logged In', 'alert alert-danger'));
									//return false;

					}
			
			}
		}


		$authuserid = $this->Auth->user('id');
		//$this->set('authUser', $this->Auth->user()); 
		//debug($authUser);
		$this->set(compact('users', 'drivers', 'items', 'authuserid'));
        $cartData = $this->Session->read('cart.' . $id);
		$this->set('cartData', $cartData);		
	


	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function payment($id = null) {
		$this->layout = 'boots';
		$this->loadModel('Supermarket');
		if (!$this->Supermarket->exists($id)) {
			throw new NotFoundException(__('Invalid supermarket'));
		}
		$options = array('conditions' => array('Supermarket.' . $this->Supermarket->primaryKey => $id));
		$this->set('supermarket', $this->Supermarket->find('first', $options));
        $cartData = $this->Session->read('cart.' . $id);

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
         	//debug($sessionOrderData);

		$this->set('cartData', $cartData);		
		$this->set('sessionOrderData', $sessionOrderData);		

		/* $secureTokenId = 0;
		$secureToken = 0;
		$paypalUrl = "https://payflowlink.paypal.com?MODE=TEST&SECURETOKENID=MySecureTokenID&SECURETOKEN=MySecureToken";
		$paypalBase = "https://payflowlink.paypal.com";
		$paypalParams = "TRXTYPE=A&BILLTOSTREET=123 Main St.&BILLTOZIP=95131&AMT=23.45&CURRENCY=USD&INVNUM=INV12345&PONUM=PO9876&**CREATESECURETOKEN**=Y&**SECURETOKENID**=9a9ea8208de1413abc3d60c86cb1f4c5&ECHODATA=True";
		$paypalUrl = ($paypalBase . '/?' . $paypalParams); */

		$amt = 10.00;
		$txt = "Submit Order!";

		//Test
		$PF_HOST_ADDR = "https://payflowpro.paypal.com";

		//Live
		//$PF_HOST_ADDR = "https://pilot-payflowpro.paypal.com.";
		//Payflow link
		$total = $sessionOrderData['total'];
		//$total=.01;
		//debug($total);
		$secureTokenId = uniqid('', true);

		$postData = "USER=" . "FoodSwoop777"
		        .   "&VENDOR=" . "FoodSwoop777"
		        .   "&PARTNER=" . "PayPal"
		        .   "&PWD=" . "Food6606"
		        .   "&CREATESECURETOKEN=Y"
		        .   "&SECURETOKENID=" . $secureTokenId
		        .   "&TRXTYPE=S"
		        .   "&AMT=" . $total;

		        //debug($postData);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $PF_HOST_ADDR);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		//debug('a');

		$resp = curl_exec($ch);
		//debug($resp);

		if (!$resp) {echo "<p>To order, please contact us.</p>";}
		//debug($resp);
		parse_str($resp, $arr);
		//debug($arr);

		if ($arr['RESULT'] != 0) {echo "<p>To order, please contact us.</p>";}
		//$moreParams = ("BILLTOFIRSTNAME=" . $sessionOrderData['first_name'] . "&BILLTOLASTNAME=" . $sessionOrderData['last_name']);
		$moreParams = ("&EMAILCUSTOMER=True&BILLTOEMAIL=" . $sessionOrderData['email'] . "&BILLTOFIRSTNAME=" . $sessionOrderData['first_name'] . "&BILLTOLASTNAME=" . $sessionOrderData['last_name'] . "&SHIPTOSTREET=" . $sessionOrderData['street']);
		//Test Link
		//$paypalUrl=("https://payflowlink.paypal.com/?MODE=TEST&SECURETOKENID=" . $secureTokenId . "&SECURETOKEN=" . $arr['SECURETOKEN'] . "&ECHODATA=True&PARMLIST=" . $moreParams);
		$paypalUrl=("https://payflowlink.paypal.com/?SECURETOKENID=" . $secureTokenId . "&SECURETOKEN=" . $arr['SECURETOKEN'] . $moreParams);

		//Live Link
		//$paypalUrl=("https://payflowlink.paypal.com/?MODE=LIVE&SECURETOKENID=" . $secureTokenId . "&SECURETOKEN=" . $arr['SECURETOKEN']);

		//$moreParams = ("BILLTOFIRSTNAME=" . $sessionOrderData['billing_fname'] . "&BILLTOLASTNAME=" . $sessionOrderData['billing_lname'] . "&BILLTOSTREET=" . $sessionOrderData['billing_street'] . "&BILLTOSTREET2=" . $sessionOrderData['billing_street2'] . "BILLTOSTATE=CA&BILLTOZIP=" . $sessionOrderData['billing_street']);




		/*
			Custom Parameters - USER1, USER2, USER3

		*/


		$this->set('paypalUrl', $paypalUrl);		












		if ($this->request->is('post')) {
			//debug($this->request->data);
			
			$sessionOrderData = $this->request->data['Order'];
			$orderItemsData = $this->Session->read('cart.' . $id);
			$paymentData = $this->request->data['Payment'];
		
		//	if ($this->Session->write('Order', $sessionOrderData)) {
			
				$this->Order->create();
				//$this->Order->OrdersItem->create();
				if ($this->Order->saveNewOrder($sessionOrderData, $orderItemsData, $paymentData)) {
				//if ($this->Order->placeNewOrder($this->request->data)) {
					$newOrderId=$this->Order->id;
					$this->Session->setFlash(__('The order has been saved.'));
					$this->Session->delete('cart.' . $id);
					$this->Session->delete('Order');


					/*$Email = new CakeEmail();
					$Email->config('gmail');
					$Email->from(array('imscotta11@gmail.com' => 'Food Swoop'));
					$Email->to('imscotta92@yahoo.com');
					$Email->subject('Food Swoop Order Receipt');
					$Email->send('My message'); */








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
		$this->layout = 'order';
		$this->loadModel('Supermarket');
		if (!$this->Supermarket->exists($id)) {
			throw new NotFoundException(__('Invalid supermarket'));
		}
		$cartData = $this->Session->read('cart.' . $id);
		$orderData = $this->Session->read('Order');
		$voucherUsed = 'false';
		$voucherFailed = 'false';
		if (isset($orderData)) {
				//debug($orderData);
			if (isset($orderData['promotion_code'])) {
				$setPromotion = $this->Order->Promotion->findByCode($orderData['promotion_code']);
				//debug($setPromotion);
				//$this->Order->Promotion->findByCode($orderData['promotion_code']);
				if ($setPromotion) {
					$voucherUsed = 'true';
					//$setPromotion = $this->Order->Promotion->findByCode($orderData['promotion_code']);
					$promotionDescription = $setPromotion['Promotion']['description'];
					$promoAmount = $setPromotion['Promotion']['discount_amount'];
					$promoCode = $orderData['promotion_code'];
					$this->set('promotion', $promotionDescription);	
				} else {
					$voucherFailed = 'true';


				}
			}
		}
		//debug($voucherUsed);
		$this->set('voucherUsed', $voucherUsed);		
		$this->set('voucherFailed', $voucherFailed);		

		date_default_timezone_set("America/Los_Angeles"); 
		$time1 = time();
		//debug($time1);
		$date = date_create();
		date_timestamp_set($date, $time1);
		//date_format($date, 'U = H:i:s') . "\n";
		$currentTime = date_format($date, 'H:i:s');
		$dw = date("w");
		//debug($dw);

		$dw1 = date("m-d");
		$fulldate = date("Y-m-d");
		//debug($fulldate);
		//debug($dw1);
		$dw2 = new DateTime("+1 days");
		$full2 = date_format($dw2, 'Y-m-d');
		$dw2 = date_format($dw2, 'm-d');
		$dw3 = new DateTime("+2 days");
		$full3 = date_format($dw3, 'Y-m-d');
		$dw3 = date_format($dw3, 'm-d');
		$dw4 = new DateTime("+3 days");
		$full4 = date_format($dw4, 'Y-m-d');
		$dw4 = date_format($dw4, 'm-d');
		$dw5 = new DateTime("+4 days");
		$full5 = date_format($dw5, 'Y-m-d');
		$dw5 = date_format($dw5, 'm-d');
		$dw6 = new DateTime("+5 days");
		$full6 = date_format($dw6, 'Y-m-d');
		$dw6 = date_format($dw6, 'm-d');
		$dw7 = new DateTime("+6 days");
		$full7 = date_format($dw7, 'Y-m-d');
		$dw7 = date_format($dw7, 'm-d');

		$dates = array($dw1, $dw2, $dw3, $dw4, $dw5, $dw6, $dw7);

		$times = array('12:00 pm', '5:00 pm');

		$this->set('dates', $dates);
		$this->set('times', $times);


		//debug($orderData);
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
		$this->set(compact('users', 'drivers', 'items', 'authuserid', 'currentTime', 'dw'));
		$this->set('cartData', $cartData);		
		if ($this->request->is('post')) {

			//debug($this->request->data);
			//return false;
			if (isset($this->request->data['btnPromotion'])) {
				$pcode = $this->request->data['Promotion']['code'];
				//$newPromotion = $this->Order->Promotion->findByCode($promotionCode);
				if ($this->Session->write('Order.promotion_code', $pcode)) {
					return $this->redirect(array('action' => 'enterdetails', $id));

				}
			}
			//debug($promotioncode);

			unset($this->request->data['btnOrder']);
			if (isset($promoCode)) {

						$this->request->data['Order']['promotion_code'] = $promoCode;
						$this->request->data['Order']['promotion_discount_amount'] = $promoAmount;
						$currenttotal = $this->request->data['Order']['total'];
						$newTotal = ($currenttotal-$promoAmount);
						//debug($newTotal);
						$this->request->data['Order']['total'] = $newTotal;
			}


			//return false;


			//set order time here
			$orderChoice = $this->request->data['Order']['delivery_choice'];	
			if ($currentTime < '10:30:00') {
				if ($orderChoice == '0') {
						$orderDate=$fulldate;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 1) { 
						$orderDate=$fulldate;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 2) { 
						$orderDate=$full2;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 3) { 
						$orderDate=$full2;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 4) { 
						$orderDate=$full3;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 5) { 
						$orderDate=$full3;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 6) { 
						$orderDate=$full4;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 7) { 
						$orderDate=$full4;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 8) { 
						$orderDate=$full5;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;			
				} elseif ($orderChoice == 9) { 
						$orderDate=$full5;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 10) { 
						$orderDate=$full6;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 11) { 
						$orderDate=$full6;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 12) { 
						$orderDate=$full7;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 13) { 
						$orderDate=$full7;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				}

			} elseif ($currentTime < '15:30:00') {
				if ($orderChoice == 0) { 
						$orderDate=$fulldate;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 1) { 
						$orderDate=$full2;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 2) { 
						$orderDate=$full2;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 3) { 
						$orderDate=$full3;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 4) { 
						$orderDate=$full3;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 5) { 
						$orderDate=$full4;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 6) { 
						$orderDate=$full4;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 7) { 
						$orderDate=$full5;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;			

				} elseif ($orderChoice == 8) { 
						$orderDate=$full5;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 9) { 
						$orderDate=$full6;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 10) { 
						$orderDate=$full6;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 11) { 
						$orderDate=$full7;
						$orderTime = "12:00:00";
						$this->request->data['Order']['deliver_time'] = $orderTime;
						$this->request->data['Order']['deliver_date'] = $orderDate;

				} elseif ($orderChoice == 12) { 
						$orderDate=$full7;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				}	

			} else {
				if ($orderChoice == '0') { 
						$orderDate=$full2;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == '1') { 
						$orderDate=$full2;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 2) { 
						$orderDate=$full3;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 3) { 
						$orderDate=$full3;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 4) { 
						$orderDate=$full4;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 5) { 
						$orderDate=$full4;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 6) { 
						$orderDate=$full5;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;			

				} elseif ($orderChoice == 7) { 
						$orderDate=$full5;
						$orderTime = "17:00:00";
						$this->request->data['Order']['deliver_time'] = $orderTime;
						$this->request->data['Order']['deliver_date'] = $orderDate;

				} elseif ($orderChoice == 8) { 
						$orderDate=$full6;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 9) { 
						$orderDate=$full6;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 10) { 
						$orderDate=$full7;
						$orderTime = "12:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				} elseif ($orderChoice == 11) { 
						$orderDate=$full7;
						$orderTime = "17:00:00";
						$this->request->data['Order']['delivery_time'] = $orderTime;
						$this->request->data['Order']['delivery_date'] = $orderDate;

				}		


			}

			$this->request->data['Order']['supermarket_id']=$id;	
			$this->request->data['Order']['payment_status']='false';
			$this->request->data['Order']['delivery_status']='false';	
	

			$orderData = $this->request->data['Order'];

			$orderItemsData = $this->Session->read('cart.' . $id);
			//debug($orderData);
			//return false;	
			if ($this->Session->write('Order', $orderData)) {
			
				//$this->Order->create();
				//$this->Order->OrdersItem->create();
			//	if ($this->Order->saveNewOrder($this->request->data, $orderItemsData)) {
				//if ($this->Order->placeNewOrder($this->request->data)) {
				//	$newOrderId=$this->Order->id;
				//	$this->Session->setFlash(__('The order has been saved.'));
					return $this->redirect(array('action' => 'payment', $id));
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






		//old receipt code



		$this->layout = 'receipt';
		$this->loadModel('Supermarket');
		
		$namedParams =$this->request->named;
		//debug($namedParams);
		$orderid=$namedParams['orderid'];	
		$supermarketid=$namedParams['supermarketid'];	

		$savedOrder=$this->Order->find('first', array(
			'conditions' => array('Order.id' => $orderid),
			'recursive' => 0
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
			$cartData[$cartItemCount]['ItemsOrder']['quantity']= $item['ItemsOrder']['quantity'];
			$cartData[$cartItemCount]['ItemsOrder']['total']=$item['ItemsOrder']['total'];
			$cartData[$cartItemCount]['ItemsOrder']['name']=$item['ItemsOrder']['name'];
			$cartItemCount = ($cartItemCount + 1);
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
		//return false;

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
        $cartData = $this->Session->read('cart.' . $id);

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






	}


/**
 * index method
 *
 * @return void
 */
	public function paypalredirect() {
		$this->layout = 'redirect';		

		$theParams = $_POST;
		$this->set('theParams', $theParams);		
		//debug($theParams);
		//$theParams1 = $_GET;
		//$this->set('theParams1', $theParams1);
		/* if (!($this->Order->deleteAll(array(), true))) {
			return false;	
		} */
		//$this->Order->recursive = 0;
		//$this->set('orders', $this->Paginator->paginate());
		//return true;
		if (isset($theParams)) {
				//debug($theParams);
				//return false;
				if (isset($theParams['RESPMSG'])) {
				if ($theParams['RESPMSG'] == "Approved") {




					//confirm order code

					//debug($this->request->data);
					
					//$orderData = $this->request->data['Order'];
					$paymentData = array('type' => 'Credit Card');
					$sessionOrderData = $this->Session->read('Order');
					$sessionOrderData['paypal_transaction_id'] = $theParams['PNREF'];
					$superid = $sessionOrderData['supermarket_id'];
					//$sessionOrderData['payment_status'] = 'paid';
					//$sessionOrderData = array('Order' => $sessionOrderData);
				//	if ($this->Session->write('Order', $sessionOrderData)) {
					$orderItemsData = $this->Session->read('cart.' . $superid);
					//debug($sessionOrderData);
					$this->Order->create();
					//$this->Order->OrdersItem->create();
					//debug($sessionOrderData);
					//debug($orderItemsData);
					//$debug($paymentData);
					if ($this->Order->saveNewOrder($sessionOrderData, $orderItemsData, $paymentData)) {
				//if ($this->Order->placeNewOrder($this->request->data)) {
					$newOrderId=$this->Order->id;
					$this->Session->setFlash(__('The order has been saved.'));
					$this->Session->delete('cart.' . $superid);
					$this->Session->delete('Order.' . $sessionOrderData['supermarket_id']);

					/*
					$Email = new CakeEmail();
					$Email->template('receipt');
					$Email->config('gmail');
					$Email->emailFormat('html');
					$Email->from(array('imscotta11@gmail.com' => 'Food Swoop'));
					$Email->to('imscotta92@yahoo.com');
					$Email->subject('Food Swoop Order Receipt');
					$Email->send('Message');
					*/

					//return $this->redirect(array('action' => 'receipt', 'supermarketid' => $superid, 'orderid' => $newOrderId));
					$completedOrder = array(array('order_id' => $newOrderId), array('supermarket_id' => $superid));


					$this->Session->write('completedOrder', $completedOrder);



			} else {
				//debug($this->Order->validationErrors);
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));

			}
			} else {

				return $this->redirect(array('action' => 'failedreceipt'));


			}
	/*	} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again. Session Error.'));

		} */
			} else {
				$completedOrder = $this->Session->read('completedOrder');

				if (isset($completedOrder)) {
						$superid = $completedOrder[1]['supermarket_id'];
						$newOrderId = $completedOrder[0]['order_id'];
						return $this->redirect(array('action' => 'receipt', 'supermarketid' => $superid, 'orderid' => $newOrderId));
					} else {
					return $this->redirect(array('action' => 'failedreceipt'));


				}
			}

		}
	}



/**
 * index method
 *
 * @return void
 */
	public function failedreceipt() {
		$this->layout = 'error';
		$params = ($this->request->params);
		if (isset($params)) {
		$val = $params['pass'][0];
		$this->set('val', $val);
	}
		/* if (!($this->Order->deleteAll(array(), true))) {
			return false;	
		} */
		//$this->Order->recursive = 0;
		//$this->set('orders', $this->Paginator->paginate());
	}



}
