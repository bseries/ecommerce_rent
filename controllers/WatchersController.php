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

namespace ecommerce_rent\controllers;

use lithium\g11n\Message;
use li3_flash_message\extensions\storage\FlashMessage;
use ecommerce_rent\models\VoucherCodes;
use ecommerce_rent\models\Vouchers;
use li3_access\security\Access;

class WatchersController extends \base_core\controllers\BaseController {

	use \base_core\controllers\AdminAddTrait;
	use \base_core\controllers\AdminEditTrait;
	use \base_core\controllers\AdminDeleteTrait;

	public function admin_index() {
		$data = Watchers::find('all', [
			'order' => ['created' => 'desc']
		]);
		return compact('data') + $this->_selects();
	}

	/*
	protected function _selects($item = null) {
		extract(Message::aliases());

		// $types = Vouchers::find('list');

		return compact('rules', 'types');
	}
	 */
}

?>