<?php
/**
 * @package TaskManager.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\TaskManager;

/**
 * The TaskManager class.
 */
class TaskManager {
    
    public $user;
    private $tasks;

    /**
     * Constructor.
     *
     * @param string $path Path to templates directory
     */
    public function __construct($uid) {
        $this->tasks = array();
    }

    /**
     * Returns task by id.
     *
     * @param int $id
     * @return $task
     */
    public function getTask($id) {
        
        return (isset( $this->tasks[$id] )) ? $this->tasks[$id] : false;
    }

    /**
     * Sets new task.
     *
     * @param string $task
     */
    public function setTask($task) {
        
        $this->tasks[] = new Task($task);
        return sizeof($this->tasks) - 1;

    }

     /**
     * Return all user tasks.
     *
     */
    public function listTasks() {
        
        return $this->tasks;
    }

     /**
     * Get all user tasks from db.
     *
     */
    public function getTasks($uid) {
        
        $query = "

            SELECT 
                `tasks`.`id` AS task_id,
                `categories`.`name` AS category,
                `types`.`type`,
                `nurse_id`,
                `start_date`,
                `end_date`,
                `title`,
                `notes`,
                `prio`,
                `assignee_id`,
                `assignee_room`,
                
                `private`,
                `created` 
            FROM 
                `tasks` 
            INNER JOIN 
                `types`
            INNER JOIN 
                `categories`
            
            WHERE 
                `tasks`.`type_id` = `types`.`id`
            AND
                `tasks`.`cat_id` = `categories`.`id`
            
            
            AND 
                `private` = 0";

        $res = \App::db()->getAll($query);
        foreach ($res as $task) {
            $this->tasks[] = new Task($task);
        }
    }

    public function create($task) {
       $task->cat_id = 1;
       $task->title = ($task->type_id == '1') ? 'Take pills' : 'Check temperature';
       $task->start_date = date("Y-m-d h:i:s", strtotime($task->start_date));
       $task->end_date = date("Y-m-d h:i:s", strtotime($task->end_date));

       unset($task->hours);
       // foreach ($task as $key => $value) {
       //      if ( is_numeric($value) ) $task->{$key} = intval($value);
       // }

       $t = new Task($task);
       return $t->save();
    }

    public function edit($task) {
       return array('id' => $task->taskId, 'data' => (array)$task); 
    }

    public function remove($task) {

        if (is_array($tasks)) {
           return $task->task; 
        }
         else {
            return $task->task;
         }

       
    }


    /* Admin CRUD */

    public function task_list() {
        $query = "

            SELECT 
                `tasks`.`id` AS task_id,
                `cat_id` AS category,
                `type_id` AS type,
                `nurse_id`,
                `start_date`,
                `end_date`,
                `title`,
                `notes`,
                `prio`,
                `assignee_id`,
                `assignee_room`,
                `private`,
                `created` 
            FROM 
                `tasks`";

        $res = \App::db()->getAll($query);
        foreach ($res as $task) {
            $this->tasks[] = $task;
        }

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $this->tasks;

        return $jTableResult; 
    }

    public function task_categories() {

        $query = "

            SELECT 
                id,
                name
            FROM 
                `categories`";

        $res = \App::db()->getAll($query);
        $cats = array();
        foreach ($res as $cat) {
            $cats[] = array( 
                'Value' => $cat['id'],
                'DisplayText' => ucfirst( $cat['name'] )
            );
        }

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $cats;
        return $jTableResult;
    }

    public function task_types() {

        $query = "

            SELECT 
                id,
                type
            FROM 
                `types`";

        $res = \App::db()->getAll($query);
        $types = array();
        foreach ($res as $type) {
            $types[] = array( 
                'Value' => $type['id'],
                'DisplayText' => ucfirst( $type['type'] )
            );
        }

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $types;
        return $jTableResult;
    }

    public function task_create() {

        $taskr = array(

            "title" => \App::request()->data->title,
            "cat_id" => \App::request()->data->category,
            "type_id" => \App::request()->data->type,
            "nurse_id" => \App::request()->data->nurse_id,
            'private' => 0

        );

        $query = "

            INSERT INTO 
               `tasks` 
            SET 
               ?u";

        $res = \App::db()->query($query, $taskr);
        

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $this->tasks;

        return $jTableResult; 
    }

    public function task_update() {
        $query = "

            SELECT 
                `tasks`.`id` AS task_id,
                `cat_id` AS category,
                `type_id` AS type,
                `nurse_id`,
                `start_date`,
                `end_date`,
                `title`,
                `notes`,
                `prio`,
                `assignee_id`,
                `assignee_room`,
                `private`,
                `created` 
            FROM 
                `tasks`";

        $res = \App::db()->getAll($query);
        foreach ($res as $task) {
            $this->tasks[] = $task;
        }

        $jTableResult = array();
        $jTableResult['Result'] = "OK";

        return $jTableResult; 
    }

    public function task_delete() {
        $query = "

            SELECT 
                `tasks`.`id` AS task_id,
                `cat_id` AS category,
                `type_id` AS type,
                `nurse_id`,
                `start_date`,
                `end_date`,
                `title`,
                `notes`,
                `prio`,
                `assignee_id`,
                `assignee_room`,
                `private`,
                `created` 
            FROM 
                `tasks`";

        $res = \App::db()->getAll($query);
        foreach ($res as $task) {
            $this->tasks[] = $task;
        }

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        return $jTableResult;
    }

  
}

