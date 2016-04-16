<?php
/**
 * @package Users CRUD.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Users;

/**
 * The UserManager class.
 */
class Users {
    
    /**
     * Constructor.
     *
     * @param string $path Path to templates directory
     */
    public function __construct($uid = false) {
        
    }

   
    public function user_list() {
        
        $query = "

            SELECT 
                users.id,
                user_profiles.firstname,
                user_profiles.lastname,
                users.type,
                users.username,
                users.email,
                users.isactive,
                users.dt
            FROM 
                `user_profiles` 
            INNER JOIN 
                `users`
            WHERE 
                `user_profiles`.`uid` = `users`.`id`";

        $res = \App::db()->getAll($query);
        $rows = array();
        foreach ($res as $user) {
            $rows[] = $user;
        }

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $rows;

        return $jTableResult;
    }

    public function user_delete() {

        $query = "DELETE FROM `user_profiles` WHERE `uid` = ?i";
        $res = \App::db()->query($query, \App::request()->data->id);

        $query = "DELETE FROM `users` WHERE `id` = ?i";
        $res = \App::db()->query($query, \App::request()->data->id);

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        return $jTableResult;
    }

    public function user_create() {

        $user = array(

            "type" => \App::request()->data->type,
            "username" => \App::request()->data->username,
            "email" => \App::request()->data->email,
            "isactive" => \App::request()->data->isactive,

        );

        $reg = \App::auth()->register($user['email'], $user['username'], 'dadadaA12', 'dadadaA12');
        $uid = $reg['id'];

        $query = "
            UPDATE 
                users 
            SET
                type = ?s,
                isactive = ?s
            WHERE
                `id` = ?i";
        $res = \App::db()->query($query, $user['type'], $user['isactive'], $uid);

        $user_profile = array(

            "uid" => $uid,
            "firstname" => \App::request()->data->firstname,
            "lastname" => \App::request()->data->lastname,

        );

        $query = "
            INSERT INTO 
                user_profiles 
            SET
                ?u";
        $res = \App::db()->query($query, $user_profile);

        $query = "

            SELECT 
                users.id,
                user_profiles.firstname,
                user_profiles.lastname,
                users.type,
                users.username,
                users.email,
                users.isactive,
                users.dt
            FROM 
                `user_profiles` 
            INNER JOIN 
                `users`
            WHERE 
                `user_profiles`.`uid` = `users`.`id`
            AND
               `users`.`id` = ?i";

        $res = \App::db()->getRow($query, $uid);

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Record'] = $res;
        return $jTableResult;
    }

    public function user_update() {

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        return $jTableResult;
    }


    public function user_nurses() {

        $query = "

            SELECT 
                users.id,
                user_profiles.firstname,
                user_profiles.lastname
            FROM 
                `user_profiles` 
            INNER JOIN 
                `users`
            WHERE 
                `user_profiles`.`uid` = `users`.`id`
            AND
                `users`.`type` = 'N'
            AND 
                `users`.`isactive` = '1'";

        $res = \App::db()->getAll($query);
        $nurses = array();
        foreach ($res as $user) {
            $nurses[] = array( 
                'Value' => $user['id'],
                'DisplayText' => $user['firstname'] . ' ' . $user['lastname']
            );
        }

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $nurses;
        return $jTableResult;
    }

  
}

