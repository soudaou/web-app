<?php
/**
 * Small description of this file:
 * This is the page is the sign out
  * 
  * @author Souad Daou <souaddaou@gmail.com>
  * @copyright 2012 Souad Daou
  * @License BSD-3-Clause <http://opensource.org/licenses/BSD-3-Clause>
  * @version 1.0.0
  * @xercise planner
*/

require_once 'includes/users.php';
user_sign_out();
header('Location: index.php');