<?php 
/**
 * @package TaskManager.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\TaskManager;

class Task extends TaskAbstraction {
	

	function save() {

		$udpate = get_object_vars($this);

		$query = "

		INSERT INTO
			`tasks`
		SET
			?u";

		$res = \App::db()->query($query, $udpate);
			
		return \App::db()->insertId();

	}

}