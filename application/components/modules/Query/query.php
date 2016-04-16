<?php
/**
 * @package Query.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Query;

/**
 * The Query class.
 */
class Query {
    
    
	private $questions;
    private $answers;
	private $profile;

    public function __construct() {

        $this->questions = array();
        $this->answers = array();
    }

    public function list_questions() {

        $query = "

            SELECT 
                `questions`.`id`,
                `questions`.`question`,
                `answers`.`id` AS an_id,
                `answers`.`answer` 
            FROM 
                `questions`
            INNER JOIN
                `answers`
            ON
                `answers`.`q_id` =  `questions`.`id`
            GROUP BY `answers`.`id`";

        $res = \App::db()->getAll($query);

        $resp = array();
        foreach ($res as $q) {
            $this->questions[$q['id']] = array('id' => $q['id'], 'question' => $q['question']);
            $resp[$q['id']]['answers'][] = array('an_id' => $q['an_id'], 'answer' => $q['answer']);
        }

        foreach ($this->questions as $key => $value) {
            $this->questions[$key]['answers'] = $resp[$key]['answers'];
        }

        return $this->questions;

    }

    public function blog_list() {

        $articles = array();
        
        $query = "

            SELECT 
                * 
            FROM 
                `articles`";

        $res = \App::db()->getAll($query);
        foreach ($res as $article) {
            $articles[] = $article;
        }


        return $articles;

    }

    public function get_article($id='') {
    	\App::render('read-single', array("article" => array('id' => $id), "user" => $this->profile));
    }

    public function blog_create ($article) {

        $article['author'] = 'admin';

        $query = "INSERT INTO 
               `articles` 
            SET 
               ?u";

        $res = \App::db()->query($query, $article);

        $article['id'] = \App::db()->insertId();

        return $article;
    }

    public function blog_delete ($article) {

        $query = "DELETE FROM 
               `articles` 
            WHERE 
               `id` = ?i";

        $res = \App::db()->query($query, $article['id']);

        return array('status' => 'OK');
    }

    public function blog_update ($article) {

        $id = $article['id'];
        unset($article['id']);
        
        $query = "UPDATE 
               `articles` 
            SET 
               ?u
            WHERE `id` = ?i";

        $res = \App::db()->query($query, $article, $id);

        return array('status' => 'OK');
    }

}

