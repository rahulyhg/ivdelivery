<?php
App::uses('Driver', 'Model');

/**
 * Driver Test Case
 *
 */
class DriverTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.driver',
		'app.order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Driver = ClassRegistry::init('Driver');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Driver);

		parent::tearDown();
	}

}
