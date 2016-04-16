<?php
/**
 * @package TaskManager.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\TaskManager;

abstract class TaskAbstraction {

	function __construct($array = array()) {
		if ($array && is_array($array) || is_object($array)) {

			foreach($array as $k => $v) {
				$this->{$k} = $v;
			}

		}
	}

	function __set($setting, $value) {
		$this->$setting = $value;
	}

	function __get($setting) {

		if (isset($this->$setting)) {
			return $this->$setting;
		}

	}

	function save() {

		$udpate = get_object_vars($this);

		return $udpate;

	}
}