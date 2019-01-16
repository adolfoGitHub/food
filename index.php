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

//define a route with a parameter
$f3->route('GET /@food', function($f3, $params){
    print_r($params);
    echo "<h3>I like ". $params['food']."</h3>";
});

//define a route with multiple parameters
$f3->route('GET /@meal/@food', function($f3, $params){
    print_r($params);

    $validMeals = ['breakfast', 'lunch', 'dinner'];
    $meal= $params['meal'];
    //check validity
    if(!in_array($meal, $validMeals)){
        echo "<h3>Sorry, we don't serve $meal</h3>";
    }else {
        switch($meal){
            case 'breakfast':
            $time = ' in the morning.';
                break;

            case 'lunch':
             $time = ' at noon';
             break;

            case 'dinner':
                $time = ' in the evening.';

        }
        echo "<h3>I like ".$params['food']." for ".$params['meal']. "$time</h3>";
    }

});

//Define a route to display order form
$f3->route('GET /order', function(){
    $view = new View();
    echo $view->render('views/form1.html');

});

//Define a route to process orders
$f3->route('POST /order-process', function($f3){
    //print_r($_POST);
    echo "Processing order";

    $food = $_POST['food'];

    if($food == 'pancakes'){
        //reroute to pizza page
        $f3->reroute('breakfast/pancakes');

    }else if($food == 'sushi'){

        $f3->reroute('dinner');

    }else{
        $f3->error(404);
    }

    //$view = new View();
   // echo $view->render('views/form1.html');

});

//run fat free framework
$f3->run();