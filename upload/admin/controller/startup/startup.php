<?php
// *	@copyright	OPENCART.PRO 2011 - 2024.
// *	@forum		https://forum.opencart.pro
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerStartupStartup extends Controller {
	public function index() {
		// Language
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "language` WHERE code = '" . $this->db->escape($this->config->get('config_admin_language')) . "'");

		if ($query->num_rows) {
			$this->config->set('config_language_id', $query->row['language_id']);
		}

		// Language
		$language = new Language($this->config->get('config_admin_language'));
		$language->load($this->config->get('config_admin_language'));
		$this->registry->set('language', $language);

		// Customer
		$this->registry->set('customer', new Cart\Customer($this->registry));

		// Affiliate
		$this->registry->set('affiliate', new Cart\Affiliate($this->registry));

		// Currency
		$this->registry->set('currency', new Cart\Currency($this->registry));

		// Tax
		$this->registry->set('tax', new Cart\Tax($this->registry));

		if ($this->config->get('config_tax_default') == 'shipping') {
			$this->tax->setShippingAddress($this->config->get('config_country_id'), $this->config->get('config_zone_id'));
		}

		if ($this->config->get('config_tax_default') == 'payment') {
			$this->tax->setPaymentAddress($this->config->get('config_country_id'), $this->config->get('config_zone_id'));
		}

		$this->tax->setStoreAddress($this->config->get('config_country_id'), $this->config->get('config_zone_id'));

		// Weight
		$this->registry->set('weight', new Cart\Weight($this->registry));

		// Length
		$this->registry->set('length', new Cart\Length($this->registry));

		// Cart
		$this->registry->set('cart', new Cart\Cart($this->registry));

		// Encryption
		$this->registry->set('encryption', new Encryption($this->config->get('config_encryption')));

		// OpenBay Pro
		$this->registry->set('openbay', new Openbay($this->registry));
	}
}
