<?php
/**
 * @package Blog.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Blog;

/**
 * The Blog class.
 */
class Blog {
    
    
	private $articles;
	private $profile;

    public function __construct($user) {

        $this->articles = array();
        $this->profile = $user;
        
    }

    public function list_articles() {

        $query = "

            SELECT 
                * 
            FROM 
                `articles`";

        $res = \App::db()->getAll($query);
        foreach ($res as $article) {
            $this->articles[] = $article;
        }


        \App::render('read', array("articles" => $this->articles, "user" => $this->profile));

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

