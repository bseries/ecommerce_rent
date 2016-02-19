<?php
/**
 * eCommerce Rent
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * Licensed under the AD General Software License v1.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *
 * You should have received a copy of the AD General Software
 * License. If not, see http://atelierdisko.de/licenses.
 */

use base_core\models\Users;
use li3_mailer\action\Mailer;
use base_core\extensions\cms\Settings;
use lithium\g11n\Message;

extract(Message::aliases());

// Send mail once the user is able to rent again.
Users::applyFilter('save', function($self, $params, $chain) use ($t) {
	$entity = $params['entity'];

	if (!Settings::read('user.sendCanRentMail')) {
		return $chain->next($self, $params, $chain);
	}

	if (!$entity->exists()) {
		return $chain->next($self, $params, $chain);
	}
	if (empty($params['data']['can_rent'])) {
		return $chain->next($self, $params, $chain);
	}
	if (!$result = $chain->next($self, $params, $chain)) {
		return $result;
	}

	return Mailer::deliver('user_can_rent', [
		'library' => 'ecommerce_rent',
		'to' => $entity->email,
		'subject' => $t('You can now rent again.', [
			'locale' => $entity->locale,
			'scope' => 'ecommerce_rent'
		]),
		'data' => [
			'user' => $entity
		]
	]);
});

?>