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

//run fat free framework
$f3->run();