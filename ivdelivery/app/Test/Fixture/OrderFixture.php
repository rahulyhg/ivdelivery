<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'key' => 'primary'),
		'user_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'time_stamp' => array('type' => 'date', 'null' => false, 'default' => null),
		'delivery_time' => array('type' => 'date', 'null' => false, 'default' => null),
		'notes' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'delivery_charge' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 16, 'unsigned' => false),
		'total' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 16, 'unsigned' => false),
		'driver_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'processing_fee' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 16, 'unsigned' => false),
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
			'id' => '54ee59b0-8430-4fbc-a32e-0844c0aa087a',
			'user_id' => 'Lorem ipsum dolor sit amet',
			'time_stamp' => '2015-02-25',
			'delivery_time' => '2015-02-25',
			'notes' => 'Lorem ipsum dolor sit amet',
			'delivery_charge' => 1,
			'total' => 1,
			'driver_id' => 'Lorem ipsum dolor sit amet',
			'processing_fee' => 1
		),
	);

}
