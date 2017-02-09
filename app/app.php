<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/TomagotchiFactory.php";

    session_start();

    if (empty($_SESSION['life_stats'])) {
        $_SESSION['life_stats'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {

        return $app['twig']->render('tomagotchi.html.twig', array('tasks' => TomagotchiFactory::getAll()));
    });

    $app->post("/tasks", function() use ($app) {
        $task = new TomagotchiFactory($_POST['description']);
        $task->save();
        return $app['twig']->render('create_tomagotchi.html.twig');
    });

    $app->post("/delete_tasks", function() use ($app){

        TomagotchiFactory::deleteAll();

        return $app['twig']->render('delete_tomagotchi.html.twig');
    });

    return $app;
?>
