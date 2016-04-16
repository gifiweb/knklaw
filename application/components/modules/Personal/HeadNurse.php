<?php
/**
 * @package Personal.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Personal;

/**
 * The Nurse class.
 */
class HeadNurse extends Personal {
    
    // public function __construct($user) {

    //     parent::__construct($user);
        
    //     $this->tasks[] = "Head";
        
    // }

    public function snd() {

        $this->getTasks($this->profile['uid']);
        // $this->setTask('parat');
        $this->tasks = $this->taskmanager->listTasks();


        \App::render('head-nurse-screen', array("tasks" => $this->tasks, "user" => $this->profile));

    }

}

