<?php
/**
 * @package Personal.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Personal;

/**
 * The Patient class.
 */
class Admin extends Personal {
    
    

    public function __construct($user) {}

    public function snd() {

		\App::response(false)
	        ->status(200)
	        ->header('Location', '/admin')
	        ->send();

    }

}

