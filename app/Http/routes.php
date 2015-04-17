<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('tutorial', function(){
   /* $app = app();
    var_dump(get_class($app));
    $object = new \App\User();
    var_dump($object);*/

    $app = app();
    $hello = $app->make('User');

    var_dump($hello);
});

Route::get('/service-tutorial', function()
{
    $app = app();
    /*$app['helloworld']->sayHello();
    echo "<br>";
    $app['helloworld']->sayHello();*/
    $app->make('helloworld')->sayHello();
    echo "<br>\n";
    $app->make('helloworld')->sayHello();
    
    $ff = $_ENV[__NAMESPACE__];
    //return view('home', compact('ff'));
    return view('home')->with('ff', $ff);
});