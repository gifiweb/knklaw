<?php
/**
 * @package Shop.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */

namespace application\components\modules\Shop;

/**
 * The Shop class.
 */
class Shop {
    
    
	private $cats;
    private $coupons;
    private $shops;
	private $profile;

    public function __construct($user) {

        $this->cats = array();
        $this->shops = array();
        $this->coupons = array();
        $this->profile = $user;
        
    }

    public function list_cats() {

        $query = "

            SELECT 
                * 
            FROM 
                `shop_category`";

        $res = \App::db()->getAll($query);
        foreach ($res as $cats) {
            $this->cats[] = $cats;
        }

        return $this->cats;

    }

    public function list_shops($cat = '') {

        $query = "

            SELECT 
                `shops`.`id`,
                `shops`.`name`,
                `shops`.`image`,
                `shop_category`.`name` AS 'category' 
            FROM 
                `shops`
            LEFT JOIN 
                `shop_category`
            ON
                `shops`.`cat_id` = `shop_category`.`id`";

        if (!empty ($cat)) {

            $query_cat = "
                SELECT
                   `id`
                FROM
                    `shop_category`
                WHERE 
                    `link` = ?s";

            $row = \App::db()->getRow($query_cat, $cat);

            $query .= "

                WHERE 
                   `shops`.`cat_id` = ?i";
            $res = \App::db()->getAll($query, $row['id']);
        }
            else {
                $res = \App::db()->getAll($query);
            }

        foreach ($res as $shops) {
            $this->shops[] = $shops;
        }

        return $this->shops;

    }

    public function list_coupons() {

        $query = "

            SELECT 
                `coupons`.`id`,
                `coupons`.`name`,
                `coupons`.`image`,
                `shops`.`name` AS 'shop',
                `shop_category`.`name` AS 'category',
                `shops`.`id` AS 'shop_id',
                `shop_category`.`id` AS 'cat_id'
            FROM 
                `coupons` 
            INNER JOIN 
                `shops`
            INNER JOIN 
                `shop_category`
            WHERE 
                `shops`.`id` = `coupons`.`shop_id`
            AND
                `shop_category`.`id` = `shops`.`cat_id`";

        $res = \App::db()->getAll($query);
        foreach ($res as $coupons) {
            $this->coupons[] = $coupons;
        }

        return $this->coupons;
        //\App::render('shop-cat', array("events" => $this->events, "user" => $this->profile));

    }

    public function shop_remove($data) {

        $data = json_decode(json_encode($_POST));
        $res = array();

        switch ($data->item) {
            case 'coupon' : {
                $res = $this->remove_coupon($data->id);
                break;
            }
        }

        return $res;
    }

    public function shop_update($data) {

        $data = json_decode(json_encode($_POST));
        $res = array();

        switch ($data->item) {
            case 'coupon' : {
                $res = $this->update_coupon($data->id, $data->options);
                break;
            }
        }

        return $res;
    }

    public function shop_create($data) {

        $data = json_decode(json_encode($_POST));
        $res = array();

        switch ($data->item) {
            case 'coupon' : {
                $res = $this->create_coupon($data->options);
                break;
            }
            case 'shop' : {
                $res = $this->create_shop($data->options);
                break;
            }
            case 'category' : {
                $res = $this->create_category($data->options);
                break;
            }
        }

        return $res;

    }

    private function create_shop($options) {

        $query = "INSERT INTO 
               `shops` 
            SET 
               ?u";

        $res = \App::db()->query($query, $options);

        $id = \App::db()->insertId();

        return $res;
    }

    private function create_category($options) {

        $query = "INSERT INTO 
               `shop_category` 
            SET 
               ?u";

        $res = \App::db()->query($query, $options);

        $id = \App::db()->insertId();

        return $res;
    }

    private function create_coupon($options) {

        $query = "INSERT INTO 
               `coupons` 
            SET 
               ?u";

        $res = \App::db()->query($query, $options);

        $id = \App::db()->insertId();

        return $res;
    }

    private function remove_coupon($id) {
        $res = array();

        $query = "DELETE FROM 
               `coupons` 
            WHERE 
               `id` = ?i";

        $res = \App::db()->query($query, $article['id']);

        $res['status'] = 'OK';
        $res['id'] = $id;

        return $res;
    }

}

