<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload
require_once('vendor/autoload.php');

//create an instance of the BASE CLASS
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET /', function(){
   //echo "<h1>Hello, World!</h1>";
    $view = new View();//add parenthesis for consistency
    echo $view->render('views/home.html');
});

//Define a breakfast route
$f3->route('GET /breakfast', function(){
    $view = new View();
    echo $view->render('views/breakfast.html');
} );
//Define a lunch route
$f3->route('GET /lunch', function(){
    $view = new View();
    echo $view->render('views/lunch.html');
} );

//Define a breakfast/pancakes route
$f3->route('GET /breakfast/pancakes', function(){
    $view = new View();
    echo $view->render('views/pancakes.html');
} );

//Define a dinner route
$f3->route('GET /dinner', function(){
    $view = new View();
    echo $view->render('views/dinner.html');
} );

//Define a dinner/stake route
$f3->route('GET /dinner/steak', function(){
    $view = new View();
    echo $view->render('views/steak.html');
} );

//Define a dinner route
$f3->route('GET /dinner/chicken', function(){
    $view = new View();
    echo $view->render('views/chicken.html');
} );

//run fat free framework
$f3->run();