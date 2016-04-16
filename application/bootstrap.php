<?php
session_start();

require 'application/App.php';
require 'application/core/Db.php';
require 'application/core/SafeMySQL.php';


App::register('db', \application\core\Db::GetConnection());
App::register('config', '\application\core\Config', array(App::db()));
App::register('auth', '\application\core\Auth', array(App::db(), App::config()));

App::set('application.views.path', __DIR__.'/../public');

// if (App::request()->cookies->{App::config()->cookie_name} == false) {

//     App::set('loggedin', false);

// } else {

//     if (App::auth()->checkSession(App::request()->cookies->{App::config()->cookie_name})) {

//         App::set('loggedin', true);
//         $uid = App::auth()->getSessionUID(App::request()->cookies->{App::config()->cookie_name});
//         App::set('userdata', App::auth()->getUser($uid));

//     } else {

//         App::set('loggedin', false);
//         setcookie(App::config()->cookie_name, "", time() - 3600, App::config()->cookie_path, App::config()->cookie_domain, App::config()->cookie_secure, App::config()->cookie_http);
      
//       }
// }
App::route('/admin', function(){ 
    if (App::get('loggedin') == true && App::get('userdata')['type'] == 'A') {
        $admin = new \application\components\modules\Admin\Admin(App::get('userdata'));
        $admin -> render();
    }
        else {
            App::render('admin/login'); 
        }
    
});
App::route('/admin/@page', function($page){ 
    if (App::get('loggedin') == true && App::get('userdata')['type'] == 'A') {
        $admin = new \application\components\modules\Admin\Admin(App::get('userdata'));
        $admin -> render($page);
    }
        else {
            App::render('admin/login'); 
        }
    
});
App::route('/read', function(){ 
    if (App::get('loggedin') == true) {
        $blog = new \application\components\modules\Blog\Blog(App::get('userdata'));
        $blog->list_articles(); 
    }
        else {
            App::render('/login'); 
        }
    
});

App::route('/read/@id/@name', function($id, $name){ 
    if (App::get('loggedin') == true) {
        $blog = new \application\components\modules\Blog\Blog(App::get('userdata'));
        $blog->get_article($id); 
    }
        else {
            App::render('/login'); 
        }
    
});

App::route('/shop', function(){ 
    if (App::get('loggedin') == true) {
        $shop = new \application\components\modules\Shop\Shop(App::get('userdata'));
        $cats = $shop->list_cats(); 
        \App::render('shop', array("cats" => $cats, "user" => App::get('userdata')));

    }
        else {
            App::render('/login'); 
        }
    
});

App::route('/shop/@category', function($category){ 
    if (App::get('loggedin') == true) {
        $shop = new \application\components\modules\Shop\Shop(App::get('userdata'));
        $shops = $shop->list_shops($category); 
        \App::render('shop-cat', array("shops" => $shops, "user" => App::get('userdata')));
    }
        else {
            App::render('/login'); 
        }
    
});

App::route('/register', function(){ App::render('register'); });

App::route('/login', function(){
    
    
    if (App::get('loggedin') == true) {
    
        App::response(false)
                ->status(200)
                ->header('Location', '/')
                ->send();


    } else {
    
        App::render('login');
    }

    

});

App::route('/', function(){
    
    App::render('index');
    return;
    // if (App::get('loggedin') == true) {

    //         $user = App::get('userdata');
    //         $user["type"] = str_replace(array('P', 'N', 'H', 'D', 'A'), array('Patient', 'Nurse', 'HeadNurse', 'Doctor', 'Admin'), $user["type"]);
    //         $screenController = $user["type"];
            
    //         App::register('hospital', '\application\components\modules\Personal\\'.$screenController, array($user));
    //         App::hospital()->snd();
            
    
    // } else {

    //         if (isset($_GET['survey'])) {
    //             $url = "/login?survey";
    //         }
    //             else {
    //                 $url = "/login";
    //             }
    //         App::response(false)
    //             ->status(200)
    //             ->header('Location', $url)
    //             ->send();

    //   }

});

App::map('notFound', function(){
    App::render('404.html');
});

App::start();
