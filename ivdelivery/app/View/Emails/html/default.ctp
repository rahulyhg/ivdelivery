<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<h1>Receipt: Order #<?php echo($sessionOrderData['fsorderid']); ?> </h1>

<br>
<h4>
Thank you <?php echo($sessionOrderData['first_name']); ?> for shopping with FoodSwoop
</h4>
<br>
<h3>Order Details </h3>
</ul>
<li>
	<b>Delivery Time:</b> <?php echo($sessionOrderData['delivery_date']); ?>
</li>
<li>
	<b>Delivery Date:</b> <?php echo($sessionOrderData['delivery_time']); ?>
</li>
<li>
	<b>Address:</b> <?php echo($sessionOrderData['street']); ?>
</li>
<li>
	<b>Phone:</b> <?php echo($sessionOrderData['phone']); ?>
</li>
<li>
	<b>Total Cost:</b> <?php echo($sessionOrderData['total']); ?>
</li>
</ul>
<br>
<b>Notes:</b>
<br>
<?php echo($sessionOrderData['notes']); ?>
?>
