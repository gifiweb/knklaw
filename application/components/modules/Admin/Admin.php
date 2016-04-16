<?php
/**
 * @package Admin.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Admin;

/**
 * The Admin class.
 */
class Admin {
    
    
	private $articles;
	private $profile;

    public function __construct($user) {

        $this->articles = array();
        $this->profile = $user;
        
    }

    public function list_articles() {

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
                `routin`.`every`,
                `routin`.`at`,
                `private`,
                `created` 
            FROM 
                `tasks` 
            INNER JOIN 
                `types`
            INNER JOIN 
                `categories`
            INNER JOIN 
                `routin`
            WHERE 
                `tasks`.`type_id` = `types`.`id`
            AND
                `tasks`.`cat_id` = `categories`.`id`
            AND
                `tasks`.`routin_id` = `routin`.`id`
            AND 
                `private` = 0";

        $res = \App::db()->getAll($query);
        foreach ($res as $task) {
            $this->articles[] = $task;
        }


        \App::render('read', array("articles" => $this->articles, "user" => $this->profile));

    }

    public function render($page='dashboard') {
    	$page = 'admin_'.$page;
        \App::render('admin/'.$page, array("user" => $this->profile));
    }

}

