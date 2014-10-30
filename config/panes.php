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

use base_core\extensions\cms\Panes;
use lithium\g11n\Message;

extract(Message::aliases());

Panes::register('ecommerce.watchers', [
	'title' => $t('Watchers'),
	'url' => ['action' => 'index', 'controller' => 'ecommerce', 'library' => 'ecommerce_rent', 'admin' => true]
]);

?>