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

// require 'panes.php';
require 'settings.php';
// require 'media.php';
// require 'widgets.php';

use base_core\models\Users;
use li3_mailer\action\Mailer;
use base_core\extensions\cms\Settings;

if (Settings::read('user.sendCanRentMail')) {
	// Send mail once the user is able to rent again.
	Users::applyFilter('save', function($self, $params, $chain) {
		$entity = $params['entity'];

		if (!$entity->exists()) {
			return $chain->next($self, $params, $chain);
		}
		if (!$entity->can_rent) {
			return $chain->next($self, $params, $chain);
		}
		if ($result = $chain->next($self, $params, $chain)) {
			return $result;
		}

		return Mailer::deliver('user_can_rent', [
			'library' => 'ecommerce_rent',
			'to' => $entity->email,
			'subject' => $t('You can now rent again.'),
			'data' => [
				'user' => $entity
			]
		]);
	});
}

?>