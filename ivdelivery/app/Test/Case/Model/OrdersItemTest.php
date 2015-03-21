<?php
App::uses('OrdersItem', 'Model');

/**
 * OrdersItem Test Case
 *
 */
class OrdersItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orders_item',
		'app.order',
		'app.user',
		'app.driver',
		'app.email',
		'app.payment',
		'app.item',
		'app.supermarket'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrdersItem = ClassRegistry::init('OrdersItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrdersItem);

		parent::tearDown();
	}

}
