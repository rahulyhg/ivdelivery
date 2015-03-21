<?php
/**
 * EmailFixture
 *
 */
class EmailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'driver_email' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_email' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'driver_phone' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_phone' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'message' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'order_id' => 1,
			'driver_email' => 1,
			'user_email' => 1,
			'driver_phone' => 1,
			'user_phone' => 1,
			'message' => 1
		),
	);

}
