<?php
/**
 * eCommerce Rent
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 */

use lithium\net\http\Router;

$persist = ['persist' => ['admin', 'controller']];

Router::connect('/admin/ecommerce/watchers/{:id:[0-9]+}', [
	'controller' => 'Watche:rs', 'library' => 'ecommerce_rent', 'action' => 'view', 'admin' => true
], $persist);
Router::connect('/admin/ecommerce/watchers/{:action}', [
	'controller' => 'Watchers', 'library' => 'ecommerce_rent', 'admin' => true
], $persist);

?>