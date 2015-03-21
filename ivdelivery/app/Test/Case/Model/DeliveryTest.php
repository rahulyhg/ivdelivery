<?php
App::uses('Delivery', 'Model');

/**
 * Delivery Test Case
 *
 */
class DeliveryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.delivery',
		'app.driver',
		'app.order',
		'app.user',
		'app.email',
		'app.payment',
		'app.item',
		'app.supermarket',
		'app.category',
		'app.orders_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Delivery = ClassRegistry::init('Delivery');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Delivery);

		parent::tearDown();
	}

}
