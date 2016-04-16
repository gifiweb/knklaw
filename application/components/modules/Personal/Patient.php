<?php
/**
 * @package Personal.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Personal;
use \application\components\modules\Video\Video;
use \application\components\modules\Shop\Shop;
use \application\components\modules\Blog\Blog;

/**
 * The Patient class.
 */
class Patient extends Personal {
    
    private $videos;
    private $shops;
    private $articles;

    // public function __construct($user) {

    //     parent::__construct($user);
        
    // }

    public function snd() {

    	if (!isset($_SESSION['tour'])) $_SESSION['tour'] = 1; 

        $this->getTasks($this->profile['uid']);
        // $this->setTask('parat');
        $this->tasks = $this->taskmanager->listTasks();

        $videos = new Video($this->profile);
        $this->videos = $videos->list_videos();

        $blog = new Blog($this->profile);
        $this->articles = $blog->blog_list();

        $shop = new Shop($this->profile);
        $this->shops = $shop->list_coupons();


        \App::render('patient-screen', array("tasks" => $this->tasks, "videos" => $this->videos, "shops" => $this->shops, "articles" => $this->articles, "user" => $this->profile));

    }

}

