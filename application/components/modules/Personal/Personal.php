<?php
/**
 * @package Personal.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Personal;

use \application\components\modules\TaskManager\TaskManager;

/**
 * The abstract Personal class.
 */
abstract class Personal implements iPersonal {
    
   
    protected $tasks;
    protected $profile;
    protected $taskmanager;

    // Task
    protected $assignee_id;
    protected $assignee_room;
    protected $at;
    protected $category;
    protected $created;
    protected $end_date;
    protected $every;
    protected $notes;
    protected $nurse_id;
    protected $prio;
    protected $private;
    protected $start_date;
    protected $task_id;
    protected $title;
    protected $type;

    // User
    // protected $email;
    // protected $firstname;
    // protected $isactive;
    // protected $lastname;
    // protected $password;
    // protected $room;
    // protected $salt;
    // protected $type;
    // protected $uid;
    // protected $username;

    public function __construct($user) {

        $this->profile = $user;
        $this->tasks = array();
        $this->taskmanager = new TaskManager($this->profile['uid']);
        
    }

    public function __call($function, $args) {

    	if (method_exists($this->taskmanager, $function)) {
    		call_user_func_array(array($this->taskmanager, $function), $args);
    	}
    		else return false;
    }

    public function snd() {

        \App::render('index', array("type" => $this->tasks[0]));

    }

}

