<?php
session_start();

require '../../application/App.php';
require '../../application/core/Db.php';
require '../../application/core/SafeMySQL.php';


use \application\core\Events;
use \application\components\modules\TaskManager\TaskManager;
use \application\components\modules\Users\Users;
use \application\components\modules\Blog\Blog;
use \application\components\modules\Shop\Shop;
use \application\components\modules\Video\Video;
use \application\components\modules\Query\Query;

App::register('db', \application\core\Db::GetConnection());
App::register('config', '\application\core\Config', array(App::db()));
App::register('auth', '\application\core\Auth', array(App::db(), App::config()));

subscribe_for_test();

if (App::request()->cookies->{App::config()->cookie_name} == false) {

    App::set('loggedin', false);

} else {

    if (App::auth()->checkSession(App::request()->cookies->{App::config()->cookie_name})) {

        App::set('loggedin', true);
        $uid = App::auth()->getSessionUID(App::request()->cookies->{App::config()->cookie_name});
        App::set('userdata', App::auth()->getUser($uid));

    } else {

        App::set('loggedin', false);
        setcookie(App::config()->cookie_name, "", time() - 3600, App::config()->cookie_path, App::config()->cookie_domain, App::config()->cookie_secure, App::config()->cookie_http);
      
      }
}

App::route('/auth/@action', function($action){

	switch ($action) {

		case 'login':
			
			$remember = (isset(App::request()->data->remember) && App::request()->data->remember == "1") ? true : false;

			$response = App::auth()->login(App::request()->data->username, App::request()->data->password, $remember);
		    if ($response['error'] == 0) {

		        setcookie(

		       		App::config()->cookie_name, 
		       		$response['hash'],
		       		$response['expire'], 
		       		App::config()->cookie_path, 
		       		App::config()->cookie_domain, 
		       		App::config()->cookie_secure, 
		       		App::config()->cookie_http

		       	);

		    }
			break;
			
		case 'signup':
			
			$response = App::auth()->register(

				App::request()->data->email, 
				App::request()->data->username, 
				App::request()->data->password, 
				App::request()->data->re_password

			);
			break;

		case 'logout':
			
			$res = App::auth()->logout(App::request()->cookies->{App::config()->cookie_name});
			setcookie(App::config()->cookie_name, "", time() - 3600, App::config()->cookie_path, App::config()->cookie_domain, App::config()->cookie_secure, App::config()->cookie_http);
			$response['error'] = 0;
			break;
	}
	App::json($response, 200);

});

App::route('/tasks/@action', function($action){

	$tmanager = new TaskManager(App::request()->data->user);
	if (method_exists($tmanager, $action)) {
		
		// if (!isset(App::request()->data->task)) App::request()->data->task = 0;
    	$response =  $tmanager->{$action}(App::request()->data);
    		
    }
    	else {
			$action = 'task_'.$action;
    		if (method_exists($tmanager, $action)) {
		    	$response =  $tmanager->{$action}(App::request()->data);
		    }
    	}
	App::json($response, 200);

});

App::route('/users/@action', function($action){

	$action = 'user_'.$action;
	$users = new Users(App::request()->data->user);
	if (method_exists($users, $action)) {
		
		// if (!isset(App::request()->data->task)) App::request()->data->task = 0;
    	$response =  $users->{$action}(App::request()->data);
    		
    }
	App::json($response, 200);

});

App::route('/blog/@action', function($action){

	$action = 'blog_'.$action;
	$blog = new Blog(App::request()->data->user);
	if (method_exists($blog, $action)) {
		
    	$response =  $blog->{$action}($_POST);
    		
    }
	App::json($response, 200);

});

App::route('/shop/@action', function($action){

	$action = 'shop_'.$action;
	$shop = new Shop(App::request()->data->user);
	if (method_exists($shop, $action)) {
		
    	$response =  $shop->{$action}($_POST);
    		
    }
	App::json($response, 200);

});

App::route('/video/@action', function($action){

	$action = 'video_'.$action;
	$video = new Video(App::request()->data->user);
	if (method_exists($video, $action)) {
		
    	$response =  $video->{$action}($_POST);
    		
    }
	App::json($response, 200);

});

App::route('/query/@action', function($action){

	$action = 'query_'.$action;
	$query = new Query(App::request()->data->user);
	if (method_exists($query, $action)) {
		
    	$response =  $query->{$action}($_POST);
    		
    }
	App::json($response, 200);

});

App::route('/', function(){
	
	$input = $_REQUEST;
	$action = $input["action"];

	switch ($action) {

		case 'event': {

			Events::publish( 'event' );
			exit;
		}

	}

	App::json($response, 200);
});

App::route('/tour', function(){
	
	$_SESSION['tour'] = 0;

	App::json(array(), 200);
});


App::route('/@controller/@action', function($controller, $action){App::json(array('Controller' => $controller, 'Action' => $action), 200);});

App::start();



function subscribe_for_test(){

	Events::subscribe( 'event', function () {
		\App::set('msg1', 'first');
	});
	Events::subscribe( 'event', function () {
		\App::set('msg2', 'second');
	});
	Events::subscribe( 'event', function () {
		\App::set('msg3', 'third');
	});
	Events::subscribe( 'event', function () {
		App::json(array(\App::get('msg1'),\App::get('msg2'),\App::get('msg2')), 200);
	});
	// assigned but not sent
	Events::subscribe( 'event', function () {
		\App::set('msg4', 'fourth');
	});

}