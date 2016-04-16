<?php
/**
 * @package Personal.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Personal;

/**
 * The Personal interface.
 */
interface iPersonal {
    
    

    /**
     * Constructor.
     *
     * @param string $path Path to templates directory
     */
    public function __construct($user);

    public function snd();

  
}

