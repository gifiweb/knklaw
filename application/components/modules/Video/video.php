<?php
/**
 * @package Video.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Video;

/**
 * The Video class.
 */
class Video {
    
    
	private $videos;
	private $profile;

    public function __construct($user) {

        $this->videos = array();
        $this->profile = $user;
        
    }

    public function list_videos() {

        $query = "

            SELECT 
                * 
            FROM 
                `videos`";

        $res = \App::db()->getAll($query);
        foreach ($res as $video) {
            $this->videos[] = $video;
        }

        return $this->videos;

    }

   
    public function video_create ($video) {

        $query = "INSERT INTO 
               `videos` 
            SET 
               ?u";

        $res = \App::db()->query($query, $video);

        $video['id'] = \App::db()->insertId();

        return $video;
    }

    public function video_delete ($video) {

        $query = "DELETE FROM 
               `videos` 
            WHERE 
               `id` = ?i";

        $res = \App::db()->query($query, $video['id']);

        return array('status' => 'OK');
    }

    public function video_update ($video) {

        $id = $video['id'];
        unset($video['id']);
        
        $query = "UPDATE 
               `videos` 
            SET 
               ?u
            WHERE `id` = ?i";

        $res = \App::db()->query($query, $video, $id);

        return array('status' => 'OK');
    }

}

